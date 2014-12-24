
<?php

/*
@param $_POST['id'] 指定的ID
@return 个人信息的JSON数组
 */

require_once '../require.php';
$id = $_POST['id'];

$sql = "SELECT u.user,u.id from users u join rel_user_group r on r.user_id = u.id where r.group_id = $id ORDER BY r.date";

echo get_json_from_sql($sql);
mysql_close();



