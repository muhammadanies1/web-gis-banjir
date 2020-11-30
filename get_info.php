<?php
session_start();
include 'includes/lib.inc.php';
include APP_ROOT."/includes/class.inc.php";
$jp = new jcore();

$id=$_GET['id'];
$sql_lokasi=$jp->sql("select *, CONCAT(DATE_FORMAT(tgl,'%d-%m-%Y'),',',DATE_FORMAT(jam,'%H:%i')) AS jam1  from banjir a inner join pengguna b on a.username=b.username inner join kelurahan c on b.kdkelurahan=c.kdkelurahan where c.kdkelurahan='$id' order by tgl desc ");
while($data=mysql_fetch_object($sql_lokasi)){
$content="<div id=\"content\">
    <div id=\"siteNotice\">
    </div>
    <h3 id=\"firstHeading\" class=\"firstHeading\">Kelurahan $data->nmkelurahan <br> $data->alamat</h3>
    <div id=\"bodyContent\"> 
	<p>
    <img src=\"uploaddir/foto_$data->nolaporan.jpg\" style=\"float:left;margin:0 5px 0 0;\"  width=350px> 
	</p><br><br>
	<h4 id=\"firstHeading\" class=\"firstHeading\">Tanggal Update </h4> $data->jam1
	<h4 id=\"firstHeading\" class=\"firstHeading\">Petugas </h4> $data->nama
    <h4 id=\"firstHeading\" class=\"firstHeading\">Kondisi </h4> $data->kondisi
	<h4 id=\"firstHeading\" class=\"firstHeading\">Keterangan </h4> $data->ket

    </div></div>";
	}	
		echo $content;
?>
