<?php
/*
@param $_POST['details']
@param $_POST['title']
@param $_POST['user_id']
 */

require_once '../require.php';

sleep(1);

$details = addslashes($_POST['details']);
$title = addslashes($_POST['title']);
$user_id = $_POST['user_id'];

$array = array('user_id'=>"$user_id",
    'title'=>"$title",
    'details'=>"$details",
    'date'=>"NOW()",
);


if(mydb_insert('questions',$array)){
    echo 'true';
}

mysql_close();


