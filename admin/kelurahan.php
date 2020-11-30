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
  <?php 

if($_REQUEST[kdkelurahan]!='')
{
	$q = "select * from kelurahan where kdkelurahan='".$_REQUEST[kdkelurahan]."'";
	$r = $jp->sql($q);
	$o = $jp->fetch($r);
	$disabled = " readonly='true' ";
	$kode = $o[kdkelurahan];
}
else
{
$q1= "SELECT max(RIGHT(kdkelurahan,2))+1 as maks from kelurahan ";
	$r1 = $jp->sql($q1);
	$o1 = $jp->fetch($r1);
	
	if (strlen($o1[maks])<=0) {
	 $kode= 'K'.'01';
	 }
	else if (strlen($o1[maks])==1) {
	 $kode= 'K0'.$o1[maks];
	 }
	else if (strlen($o1[maks])==2) {
	 $kode= 'K'.$o1[maks];
	 } 
	 
	 
}


?>
	
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>::: <?=$title?> :::</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<script>
//==============================SCRIPT TAMBAHAN UNTUK FILTER KEYBOARD======================================================
function numbersonly(e) {
    var unicode = e.charCode ? e.charCode : e.keyCode
    if ((unicode != 8) && (unicode != 13) && (unicode != 37) && (unicode != 39) && (unicode != 9)) { //if the key isn't the backspace key (which we should allow)
        if (unicode < 48 || unicode > 57) //if not a number
            return false //disable key press
    }
}
//===========================================================================================


function ConfirmDel(kdkelurahan){
	if(confirm('Hapus..?')){
		window.location="proses.php?page=kelurahan&action=delete&kdkelurahan="+kdkelurahan;
	}
}


</script>

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

<h1> Data Kelurahan </h1>
<script src="js/gen_validatorv31.js" language="javascript"></script>
<form action="proses.php?page=kelurahan&action=input" method="post" enctype="multipart/form-data" name="Formkelurahan" id="Formkelurahan" >
<input name="id_edit" type="hidden" value="<?=$o[kdkelurahan]?>">
<table width="738" border="0" align="center" cellpadding="2" cellspacing="0">
  
  <tr>
    <td width="122"><label>Kode Kelurahan</label> </td>
    <td width="19" align="center"><label>:</label></td>
	<td width="585"><div class="col-sm-4"><input name="kdkelurahan" type="text" id="kdkelurahan" value="<?=$kode?>" size="3" maxlength="3"  readonly class="form-control"></div>
  </td>
 </tr>
   <tr>
       <td width="122"><label>Nama Kelurahan</label> </td>
     <td width="19" align="center"><label>:</label></td>
      <td width="585" ><div class="col-sm-10"><input name="nmkelurahan" type="text" id="nmkelurahan" size="30" maxlength="30" value="<?=$o[nmkelurahan]?>" class="form-control"></div></td>
    </tr>
   <tr>
       <td width="122"><label>Alamat</label> </td>
     <td width="19" align="center"><label>:</label></td>
      <td width="585" ><div class="col-sm-12"><input name="alamat" type="text" id="alamat" size="50" maxlength="50" value="<?=$o[alamat]?>" class="form-control"></div></td>
    </tr>
  <tr>
       <td width="122"><label>Latitude</label> </td>
     <td width="19" align="center"><label>:</label></td>
      <td width="585" ><div class="col-sm-6"><input name="latitude" type="text" id="latitude" size="20"  value="<?=$o[latitude]?>" class="form-control"></div></td>
    </tr>
	<tr>
       <td width="122"><label>Longitude</label> </td>
     <td width="19" align="center"><label>:</label></td>
      <td width="585" ><div class="col-sm-6"><input name="longitude" type="text" id="longitude" size="20"  value="<?=$o[longitude]?>" class="form-control"></div></td>
    </tr>
    
	
   <tr>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td colspan="2"><div class="col-sm-12"><input type="submit" name="Submit" class="btn btn-primary" value="Simpan" onClick="return doSubmit()">        
      <input type="reset" name="Submit2" class="btn btn-success"  value="Batal" onclick="window.location='index.php?page=kelurahan'"></div></td>
  </tr>
  <tr>
     <td colspan="4">&nbsp;</td>
	  
    </tr>
</table>

</form>

<?php 
		
		 $q="select * from kelurahan ";
		
		
		$result=$jp->sql($q);
		
		?>
<table id="example1" class="table table-bordered table-striped" width="100%">
 <thead>
  <tr bgcolor="#2a5acb">
    <th align="center" valign="middle"><span class="style5">No.</span></th>
	 <th valign="middle"><span class="style5">Kode Kelurahan</span></th>
     <th valign="middle"><span class="style5">Nama Kelurahan</span></th>
     <th valign="middle"><span class="style5">Alamat</span></th>
     <th valign="middle"><span class="style5">Latitude</span></th>
     <th valign="middle"><span class="style5">Longitude</span></th>
     
     
     
   
    <th >	<span class="style5">Proses</span>	</th>
  </tr>
  </thead>
   <?php $n = 0;while($row = $jp->fetch($result)){ $n++; 
 
   ?>
  <tr>
    <td  align="right" valign="top"><span class="style12"><?=$n?>.</span></td>
	<td  valign="top" align="center"><span class="style12"><?=$row[kdkelurahan]?></span></td>
      <td  valign="top" align="justify"><span class="style12"><?=$row[nmkelurahan]?></span></td>
      <td  valign="top" align="justify"><span class="style12"><?=$row[alamat]?></span></td>
      <td  valign="top" align="right"><span class="style12"><?=$row[latitude]?></span></td>
      <td  valign="top" align="right"><span class="style12"><?=$row[longitude]?></span></td>
      <td width="149" align="center" valign="top"><a href="index.php?page=kelurahan&kdkelurahan=<?=$row[kdkelurahan]?>"><img src="images/edit.png" width="32" height="32" border="0" title="Edit" /></a>
    <a href="#" onclick="return ConfirmDel('<?=$row[kdkelurahan]?>')">	 <img src="images/del.png" width="32" height="32" border="0" title="Hapus" /> </a></td>
  </tr>
  <?php } ?>
</table>
	
<script>
function doSubmit(){
    var v = new Validator("Formkelurahan");
	v.addValidation("kdkelurahan","req","Kode kelurahan tidak boleh kosong");
	v.addValidation("nmkelurahan","req","Nama kelurahan tidak boleh kosong");
	v.addValidation("latitude","req","Latitude tidak boleh kosong");
	v.addValidation("longitude","req","Longitude tidak boleh kosong");
	
	

	
	}
</script>
</body>
</html>