<?php
/*
	@param $_POST['reg_user']
	@param $_POST['reg_pass']
	@param $_POST['reg_email']
	@param $_POST['reg_field']
	@param $_POST['reg_birthday']
	@param $_POST['reg_gender']

	返回注册成功地Jquery对象
*/
	
require 'config.php';

sleep(1);

$reg_user = addslashes($_POST['reg_user']);
$reg_pass = addslashes($_POST['reg_pass']);
$reg_email = addslashes($_POST['reg_email']);



$query = "INSERT INTO user (user, pass, email, gender, birthday, field , date)
VALUES ('$reg_user', sha1('$reg_pass'), '$reg_email',
'$_POST[reg_gender]', '$_POST[reg_birthday]', '$_POST[reg_field]', NOW())";

mysql_query($query) or die('新增失败!'.mysql_error());

echo 'true';

mysql_close(); 


?>
