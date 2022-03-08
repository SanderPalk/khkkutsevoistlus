<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'meeskond2iktkhk');
define('DB_PASSWORD', '^XOxgaI+~mX@');
define('DB_NAME', 'meeskond2iktkhk_lg');

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>