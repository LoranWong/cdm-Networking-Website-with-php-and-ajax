
<?php

/*
@param $_POST['id'] 指定的ID
@return 小组信息的JSON数组
[{"name":"卓越基佬","id":"1","admin":"0"},{"name":"大龄女青年","id":"3","admin":"1"}]
 */

require_once '../require.php';
//sleep(1);
$id = $_POST['id'];
$sql = "SELECT g.name,g.details,g.id,r.admin from groups g join rel_user_group r on r.group_id = g.id where r.user_id = $id ORDER BY r.date";
echo get_json_from_sql($sql);
mysql_close();
