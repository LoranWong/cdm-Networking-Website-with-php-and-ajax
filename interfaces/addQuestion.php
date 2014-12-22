<?php
/*
@param $_POST['details']
@param $_POST['title']
@param $_POST['user_id']
 */

require '../require.php';require 'mysql.config.php';

sleep(1);

$details = addslashes($_POST['details']);
$title = addslashes($_POST['title']);
$user_id = $_POST['user_id'];

$query = "INSERT INTO questions (user_id , title, details , date)
VALUES ('$user_id' ,'$title', '$details',  NOW())";

mysql_query($query) or die('新增失败!' . mysql_error());

echo 'true';

mysql_close();

?>
