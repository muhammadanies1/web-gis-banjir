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

if($_REQUEST[nolaporan]!='')
{
	$q = "select * from banjir where nolaporan='".$_REQUEST[nolaporan]."'";
	$r = $jp->sql($q);
	$o = $jp->fetch($r);
	$disabled = " readonly='true' ";
	$kode = $o[kdbanjir];
}
else
{
$hari=date('ym')."-";
$q= $jp->fetch($jp->sql("SELECT max(RIGHT(nolaporan,4)) as maks from banjir WHERE left(nolaporan,4)=(SELECT DATE_FORMAT(CURRENT_DATE,'%y%m')) "));
$no=$q[maks]+1;
$kode = $hari.sprintf("%04s", $no);
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


function ConfirmDel(nolaporan){
	if(confirm('Hapus..?')){
		window.location="proses.php?page=banjir&action=delete&nolaporan="+nolaporan;
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
<h1> Pelaporan Data Banjir </h1>

<script src="js/gen_validatorv31.js" language="javascript"></script>
<form action="proses.php?page=banjir&action=input" method="post" enctype="multipart/form-data" name="Formbanjir" id="Formbanjir" >
<input name="id_edit" type="hidden" value="<?=$o[nolaporan]?>">
<table width="738" border="0" align="center" cellpadding="2" cellspacing="0">
  
  <tr>
    <td width="78"><label>No Pelaporan</label> </td>
    <td width="9" align="center"><label>:</label></td>
	<td width="413"><div class="col-sm-4"><input name="nolaporan" type="text" id="nolaporan" value="<?=$kode?>" size="10" maxlength="10"  readonly class="form-control"></div></td>
 </tr>
    <tr>
    <td width="78"><label>Tanggal</label> </td>
    <td width="9" align="center"><label>:</label></td>
	
    <td width="413">
	
	<div class="col-sm-3"><input name="tgl" type="text" id="tgl" value="<?=$o[tgl]?>" size="15" maxlength="15" class="form-control">	</div>

	  </td>
		
  </tr>
   <tr>
    <td width="78"><label>Jam</label> </td>
    <td width="9" align="center"><label>:</label></td>
	
    <td width="413">
	
	<div class="col-sm-3"><input name="jam" type="text" id="jam" value="<?=$o[jam]?>" size="10" maxlength="15" class="form-control">	</div>

	  </td>
		
		
  </tr>
   <tr>
       <td width="78"><label>Kondisi</label> </td>
    <td width="9" align="center"><label>:</label></td>
      <td width="413" >  <div class="col-sm-4"><select name="kondisi" id="kondisi" class="form-control">
      <option value="">Pilih Kondisi</option>
      <option value="AMAN" <?=(($o[kondisi]=='AMAN')?"selected":"")?>>AMAN</option>
      <option value="WASPADA" <?=(($o[kondisi]=='WASPADA')?"selected":"")?>>WASPADA</option>
      <option value="BANJIR" <?=(($o[kondisi]=='BANJIR')?"selected":"")?>>BANJIR</option>
	  </select></div></td>
    </tr>
      
    <tr>
       <td width="78"><label>Keterangan</label> </td>
    <td width="9" align="center"><label>:</label></td>
      <td width="413" >  <div class="col-sm-8"><textarea name="ket" cols="50" rows="5" id="ket" class="form-control"><?=$o[ket]?>
      </textarea></div></td>
    </tr>
    
     
      <tr>
       <td width="78"><label>Foto</label> </td>
    <td width="9" align="center"><label>:</label></td>
      <td width="413" ><?php 
		if(file_exists("../uploaddir/small_med_".$o[kdbanjir].".jpg")){ 
			$filename= "../uploaddir/small_med_".$o[kdbanjir].".jpg"; ?>
			   <img src="<?=$filename?>" border="0"> 
		<?php }	?>
         
			  <div class="col-sm-8"><input type="file" name="file"></div></td>
    </tr>
    
	
   <tr>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td colspan="2"><div class="col-sm-12"><input type="submit" name="Submit" class="btn btn-primary" value="Simpan" onClick="return doSubmit()">        
      <input type="reset" name="Submit2" class="btn btn-success"  value="Batal" onclick="window.location='index.php?page=banjir'"></div></td>
  </tr>
  <tr>
     <td colspan="4">&nbsp;</td>
	  
    </tr>
</table>

</form>

<?php 
		
		 $q="select *, date_format(jam,'%H:%i') as jam1 from banjir where username='".$_SESSION[username]."'";
		
		
		$result=$jp->sql($q);
		
		?>
<table id="example1" class="table table-bordered table-striped" width="100%">
 <thead>
  <tr bgcolor="#2a5acb">
    <th align="center" valign="middle"><span class="style5">No.</span></th>
	 <th  valign="middle"><span class="style5">No Pelaporan</span></th>
     <th  valign="middle"><span class="style5">Tanggal</span></th>
   <th valign="middle"><span class="style5">Jam</span></th>
   <th valign="middle"><span class="style5">Kondisi</span></th>
   <th valign="middle"><span class="style5">Keterangan</span></th>
    <th >	<span class="style5">Proses</span>	</th>
  </tr>
  </thead>
   <?php $n = 0;while($row = $jp->fetch($result)){ $n++; 
 
   ?>
  <tr>
    <td align="center" valign="top"><span class="style12"><?=$n?>.</span></td>
	<td valign="top" align="center"><span class="style12"> <?=$row[nolaporan]?></span></td>
      <td valign="top" align="center"><span class="style12"><?=$jp->todate($row[tgl])?></span></td>
      <td valign="top" align="center"><span class="style12"><?=$row[jam1]?></span></td>
      <td valign="top" align="justify"><span class="style12"><?=$row[kondisi]?></span></td>
     <td valign="top" align="justify"><span class="style12"><?=($row[ket])?></span></td>
      
        <td align="center" valign="top"><a href="index.php?page=banjir&nolaporan=<?=$row[nolaporan]?>"><img src="images/edit.png" width="32" height="32" border="0" title="Edit" /></a><a href="#" onclick="return ConfirmDel('<?=$row[nolaporan]?>')">	 <img src="images/del.png" width="32" height="32" border="0" title="Hapus" /> </a></td>
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