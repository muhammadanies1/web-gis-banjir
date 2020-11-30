 <?php
    include("koneksi.php");
    $data = mysqli_fetch_array(mysqli_query($db,"SELECT * FROM data"));
 ?>
 

<script src="js/jquery-1.8.3.min.js"></script>
<script>
$(document).ready(function(){
  $('#hasil').html('Loading...');
  loadData();
  setInterval(loadData,5000);
  history.pushSate(null,null,location.href);
  window.onopopstate = function(event){
    history.go(1);
  }

});

function loadData(){
  $.ajax({
    type:'post',
    url:'data.php',
    data:{},
    success:function(response){
      try{
       //   alert(response);
        var ret = $.parseJSON(response);
        var retPasut     = ret.pasut;
         
        
        $('#pasut').html(retPasut);
		
      }catch(e){
        //alert(e);
      }
    }
  });
}
</script>

 <style type="text/css">
 #container {
    height: 410px; 
}

 #container1 {
    height: 410px; 
}
.highcharts-figure, .highcharts-data-table table {
    min-width: 310px; 
    max-width: 500px;
    margin: 0em auto;
}

.highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #EBEBEB;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
}
.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}
.highcharts-data-table th {
	font-weight: 600;
    padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
    padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}
.highcharts-data-table tr:hover {
    background: #f1f7ff;
}

    
    
</style>





<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>STAMAR DISPLAY</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
   

 <style type="text/css">
p.ex1 {
    margin: -300px;
}

</style>

<script src="js/highcharts.js"></script>
<script src="js/highcharts-more.js"></script>
<script src="js/accessibility.js"></script>
</head>
<body >
<section class="popular-deals section bg-gray">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					<h2>Display Pasut</h2>
				</div>
			</div>
		</div>
		<div class="row">
        	<div class="col-md-12">
 	            <div id="container1"></div>
                <font color="#fff"> <div id="pasut" type="hidden"></div></font>
                <h4>Keterangan : <br> 0 - 90 Cm = Aman <br> 90 - 130 Cm = Waspada <br> 130 - 200 Cm = Banjir<br>
                
                <a href="http://display.maritimsemarang.com/" target="_blank">Sumber : BMKG (Stasiun Meteorologi Maritim Tanjung Emas Semarang) </a></h4>
            </div>
  
			
		</div>
	</div>
</section>
 </body>
<script src="js/jquery-2.1.1.min.js"></script>
<script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
<script>
    
 Highcharts.chart('container1', {

    chart: {
        type: 'gauge',
        plotBackgroundColor: null,
        plotBackgroundImage: null,
        plotBorderWidth: 0,
        plotShadow: false
    },

    title: {
        text: 'Pasut',
        style: {
            fontSize: '2em'
        }
    },

    pane: {
        startAngle: -150,
        endAngle: 150,
        background: [{
            backgroundColor: {
                linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                stops: [
                    [0, '#FFF'],
                    [1, '#333']
                ]
            },
            borderWidth: 0,
            outerRadius: '109%'
        }, {
            backgroundColor: {
                linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                stops: [
                    [0, '#333'],
                    [1, '#FFF']
                ]
            },
            borderWidth: 1,
            outerRadius: '107%'
        }, {
            // default background
        }, {
            backgroundColor: '#DDD',
            borderWidth: 0,
            outerRadius: '105%',
            innerRadius: '103%'
        }]
    },

    // the value axis
    yAxis: {
        min: 0,
        max: 200,

        minorTickInterval: 'auto',
        minorTickWidth: 1,
        minorTickLength: 10,
        minorTickPosition: 'inside',
        minorTickColor: '#666',

        tickPixelInterval: 30,
        tickWidth: 2,
        tickPosition: 'inside',
        tickLength: 10,
        tickColor: '#666',
        labels: {
            step: 2,
            rotation: 'auto'
        },
        title: {
            text: 'cm'
        },
        plotBands: [{
            from: 0,
            to: 90,
            color: '#55BF3B' // green
        }, {
            from: 90,
            to: 130,
            color: '#DDDF0D' // yellow
        }, {
            from: 130,
            to: 200,
            color: '#DF5353' // red
        }]
    },

    series: [{
        name: 'Pasut',
        data: [<?=$data[pasut]?>],
        tooltip: {
            valueSuffix: ' cm'
        }
    }]

},
// Add some life
function (chart) {
    setInterval(function () {
        
  //alert(document.getElementById("pasut").innerHTML);
        if (chart.axes) { // not destroyed
       
             var point = chart.series[0].points[0],
                newVal,
                inc = Math.round(document.getElementById("pasut").innerHTML);

            newVal = inc  ;
           
            point.update(newVal);
        }
    }, 1000);

});
    
</script>

  </body>
</html>
