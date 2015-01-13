<?php
/*

@param $_POST['reg_user']
@param $_POST['reg_pass']
@param $_POST['reg_email']

 */

require_once '../require.php';

sleep(1);

$reg_user = addslashes($_POST['reg_user']);
$reg_pass = sha1(addslashes($_POST['reg_pass']));
$reg_email = addslashes($_POST['reg_email']);

//$query = "INSERT INTO users (user, pass, email, date)
//VALUES ('$reg_user', '$reg_pass', '$reg_email' , NOW())";

$array = array('user' => "$reg_user",
	'pass' => "$reg_pass",
	'email' => "$reg_email",
	'date' => "NOW()",
);

echo mydb_insert('users', $array);

mysql_close();
