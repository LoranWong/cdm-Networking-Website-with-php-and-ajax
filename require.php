<?php
define('ROOT', dirname(__FILE__));
define('INCLUDE_PATH', '/includes');
define('FUNC_PATH', '/funcs');
set_include_path(ROOT . INCLUDE_PATH . PATH_SEPARATOR . ROOT . FUNC_PATH . PATH_SEPARATOR . get_include_path());
