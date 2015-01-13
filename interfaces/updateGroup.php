<?php
/**
 * 创建小组
 * @param $_POST['name']
 * @param $_POST['details']
 * @param $_POST['group_id']
 */

require_once '../require.php';
sleep(1);
$name = $_POST['name'];
$details = $_POST['details'];
$group_id = $_POST['group_id'];

$array = array('name'=>$name,
    'details'=>$details
);

echo mydb_update('groups',$array,"id={$group_id}");


