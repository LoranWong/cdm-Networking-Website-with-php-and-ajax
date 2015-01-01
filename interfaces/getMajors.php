<?php
/*
@param $_POST['major_id'] 指定的id  为空时返回所有Major  否则返回特定ID的Major
 */

require_once '../require.php';

$id = $_POST['major_id'];

if ($id == null) {
    $sql = "SELECT name,id FROM majors";
} else {
    $sql = "SELECT name,id FROM majors WHERE id=$id";
}

echo get_json_from_sql($sql);
mysql_close();
