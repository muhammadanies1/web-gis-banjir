<?php
error_reporting(0);
# File lib.inc.php 
# Contain Variables, Constant 

# Define Constanta
define('APP_ROOT'		, $_SERVER['DOCUMENT_ROOT']."/semtim");
define('APP_HOST'		, "localhost");
define('INCLUDES_DIR'	, APP_ROOT."/includes");
define('ROOT'			, $_SERVER['HTTP_HOST']."/");

# Define Variable
$title					= "";
$viewsuperuser			= 1;
define('_N'		, 'Next');
define('_P'		, 'Prev');
define('_L'		, 'Last');
define('_T'		, 'Top');

# Define Days Constant
global $days;
$days['Mon']	= "Senin";
$days['Tue']	= "Selasa";
$days['Wed']	= "Rabu";
$days['Thu']	= "Kamis";
$days['Fri']	= "Jumat";
$days['Sat']	= "Sabtu";
$days['Sun']	= "Minggu";

# Month
global $month;
$month['Jan']	= "Januari";
$month['Feb']	= "Februari";
$month['Mar']	= "Maret";
$month['Apr']	= "April";
$month['May']	= "Mei";
$month['Jun']	= "Juni";
$month['Jul']	= "Juli";
$month['Aug']	= "Agustus";
$month['Sep']	= "September";
$month['Oct']	= "Oktober";
$month['Nov']	= "November";
$month['Dec']	= "Desember";

# Bulan
global $bulan;
$bln['01']	= "Januari";
$bln['02']	= "Februari";
$bln['03']	= "Maret";
$bln['04']	= "April";
$bln['05']	= "Mei";
$bln['06']	= "Juni";
$bln['07']	= "Juli";
$bln['08']	= "Agustus";
$bln['09']	= "September";
$bln['10']	= "Oktober";
$bln['11']	= "November";
$bln['12']	= "Desember";
?>