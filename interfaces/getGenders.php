<?php
/*
@param $_POST['gender_id'] 指定的id  为空时返回所有  否则返回特定ID
 */

require_once '../require.php';

$id = $_POST['uni_id'];

if ($id == null) {
    $sql = "SELECT name,id FROM genders";
} else {
    $sql = "SELECT name,id FROM genders WHERE id=$id";
}

echo get_json_from_sql($sql);
mysql_close();