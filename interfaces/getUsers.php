
<?php

/*
 * 1.根据小组筛选
 *
 * $_POST['group_id'] 指定的group_id
 * $start = $_POST['start'];
 * $count = $_POST['count'];
 *
 * 2.根据大学筛选
 * $_POST['uni_id'] 指定的uni_id
 * $start = $_POST['start'];
 * $count = $_POST['count'];
 *
 * 3.根据用户筛选大学
 * $_POST['get_uni_user_id'] get_uni_user_id
 * $start = $_POST['start'];
 * $count = $_POST['count'];
 *
 * @return 个人信息的JSON数组
 */

require_once '../require.php';
$group_id = $_POST['group_id'];
$uni_id = $_POST['uni_id'];
$get_uni_user_id = $_POST['get_uni_user_id'];
$start = $_POST['start'];
$count = $_POST['count'];

if ($group_id != null) {
	$sql = "SELECT u.user,u.id from users u join rel_user_group r on r.user_id = u.id
    where r.group_id = $group_id ORDER BY r.date DESC LIMIT $start,$count";
} elseif ($uni_id != null) {
	$sql = "SELECT user,id from users
    where uni_id = $uni_id ORDER BY r.date DESC LIMIT $start,$count";
} elseif ($get_uni_user_id != null) {
	//先取得 uni_id
	$sql = "SELECT uni_id from users where id = $get_uni_user_id";
	$query = mysql_query($sql) or die('SQL错误' . mysql_error());
	$row = mysql_fetch_array($query, MYSQL_ASSOC);
	$uni_id = $row['uni_id'];
	//若选择了学校，则按学校获得结果，否则随机
	if ($uni_id != 1) {
		$sql = "SELECT (SELECT unis.name FROM unis where unis.id=u.uni_id) AS uni_name,
        (SELECT majors.name FROM majors where majors.id=u.major_id) AS major_name,
        u.user,u.id from users u
        where u.uni_id=$uni_id
        and (SELECT COUNT(*) From rel_user_user WHERE follower_id=$get_uni_user_id and followee_id=u.id)=0
        ORDER BY u.date DESC LIMIT $start,$count";
	} else {
		$sql = "SELECT (SELECT unis.name FROM unis where unis.id=u.uni_id) AS uni_name,
        (SELECT majors.name FROM majors where majors.id=u.major_id) AS major_name,
        u.user,u.id from users u
        where u.uni_id!=1
        and (SELECT COUNT(*) From rel_user_user WHERE follower_id=$get_uni_user_id and followee_id=u.id)=0
        ORDER BY u.date DESC LIMIT $start,$count";
	}

}

echo get_json_from_sql($sql);

mysql_close();
