<?php

/**
 *	通过返回数据组成JSON字符串
 * @param $sql string mysql_query的返回数据
 * @return string json 查询不到数据会返回 '[]'
 */
function get_json_from_sql($sql) {
	$query = mysql_query($sql) or die('SQL错误' . mysql_error());
	$json = '';
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

/**
 *将记录插入数据库  可以传入'NOW()'
 *@param string $table  表名
 *@param array $array  键值对 插入的键与值
 * @return string mysql_insert_id() or false
 **/
function mydb_insert($table, $array) {
	$keys = join(',', array_keys($array));
	//将values拼接成如下字符串 ：   'value1','value2','value3'
	$values = "'" . join("','", array_values($array)) . "'";
	//如果包含 'NOW()'  把它两边的双引号去掉以免解析错误
	$values = str_replace("'NOW()'", "NOW()", $values);
	$sql = "INSERT INTO $table ($keys) VALUES($values)";
	//echo $sql;
	if (mysql_query($sql)) {
		return mysql_insert_id();
	} else {
		return 'false';
	}
}

/**
 * 删除数据库的特定记录
 * @param string $table
 * @param string $where
 * @return string true or false
 */
function mydb_delete($table, $where) {
	$where = $where == null ? null : " where " . $where;
	$sql = "DELETE FROM {$table} {$where}";
	if (mysql_query($sql)) {
		return 'true';
	} else {
		return 'false';
	}
}

/**
 * 更新数据库的特定记录 可以传入'NOW()'
 * @param string $table
 * @param array $array 记录更新的数据的键值对
 * @param string $where
 * @return string true or false
 * UPDATE table_name SET field1=new-value1, field2=new-value2 [WHERE Clause]
 */

function mydb_update($table, $array, $where) {
	$where = $where == null ? null : " where " . $where;
	$update = '';
	foreach ($array as $key => $value) {
		//组合  field1=new-value1, field2=new-value2 语句  ，开头没有逗号；
		if ($update == null) {
			$sep = '';
		} else {
			$sep = ',';
		}
		$update .= $sep . $key . "='" . $value . "'";
	}
	$update = str_replace("'NOW()'", "NOW()", $update);
	$sql = "UPDATE {$table} SET {$update} {$where}";
	//echo $sql;
	if (mysql_query($sql)) {
		return 'true';
	} else {
		return 'false';
	}
}

/**
 * 检查特定记录是否存在，只返回判断结果不返回数据  注意 $where 的字符串value值要加上单引号
 * @param string $table
 * @param string $where
 * @return string true or false
 */
function mydb_isexist($table, $where) {
	$where = $where == null ? null : " where " . $where;
	$sql = "SELECT * FROM {$table} {$where}";
	//echo $sql;
	$query = mysql_query($sql);
	if (mysql_fetch_array($query)) {
		return 'true';
	} else {
		return 'false';
	}
}

/**
 * 得到结果集中的记录条数
 * @param string $sql
 * @return number
 */
function mydb_getResultNum($sql) {
	$result = mysql_query($sql);
	return mysql_num_rows($result);
}

/**
 * 返回"false"并退出程序
 */
function echofalse_andexit() {
	echo "false";
	exit();
}