
<?php

/*
@param $_POST['id'] 指定的ID
@return 小组信息的JSON数组
 */

require_once '../require.php';
$id = $_POST['id'];

$sql = "SELECT g.name,g.id from groups g join rel_user_group r on r.group_id = g.id where r.user_id = $id ORDER BY r.date";

$query = mysql_query($sql) or die('SQL错误' . mysql_error());

echo get_json_from_query($query);
mysql_close();

?>

