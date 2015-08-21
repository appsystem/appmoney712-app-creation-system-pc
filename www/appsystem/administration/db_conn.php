<?php  session_start();           
error_reporting(0);

$rgs=ini_get('register_globals');
if($rgs){echo "<script language=\"javascript\">alert(\"rgs\");</script>";exit;}

$db = new PDO("sqlite:../administration/app.sqlite");

?>