x = navigator.geolocation;
x.getCurrentPosition(initMap);

var myLat = 0;
var myLong = 0;

    function initMap(position){
        //Coordinates Credentials
        myLat = position.coords.latitude;
        myLong = position.coords.longitude;
        // Map options
        var options = {
          zoom:14,
          center:{lat:myLat,lng:myLong}
        }
  
        // New map
        var map = new google.maps.Map(document.getElementById('map'), options);
  
        // Listen for click on map
        google.maps.event.addListener(map, 'click', function(event){
          // Add marker
          addMarker({coords:event.latLng});
        });

        var markers = [
          {
            coords:{lat:myLat,lng:myLong},
            content:'<h1>Current Location</h1>'
          },
          
          {
            coords:{lat:14.587830982,lng:120.97166278},
            iconImage:'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
            content:'<h1>Intramuros</h1>'
          },
          {
            coords:{lat:14.5831,lng:120.9794},
            iconImage:'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
            content:'<h1>Rizal Park<h1>'
          },
          {
            coords:{lat:14.5869,lng:120.9812},
            iconImage:'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
            content:'<h1>National Museum<h1>'
          },
          {
            coords:{lat:14.6012,lng:120.9750},
            iconImage:'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
            content:'<h1>Binondo<h1>'
          },
          {
            coords:{lat:14.6499,lng:120.9535},
            iconImage:'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
            content:'<h1>Divisoria<h1>'
          },
          {
            coords:{lat:14.5353,lng:120.9827},
            iconImage:'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
            content:'<h1>SM Mall of Asia<h1>'
          },
          {
            coords:{lat:14.5988,lng:120.9837},
            iconImage:'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
            content:'<h1>Quiapo Church<h1>'
          },
        ];
  
        // Loop through markers
        for(var i = 0;i < markers.length;i++){
          // Add marker
          addMarker(markers[i]);
        }
  
        // Add Marker Function
        function addMarker(props){
          var marker = new google.maps.Marker({
            position:props.coords,
            map:map,
            //icon:props.iconImage
          });
  
          // Check for customicon
          if(props.iconImage){
            // Set icon image
            marker.setIcon(props.iconImage);
          }
  
          // Check content
          if(props.content){
            var infoWindow = new google.maps.InfoWindow({
              content:props.content
            });
  
            marker.addListener('click', function(){
              infoWindow.open(map, marker);
            });
          }
        }
      }
    