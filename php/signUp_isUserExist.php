<?php
/*
	@param $_POST['reg_email']
*/

require 'config.php';

$query = mysql_query("SELECT email FROM user WHERE email='$_GET[reg_email]'") or die('SQL 错误!');
if (mysql_fetch_array($query, MYSQL_ASSOC)) {
	echo 'false';
} else {
	echo 'true';
}

mysql_close(); 


?>