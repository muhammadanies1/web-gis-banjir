<?php
error_reporting(0);
session_start();
$hari = date("y");
include '../includes/lib.inc.php';
include APP_ROOT."/includes/class.inc.php";
include APP_ROOT."/includes/auth.inc.php";
include INCLUDES_DIR."/class.paging.php";
$jp = new jcore();
		
switch($_REQUEST[page]){
	
	case "kelurahan":
		switch($_REQUEST[action]){
		case "input":
		 $r = $jp->sql("select count(*) as j from kelurahan WHERE nmkelurahan='".$_REQUEST['nmkelurahan']."' ");
		 $o=$jp->fetch($r);
		 $kata = $_POST['id_edit'];
		 $jumlah = strlen($kata);
		 
			if(($o['j']>0) && ($jumlah<=0)){
			  $jp->alert('Data Kelurahan Sudah Dimasukan...');
			  $jp->gotox("index.php?page=kelurahan");
			  }
				  
				  else if($jumlah>0){
				  
				  $q = "update kelurahan set nmkelurahan='".$_POST[nmkelurahan]."',alamat='".$_POST[alamat]."',latitude='".$_POST[latitude]."',longitude='".$_POST[longitude]."' WHERE kdkelurahan='".$kata."' ";
			//echo $q;
   		    $jp->sql($q);
			
			$jp->alert('Data Kelurahan\nTelah Diubah...');
			$jp->gotox("index.php?page=kelurahan");
				  
				  }
				  
				  
			 else { 
			
			$q = "replace into kelurahan set kdkelurahan='".$_POST[kdkelurahan]."',nmkelurahan='".$_POST[nmkelurahan]."',alamat='".$_POST[alamat]."',latitude='".$_POST[latitude]."',longitude='".$_POST[longitude]."' ";
						
   		    $jp->sql($q);
			$jp->alert('Data Kelurahan\nTelah Tersimpan...');
			$jp->gotox("index.php?page=kelurahan");
			}
		break;
		case "delete":
			$r = $jp->sql("delete from kelurahan where kdkelurahan=\"".$_REQUEST[kdkelurahan]."\"");
			$jp->alert('Data Kelurahan\nTelah Terhapus...');
			$jp->gotox("index.php?page=kelurahan");			
		break;
		default:
			$jp->gotox("index.php?page=kelurahan");		
		break;
		}
	break;
	
		
	case "pengguna":
		switch($_REQUEST[action]){
		case "input":
		 $r = $jp->sql("select count(*) as j from pengguna WHERE username='".$_REQUEST['username']."' ");
		 $o=$jp->fetch($r);
		 $kata = $_POST['id_edit'];
		 $jumlah = strlen($kata);
		 
			if(($o['j']>0) && ($jumlah<=0)){
			  $jp->alert('Data Pengguna Sudah Dimasukan...');
			  $jp->gotox("index.php?page=pengguna");
			  }
				  
				  else if($jumlah>0){
				  
		  $q = "update pengguna set pass='".$_POST[pass]."',nama='".$_POST[nama]."',bagian='".$_POST[bagian]."',kdkelurahan='".$_POST[kdkelurahan]."' WHERE username='".$kata."' ";
		
   		    $jp->sql($q);
			
			$jp->alert('Data Pengguna\nTelah Diubah...');
			$jp->gotox("index.php?page=pengguna");
				  
				  }
				  
				  
			 else { 
			
			$q = "replace into pengguna set username='".$_POST[username]."',pass='".$_POST[pass]."',nama='".$_POST[nama]."',bagian='".$_POST[bagian]."',kdkelurahan='".$_POST[kdkelurahan]."' ";
						
   		    $jp->sql($q);
			$jp->alert('Data Pengguna\nTelah Tersimpan...');
			$jp->gotox("index.php?page=pengguna");
			}
		break;
		case "delete":
			$r = $jp->sql("delete from pengguna where username=\"".$_REQUEST[username]."\"");
			$jp->alert('Data Pengguna\nTelah Terhapus...');
			$jp->gotox("index.php?page=pengguna");			
		break;
		default:
			$jp->gotox("index.php?page=pengguna");		
		break;
		}
	break;
	
	case "banjir":
		
		switch($_REQUEST[action]){
				
		case "input":
			
		
		 $r = $jp->sql("select count(*) as j from banjir WHERE nolaporan='".$_REQUEST['nolaporan']."' ");
		 $o=$jp->fetch($r);
		 $kata = $_POST['id_edit'];
		 $jumlah = strlen($kata);
		 
			if(($o['j']>0) && ($jumlah<=0)){
			  $jp->alert('Data Pelaporan Sudah Dimasukan...');
			  $jp->gotox("index.php?page=banjir");
			  }
				  
				  else if($jumlah>0){
				  
				  $q = "update banjir set tgl='".$_POST[tgl]."',jam='".$_POST[jam]."',kondisi='".$_POST[kondisi]."',ket='".$_POST[ket]."', username='".$_SESSION[username]."' where nolaporan='".$kata."' ";
			if($_FILES['file']['name']!=''){
			$jp->UploadImage($kata.".jpg",APP_ROOT."/uploaddir/","file");
			}
			//echo $q;
   		    $jp->sql($q);
			
			$jp->alert('Data Pelaporan\nTelah Diubah...');
			$jp->gotox("index.php?page=banjir");
				  
				  }
				  
				  
			 else { 
			
			$q = "replace into banjir set nolaporan='".$_POST[nolaporan]."',tgl='".$_POST[tgl]."',jam='".$_POST[jam]."',kondisi='".$_POST[kondisi]."',ket='".$_POST[ket]."',username='".$_SESSION[username]."'   ";
			//echo $q;
			if($_FILES['file']['name']!=''){
			$jp->UploadImage($_POST['nolaporan'].".jpg",APP_ROOT."/uploaddir/","file");
			}
   		    $jp->sql($q);
			$jp->alert('Data Pelaporan\nTelah Tersimpan...');
			$jp->gotox("index.php?page=banjir");
			}
		break;
		case "delete":
			$r = $jp->sql("delete from banjir where nolaporan=\"".$_REQUEST[nolaporan]."\"");
			$jp->alert('Data Pelaporan\nTelah Terhapus...');
			$jp->gotox("index.php?page=banjir");			
		break;
		default:
			$jp->gotox("index.php?page=banjir");		
		break;
		}
	break;
	
	
	
}
?>

 