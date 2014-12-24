<?php
/*
@param $_POST['id'] 指定的TagID
 */

require_once '../require.php';

$id = $_POST['id'];

if ($id == null) {
	$sql = "SELECT name,id FROM tags";
} else {
	$sql = "SELECT name,id FROM tags WHERE id=$id";
}

echo get_json_from_sql($sql);
mysql_close();
