<?php

  $file_key = 'settings_avatar_file' ;
  //限制文件在2M以下
  if ($_FILES[$file_key]["error"] > 0){
    echo "Error: " . $_FILES[$file_key]["error"] . "<br />";
    }
  else{
    echo "Upload: " . $_FILES[$file_key]["name"] . "<br />";
    echo "Type: " . $_FILES[$file_key]["type"] . "<br />";
    echo "Size: " . ($_FILES[$file_key]["size"] / 1024) . " Kb<br />";
    echo "Stored in: " . $_FILES[$file_key]["tmp_name"];
    }


?>