<?php
/**
 * 加入小组
 * @param $_POST['follower_id']
 * @param $_POST['followee_id']
 */
require_once '../require.php';
sleep(1);
$follower_id = $_POST['follower_id'];
$followee_id = $_POST['followee_id'];

$arr = array('follower_id' => $follower_id, 'followee_id' => $followee_id);

//先判断是否已经加入了
if (mydb_isexist('rel_user_user', "follower_id={$follower_id} and followee_id = {$followee_id}") == 'false') {

	echo mydb_insert('rel_user_user', $arr);

} else {
	echo 'true';
}
