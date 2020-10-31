<!DOCTYPE html>
<html>
<head>
	<title>Laravel 5 - Multiple markers in google map using gmaps.js</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

 
	<script src="http://maps.google.com/maps/api/js?key=AIzaSyAtqWsq5Ai3GYv6dSa6311tZiYKlbYT4mw"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>


  	<style type="text/css">
    	#mymap {
      		border:1px solid red;
      		width: 800px;
      		height: 500px;
    	}
  	</style>


</head>
<body>


  <h1>Laravel 5 - Multiple markers in google map using gmaps.js</h1>


  <div id="mymap"></div>


  <script type="text/javascript">


    var locations = <?php print_r(json_encode($odp)) ?>;
    var mymap = new GMaps({
      el: '#mymap',
      lat: -7.250445,
      lng: 112.768845,
      zoom:12
    });


    $.each( locations, function( index, value ){
	    mymap.addMarker({
	      lat: value.latitude,
	      lng: value.longitude,
	      click: function(e) {
          // var text = value.longitude
	        alert('text :'+ value.longitude+'\ntext2 :'+value.sto+'\ntexxt');
	      }
	    });
   });



 // var secretMessages = ['This', 'is', 'the', 'secret', 'message'];
 //        var lngSpan = lng;
 //        var latSpan = lat;
 //        for (var i = 0; i < secretMessages.length; ++i) {
 //          var marker = new google.maps.Marker({
 //            position: {
 //              lat: value.latitude * Math.random(),
 //              lng: value.longitude * Math.random()
 //            },
 //            map: map
 //          });
 //          attachSecretMessage(marker, secretMessages[i]);
 //        }
 //      }

 //      // Attaches an info window to a marker with the provided message. When the
 //      // marker is clicked, the info window will open with the secret message.
 //      function attachSecretMessage(marker, secretMessage) {
 //        var infowindow = new google.maps.InfoWindow({
 //          content: secretMessage
 //        });

 //        marker.addListener('click', function() {
 //          infowindow.open(marker.get('map'), marker);
 //        });
 //      }

  </script>


</body>
</html>