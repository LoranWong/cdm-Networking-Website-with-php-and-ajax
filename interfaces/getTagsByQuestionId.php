
<?php

/*
@param $_POST['id'] 指定的ID
@return 标签信息的JSON数组
 */

require_once '../require.php';
$id = $_POST['id'];

$sql = "SELECT t.name,t.id from tags t join rel_question_tag r on r.tag_id = t.id where r.question_id = $id";

echo get_json_from_sql($sql);
mysql_close();



