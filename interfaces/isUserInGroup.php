<?php
/**
 * 查看用户是否在小组中
 * @param $_POST['group_id']
 * @param $_POST['user_id']
 */
require_once '../require.php';
//sleep(1);
$group_id = $_POST['group_id'];
$user_id = $_POST['user_id'];

echo mydb_isexist('rel_user_group',"group_id={$group_id} and user_id = {$user_id}");
