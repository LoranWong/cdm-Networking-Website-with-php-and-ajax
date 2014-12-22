<?php

//header('Content-Type:text/html; charset=utf-8');

define('DB_HOST', '127.0.0.1');
define('DB_USER', 'root');
define('DB_PWD', '20132626');
define('DB_NAME', 'db_cdm');

$conn = @mysql_connect(DB_HOST, DB_USER, DB_PWD) or die('数据库链接失败:' . mysql_error());
@mysql_select_db(DB_NAME) or die('数据库错误:' . mysql_error());
@mysql_query('SET NAMES UTF8') or die('字符集错误:' . mysql_error());

function get_json_from_query($query) {
	while ($row = mysql_fetch_array($query, MYSQL_ASSOC)) {
		foreach ($row as $key => $value) {
			# 将中文编码 防止后续操作乱码
			$value = addslashes($value);
			$row[$key] = urlencode(str_replace("\n", "", $value));
		}
		$json .= urldecode(json_encode($row)) . ",";
	}
	//组成数组
	$json = "[" . substr($json, 0, strlen($json) - 1) . "]";
	return $json;
}
