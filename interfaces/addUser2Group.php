<?php
/**
 * 加入小组
 * @param $_POST['group_id']
 * @param $_POST['user_id']
 * @return 1.insert_id  2.false  3.e_0(代表加入小组达到上限)
 */
require_once '../require.php';
sleep(1);
$group_id = $_POST['group_id'];
$user_id = $_POST['user_id'];

$arr = array('group_id'=>$group_id,'user_id'=>$user_id);

//判断是否上限
if(mydb_getResultNum("select * from rel_user_group where user_id = '{$user_id}'") >= 5){
    echo "e_0";
    exit;
}


//先判断是否已经加入了
if(mydb_isexist('rel_user_group',"group_id={$group_id} and user_id = {$user_id}") == 'false' ){
    echo mydb_insert('rel_user_group',$arr);
}else{
    echo 'true';
}
