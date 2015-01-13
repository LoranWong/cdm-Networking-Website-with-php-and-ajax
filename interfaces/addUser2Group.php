<?php
/**
 * 加入小组
 * @param $_POST['group_id']
 * @param $_POST['user_id']
 */
require_once '../require.php';
sleep(1);
$group_id = $_POST['group_id'];
$user_id = $_POST['user_id'];

$arr = array('group_id'=>$group_id,'user_id'=>$user_id);

//先判断是否已经加入了
if(mydb_isexist('rel_user_group',"group_id={$group_id} and user_id = {$user_id}") == 'false' ){
    echo mydb_insert('rel_user_group',$arr);
}else{
    echo 'true';
}
