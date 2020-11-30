<?php
error_reporting(0);
session_start();
include '../includes/lib.inc.php';
include APP_ROOT."/includes/class.inc.php";
include APP_ROOT."/includes/auth.inc.php";
$jp = new jcore();
?>


<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>SIG Pemetaan Rawan Banjir</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="assets/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
 <script src="assets/plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" /> 
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="blue" data-image="assets/img/sidebar-4.jpg">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


  <div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                   <?=$_SESSION[bagian]?> 
                </a>
            </div>
		
            <ul class="nav">
             <?php if ($_SESSION[bagian]=='ADMIN') { ?>
            		<li>
                    <a href="index.php">
                        <i class="pe-7s-home"></i>
                        <p>Kelurahan</p>
                    </a>
                </li>
            	   <li>
                    <a href="index.php?page=pengguna">
                        <i class="pe-7s-add-user"></i>
                        <p>Pengguna</p>
                    </a>
                </li>
                <?php } else { ?>
                <li>
                    <a href="index.php?page=banjir">
                        <i class="pe-7s-display2"></i>
                        <p>Pelaporan Data Banjir</p>
                    </a>
                </li>
                <?php } ?>
               <li>
                    <a href="index.php?page=cetak">
                        <i class="pe-7s-news-paper"></i>
                        <p>Laporan</p>
                    </a>
                </li>
               
                
                
               
                
				
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                
                <div class="collapse navbar-collapse">
                    

                    <ul class="nav navbar-nav navbar-right">
                       
                        
                        <li>
                            <a href="logout.php">
                                Log out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="content">
                 
                      <?php
	switch($_REQUEST[page]){
		case "pengguna":
		include "pengguna.php";
		break;
		case "cetak":
		include "cetak.php";
		break;
		case "laporan":
		include "laporan.php";
		break;
		default:
		if ($_SESSION[bagian]=='ADMIN') { 
		include('kelurahan.php');
		} else {
			include('banjir.php');
		}
		break;
	}
	?>     
                       
                    </div>
                </div>
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
               
                <p class="copyright pull-right">
                    &copy; 2020 <a href="#">Alan</a>
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

        <!--   Core JS Files   -->
    
	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

</html>
