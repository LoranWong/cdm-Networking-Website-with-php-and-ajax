
<?php 

/*
	@param $_POST['id'] 指定的ID
	@return 个人信息的JSON数组
*/

	require'config.php';
	$id = $_POST['id'];


	$sql = "SELECT u.user,u.id from users u join rel_user_group r on r.user_id = u.id where r.group_id = $id ORDER BY r.date";

	$query = mysql_query($sql) or die ('SQL错误'.mysql_error());

	echo get_json_from_query($query);
	mysql_close();

 ?>

