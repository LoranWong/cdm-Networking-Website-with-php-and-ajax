<?php
/*
@param $_POST['start'] 查询起始点 必须
@param $_POST['count'] 查询个数 必须

//下三个参数都为空时返回所有问题, 三个之中至多只能有一个不为空
@param $_POST['tag_id']
@param $_POST['group_id']
@param $_POST['user_id']
 */

require_once '../require.php';

$start = $_POST['start'];
$count = $_POST['count'];

$sql = "";

if ($_POST['tag_id'] != null) {
	//以TAG作为筛选基准
	$tag_id = $_POST['tag_id'];
	$sql = "SELECT (SELECT user FROM users WHERE q.user_id=id) AS user,
	user_id,q.id,q.title,q.details,q.date FROM questions q
	join
	(SELECT q.id from questions q join rel_question_tag r on r.question_id = q.id where r.tag_id = $tag_id) b
	on q.id = b.id ORDER BY q.date DESC LIMIT $start,$count";

} elseif ($_POST['group_id'] != null) {
	//以GROUP作为筛选基准
	$group_id = $_POST['group_id'];
	$sql = "SELECT (SELECT user FROM users WHERE q.user_id=id) AS user,
	user_id,q.id,q.title,q.details,q.date from questions q
	join
	(SELECT u.id from users u join rel_user_group r on r.user_id = u.id where r.group_id = $group_id) b
	on q.user_id=b.id order by q.date DESC LIMIT $start,$count";

} elseif ($_POST['user_id'] != null) {
	$user_id = $_POST['user_id'];
	$sql = "SELECT title,id,date from questions where user_id = $user_id order by date DESC";
} else {
	$sql = "SELECT (SELECT user FROM users WHERE q.user_id=id) AS user,
	user_id,id,title,details,date FROM questions q
	ORDER BY date DESC LIMIT $start,$count";
}

$query = mysql_query($sql) or die('SQL错误' . mysql_error());

$json = "";
while ($row = mysql_fetch_array($query, MYSQL_ASSOC)) {
	$question_id = $row['id'];
	//根据ID取回最新评论来源以及评论个数
	$sql_comments = "SELECT (SELECT user FROM users WHERE c.user_id=id) AS user,user_id,date,question_id FROM comments c  where c.question_id=$question_id ORDER BY date DESC";
	$query_comments = mysql_query($sql_comments) or die('SQL错误' . mysql_error());

	//取得第一行，以及行数
	if ($row_comment = mysql_fetch_array($query_comments, MYSQL_ASSOC)) {
		$row['latest_user'] = $row_comment['user'];
		$row['latest_user_id'] = $row_comment['user_id'];
		$row['comments_count'] = mysql_num_rows($query_comments);
	} else {
		$row['latest_user'] = '';
		$row['comments_count'] = "0";
	}

	foreach ($row as $key => $value) {
		# 将中文编码 防止后续操作乱码
		$value = addslashes($value);
		$row[$key] = urlencode(str_replace("\n", "", $value));
	}
	$json .= urldecode(json_encode($row)) . ",";
}
//组成数组
$json = "[" . substr($json, 0, strlen($json) - 1) . "]";

echo $json;

mysql_close();

