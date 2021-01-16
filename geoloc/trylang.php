<!DOCTYPE html>
<html>
<?php
include('connect.php');

if(isset($_GET['submit'])){
    $loc_name = $_GET['loc_name'];
    $sql = mysqli_query($con, "SELECT * FROM tbllocation WHERE loc_name = '$loc_name'");
    $row = mysqli_fetch_assoc($sql);

    $long = $row['loc_long'];
    $lat = $row['loc_lat'];
}
?>

<head>
    <title>Event Click LatLng</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBbSmW0o0udL-0Kkllfh2ntL72mIi6loC8&callback=initMap&libraries=&v=weekly" defer></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <style type="text/css">
        /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
        
        #map {
            height: 50%;
        }
        /* Optional: Makes the sample page fill the window. */
        
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>

    <script>
        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: {
                    lat: 12.8797,
                    lng: 121.7740
                },
                zoom: 6,
            });
        }

        function placeMarkerAndPanTo(latitude, longhitude, map) {
            const marker = new google.maps.Marker({
                position: {
                    lat: latitude,
                    lng: longhitude
                },
                map: map,
            });
            map.panTo({
                lat: latitude,
                lng: longhitude
            });

        const contentString =
        '<img src="images/1.jpg">' +
        '<input type="text" id="str1" value="" />' +
        '<input type="text" id="str1" value="" />' +
        '<input type="text" id="str1" value="" />' +
        '<input type="text" id="str1" value="" />' +
        '<input type="text" id="str1" value="" />';

            const infowindow = new google.maps.InfoWindow({
                content: contentString,
            });

            marker.addListener("click", () => {
                infowindow.open(map, marker);
            });
        }

        $(document).ready(function() {
            $("#myBtn").on('click', function() {
                
                var locationInput = $('#loc_name').val();
                console.log(locationInput);
                $.ajax({
                    url: "http://localhost/tanalatravel/geoloc/result.php",
                    dataType: 'json',
                    type: 'POST',
                    data: {
                        location: locationInput,
                    },
                    success : function (e){
                        console.log("Fetched");
                        //console.log(e);
                        var coor = JSON.parse(JSON.stringify(e));
                        console.log(coor.Longhitude);
                        // var long = parseFloat(coor.Latitude);
                        // var lat = parseFloat(coor.Longhitude);

                        // placeMarkerAndPanTo(lat, long, map);
                    },
                    error: function (error){
                        console.log(error);
                    }
                    
                });
            });
        });
    </script>
</head>

<body>
    <div id="map"></div>
        <input type="text" name="loc_name" id="loc_name" placeholder="Search location" />
    <!-- just put a input type -->
        <button name="submit" id="myBtn">Seach</button>
</body>

</html>