<?php
/**
 * 退出小组
 * @param $_POST['follower_id']
 * @param $_POST['followee_id']
 */
require_once '../require.php';

$follower_id = $_POST['follower_id'];
$followee_id = $_POST['followee_id'];

echo mydb_delete('rel_user_user',"follower_id={$follower_id} and followee_id = {$followee_id}");