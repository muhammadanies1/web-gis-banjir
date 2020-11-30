<?php
$server = "maritimsemarang.com";
$user = "maritims_aws";
$password = "bmkg123";
$database = "maritims_aws";
$db = mysqli_connect($server, $user, $password, $database);
if( !$db ){
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}

?>
