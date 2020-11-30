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
if($_REQUEST[username]!='')

{
	$q = "select * from pengguna where username='".$_REQUEST[username]."'";
	$r = $jp->sql($q);
	$o = $jp->fetch($r);
	$disabled = " readonly='true' ";
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

function ConfirmDel(username){
	if(confirm('Hapus..?')){
		window.location="proses.php?page=pengguna&action=delete&username="+username;
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

<h1> Data Pengguna </h1>
<script src="js/gen_validatorv31.js" language="javascript"></script>
<form action="proses.php?page=pengguna&action=input" method="post" enctype="multipart/form-data" name="Formpengguna" id="Formpengguna" >
<input name="id_edit" type="hidden" value="<?=$o[username]?>">
<table width="595" border="0" align="center" cellpadding="2" cellspacing="0">
<tr>
     <td colspan="4">&nbsp;</td>
	  
    </tr>
   
<tr>
    <td><label>User Name</label> </td>
    <td align="center"><label>:</label></td>
    <td colspan="2"><div class="col-sm-8"><input name="username" type="text" id="username" value="<?=$o[username]?>" class="form-control" <?=$disabled?>></div></td>
    </tr>
		<tr>
       <td width="122"><label>Nama </label> </td>
     <td width="19" align="center"><label>:</label></td>
      <td width="585" ><div class="col-sm-10"><input name="nama" type="text" id="nama" size="30" maxlength="30" value="<?=$o[nama]?>" class="form-control"></div></td>
    </tr>
   <tr>
    <td><label>Password</label> </td>
    <td align="center"><label>:</label> </td>
    <td colspan="2"><div class="col-sm-4"><input name="pass" type="password" id="pass" value="<?=$o[pass]?>" class="form-control"> </div></td>
    </tr>
      <tr>
       <td width="122"><label>Bagian </label> </td>
     <td width="19" align="center"><label>:</label></td>
      <td width="585" ><div class="col-sm-5"><select name="bagian" id="bagian" class="form-control">
      <option value="">Pilih Bagian</option>
      <option value="ADMIN" <?=(($o[bagian]=='ADMIN')?"selected":"")?>>ADMIN</option>
      <option value="OPERATOR" <?=(($o[bagian]=='OPERATOR')?"selected":"")?>>OPERATOR</option>
       
    </select></div></td>
    </tr>
   <tr>
       <td width="122"><label>Kelurahan </label> </td>
     <td width="19" align="center"><label>:</label></td>
      <td width="585" ><div class="col-sm-5"><select name="kdkelurahan" id="kdkelurahan" class="form-control">
      	<option value="">Pilih Unit</option>
		<?php
		$r = $jp->sql("select * from kelurahan");
		while ($oKel = $jp->fetch($r)){
		$isSelKel = (($oKel[kdkelurahan]==$o[kdkelurahan])?"selected":"");
		?>
		<option value="<?=$oKel[kdkelurahan]?>" <?=$isSelKel?>><?=$oKel[nmkelurahan] ?> </option>
      <?php } ?>
    </select></div></td>
    </tr>
	
	  
  <tr>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td colspan="2"><div class="col-sm-12"><input type="submit" name="Submit" class="btn btn-primary" value="Simpan" onClick="return doSubmit()">        
      <input type="reset" name="Submit2" class="btn btn-success"  value="Batal" onclick="window.location='index.php?page=pengguna'"></div></td>
  </tr>
  <tr>
     <td colspan="4">&nbsp;</td>
	  
    </tr>
</table>

</form>

<?php 
		
		 $q="SELECT a.*,b.nmkelurahan FROM pengguna a left join kelurahan b on a.kdkelurahan=b.kdkelurahan  ";
	
		$result=$jp->sql($q);
		
		?>
<table id="example1" class="table table-bordered table-striped" width="100%">
 <thead>
  <tr bgcolor="#2a5acb">
    <th align="center" valign="middle"><span class="style5">No.</span></th>
	<th valign="middle"><span class="style5">Username</span></th>
    <th valign="middle"><span class="style5">Nama</span></th>
	<th valign="middle"><span class="style5">Password</span></th>
    <th valign="middle"><span class="style5">Bagian</span></th>
    <th valign="middle"><span class="style5">Kelurahan</span></th>
    <th >	<span class="style5">Proses</span>	</th>
  </tr>
  </thead>
   <?php $n = 0;while($row = $jp->fetch($result)){ $n++; 
 
   ?>
  <tr>
    <td align="right" valign="top"><span class="style12"> <?=$n?> .</span></td>
	<td valign="top" align="justify"><span class="style12"><?=$row[username]?>   </span></td>
    <td valign="top" align="justify"><span class="style12"><?=$row[nama]?>   </span></td>
    <td valign="top" align="justify"><span class="style12"><?=$row[pass]?>   </span></td>
    <td valign="top" align="justify"><span class="style12"><?=$row[bagian]?>   </span></td>
    <td valign="top" align="justify"><span class="style12"><?=$row[nmkelurahan]?>   </span></td>
	      
    <td width="95" align="center" valign="top">
	<a href="index.php?page=pengguna&username=<?=$row[username]?>">
	<img src="images/edit.png" width="32" height="32" border="0" title="Edit" /></a>
	<a href="#" onclick="return ConfirmDel('<?=$row[username]?>')">	 <img src="images/del.png" width="32" height="32" border="0" title="Hapus" /> </a></td>
  </tr>
  <?php } ?>
</table>


<script>
function doSubmit(){
    var v = new Validator("Formpengguna");
	v.addValidation("username","req","User Name tidak boleh kosong");
	v.addValidation("pass","req","Password tidak boleh kosong");
	v.addValidation("nama","req","Nama tidak boleh kosong");
	v.addValidation("kdkelurahan","req","Kelurahan tidak boleh kosong");
	v.addValidation("bagian","req","Bagian tidak boleh kosong");
	
	
	}
</script>
</body>
</html>