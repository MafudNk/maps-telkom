<script src="http://maps.google.com/maps/api/js"></script>
<div id="map"></div>
<script type="text/javascript">

#map {
  width: 100%;
  height: 100%;
}

var locations = [
  ['Bondi Beach', -33.890542, 151.274856, 4, "http://maps.google.com/mapfiles/ms/micons/blue.png"],
  ['Coogee Beach', -33.923036, 151.259052, 5, "http://maps.google.com/mapfiles/ms/micons/green.png"],
  ['Cronulla Beach', -34.028249, 151.157507, 3, "http://maps.google.com/mapfiles/ms/micons/yellow.png"],
  ['Manly Beach', -33.80010128657071, 151.28747820854187, 2, "http://maps.google.com/mapfiles/ms/micons/blue.png"],
  ['Maroubra Beach', -33.950198, 151.259302, 1, "http://maps.google.com/mapfiles/ms/micons/blue.png"]
];

var map = new google.maps.Map(document.getElementById('map'), {
  zoom: 10,
  center: new google.maps.LatLng(-33.92, 151.25),
  mapTypeId: google.maps.MapTypeId.ROADMAP
});

var infowindow = new google.maps.InfoWindow();

var marker, i;

for (i = 0; i < locations.length; i++) {
  marker = new google.maps.Marker({
    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
    icon: locations[i][4],
    title: locations[i][0],
    map: map
  });

  google.maps.event.addListener(marker, 'click', (function(marker, i) {
    return function() {
      infowindow.setContent(locations[i][0]);
      infowindow.open(map, marker);
    }
  })(marker, i));
}

</script>