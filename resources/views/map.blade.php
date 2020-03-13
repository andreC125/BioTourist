@extends('layouts.app')

@section('content')

<head>
  <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?libraries=geometry,places&ext=.js&key="></script>
  <style>
    /* Always set the map height explicitly to define the size of the div
     * element that contains the map. */
    #map-canvas {
      height: 450px;
    }
    /* Optional: Makes the sample page fill the window.
     content {
      height: 100%;
      margin: 0;
      padding: 0;
    }*/
  </style>
</head>
<?php echo $adresses ?>
<?php
$tabAdr[]=null;
foreach($adresses as $key=>$val){
array_push($tabAdr,$val->adresse);
}
?>
  <div id="map-canvas"></div>
  <script>
var addresse = '<?php echo json_encode($tabAdr); ?> ';

  var delay = 100;
  var infowindow = new google.maps.InfoWindow();
  var latlng = new google.maps.LatLng(48.858255, 2.347138);
  var mapOptions = {
    zoom: 12,
    center: latlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
  var geocoder = new google.maps.Geocoder();
  var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
//  var bounds = new google.maps.LatLngBounds();
console.log((typeof(addresse)));
addresse =JSON.parse(addresse);
for(i=0;i<addresse.length;i++){
if(addresse[i]!=null && addresse[i]!=""){



  var locations = [
           ['pantheon paris france'] ,['chatelet les halles']

  ];
  var infoWindowOptions = {
    content: '<h3>Locronan</h3>'
        + '<a href="http://www.locronan-tourisme.com/" target="_blank">Site de l office de tourisme de la ville</a>'
        + '<br/><img src="maps/google-marker/image.jpg" width="200px" />'
};

var infoWindow = new google.maps.InfoWindow(infoWindowOptions);







  $(document).ready(function() {
  getLocation();
  });


    function getLocation() {
      if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(showPosition);
      } else {
          x.innerHTML = "Geolocation is not supported by this browser.";
      }
  }
  geocodeAddress(addresse[i]);


}
}
function geocodeAddress(adr) {
  console.log(adr);
  geocoder.geocode({address:adr}, function (results,status)
    {
       if (status == google.maps.GeocoderStatus.OK) {
        var p = results[0].geometry.location;
        var lat=p.lat();
        var lng=p.lng();
        createMarker(adr,lat,lng);
      }
      else {
         if (status == google.maps.GeocoderStatus.OVER_QUERY_LIMIT) {
          nextAddress--;
          delay++;
        } else {
                      }
      }
    //  next();
    }
  );
}
function showPosition(position) {
    var latx=position.coords.latitude;
    var lonx=position.coords.longitude;
    var resultx=new google.maps.LatLng(latx,lonx);
    var locations = [

    ['Votre position',position.coords.latitude, position.coords.longitude,'http://labs.google.com/ridefinder/images/mm_20_blue.png'] //, ['Vendeur de pomme',48.858255, 2.347138] , ['Vendeur de poire',48.867882,2.363284] ,


  ];



    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        disableAutoPan: true,
        map: map,
        icon: locations[i][3]
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }



}
function createMarker(add,lat,lng) {
  var contentString = add;
  var marker = new google.maps.Marker({
    position: new google.maps.LatLng(lat,lng),
    map: map,
          });

 google.maps.event.addListener(marker, 'click', function() {
    infowindow.setContent(contentString);
    infowindow.open(map,marker);
  });

 // bounds.extend(marker.position);

}
var nextAddress = 0;
function theNext( addr) {
  if (nextAddress < locations.length) {

    setTimeout('geocodeAddress(addr)', delay);
    nextAddress++;
  } else {
  //  map.fitBounds(bounds);
  }
}
</script>
@endsection
