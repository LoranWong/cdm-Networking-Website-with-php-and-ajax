<?php
/*
	@param $_POST['details']
	@param $_POST['question_id']
	@param $_POST['user_id']
*/
 
require 'config.php';

sleep(1);

$details = addslashes($_POST['details']);
$question_id = $_POST['question_id'];
$user_id = $_POST['user_id'];


$query = "INSERT INTO comments (user_id , question_id, details , date)
VALUES ('$user_id' ,'$question_id', '$details',  NOW())";

mysql_query($query) or die('新增失败!'.mysql_error());

echo 'true';

mysql_close(); 


?>
