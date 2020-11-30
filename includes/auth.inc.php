<?php
error_reporting(0);
include "../class.inc.php";
$jp = new jcore();
$ok = $jp->ceklogin();
if(!$ok){
	header('location: login.php');
	exit;
}
?>