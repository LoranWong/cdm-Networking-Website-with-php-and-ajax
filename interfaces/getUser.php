<?php
/*
@param $_POST['id'] 指定的ID
 */

require_once '../require.php';
//sleep(1);
$id = $_POST['id'];

$sql = "SELECT
(SELECT name From unis WHERE id=u.uni_id ) as uni_name,
(SELECT name From majors WHERE id=u.major_id ) as major_name,
(SELECT COUNT(*) From rel_user_user WHERE follower_id=u.id) as follow_count,
(SELECT COUNT(*) From rel_user_user WHERE followee_id=u.id) as fans_count,
birthday,email,major_id,uni_id,user,details FROM users u
WHERE id=$id";

echo get_json_from_sql($sql);
mysql_close();

