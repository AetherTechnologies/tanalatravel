var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
};
var uri = getUrlParameter('page');
$(document).ready(function() {
    if(uri == 'add-location'){
        var data = ["Flight", "Hotel", "Breakfast"];
        $('.select2').select2({
            data: data,
            minimumResultsForSearch: 5
        });
        $('.textarea').summernote({
            height: 500,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ]
        });
        bsCustomFileInput.init();
        $('#LocationPhoto').imageUploader();
        $('#CreateLocation').submit(function(e) {
            let long = $('#Longhitude').val(),
                lat = $('#Latitude').val();
            let inputImages = form.find('input[name^="images"]')
            if (!inputImages) {
                inputImages = form.find('input[name^="photos"]');
            }
            if (long == null || lat == null || lat.length == 0 || long.length == 0) {
                Swal.fire('Please Pick A Current Coordinates');
                e.preventDefault();
            }
        });
    }
    if(uri == 'add-package'){
        var data = ["Flight", "Hotel", "Breakfast"];
        $('.select2').select2({
            data: data,
            minimumResultsForSearch: 5
        });
        $('.textarea').summernote({
            height: 400,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ],
            focus: false,
            disableResizeEditor: true,
            followingToolbar: false

        });
        bsCustomFileInput.init();
        $('#LocationPhoto').imageUploader();
        $('#CreateLocation').submit(function(e) {
            let long = $('#Longhitude').val(),
                lat = $('#Latitude').val();
            let inputImages = form.find('input[name^="images"]')
            if (!inputImages) {
                inputImages = form.find('input[name^="photos"]');
            }
            if (long == null || lat == null || lat.length == 0 || long.length == 0) {
                Swal.fire('Please Pick A Current Coordinates');
                e.preventDefault();
            }
        });
    }
});
let map;
var pos;
if(uri == 'add-location'){
    function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
            center: { lat: 121.7740, lng: 12.8797 },
            zoom: 14,
        });
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                (position) => {
                    pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    map.setCenter(pos);
                }
            )
        }
        let infoWindow = new google.maps.InfoWindow({
            content: "Click the map to get Lat/Lng!",
            position: pos,
        });
        infoWindow.open(map);
        map.addListener("click", (mapsMouseEvent) => {
            infoWindow.close();
            infoWindow = new google.maps.InfoWindow({
                position: mapsMouseEvent.latLng,
            });
            document.getElementById('Longhitude').value = mapsMouseEvent.latLng.lng();
            document.getElementById('Latitude').value = mapsMouseEvent.latLng.lat();
            infoWindow.setContent(
                JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)
            );
            infoWindow.open(map);
        });
    }
}
if(uri == 'add-package'){
    $('#locationView').DataTable({
        paging: false,
        scrollY: 150,
        "dom": '<"pull-left"f><"pull-right"l>tip'
    });
    var prevWindow = false;
    var hostName = window.location.hostname;
    var infoWindow;
    var markers = [];
    function initMap(){
        map = new google.maps.Map(document.getElementById("map"), {
            center: {lat: 121.7740, lng: 12.8797},
            zoom: 14
        });
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                (position) => {
                    pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    map.setCenter(pos);
                }
            )
        }
    }
    function placeMarker(id, latitude, longhitude, name, price, description, images, inclusion, map){
        var marker = new google.maps.Marker({
            position: {
                lat: latitude,
                lng: longhitude
            },
            map: map,
        });
        var perInclusion = inclusion.split("|").toString();
        var perImage = images.split("|");
        var fixedInclusion = perInclusion.substring(0,perInclusion.length - 1);
        var contentString = 
        '<div class="col-md-12">'
        + '<div class="card card-widget widget-user">' +
          '<div class="widget-user-header text-white" style="background: url(../../uploads/locationPhoto/'+ perImage[0] +') center center; background-size: cover;">' +
            '<h3 class="widget-user-username text-center text-bold bg-dark" style="border-radius: 2rem; margin: 0 10%;">'+name+'</h3>' +
          '</div>'+
          
          '<div class="card-footer pt-2">' +
            '<div class="row">' +
              '<div class="col-sm-4 border-right">'+
                '<div class="description-block">'+
                  '<h5 class="description-header">$'+price+'</h5>'+
                  '<span class="description-text">Price</span>'+
                '</div>'+
              '</div>'+
              '<div class="col-sm-8">'+
                '<div class="description-block">'+
                  '<h5 class="description-header">'+fixedInclusion+'</h5>'+
                  '<span class="description-text">Inclusions</span>'+
                '</div>'+
              '</div>'+
              '</div>'+
              
              '</div></div></div>';
        infoWindow = new google.maps.InfoWindow({
            content: contentString,
            minWidth: 600,
        });
        google.maps.event.addListener(marker,'click',(function(marker,contentString,infoWindow){
            
            return function(){
                if(prevWindow){
                    prevWindow.close();
                }
                infoWindow.setContent(contentString);
                infoWindow.open(map,marker);
                prevWindow = infoWindow;
            };
        })(marker,contentString,infoWindow));
        
        markers.push(marker);
    }
    function InitializeView(Id){
        var location_id = Id;
        $.ajax({
            url: "../../pages/admin/process/getAvailableLocation.php",
            dataType: 'json',
            type: 'POST',
            data: {
                Data: location_id,
            },
            success: function(data){
                var fetchLocation = JSON.parse(JSON.stringify(data));

                alert(fetchLocation.location_name);
            },
            error : function(xhs, status, code){
                alert(xhs + " " + status + " " + code );
            }
        });
    }
    $(function(){
        $.ajax({
            url: "../../pages/admin/process/getAvailableLocation.php?getLocation=1",
            dataType: 'json',
            type: 'GET',
            success : function(data){
                var locationData = JSON.parse(JSON.stringify(data));
                locationData.forEach(row => {
                    placeMarker(
                        row.location_id,
                        parseFloat(row.location_latitude),
                        parseFloat(row.location_longhitude),
                        row.location_name,
                        row.location_price,
                        row.location_description,
                        row.location_photo,
                        row.location_inclusion,
                        map
                    );
                });
            },
            error : function(xhs, status, errorCode){
                console.log(xhs + " " + status + " " + errorCode);
            }
        });
    });
    $(".locationButton").click(function(){
        let $marker = $(this).attr('marker');
        google.maps.event.trigger(markers[$marker], 'click');
    });
    var selectedLocation = [];
    $(".buttonControl").click(function(){
        let button = $(this).attr('location');
        if($(this).hasClass("btn-success")){  
            $(this).removeClass('btn-success').addClass('btn-danger');
            $(this).html("Remove");
            selectedLocation.push(button);
        }
        else if($(this).hasClass("btn-danger")){
            $(this).removeClass('btn-danger').addClass('btn-success');
            $(this).html("Add");
            selectedLocation = $.grep(selectedLocation, function(value){
                return value != button;
            });
        }
    });
    $('#CreatePackage').submit(function(e){
        e.preventDefault();
        Swal.fire({
            title: 'Add Package?',
            text: 'This Will Add In Your Current Packages.',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Add Package'
        }).then((result) =>{
            if(result.value){
                var AddData = new FormData();
                var packageName = $('#PackageName').val().trim();
                var price = $('#Price').val().trim();
                var description = $('#PackageDescription').val();
                var inclusion = $('#Inclusion').val();
                inclusion.forEach(includeItem => {
                    AddData.append("inclusion[]", includeItem);
                });
                var totalImage = document.getElementById('uploadCustom').files.length;
                for (var i = 0; i < totalImage; i++){
                    AddData.append("files[]", document.getElementById('uploadCustom').files[i]);
                }
                selectedLocation.forEach(perLocation =>{
                    AddData.append("locations[]", perLocation);
                });
                AddData.append("description", description);
                AddData.append("packageName", packageName);
                AddData.append("price", price);
                
                $.ajax({
                    url: "../../pages/admin/process/addPackage.php",
                    type: 'POST',
                    data: AddData,
                    processData: false,
                    contentType: false,
                    success : function (){
                        Swal.fire(
                            'Package Added',
                            'Package Details has been Added',
                            'success',
                        ).then(()=>{
                            window.location.reload(1);
                        })
                    },
                    error : function (xhs, status, code){
                        console.log("Error: " + xhs + " " + status + "|" + code);
                    }
                });
            }
        });
        
    });
    
}
