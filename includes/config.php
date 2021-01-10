<?php 
// DB credentials.
// $DBHost = "localhost";
// $DBUser = "u627076978_tanalatravelus";
// $DBPass = "EK2$1zqt;Y1";
// $DBName = "u627076978_tanalatraveldb";
// define('DB_HOST','localhost');
// define('DB_USER','u627076978_tanalatravelus');
// define('DB_PASS','EK2$1zqt;Y1');
// define('DB_NAME','u627076978_tanalatraveldb');

$DBHost = "localhost";
$DBUser = "root";
$DBPass = "";
$DBName = "tms";
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','tms');

$con = mysqli_connect($DBHost , $DBUser, $DBPass, $DBName);

// Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
?>