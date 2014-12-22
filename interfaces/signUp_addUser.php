<?php
/*

@param $_POST['reg_user']
@param $_POST['reg_pass']
@param $_POST['reg_email']

 */

require '../require.php';require 'mysql.config.php';

sleep(1);

$reg_user = addslashes($_POST['reg_user']);
$reg_pass = addslashes($_POST['reg_pass']);
$reg_email = addslashes($_POST['reg_email']);

$query = "INSERT INTO users (user, pass, email, date)
VALUES ('$reg_user', sha1('$reg_pass'), '$reg_email' , NOW())";

mysql_query($query) or die('新增失败!' . mysql_error());

echo 'true';

mysql_close();

?>
