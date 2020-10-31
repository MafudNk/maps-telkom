<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Map</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">
  <link rel="shortcut icon" href="{{ asset('images/telkomm.png')}}"/>

   <style type="text/css">
      #map {
    
          position: relative;
    /* 
    Do math with the height of your iframe divided by the width, then converted to percent
    In this example the height is 400 and the width is 600
    400 / 600 = .66666667 
    which is 66.6666667% */
    padding-bottom: 66.6666667%; 
    height: 0;
      }
      #map iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 50px;
    height: 100%;
}
    </style>

  @yield('css')
</head>
<body class="hold-transition skin-red-light sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{('dashboard')}}" class="logo">
      Telkom Indonesia
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">

        <ul class="nav navbar-nav">
            <li class="user user-menu">
            <a href="{{url('logout')}}" class="logo">
              <span class=" fa fa-share-square-o"></span>
              <!-- <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
              <span class="hidden-xs"> Log Out</span>
            </a>
            
          </li>

          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      
      <!-- search form -->
       <form action="{{('map')}}" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="cari" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
    </section>
      </aside>

<!-- wrapper -->

<div class="content-wrapper mapWrapper">
<section class="content mapWrapper">
  <div id="map"></div>

</section>
</div>     


 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCrDosY-RlWKd9YeYkR_38PxS8jjuT90k4"> </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>
  <script src="http://js.api.here.com/v3/3.0/mapsjs-core.js"type="text/javascript" charset="utf-8"></script>
  <script src="http://js.api.here.com/v3/3.0/mapsjs-service.js"type="text/javascript" charset="utf-8"></script>
  <script src="http://js.api.here.com/v3/3.0/mapsjs-mapevents.js"type="text/javascript" charset="utf-8"></script>

<script type="text/javascript">
  
 var data = {!! json_encode($odp) !!};
 
 console.log(data); 

  var locations = [];
  for (var i = 0;  i < data['length']; i++) {
if(data[i]['merk_olt'] == 'ZTE') {
         locations.push([data[i]['pd_name'], data[i]['latitude'], data[i]['longitude'], 
          4,
        "http://maps.google.com/mapfiles/ms/micons/blue.png"],);
          }
if (data[i]['merk_olt'] == 'ALU') {
        locations.push([data[i]['pd_name'], data[i]['latitude'], data[i]['longitude'], 
          4,
        "http://maps.google.com/mapfiles/ms/micons/green.png"],);
      }
if(data[i]['merk_olt'] == 'HWI') {
  locations.push([data[i]['pd_name'], data[i]['latitude'], data[i]['longitude'], 
          4,
        "http://maps.google.com/mapfiles/ms/micons/yellow.png"],);
}
if(data[i]['merk_olt'] == '#N/A'){
    locations.push([data[i]['pd_name'], data[i]['latitude'], data[i]['longitude'], 
           4,
         "http://maps.google.com/mapfiles/ms/micons/red.png"],);
 }
}

console.log(locations);

var map = new google.maps.Map(document.getElementById('map'), {
  zoom: 10,
  center: new google.maps.LatLng(-7.250445, 112.768845),
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
      infowindow.setContent('STO : ' + data[i]['sto'] + '<br>PD_NAME : ' + locations[i][0] + '<br>Merk_OLT : ' + data[i]['merk_olt'] + '<br>F_OLT : ' + data[i]['f_olt'] + '<br>IS_AVAI : '+ data[i]['is_avai'] +'<br>IS_BLOCKING :'+ data[i]['is_blocking'] +'<br>IS_RESERV : '+ data[i]['is_reserv'] +'<br>IS_SERVICE :'+ data[i]['is_service'] +'<br>IS_TOTAL : '+ data[i]['is_total'] +'<br>OCC : '+ data[i]['occ'] +'<br>OCC_COLOR :'+ data[i]['occ_color'] +'<br>OLT :'+ data[i]['olt'] +'<br>MODUL : '+data[i]['modul'] );
      infowindow.open(map, marker);
    }
  })(marker, i)
  );
}

</script>
  
  
<!-- jQuery 3 -->
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{('bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{ asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ asset('bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js')}}"></script>
<script src="{{asset('js/laravel.js')}}"></script>


</script>
@yield('script')
</html>

