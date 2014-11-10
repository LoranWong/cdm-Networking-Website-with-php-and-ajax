<?php 
/*
	@param $_POST['id'] 指定的ID
*/

	require'config.php';

	$id = $_POST['id'];

	$sql = "SELECT name,id FROM groups WHERE id=$id";

	$query = mysql_query($sql) or die ('SQL错误'.mysql_error());

	echo get_json_from_query($query);
	mysql_close();

 ?>