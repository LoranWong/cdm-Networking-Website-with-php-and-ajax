<?php
/*
传递过来的图像文件:
@param $_FILES['settings_avatar_file']

裁剪信息：
@param $_POST['x']
@param $_POST['y']
@param $_POST['w']
@param $_POST['h']

用户ID:
@param $_POST['id']


 */

$file_key = "settings_avatar_file";
//限制文件在2M以下
if ($_FILES[$file_key]["error"] > 0) {
	echo "false";
} else {

	// echo "Upload: " . $_FILES[$file_key]["name"];
	// echo "Type: " . $_FILES[$file_key]["type"];
	// echo "Size: " . ($_FILES[$file_key]["size"] / 1024);
	// echo "Stored in: " . $_FILES[$file_key]["tmp_name"];
	// echo $_POST['x']." ".$_POST['y']." ".$_POST['x2']." ".$_POST['x2']." ".$_POST['w']." ".$_POST['h']." ";

	//将图片裁剪并存储
	imagecropper($_FILES[$file_key]["tmp_name"], intval($_POST['x']), intval($_POST['y']), intval($_POST['w']), intval($_POST['h']));

	//echo $result;
}

/**
 *
 */

function imagecropper($source_path, $x, $y, $w, $h) {
	$source_info = getimagesize($source_path);
	$source_width = $source_info[0];
	$source_height = $source_info[1];
	echo "||||";
	echo $source_width . "  ";
	echo $source_height . "  ";

	$scale = $source_width / 250;

	$source_mime = $source_info['mime'];
	echo $scale . "  ";

	switch ($source_mime) {
		case 'image/gif':
			$source_image = imagecreatefromgif($source_path);
			break;

		case 'image/jpeg':
			$source_image = imagecreatefromjpeg($source_path);
			break;

		case 'image/png':
			$source_image = imagecreatefrompng($source_path);
			break;

		default:
			return false;
			break;
	}

	//图片暂存对象
	$cropped_image = imagecreatetruecolor(intval($w * $scale), intval($h * $scale));

	echo intval($w * $scale) . "  ";
	echo intval($h * $scale) . "  ";

	// 裁剪
	$result1 = imagecopy($cropped_image, $source_image, 0,

		0, intval($x * $scale), intval($y * $scale), intval($w * $scale), intval($h * $scale));

	//$result = imagecopy($cropped_image, $source_image, 0,0,$x,$y,$w,$h);

	imagejpeg($cropped_image, "test.jpg");

	imagedestroy($source_image);
	imagedestroy($cropped_image);

	return $result;

}

?>