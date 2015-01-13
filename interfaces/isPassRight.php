<?php
/*
@param $_POST['login_pass']
@param $_POST['login_email']

匹配失败会返回  '[]'  成功返回用户json数据
 */

require_once '../require.php';

sleep(1);

$pass = sha1($_POST['login_pass']);

$sql = "SELECT user,id FROM users WHERE email='$_POST[login_email]' AND pass='$pass'  ";

echo get_json_from_sql($sql);

mysql_close();
