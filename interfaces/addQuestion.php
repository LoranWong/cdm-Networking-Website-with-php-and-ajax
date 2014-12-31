<?php
/*
@param $_POST['details']
@param $_POST['title']
@param $_POST['user_id']
@param $_POST[tag_id']
@param $_POST['details_text']
 */

require_once '../require.php';

sleep(1);

$details = addslashes($_POST['details']);
$details_text = addslashes($_POST['details_text']);
$title = addslashes($_POST['title']);
$user_id = $_POST['user_id'];
$tag_id = $_POST['tag_id'];

$array = array('user_id' => "$user_id",
	'title' => "$title",
	'details' => "$details",
	'details_text' => "$details_text",
	'date' => "NOW()",
);



if (! $question_id = mydb_insert('questions', $array)) {
	echo 'false';
}else{
	$array = array('question_id' => "$question_id",
		'tag_id' => "$tag_id",
	);
	if(mydb_insert('rel_question_tag', $array)){
		echo 'true';
	}else{
		mydb_delete('questions',"id={$question_id}");
		echo 'false';
	}
}

mysql_close();
