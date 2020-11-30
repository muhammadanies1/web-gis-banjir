
<script src="js/jquery.min.js"></script>

<style type='text/css'>
  #peta {
  width: 100%;
  height: 600px;

} </style>

<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDmivOPBX1ZfIXv6cSZeWNBRmhew7l9IFk" async="" defer="defer" type="text/javascript"></script>
<script type="text/javascript">
(function() {
window.onload = function() {
	var map;
	var locations = [
		<?php
		  $q = $jp->sql("select * from kelurahan");
		   while($data=mysql_fetch_object($q)){
		?>
		['<?=$data->kdkelurahan;?>', <?=$data->latitude;?>, <?=$data->longitude;?>, '<?=$data->nmkelurahan;?>'],
		<?php } ?>		
		];
    var options = {
      zoom: 13, //level zoom
  	  center: new google.maps.LatLng(-6.9735026,110.4203899),
      mapTypeId: google.maps.MapTypeId.roadmap  
    };
	
	 // Buat peta di 
    var map = new google.maps.Map(document.getElementById('peta'), options);
	 // Tambahkan Marker 
    var infowindow = new google.maps.InfoWindow();
	var marker, i;
	 
     /* kode untuk menampilkan banyak marker */
    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map,
		icon : 'icon.png',
		title: locations[i][3]
	
      });
     /* menambahkan event clik untuk menampikan
     	 infowindows dengan isi sesuai denga
	    marker yang di klik */
		
    		google.maps.event.addListener(marker, 'click', (function(marker, i) {
			return function() { 
  			   if (marker.getAnimation() !== null) {
					marker.setAnimation(null);
				  } else {
					marker.setAnimation(google.maps.Animation.BOUNCE);
				  }

				var id= locations[i][0];
	
				$.ajax({
					url : "get_info.php",
					data : "id=" +id ,
					success : function(data) {
							infowindow.setContent(data);
							infowindow.open(map, marker);
					}
				});		
			}
		})(marker, i));
    }

  };
})();

</script>
 <body id="markers-on-the-map">
<section class="popular-deals section bg-gray">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					<h2>Pemetaan Titik Banjir</h2>
				</div>
			</div>
		</div>
		<div class="row">
        
 			<div id="peta"></div>
  
			
		</div>
	</div>
</section>

</body>

 
	
 
  