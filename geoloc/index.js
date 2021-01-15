
function initMap() {
    var myLat = 0;
    var myLong = 0;
    const directionsService = new google.maps.DirectionsService();
    const directionsRenderer = new google.maps.DirectionsRenderer();
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 14,
      center: { lat: 12.8797, lng: 121.7740 },
    });
    
    directionsRenderer.setMap(map);
    
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            initialLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
            map.setCenter(initialLocation);
        });
        navigator.geolocation.getCurrentPosition(setMarker);
    }else{
        myLong = 12.8797;
        myLat = 121.7740;
        console.log('Default Location');
    }
    
    function setMarker(position){
        var markers = [
            {
                coords:{lat: position.coords.latitude, lng: position.coords.longitude},
                content:'<h1>Current Location</h1>'
            },
        ];
    
        for(var i = 0; i < markers.length; i++){
            addMarker(markers[i]);
        }
    
        function addMarker(props){
            var marker = new google.maps.Marker({
                position: props.coords,
                map:map,
            });
            if(props.content){
                var infoWindow = new google.maps.InfoWindow({
                    content:props.content
                });
                marker.addListener('click', function(){
                    infoWindow.open(map,marker);
                });
            }
        }
    }
    document.getElementById("submit").addEventListener("click", () => {
        calculateAndDisplayRoute(directionsService, directionsRenderer);
      });

}
  
  function calculateAndDisplayRoute(directionsService, directionsRenderer) {
    const waypts = [];
    const checkboxArray = document.getElementById("waypoints");
  
    for (let i = 0; i < checkboxArray.length; i++) {
      if (checkboxArray.options[i].selected) {
        waypts.push({
          location: checkboxArray[i].value,
          stopover: true,
        });
      }
    }
    directionsService.route(
      {
        origin: document.getElementById("start").value,
        destination: document.getElementById("end").value,
        waypoints: waypts,
        optimizeWaypoints: true,
        travelMode: google.maps.TravelMode.DRIVING,
      },
      (response, status) => {
        if (status === "OK") {
          directionsRenderer.setDirections(response);
          const route = response.routes[0];
          const summaryPanel = document.getElementById("directions-panel");
          summaryPanel.innerHTML = "";
  
          // For each route, display summary information.
          for (let i = 0; i < route.legs.length; i++) {
            const routeSegment = i + 1;
            summaryPanel.innerHTML +=
              "<b>Route Segment: " + routeSegment + "</b><br>";
            summaryPanel.innerHTML += route.legs[i].start_address + " to ";
            summaryPanel.innerHTML += route.legs[i].end_address + "<br>";
            summaryPanel.innerHTML += route.legs[i].distance.text + "<br><br>";
          }
        } else {
          window.alert("Directions request failed due to " + status);
        }
      }
    );
  }