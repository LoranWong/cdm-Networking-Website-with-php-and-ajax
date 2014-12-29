<?php
/*
@param $_POST['reg_email']
 */

require_once '../require.php';

$email = $_GET['reg_email'];
echo mydb_isexist('users', "email=$email");

mysql_close();
