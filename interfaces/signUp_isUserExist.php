<?php
/*
@param $_POST['reg_email']
 */

require_once '../require.php';

$query = mysql_query("SELECT email FROM users WHERE email='$_GET[reg_email]'") or die('SQL 错误!');
if (mysql_fetch_array($query, MYSQL_ASSOC)) {
	echo 'false';
} else {
	echo 'true';
}

mysql_close();

?>