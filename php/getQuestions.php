<?php 
/*
	@param $_POST['kind'] 查询方式 0:获取多个question返回JSON数组   1:获取特定的question 返回JSON对象
	@param $_POST['start'] 查询起始点
	@param $_POST['count'] 查询个数
	1:
	@param $_POST['id'] 指定的ID
*/

	require'config.php';
	$start = $_POST['start'];
	$count = $_POST['count'];

	if($_POST['kind'] == 0){

		$sql = "SELECT (SELECT user FROM user WHERE a.user_id=id) AS user,id,title,details,date FROM question a ORDER BY date DESC LIMIT $start,$count";
		$query = mysql_query($sql) or die ('SQL错误'.mysql_error());
		echo get_json_from_query($query);
		mysql_close();
	}else if($_POST['kind'] == 1){

		$question_id =  $_POST['id'];
		$question_sql = "SELECT (SELECT user FROM user WHERE a.user_id=id) AS user,title,details,date FROM question a WHERE id=$question_id";
		$question_query = mysql_query($question_sql) or die ('SQL错误'.mysql_error());

		$question_json =get_json_from_query($question_query);


		$comments_sql = "SELECT (SELECT user FROM user WHERE a.user_id=id) AS user,user_id,
		details,date FROM comment a WHERE question_id=$question_id  ORDER BY date DESC LIMIT $start,$count";
		$comments_query = mysql_query($comments_sql) or die ('SQL错误'.mysql_error());
		
		$comments_json =get_json_from_query($comments_query);

		echo '{"question":'.$question_json.',"comments":'.$comments_json."}";
		mysql_close();

	}


 ?>