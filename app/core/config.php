<?php
define("WEBSITE_TITLE", "Catalog");

// ROOT PATHS
$path = str_replace("\\","/","http://" . $_SERVER["SERVER_NAME"] . __DIR__ . "/");
$path = str_replace($_SERVER["DOCUMENT_ROOT"],"",$path); 
define("ROOT", str_replace("app/core", "public", $path));
define("ASSETS", str_replace("app/core", "public/assets", $path));
echo $path;
echo "<br>";
echo ROOT;
// DATABASE INFORMATION 
define("DB_PASS","");
define("DB_USER","root");
define("DB_HOST","localhost");
define("DB_NAME","catalog_db");
define("DB_TYPE","mysql");
$string = DB_TYPE . ":host=" . DB_HOST . ";" . "dbname=" . DB_NAME . ";";
define("DB_INFO", $string);
