<?php
/*
@param $_POST['details']
@param $_POST['question_id']
@param $_POST['user_id']
 */

require_once '../require.php';

////sleep(1);

$details = addslashes($_POST['details']);
$question_id = $_POST['question_id'];
$user_id = $_POST['user_id'];

//$query = "INSERT INTO comments (user_id , question_id, details , date)
//VALUES ('$user_id' ,'$question_id', '$details',  NOW())";

$array = array('user_id' => "$user_id",
	'question_id' => "$question_id",
	'details' => "$details",
	'date' => "NOW()");

echo mydb_insert('comments', $array);

mysql_close();
