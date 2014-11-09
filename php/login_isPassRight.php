<?php
/*
	@param $_POST['login_pass']
*/

require 'config.php';
 
sleep(1);

$pass = sha1($_POST['login_pass']);

$query = mysql_query("SELECT user,id FROM user WHERE email='$_POST[login_email]' AND pass='$pass'  ") or die('SQL 错误!');

echo get_json_from_query($query);

mysql_close(); 


?>