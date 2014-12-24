<?php
/*
@param $_POST['id'] 指定的ID
 */

require_once '../require.php';

$id = $_POST['id'];

$sql = "SELECT (SELECT name From unis WHERE id=u.uni_id ) as uni_name, (SELECT name From majors WHERE id=u.major_id ) as major_name,birthday,email,major_id,uni_id,user,details FROM users u WHERE id=$id";

echo get_json_from_sql($sql);
mysql_close();

