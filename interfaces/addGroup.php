<?php
/**
 * 创建小组
 * @param $_POST['name']
 * @param $_POST['details']
 * @param $_POST['user_id']
 */

require_once '../require.php';

$name = $_POST['name'];
$details = $_POST['details'];
$user_id = $_POST['user_id'];

$array = array('name'=>$name,
    'details'=>$details
    );

//先创建小组
$group_id = mydb_insert('groups',$array);
if($group_id == 'false'){
    echofalse_andexit();
}else{
    $array = array('user_id'=>$user_id,
        'group_id'=>$group_id
    );
    //使创建者加入小组
    mydb_insert('rel_user_group',$array);
    //设置权限
    mydb_insert('rel_manager_group',$array);
    echo $group_id;
}


