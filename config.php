<?php
ini_set('display_errors', TRUE);
ini_set('display_startuup_errors', TRUE);
define('SITE_PATH', $_SERVER['SERVER_NAME']);
define('RESOURCE_PATH', SITE_PATH. '/resources/');
define('IMAGE_UPLOAD_PHYSICAL_PATH',__DIR__ .'/resources');

//DATABASE CONFIGURATIONS
define('DB_HOST','localhost');
define('DB_USER_NAME','root');
define('DB_PASSWORD','');
define('DB_NAME', 'eshop');