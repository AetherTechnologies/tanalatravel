<!DOCTYPE html>
<html>
<?php
// include('connect.php');

// if(isset($_GET['submit'])){
//     $loc_name = $_GET['loc_name'];
//     $sql = mysqli_query($con, "SELECT * FROM tbllocation WHERE loc_name = '$loc_name'");
//     $row = mysqli_fetch_assoc($sql);

//     $long = $row['loc_long'];
//     $lat = $row['loc_lat'];
// }
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
            
            height: 100%;
            width: 100%;
        }
        /* Optional: Makes the sample page fill the window. */
        html,
        body {
            margin: 0px;
            height: 100%;
            padding: 0;
        }
    </style>

    <script>
    let markers = [];
    let map;
        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: {
                    lat: 12.8797,
                    lng: 121.7740
                },
                zoom: 6,
            });
            map.setOptions({ minZoom: 4, maxZoom: 20});
        }
        var prev_window = false;
        function placeMarkerAndPanTo(latitude, longhitude, location_name, location_type, location_price, location_status, location_image, map) {
            console.log("Run");
            let imgUrl = location_image !== null ? "blank" : location_image;
           // markers.push(
            var marker = new google.maps.Marker({
                position: {
                    lat: latitude,
                    lng: longhitude
                },
                map: map,
            });
        //    );
            // map.panTo({
            //     lat: latitude,
            //     lng: longhitude
            // });

        const contentString =
        '<div class="container">' +
        '<img src="../images/'+ location_image +'" width="250px" height= "250px">' +
        '<h3>'+ location_name +'</h3>' +
        '<p>Price:'+' '+ location_price + '</p>' +
        '<p>Location:'+' '+ location_status + '</p>' +
        '<p>Type:'+' '+ location_type + '</p>' +
        '</div>';

            var infowindow = new google.maps.InfoWindow({
                content: contentString,
                minWidth: 250,
                maxWidth: 250,
            });

            marker.addListener("click", () => {
                if(prev_window){
                    prev_window.close();
                }
                prev_window = infowindow;
                infowindow.open(map, marker);
            });
        }

        $(document).ready(function() {
            // $("#myBtn").on('click', function() {
            //     //event.preventDefault();
            //     var locationInput = $('#loc_name').val();
            //     //console.log(locationInput);
            //     $.ajax({
            //         url: "http://localhost:8080/sandbox/tanalatravel/geoloc/result.php",
            //         //url: "http://localhost/tanalatravel/geoloc/result.php",
            //         dataType: 'json',
            //         type: 'POST',
            //         data:{
            //             input: locationInput,
            //         },
            //         success : function (e){
            //             console.log("Fetched");
            //             var row = JSON.parse(JSON.stringify(e));
            //             console.log(row[0].loc_long);
            //             console.log(row.length);
            //             // var loc_name = parseFloat(row.Location_name);
            //             // var loc_price = parseFloat(row.Price);
            //             // var loc_status = parseFloat(row.Status);
            //             // var loc_image = parseFloat(row.Image);
            //             //placeMarkerAndPanTo(lat, long, map);
            //             for (var i = 0; i < row.length; i++){
            //                 let longhitude = row[i].loc_long;
            //                 let latitude = row[i].loc_lat;
            //                 placeMarkerAndPanTo(latitude,longhitude,map);
            //             }
            //         },
            //         error: function (error){
            //             console.log(error);
            //         }
            //     });
            // });
            $.ajax({
                    url: "http://localhost:8080/sandbox/tanalatravel/geoloc/result.php",
                    //url: "http://localhost/tanalatravel/geoloc/result.php",
                    dataType: 'json',
                    type: 'GET',
                    success : function (e){
                        console.log("Fetched");
                        var row = JSON.parse(JSON.stringify(e));
                        // var loc_name = parseFloat(row.Location_name);
                        // var loc_price = parseFloat(row.Price);
                        // var loc_status = parseFloat(row.Status);
                        // var loc_image = parseFloat(row.Image);
                        //placeMarkerAndPanTo(lat, long, map);
                        for (let i = 0; i < row.length; i++){
                            // let location_image = row[i].loc_image.trim() !== "" && row[i].loc_image !== null ? " " : row[i].loc_image;
                            let location_image = row[i].loc_image;
                            let location_name = row[i].loc_name;
                            let location_type = row[i].loc_type;
                            let location_status = row[i].loc_status;
                            let location_price = row[i].loc_price;
                            let longhitude = row[i].loc_long;
                            let latitude = row[i].loc_lat;
                            let parsedLong = parseFloat(longhitude);
                            let parsedLat = parseFloat(latitude);
                            console.log("images/"+location_image);
                            console.log(parsedLong);
                            placeMarkerAndPanTo(parsedLat, parsedLong, location_name, location_type, location_price, location_status, location_image, map);
                        }
                    },
                    error: function (error){
                        console.log(error);
                    }
                });
        });
    </script>
</head>

<body>
    <div id="map"></div>
        <!-- <input type="text" name="loc_name" id="loc_name" placeholder="Search location" />
        <button name="submit" id="myBtn">Seach</button> -->
</body>

</html>