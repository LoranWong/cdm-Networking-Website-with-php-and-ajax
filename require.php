<?php
define('ROOT', dirname(__FILE__));
define('INCLUDE_PATH', '/includes');
define('FUNC_PATH', '/funcs');
set_include_path(ROOT . INCLUDE_PATH . PATH_SEPARATOR . ROOT . FUNC_PATH . PATH_SEPARATOR . get_include_path());
require_once 'config.php';
require_once 'image.func.php';
require_once 'mysql.func.php';

?>