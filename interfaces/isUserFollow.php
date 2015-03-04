<?php
/**
 * 查看用户是否在小组中
 * @param $_POST['follower_id']
 * @param $_POST['followee_id']
 */
require_once '../require.php';
//sleep(1);
$follower_id = $_POST['follower'];
$followee_id = $_POST['followee'];

echo mydb_isexist('rel_user_user', 'follower_id=' . $follower_id . ' and followee_id = ' . $followee_id);
