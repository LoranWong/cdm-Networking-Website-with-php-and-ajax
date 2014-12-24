<?php
/*
@param $_POST['settings_user']
@param $_POST['settings_birthday']
@param $_POST['settings_details']
@param $_POST['settings_gender']
@param $_POST['settings_uni']
@param $_POST['settings_major']
@param $_POST['settings_id']

 */

require_once '../require.php';

sleep(1);

$settings_details = addslashes($_POST['settings_details']);
$settings_user = addslashes($_POST['settings_user']);
$settings_birthday = $_POST['settings_birthday'];
$settings_gender = $_POST['settings_gender'];
$settings_major = $_POST['settings_major'];
$settings_uni = $_POST['settings_uni'];
$settings_id = $_POST['settings_id'];

// echo "settings_details = $settings_details  ";
// echo "settings_user = $settings_user  ";
// echo "settings_birthday = $settings_birthday";
// echo "settings_gender = $settings_gender  ";
// echo "settings_major = $settings_major  ";
// echo "settings_uni = $settings_uni  ";
// echo "settings_id = $settings_id  ";

//$query = "UPDATE users set user='$settings_user',details='$settings_details' ,birthday = '$settings_birthday' , gender_id = $settings_gender ,major_id =$settings_major ,uni_id = $settings_uni where id =  $settings_id ";

$array = array('user'=>"$settings_user",
    'details'=>"$settings_details",
    'birthday'=>"$settings_birthday",
    'gender_id'=>"$settings_gender",
    'major_id'=>"$settings_major",
    'uni_id'=>"$settings_id"
);


echo mydb_update('users',$array,"id=$settings_id");

mysql_close();


