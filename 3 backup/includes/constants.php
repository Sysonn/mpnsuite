<?php
//Define constatns here
if (!defined('DB_SERVER')) define('DB_SERVER', 'localhost');
if (!defined('DB_USER')) define('DB_USER', 'root');
if (!defined('DB_PASSWORD')) define('DB_PASSWORD', 'root');
if (!defined('DB_NAME')) define('DB_NAME', 'mpndb');
$db = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME);


?>