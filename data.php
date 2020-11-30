<?php
include("koneksi.php");
$data = mysqli_fetch_array(mysqli_query($db,"SELECT * FROM data"));
$ret['pasut'] 		= $data['pasut'];
echo json_encode($ret);
?>