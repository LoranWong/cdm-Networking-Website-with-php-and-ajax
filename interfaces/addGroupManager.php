<?php
/**
 * 添加小组管理员
 * @param $_POST['user_id']
 * @param $_POST['group_id']
 *
 */

require_once '../require.php';

$user_id = $_POST['user_id'];
$group_id = $_POST['group_id'];

$array = array('user_id'=>$user_id,
    'group_id'=>$group_id);
//先加入小组
mydb_insert('rel_user_group',$array);
//设置权限
echo mydb_insert('rel_manager_group',$array);
