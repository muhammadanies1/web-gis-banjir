
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
<h1> Cetak Pelaporan Data Banjir </h1>

<script src="js/gen_validatorv31.js" language="javascript"></script>
<form action="index.php?page=laporan" method="post" enctype="multipart/form-data" name="Formcetak" id="Formcetak" >
<table width="738" border="0" align="center" cellpadding="2" cellspacing="0">
  
  
    <tr>
    <td width="78"><label>Dari Tanggal</label> </td>
    <td width="9" align="center"><label>:</label></td>
	
    <td width="413">
	
	<div class="col-sm-3"><input name="tgl" type="text" id="tgl" value="<?=$o[tgl]?>" size="15" maxlength="15" class="form-control">	</div>

	  </td>
		
  </tr>
   <tr>
    <td width="78"><label>S/d Tanggal</label> </td>
    <td width="9" align="center"><label>:</label></td>
	
    <td width="413">
	
	<div class="col-sm-3"><input name="tgl1" type="text" id="tgl1" value="<?=$o[tgl]?>" size="15" maxlength="15" class="form-control">	</div>

	  </td>
		
		
  </tr>
 
   <tr>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td colspan="2"><div class="col-sm-12"><input type="submit" name="Submit" class="btn btn-primary" value="Lihat" onClick="return doSubmit()">        
      <input type="reset" name="Submit2" class="btn btn-success"  value="Batal" onclick="window.location='index.php?page=cetak'"></div></td>
  </tr>
  <tr>
     <td colspan="4">&nbsp;</td>
	  
    </tr>
</table>

</form>

	
<script>
function doSubmit(){
    var v = new Validator("Formcetak");
	v.addValidation("tgl","req","Dari Tanggal tidak boleh kosong");
	v.addValidation("tgl1","req","S/d Tanggal tidak boleh kosong");
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
    $("#tgl").datepicker({maxDate: "0",dateFormat: 'yy-mm-dd' });
	$("#tgl1").datepicker({maxDate: "0",dateFormat: 'yy-mm-dd' });
  
  });
  </script>
 
</body>
</html>