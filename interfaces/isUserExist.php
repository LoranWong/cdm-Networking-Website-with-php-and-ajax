<?php
/*
@param $_POST['reg_email']
 */
//此接口的返回数据比较特殊  true代表不存在  false代表存在

require_once '../require.php';
sleep(1);
$email = $_POST['reg_email'];

if (mydb_isexist('users', "email='{$email}'") == 'true') {
	echo 'false';
} else {
	echo 'true';
}

mysql_close();
