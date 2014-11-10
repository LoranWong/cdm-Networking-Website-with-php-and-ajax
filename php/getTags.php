<?php 
/*
	@param $_POST['id'] 指定的TagID
*/

	require'config.php';

	$id = $_POST['id'];

	if($id == null){
		$sql = "SELECT name,id FROM tags";
	}else{
		$sql = "SELECT name,id FROM tags WHERE id=$id";
	}


	$query = mysql_query($sql) or die ('SQL错误'.mysql_error());
	echo get_json_from_query($query);
	mysql_close();

 ?>