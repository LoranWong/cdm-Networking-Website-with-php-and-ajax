<?php
/*
@param $_POST['tag_id'] 指定的TagID  为空时返回所有Tag 否则返回特定ID的Tag
 */

require_once '../require.php';

$id = $_POST['tag_id'];

if ($id == null) {
	$sql = "SELECT name,id FROM tags";
} else {
	$sql = "SELECT name,id FROM tags WHERE id=$id";
}

echo get_json_from_sql($sql);
mysql_close();
