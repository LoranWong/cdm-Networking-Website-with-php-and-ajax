<?php
/*
@param $_POST['id'] 指定的ID

@return eg. [{"name":"卓越基佬","id":"1","questions_count":"6","users_count":"6"}]


 */

require_once '../require.php';
//sleep(1);
$id = $_POST['id'];

$sql = "SELECT name,id,details,
	(SELECT count(q.id) from questions q join (SELECT u.id from users u join rel_user_group r on r.user_id = u.id where r.group_id = $id) b on q.user_id=b.id)
	AS questions_count,
	(SELECT count(u.id) from users u join rel_user_group r on r.user_id = u.id where r.group_id = $id)
	AS users_count
	FROM groups WHERE id=$id";

echo get_json_from_sql($sql);

mysql_close();

