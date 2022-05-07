
<?php
define("ROOT", dirname(__FILE__));
$debug= false;
if($debug){
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
}
include "autoload.php";
ob_start();
session_start();

$lb = new Lb();
$lb->start();

?>