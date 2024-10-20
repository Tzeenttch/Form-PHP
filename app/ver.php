<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once('vars.php');
include_once('functions.php');


$valuesBox = $_GET;

$bodyOutput = getListMarkupNoDump($valuesBox);
include_once("templates/verTemplate.php");

?>