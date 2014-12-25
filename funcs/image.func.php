<?php

/**
 *该函数将图片以固定尺寸进行保存
 * @param string $dest_path  目标存储路径  如参数  /images/group_1  最后会存储为 如 /images/group_1_32x32.jpg  32代表尺寸
 * @param string $source_path  图片来源路径存储路径
 * @param number $width 缩放尺寸 如 32
 * @param number $height 缩放尺寸 如 32
 * @return 布尔值  代表操作是否成功
 **/
function image_scale($dest_path, $source_path, $width, $height) {
	$source_image = imagecreatefromjpeg($source_path);
	$source_info = getimagesize($source_path);
	$source_width = $source_info[0];
	$source_height = $source_info[1];

	$avatar_size = imagecreatetruecolor($width, $height);

	$result = imagecopyresized($avatar_size, $source_image, 0, 0, 0, 0, $width, $height, $source_width, $source_height);
	if (!$result) {
		return "false";
	}

	imagejpeg($avatar_size, $dest_path . "_" . $width . "x" . $height . ".jpg");
	imagedestroy($source_image);
	imagedestroy($avatar_size);

	return true;
}

/**
 *该函数将图片进行裁剪
 * @param  string $dest_path  目标存储路径
 * @param  string  $source_path  图片来源路径存储路径
 * @param  number $x 	需要裁剪的区域
 * @param  number $y  	需要裁剪的区域
 * @param  number $w 	需要裁剪的区域
 * @param  number $h  	需要裁剪的区域
 * @return  bool|string  代表操作是否成功
 **/
function imagecropper($dest_path, $source_path, $x, $y, $w, $h) {
	$source_info = getimagesize($source_path);
	$source_width = $source_info[0];
	$scale = $source_width / 250;
	$source_mime = $source_info['mime'];
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
	// 裁剪
	$result = imagecopy($cropped_image, $source_image, 0,
		0, intval($x * $scale), intval($y * $scale), intval($w * $scale), intval($h * $scale));
	imagejpeg($cropped_image, $dest_path);
	imagedestroy($source_image);
	imagedestroy($cropped_image);

	return $result;
}