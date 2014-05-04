<?php
include("config.php");
//phpinfo();
$view = "front";
include("controller.php");

/** Obfuscate xss - http://sage.math.washington.edu/home/wstein/www/home/agc/lit/javascript/xss.html */
/** NOt using mysql PDO or prepared statements */