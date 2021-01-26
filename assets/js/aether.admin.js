$(document).ready(function() {
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

});
let map;
var pos;

function initMap() {
    map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: -34.397, lng: 150.644 },
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