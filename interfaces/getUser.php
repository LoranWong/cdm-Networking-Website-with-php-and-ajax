<?php
/*
@param $_POST['id'] 指定的ID
 */

require_once '../require.php';

$id = $_POST['id'];

$sql = "SELECT (SELECT name From unis WHERE id=u.uni_id ) as uni_name, (SELECT name From majors WHERE id=u.major_id ) as major_name,birthday,email,major_id,uni_id,user,details FROM users u WHERE id=$id";

$query = mysql_query($sql) or die('SQL错误' . mysql_error());

echo get_json_from_query($query);
mysql_close();

?>