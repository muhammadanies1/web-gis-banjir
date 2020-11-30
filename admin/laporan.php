<link href="assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
<script src="assets/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="assets/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
   
   
    <!-- page script -->
<script type="text/javascript">
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
        });
      });
    </script>
  
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>::: <?=$title?> :::</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">
<!--
.style5 {color: #FFF; font-size: 12px; }
.style6 {font-size: 14px; color:#4d92a2;}
.style10 {font-size: 12px}
.style12 {font-family: Georgia, "Times New Roman", Times, serif; font-size: 12px; }
-->
</style>
</head>
<body>
<h2> Laporan Data Banjir Tanggal <?=$jp->todate($_POST[tgl])?> S/d <?=$jp->todate($_POST[tgl1])?></h2>


<?php 
		
		 $q="select *, date_format(jam,'%H:%i') as jam1 from banjir a inner join pengguna b on a.username=b.username inner join kelurahan c on b.kdkelurahan=c.kdkelurahan where tgl>='".$_POST[tgl]."' and tgl<='".$_POST[tgl1]."'  ";
		
		
		$result=$jp->sql($q);
		
		?>
<table id="example2" class="table table-bordered table-striped" width="100%">
 <thead>
  <tr bgcolor="#2a5acb">
    <th align="center" valign="middle"><span class="style5">No.</span></th>
	<th  valign="middle"><span class="style5">No Pelaporan</span></th>
   <th  valign="middle"><span class="style5">Tanggal <br>Jam </span></th>
   <th valign="middle"><span class="style5">Petugas</span></th>
   <th valign="middle"><span class="style5">Kelurahan</span></th>
   <th valign="middle"><span class="style5">Kondisi</span></th>
   <th valign="middle"><span class="style5">Keterangan</span></th>
   <th valign="middle"><span class="style5">Foto</span></th>
   
  </tr>
  </thead>
   <?php $n = 0;while($row = $jp->fetch($result)){ $n++; 
 	if(file_exists("../uploaddir/foto_".$row[nolaporan].".jpg"))
		 {$filename= "../uploaddir/foto_".$row[nolaporan].".jpg";}
		else
		 {$filename= "../uploaddir/nophoto.jpg";} 
   ?>
  <tr>
    <td align="center" valign="top"><span class="style12"><?=$n?>.</span></td>
	<td valign="top" align="center"><span class="style12"><?=$row[nolaporan]?></span></td>
      <td valign="top" align="center"><span class="style12"><?=$jp->todate($row[tgl])?><br><?=$row[jam1]?></span></td>

        <td valign="top" align="justify"><span class="style12"><?=$row[nama]?></span></td>
        <td valign="top" align="justify"><span class="style12"><?=$row[nmkelurahan]?></span></td>
        
      <td valign="top" align="justify"><span class="style12"><?=$row[kondisi]?></span></td>
     <td valign="top" align="justify"><span class="style12"><?=($row[ket])?></span></td>
      <td valign="top" align="justify"><span class="style12"><img src="<?=$filename?>" width="150"></span></td>
      
        
  </tr>
  <?php } ?>
</table>

	
<script>
function doSubmit(){
    var v = new Validator("Formbanjir");
	v.addValidation("tgl","req","Tanggal tidak boleh kosong");
	v.addValidation("jam","req","Jam tidak boleh kosong");
	v.addValidation("kondisi","req","Kondisi tidak boleh kosong");

	
	}
</script>

	<link rel="stylesheet" media="all" type="text/css" href="js/jquery-ui.css" />
	<link rel="stylesheet" media="all" type="text/css" href="js/jquery-ui-timepicker-addon.css" />
	<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui-timepicker-addon.js"></script>
	<script type="text/javascript" src="js/jquery-ui-sliderAccess.js"></script>
    
    <script>
   $(document).ready(function() {
    $("#tgl").datepicker({minDate: "-7", maxDate: "0",dateFormat: 'yy-mm-dd' });
  
  });
  </script>
  <script>
   $(document).ready(function() {
    	 
	$('#jam').timepicker({
	timeFormat: 'HH:mm',
	stepHour: 1,
	stepMinute: 10


	});
  });
  </script>
</body>
</html>