<?php
/*
@param $_POST['reg_email']
 */

require_once '../require.php';

echo mydb_isexist('users','email=chang@gmail.com');

mysql_close();

