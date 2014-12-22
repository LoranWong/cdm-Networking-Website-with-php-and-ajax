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
	if (($_FILES[$file_key]["size"] / 1024) > 100) {
		echo "false";
		exit();
	}

	//将图片裁剪并存储
	$r1 = imagecropper($_POST['id'], $_FILES[$file_key]["tmp_name"], intval($_POST['x']), intval($_POST['y']), intval($_POST['w']), intval($_POST['h']));
	if (!$r1) {
		echo "false";
		exit();
	}

	//将图片分别以 256  128  64  32 的尺寸保存
	$r2 = image_scale_avatar($_POST['id'], "../resources/avatars/user/" . $_POST['id'] . "_origin.jpg");
	if ($r2) {
		echo "true";
	} else {
		echo "false";
	}

}

/**
 *
 */

function imagecropper($id, $source_path, $x, $y, $w, $h) {
	$source_info = getimagesize($source_path);
	$source_width = $source_info[0];
	$source_height = $source_info[1];
	// echo "||||";
	// echo $source_width . "  ";
	// echo $source_height . "  ";
	$scale = $source_width / 250;
	$source_mime = $source_info['mime'];
	//echo $scale . "  ";
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
			return "false";
			break;
	}
	//图片暂存对象
	$cropped_image = imagecreatetruecolor(intval($w * $scale), intval($h * $scale));
	//echo intval($w * $scale) . "  ";
	//echo intval($h * $scale) . "  ";
	// 裁剪
	$result = imagecopy($cropped_image, $source_image, 0,
		0, intval($x * $scale), intval($y * $scale), intval($w * $scale), intval($h * $scale));
	//$result = imagecopy($cropped_image, $source_image, 0,0,$x,$y,$w,$h);
	imagejpeg($cropped_image, "../resources/avatars/user/" . $id . "_origin.jpg");
	imagedestroy($source_image);
	imagedestroy($cropped_image);

	return $result;
}

function image_scale_avatar($id, $source_path) {
	$source_image = imagecreatefromjpeg($source_path);
	$source_info = getimagesize($source_path);
	$source_width = $source_info[0];
	$source_height = $source_info[1];

	$avatar_32 = imagecreatetruecolor(32, 32);
	$avatar_64 = imagecreatetruecolor(64, 64);
	$avatar_128 = imagecreatetruecolor(128, 128);
	$avatar_256 = imagecreatetruecolor(256, 256);

	$result = imagecopyresized($avatar_256, $source_image, 0, 0, 0, 0, 256, 256, $source_width, $source_height);
	if (!$result) {
		return "false";
	}
	$result = imagecopyresized($avatar_128, $avatar_256, 0, 0, 0, 0, 128, 128, 256, 256);
	if (!$result) {
		return "false";
	}
	$result = imagecopyresized($avatar_64, $avatar_128, 0, 0, 0, 0, 64, 64, 128, 128);
	if (!$result) {
		return "false";
	}
	$result = imagecopyresized($avatar_32, $avatar_64, 0, 0, 0, 0, 32, 32, 64, 64);
	if (!$result) {
		return "false";
	}

	imagejpeg($avatar_256, "../resources/avatars/user/" . $id . "_256.jpg");
	imagejpeg($avatar_128, "../resources/avatars/user/" . $id . "_128.jpg");
	imagejpeg($avatar_64, "../resources/avatars/user/" . $id . "_64.jpg");
	imagejpeg($avatar_32, "../resources/avatars/user/" . $id . "_32.jpg");

	imagedestroy($source_image);
	imagedestroy($avatar_256);
	imagedestroy($avatar_128);
	imagedestroy($avatar_64);
	imagedestroy($avatar_32);

	return true;
}

?>