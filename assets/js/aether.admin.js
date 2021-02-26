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
if(uri == 'add-location'){
    function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
            center: { lat: 14.592466711418203 , lng: 120.99102708684528 },
            zoom: 10,
        });
        var pos = {lat: 14.592466711418203, lng: 120.99102708684528};
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
    $(function(){
        $.ajax({
            url: '../../pages/admin/process/checkInclusion.php?fetch',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $('.select2').select2({
                    data: data,
                    minimumResultsForSearch: 5
                });
            }
        })
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
        $('#load').removeClass('d-none');
        let inputImages = form.find('input[name^="images"]')
        if (!inputImages) {
            inputImages = form.find('input[name^="photos"]');
        }
        if (long == null || lat == null || lat.length == 0 || long.length == 0) {
            
            $('#load').addClass('d-none');
            Swal.fire('Please Pick A Current Coordinates');
            e.preventDefault();
        }
    });
    
}
$(document).ready(function() {
    if(uri == 'add-package'){
        $(function(){
            $.ajax({
                url: '../../pages/admin/process/checkInclusion.php?fetch',
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('.select2').select2({
                        data: data,
                        minimumResultsForSearch: 5
                    });
                }
            })
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
if(uri == 'view-inq'){
    $('.td-hd').click(function(){
        let $ID = $(this).attr('data-id');
        $('#ViewMessage').modal('toggle');
        $.ajax({
            url: '../../pages/admin/process/view.process.php',
            type: 'POST',
            dataType: 'JSON',
            data: {
                fetch: 1,
                mess: $ID
            },
            success: function(x){
                let y = JSON.parse(JSON.stringify(x));
                console.log(y);
                $('#message_title').html(y.message_title);
                $('#message-From').html("From : " + y.user_fullname + " (" + y.user_email + ")");
                $('#message-content').html(y.message_content);
                $('#message-date').html(y.date_created);
                $('#delete').attr('data-id', $ID);
                let status = y.status;
                if(status == '1'){
                    let badge = $('#sts_' + $ID);
                    badge.removeClass('badge-success').addClass('badge-primary');
                    badge.html("Seen");
                    UpdateSeen($ID);
                }
            },
            error: function(xhs, status, code){
                console.log(xhs, status, code);
            }
        })
    });
    $('.btn-dlt').click(function(){
        let $ID = $(this).attr('data-id');
        $.ajax({
            url: '../../pages/admin/process/view.process.php',
            type: 'POST',
            data: {
                delete: 1,
                ID : $ID
            },
            complete: function(){
                Swal.fire({
                    title: 'Successfully Deleted',
                    type: 'success',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Confirm'
                }).then(() => {
                    window.location.reload(1);
                });
            }
        })
    });
    function UpdateSeen (ID){
        $.ajax({
            url: '../../pages/admin/process/view.process.php',
            type: 'POST',
            data: {
                seen: 1,
                ID: ID
            }
        });
    }
}
if(uri == 'view-iss'){
    $('.td-hd').click(function(){
        let $ID = $(this).attr('data-id');
        $('#ViewMessage').modal('toggle');
        $.ajax({
            url: '../../pages/admin/process/view.process.php',
            type: 'POST',
            dataType: 'JSON',
            data: {
                fetch: 1,
                mess: $ID
            },
            success: function(x){
                let y = JSON.parse(JSON.stringify(x));
                console.log(y);
                $('#message_title').html(y.message_title);
                $('#message-From').html("From : " + y.user_fullname + " (" + y.user_email + ")");
                $('#message-content').html(y.message_content);
                $('#message-date').html(y.date_created);
                $('#delete').attr('data-id', $ID);
                let status = y.status;
                if(status == '1'){
                    let badge = $('#sts_' + $ID);
                    badge.removeClass('badge-success').addClass('badge-primary');
                    badge.html("Seen");
                    UpdateSeen($ID);
                }
            },
            error: function(xhs, status, code){
                console.log(xhs, status, code);
            }
        })
    });
    $('.btn-dlt').click(function(){
        let $ID = $(this).attr('data-id');
        $.ajax({
            url: '../../pages/admin/process/view.process.php',
            type: 'POST',
            data: {
                delete: 1,
                ID : $ID
            },
            complete: function(){
                Swal.fire({
                    title: 'Successfully Deleted',
                    type: 'success',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Confirm'
                }).then(() => {
                    window.location.reload(1);
                });
            }
        })
    });
    function UpdateSeen (ID){
        $.ajax({
            url: '../../pages/admin/process/view.process.php',
            type: 'POST',
            data: {
                seen: 1,
                ID: ID
            }
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
            center: { lat: 14.592466711418203 , lng: 120.99102708684528 },
            zoom: 14
        });
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
                $('#load').removeClass('d-none');
                $.ajax({
                    url: "../../pages/admin/process/addPackage.php",
                    type: 'POST',
                    data: AddData,
                    processData: false,
                    contentType: false,
                    success : function (){
                        $('#load').addClass('d-none');
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
if(uri == 'inc-mgmt'){
    $('#inclusionTB').DataTable();

    $('#AddNewInclusion').submit(function(e){
        e.preventDefault();
        let inclusion = $('#InclusionName').val();
        $.ajax({
            url: "../../pages/admin/process/checkInclusion.php",
            type: 'POST',
            dataType: 'json',
            data: {
                DataInclusion: inclusion
            },
            success : function(data){
                var $JSON = JSON.parse(JSON.stringify(data));
                if($JSON[0]){
                    Swal.fire(inclusion +' is already existed.')
                }
                else{
                    Swal.fire(inclusion + ' is Added!')
                    .then(()=>{
                        window.location.reload(1);
                    });
                }
            },
            error : function(xhs, status, code){
                console.log(xhs + " " + status + " " + code);
            }
        });
    });
$(function(){
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2000
    });
    $('.buttonControl').click(function(){
        var $current = $(this);
        console.log($current.attr('data-inclusion'));
        if($current.hasClass('btn-success')){
            $current.removeClass("btn-success").addClass("btn-danger");
            $current.html("Disable");
            $.ajax({
                url: "../../pages/admin/process/checkInclusion.php",
                type: 'POST',
                data: {
                    InclusionID : $current.attr("data-inclusion"),
                },
                success : function(){
                    Toast.fire({
                        title: 'Successfully Disabled ' + $current.attr("data-name"),
                        type: 'success'
                    })
                }
            })
        }
        else if($current.hasClass('btn-danger')){
            $current.removeClass("btn-danger").addClass("btn-success");
            $current.html("Enable");
            $.ajax({
                url: "../../pages/admin/process/checkInclusion.php",
                type: 'POST',
                data: {
                    InclusionID : $current.attr("data-inclusion"),
                },
                success : function(){
                    Toast.fire({
                        title: 'Successfully Enabled ' + $current.attr("data-name"),
                        type: 'success'
                    })
                }
            })
        }
    });
    $('.buttonEdit').click(function(){
        let $ID = $(this).attr('data-inclusion');
        let span = $('#span' + $ID);
        let input = document.getElementById('input'+$ID);
        let data = $(this).attr('data-name');
        var updated = input.value;
        if(span.hasClass('d-none')){
            span.removeClass('d-none');
            input.type = 'hidden';
            span.html(updated);
        }
        else{
            span.addClass('d-none');
            input.type = 'text';
            input.value = data;
        }

        if($(this).hasClass('btn-info')){
            $(this).removeClass('btn-info').addClass('btn-success');
            $(this).html('Done');
        }else if( $(this).hasClass('btn-success')){
            $(this).removeClass('btn-success').addClass('btn-info');
            $(this).html('Edit');
            $.ajax({
                url: '../../pages/admin/process/checkInclusion.php',
                type: 'POST',
                data: {
                    id: $ID,
                    update : updated,
                },
                success : function(){
                    Toast.fire({
                        title: "Successfully Updated",
                        type: 'info'
                    })
                }
            })
        }
    });
    $('.deleteButton').click(function(){
        let ID = $(this).attr('data-id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: '../../pages/admin/process/checkInclusion.php',
                    type: 'POST',
                    data: {
                        delete: ID,
                    },
                    success : function (){
                        Swal.fire(
                            'Deleted!',
                            'Successfully deleted.',
                            'success'
                          ).then(()=> {
                              window.location.reload(1);
                          });
                    }
                });
              
            }
          });
    });
});
    
}
// Use badge badge-danger
if(uri == 'pck-mgmt'){
    
    $('#packageList').DataTable({
        paging: false,
        responsive: true
    });
    var markers = [],
        start = [],
        EndTra = [],
        end = [],
        waypts = [],
        directionService,
        directionRenderer,
        Toast,
        ItineraryMap;
    $(function(){
        Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 2000
        });
    });
    function calculateAndDisplayRoute(directionService, directionRenderer){
        directionService.route(
            {
                origin: "Binondo Manila, 1006 Metro Manila",
                destination: end,
                waypoints: waypts,
                optimizeWaypoints: false,
                travelMode: google.maps.TravelMode.DRIVING,
            },
            (response, status) =>{
                if(status == "OK"){
                    directionRenderer.setDirections(response);
                }
            }
        )
    }
    function viewAndDisplay(directionService,directionRenderer,OrgStart,OrgEnd){
        directionService.route(
            {
                origin: OrgStart,
                destination: OrgEnd,
                travelMode: google.maps.TravelMode.DRIVING,
            },
            (response, status) =>{
                if(status == "OK"){
                    directionRenderer.setDirections(response);
                }
            }
        )
    }
    function initMap(){
        directionService = new google.maps.DirectionsService();
        directionRenderer = new google.maps.DirectionsRenderer()
        map = new google.maps.Map(document.getElementById("map"),{
            center: {lat: 12.8797, lng: 121.7740},
            zoom: 14
        });
        ItineraryMap = new google.maps.Map(document.getElementById("mapDirect"),{
            center: {lat: 12.8797, lng: 121.7740},
            zoom: 14
        });
        directionRenderer.setMap(map);
    }
    function IterinaryUpdate(ID,UpdateData){
        let y = "";
        UpdateData.forEach(x => {
            y += x + "|";
        });
        $.ajax({
            url: '../../pages/admin/process/editIterinary.php',
            type: 'POST',
            data: {
                updateID : ID,
                updateData : y
            },
            error: function(xhs, status, code){
                console.log(xhs,status,code);
            },
            complete: function(){
                IterinaryView(ID);
                Toast.fire({
                    title: 'Successfuly Updated',
                    type: 'success'
                });
            }
        });
    }
    function IterinaryView(ID){
        $.ajax({
            url: '../../pages/admin/process/editIterinary.php',
            type: 'POST',
            data : {
                dataID: ID,
            },
            dataType: 'JSON',
            success : function(x){
                let y = JSON.parse(JSON.stringify(x));
                let parent = $('#iterinary');
                let ctr = 0;
                EndTra = [];
                start = [];
                waypts = [];
                start.push("Binondo Manila 1006 Metro Manila");
                EndTra.push("Binondo Manila 1006 Metro Manila");
                parent.empty();
                y.forEach(z => {
                    if(y.length != (ctr+1)){
                        waypts.push({
                            location: new google.maps.LatLng(parseFloat(z.location_latitude), parseFloat(z.location_longhitude)),
                            stopover: true,
                        });
                    }else{
                        end = new google.maps.LatLng(parseFloat(z.location_latitude), parseFloat(z.location_longhitude));
                    }
                    let child = '<div class="alert alert-info" id="'+z.location_id+'">' +
                    '<button type="button" class="close locationBtn"  location-start="'+ ctr +'" location-end="'+(ctr+1)+'"><i class="fas fa-eye"></i></button>'
                    +'<h5>' + z.location_name +'</h5>' 
                    +'</div>';
                    parent.append(child);
                    
                    EndTra.push(new google.maps.LatLng(parseFloat(z.location_latitude),parseFloat(z.location_longhitude)));
                    start.push(new google.maps.LatLng(parseFloat(z.location_latitude),parseFloat(z.location_longhitude)));
                    ctr++;
                });
                calculateAndDisplayRoute(directionService,directionRenderer);
            },
            error : function(xhs, status, code){
                console.log("ERROR : " + xhs + " " + status + " " + code);
            }
        });
    }
    $('.btnEdit').click(function(){
        let PackageID = $(this).attr('data-id');
        IterinaryView(PackageID);
        $('#IterinaryEdit').modal('toggle');
        $('#iterinary').sortable({
            update: function(event, ui){
                var order = $(this).sortable('serialize');
                var r = $('#iterinary').sortable('toArray');
                var a = $('#iterinary').sortable('serialize',{
                    attribute: "id"
                });
                IterinaryUpdate(PackageID, r);
            }
        });
    });
    
    $('#iterinary').disableSelection();

    $('#iterinary').delegate('.locationBtn', 'click', function(){
        let x = $(this).attr('location-start');
        let y = $(this).attr('location-end');
        viewAndDisplay(directionService,directionRenderer, start[x], EndTra[y]);
    });
    $(function(){
        $.ajax({
            url: '../../pages/admin/process/checkInclusion.php?fetch',
            type: 'GET',
            dataType: 'JSON',
            success: function(x){
                inclusionEdit = JSON.parse(JSON.stringify(x));
                $('#Inclusion').select2({
                    data : x,
                    minimumResultsForSearch: 5
                })
            }
        });
    });
    function getSelectedInclusion(inclusion){
        let y = inclusion.slice(0,-1);
        let x = y.split("|");
        $('option').removeAttr('selected');
        x.forEach(z => {
            $('option[value="'+z+'"]').attr('selected', 'true');
        });
    }
    
    $('.btnPackage').click(function(){
        let $ID = $(this).attr('data-id');
        $.ajax({
            url: '../../pages/admin/process/apiRemovePackage.php',
            type: 'POST',
            dataType: 'JSON',
            data: {
                fetchID : $ID
            },
            success : function(x){
                let z = JSON.parse(JSON.stringify(x));
                $('#PackageName').val(z.package_name);
                $('#Price').val(z.package_price);
                $('#Inclusion').select2('destroy');
                getSelectedInclusion(z.package_inclusion);
                $('#Inclusion').select2();
                $('#PackageDescription').summernote('destroy');
                $('#PackageDescription').html(z.package_description);
                $('#PackageDescription').summernote({
                    height: 180,
                    toolbar: [
                        ['style', ['bold', 'italic', 'underline', 'clear']],
                        ['font', ['strikethrough', 'superscript', 'subscript']],
                        ['fontsize', ['fontsize']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['height', ['height']]
                        ],
                });
                $('#AddPackage').attr("data-id", $ID);
                $('#EditPackage').modal('toggle');
            },
            error : function(xhs, status, code){
                console.log(xhs,status,code);
            }
        });
    });
    $('#LocationPhoto').imageUploader();
    // Create Iterinary
    $('#AddPackage').click(function(){
        Swal.fire({
            title: 'Save Changes?',
            text: 'This will update the current package.',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Save Changes'
        }).then((result) =>{
            if(result.value){
                $('#EditLoad').removeClass('d-none').addClass('d-flex');
                let UpdateData = new FormData();
                UpdateData.append("packageName", $('#PackageName').val().trim());
                UpdateData.append("packagePrice", $('#Price').val().trim());
                UpdateData.append("description", $('#PackageDescription').val());
                UpdateData.append("UpdateID", $(this).attr('data-id'));
                let inclusion = $('#Inclusion').val();
                let totalImages = document.getElementById('uploadCustom').files.length;
                if(totalImages != 0){
                    for(let i = 0; i < totalImages; i++){
                        UpdateData.append("files[]", document.getElementById('uploadCustom').files[i]);
                    }
                }
                inclusion.forEach(x => {
                    UpdateData.append("inclusion[]",x);
                });
                $.ajax({
                    url: '../../pages/admin/process/apiRemovePackage.php',
                    type: 'POST',
                    data: UpdateData,
                    processData: false,
                    contentType: false,
                    error : function(xhs, status, code){
                        console.log(xhs, status, code);
                    },
                    complete: function(){
                        Swal.fire({
                            title: 'Successfully Updated',
                            type: 'success'
                        }).then(() =>{
                            window.location.reload(1);
                        });
                    }
                });
            }
        });
    });
    // Iterinary Creation
    var dayCount = 1;
    var btn = $('.btnCreate').click(function(){
        let $ID = $(this).attr('data-id');
        $('#DataIterinary').empty();
        $.ajax({
            url: '../../pages/admin/process/apiRemovePackage.php',
            type: 'POST',
            dataType: 'JSON',
            data: {
                checkIterinary : $ID,
            },
            success: function(x){
                let z = JSON.parse(JSON.stringify(x));
                if(z.length === 0){
                    GenerateNewConfig($ID);
                }else{
                    InitializeIterinaryView($ID);
                }
            },
            error : function(xhs, status, code){
                console.log(xhs, status, code);
            }
        });
    });
    
    function GenerateNewConfig(ID){
        $('#IterinaryCreate').modal('toggle');
        let overlay = $('#iterinaryOverlay').hasClass('d-flex');
        if(overlay){
            $('#iterinaryOverlay').removeClass('d-flex').addClass('d-none');
        }
        $.ajax({
            url:'../../pages/admin/process/apiRemovePackage.php',
            type: 'POST',
            dataType: 'JSON',
            data: {
                fetchID: ID
            },
            success : function(x){
                let y = JSON.parse(JSON.stringify(x));
                let rawLocation = y.package_tours.slice(0, -1);
                let location = rawLocation.split("|");
                let content = '<form id="ConfigSubmit">' + 
                    '<div class="card card-default">' + 
                        '<div class="card-header">' + 
                            '<h3>Iterinary Config</h3>' +
                        '</div>'+
                        '<div class="card-body justify-content-center row" id="configIterinary">' +
                        '</div>'+
                        '<div class="card-footer">' +
                            '<button type="sumbit" class="btn btn-md btn-success float-right">Confirm</button>' +
                        '</div>' +
                    '</div>'+
                '</form>';
                $('#DataIterinary').append(content);
                location.forEach(LocationID => {
                    
                    GenerateConfigLocation(LocationID);
                });
                $('#ConfigSubmit').submit(function(e){
                    e.preventDefault();
                    $('#iterinaryOverlay').removeClass('d-none').addClass('d-flex');
                    let x = $('input[data-input="value"]');
                    let w = [];
                    let form = new FormData();
                    for(let i = 0; x.length > i; i++){
                        let locationID = x[i].id;
                        let value = x[i].value;
                        if(value > 0){
                            w.push({
                                ID: parseInt(locationID),
                                day: parseInt(value)
                            });
                        }
                    }
                    let convert = JSON.stringify(w);
                    $.ajax({
                        url: '../../pages/admin/process/apiRemovePackage.php',
                        type: 'POST',
                        data: {
                            data : convert,
                            packageID : ID
                        },
                        error : function(xhs, status, code){
                            console.log(xhs,status,code);
                            
                        },
                        complete: function(){
                            $('#IterinaryCreate').modal('dispose');
                            InitializeIterinaryView(ID);
                        }
                    });
                    
                });
            },
            error : function(xhs, status, code){
                console.log(xhs, status, code);
            }
        })
    }
    function InitializeIterinaryView(ID){
        
        $('#DataIterinary').empty();
        $('#IterinaryCreate').modal('show');
        
        let overlay = $('#iterinaryOverlay').hasClass('d-flex');
        if(overlay){
            $('#iterinaryOverlay').removeClass('d-flex').addClass('d-none');
        }
        $.ajax({
            url: '../../pages/admin/process/apiRemovePackage.php',
            type: 'POST',
            dataType: 'JSON',
            data: {
                fetchID : ID
            },
            success : function(x){
                let y = JSON.parse(JSON.stringify(x));
                let rawLocation = y.package_tours.slice(0, -1);
                let location = rawLocation.split("|");
                location.forEach($ID => {
                    GenerateLocation($ID,ID);
                });
            },
            error: function(xhs, status, code){
                console.log("Error Occured In fetchin Tours : " + status + " " + code);
            }
        });
    }
    function GenerateConfigLocation(ID){
        
        $.ajax({
            url: '../../pages/admin/process/apiRemovePackage.php',
            type: 'POST',
            dataType: 'JSON',
            data: {
                generateID: ID,
            },
            success: function(x){
                let y = JSON.parse(JSON.stringify(x));
                let content = '<div class="col-md-4">' + 
                    '<div class="form-group ">' +
                        '<label>' + y.location_name + '</label>' +
                        '<input type="number" class="form-control" data-input="value"  id="'+ y.location_id + '" placeholder="Days" required>' + 
                    '</div>'
                '</div>'
                $(content).appendTo('#configIterinary');
            },
            error : function(xhs, status, code){
                console.log(xhs, status, code);
            }
        });
    }
    
    function GenerateIterinaryDetails(ID,packageID){
        
        $.ajax({
            url: '../../pages/admin/process/apiRemovePackage.php',
            type: 'POST',
            dataType: 'JSON',
            data: {
                fetchConfig: 1,
                location: ID,
                package: packageID
            },
            success: function(x){
                let y = JSON.parse(JSON.stringify(x));
                if(y == "False"){
                    let content = '<div class="callout callout-danger row">' +
                        '<div class="col-md-9">' +
                            '<h5>No Activities</h5>' +
                        '</div>' +
                    '</div>';
                    $(content).appendTo('#forLocation'+ ID);
                }else{
                    y.forEach(child => {
                        let type = child.type == 'None' ? '' : ' -- ' +child.type;
                        let content = '<div class="callout callout-success row">' +
                            '<div class="col-md-9" id="sub_'+ child.it_id +'">' +
                                '<h5>Day '+child.iterinary_day + type + '</h5>' +
                                '<p><b>'+child.iterinary_activity+'</b></p>'+
                                '<p>'+ timeConvert(child.iterinary_time) +'</p>' +
                            '</div>' +
                            '<div class="col-md-3">' + 
                                '<button class="btn btn-block btn-success add-subiti" data-id="'+ child.it_id +'" data-for="'+packageID+'" data-loc="'+ ID + '">Add Direction</button>' +
                                '<button class="btn btn-block btn-danger dlt-act" data-id="'+ child.it_id +'" data-for="'+packageID+'" data-loc="'+ ID + '">Remove</button>' +
                            '</div>' +
                        '</div>';
                        $(content).appendTo('#forLocation'+ ID);
                        GenerateSubIti(child.it_id);
                    });
                }
            },
            error: function(xhs, status, code){

            }
        });
        // let content = '<div class="callout callout-success row">' +
        //     '<div class="col-md-9">' +
        //         '<h5>Sample</h5>' +
        //         '<p><b>Sample Activities</b></p>'+
        //         '<p>Sample Time</p>' +
        //     '</div>' +
        //     '<div class="col-md-3">' + 
        //         '<button class="btn btn-block btn-success">Edit</button>' +
        //         '<button class="btn btn-block btn-danger">Remove</button>' +
        //     '</div>' +
        // '</div>';
        // let selectContent = '<option value="">Poop</option>'
        // $(content).appendTo('#forLocation'+ ID);
        // $(selectContent).appendTo('#option_' + ID);
    }
    function timeConvert(time){
        // Check correct time format and split into components
        time = time.toString ().match (/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [time];

        if (time.length > 1) { // If time format correct
            time = time.slice (1);  // Remove full string match value
            time[5] = +time[0] < 12 ? ' AM' : ' PM'; // Set AM/PM
            time[0] = +time[0] % 12 || 12; // Adjust hours
        }
        return time.join (''); // return adjusted time or original string
    }
    function GenerateSelectOption(package, location){
        $('#option_' + location).empty();
        dayCount = 1;
        $.ajax({
            url: '../../pages/admin/process/apiRemovePackage.php',
            type: 'POST',
            dataType: 'JSON',
            data: {
                fetchOption: 1,
                location: location,
                package: package
            },
            success: function(x){
                let y = JSON.parse(JSON.stringify(x));
                for (let i = 0; y > i;i++, dayCount++){
                    let selectContent = '<option value="' + dayCount + '">Day ' + dayCount + '</option>';
                    $(selectContent).appendTo('#option_' + location);
                    
                }
                let appendHeader = '<span class="mx-2">(For ' + y + ' days)</span>';
                $(appendHeader).appendTo('#header_' + location);
            },
            error: function(xhs, status, code){
                console.log(xhs,status,code);
            }
        });
        $.ajax({
            url: '../../pages/admin/process/apiRemovePackage.php',
            type: 'POST',
            dataType: 'JSON',
            data: {
                fetchType: 1
            },
            success: function(x){
                let y = JSON.parse(JSON.stringify(x));
                y.forEach(data => {
                    let option = '<option value="' + data.type_id + '">'+ data.type +'</option>';
                    $(option).appendTo('#type_' + location);
                });
            },
            error: function(xhs, status, code){
                console.log(xhs,status,code);
            }
        });
    }
    function GenerateLocation(locationID,packageID){
        $('#IterinaryCreate').modal('show');
        $('#DataIterinary').empty();
        let overlay = $('#iterinaryOverlay').hasClass('d-flex');
        if(overlay){
            $('#iterinaryOverlay').removeClass('d-flex').addClass('d-none');
        }
        $.ajax({
            url: '../../pages/admin/process/apiRemovePackage.php',
            type: 'POST',
            dataType: 'JSON',
            data: {
                generateID: locationID 
            },
            success: function(x){
                let y = JSON.parse(JSON.stringify(x));
                const locationContent = '<div class="card card-default">' +
                '<div class="card-header" id="itineraryTool_'+ y.location_id +'">' +
                  '<h3 class="card-title" id="header_' + y.location_id + '">' +
                    y.location_name +
                  '</h3>' +
                '</div>' +
                '<div class="card-body" id="CreateTimeline">'+
                '<div id="forLocation' + y.location_id + '">' +
                '</div>' +
                '<div class="row">' +
                    '<div class="input-group col-md-1 col-lg-2">' +
                        '<select class="form-control" id="option_'+ y.location_id +'">' +
                            
                        '</select>' + 
                    '</div>' +
                    '<div class="input-group col-md-2 col-lg-2">' +
                        '<select class="form-control" id="type_'+ y.location_id +'">' +
                            '<option value="0">Type of Activity</option>' +
                        '</select>' + 
                    '</div>' +
                  '<div class="input-group col-md-2 date" id="timepicker'+ y.location_id +'" data-target-input="nearest">'+
                  '<input type="text" id="datePick'+ y.location_id +'" class="form-control datetimepicker-input" data-target="#timepicker' + y.location_id + '">'+
                    '<div class="input-group-append" data-target="#timepicker'+y.location_id+'" data-toggle="datetimepicker">'+
                      '<span class="input-group-text"><i class="far fa-clock"></i></span>'+
                    '</div>'+
                  '</div>'+
                  '<div class="input-group col-md-3">' +
                        '<input type="text" class="form-control" id="Activity'+ y.location_id + '" placeholder="Activity" >' + 
                  '</div>' +
                  '<div class="input-group col-md-2">' +
                        '<button class="btn btn-block btn-success btnAddIterinary" data-id="'+ y.location_id + '" data-config="'+ packageID +'">Add</button>' + 
                  '</div>' +
                '</div>' +
                '</div>' +
                '</div>';
                $('#DataIterinary').append(locationContent);
                $('#timepicker' + y.location_id).datetimepicker({
                    datepicker: false,
                    format:'LT',
                    value: '8:00'
                });
                GenerateSelectOption(packageID,y.location_id);
                GenerateIterinaryDetails(y.location_id,packageID);

            },
            error : function(xhs,status,code){
                console.log("Error in Generating Location : " + status + " " + code);
            }
        });
    }
    let DirectPosition = [];
    $('#IterinaryCreate').delegate('.add-subiti', 'click', function(){
        $('#IterinaryCreate').modal('toggle');
        $('#DirectionSelector').modal('toggle');
        
        let loc = $(this).attr('data-loc');
        let itiID = $(this).attr('data-id');
        $.ajax({
            url: '../../pages/admin/process/apiRemovePackage.php',
            type: 'POST',
            dataType: 'JSON',
            data: {
                generateID: loc,
            },
            success: function(x){
                let y = JSON.parse(JSON.stringify(x));
                ItineraryMap.setCenter({
                    lat: parseFloat(y.location_latitude),
                    lng: parseFloat(y.location_longhitude)
                });
                let NewPos = {
                    lat: parseFloat(y.location_latitude),
                    lng: parseFloat(y.location_longhitude)
                };
                let infoWindow = new google.maps.InfoWindow({
                    content: "Click the map to get Lat/Lng!",
                    position: NewPos,
                });
                let StartPos,
                    PosCount = 0;
                infoWindow.open(ItineraryMap);
                ItineraryMap.addListener("click", (mapsMouseEvent) => {
                    infoWindow.close();
                    infoWindow = new google.maps.InfoWindow({
                        position: mapsMouseEvent.latLng,
                    });
                    if(PosCount == 0){
                        document.getElementById('LonghitudeStart').value = mapsMouseEvent.latLng.lng();
                        document.getElementById('LatitudeStart').value = mapsMouseEvent.latLng.lat();
                        infoWindow.setContent(
                            '<button class="btn btn-success btn-sm btnSet">Set Start</button>'
                        );
                        infoWindow.open(ItineraryMap);
                    }
                    else if(PosCount == 1){
                        document.getElementById('LonghitudeEnd').value = mapsMouseEvent.latLng.lng();
                        document.getElementById('LatitudeEnd').value = mapsMouseEvent.latLng.lat();
                        infoWindow.setContent(
                            '<button class="btn btn-info btn-sm btnSet">Set End</button>'
                        );
                        infoWindow.open(ItineraryMap);
                    }
                    StartPos = mapsMouseEvent.latLng;
                });
                $('#mapDirect').delegate('.btnSet','click',function(){
                    if(PosCount == 0 || PosCount == 1){ 
                        SetStartDirection(StartPos);
                    }
                    PosCount++;
                });
                $('.btnReset').click(function(){
                    $('#LonghitudeEnd').val("");
                    $('#LatitudeEnd').val("");
                    $('#LonghitudeStart').val("");
                    $('#LatitudeStart').val("");
                    DirectionReset();
                });
                $('.btnPlace').click(function(){
                    let locationE = $('#EndLocation').val();
                    let lngE = $('#LonghitudeEnd').val();
                    let latE = $('#LatitudeEnd').val();
                    let locationS = $('#StartLocation').val();
                    let lngS = $('#LonghitudeStart').val();
                    let latS = $('#LatitudeStart').val();
                    $.ajax({
                        url: '../../pages/admin/process/apiRemovePackage.php',
                        type: 'POST',
                        data: {
                            subIti: 1,
                            locS : locationS,
                            langS : lngS,
                            latiS : latS,
                            locE : locationE,
                            langE : lngE,
                            latiE : latE,
                            itiID : itiID
                        },
                        complete : function(){
                            $('#StartLocation').val("");
                            $('#EndLocation').val("");
                            $('#LonghitudeEnd').val("");
                            $('#LatitudeEnd').val("");
                            $('#LonghitudeStart').val("");
                            $('#LatitudeStart').val("");
                            DirectionReset();
                            $('#DirectionSelector').modal('toggle');
                            $('#IterinaryCreate').modal('toggle');
                            ReinitializeData(itiID)
                        }
                    });
                });
            }
        });
    });
    function GenerateSubIti(itineraryID){
        $.ajax({
            url: '../../pages/admin/process/apiRemovePackage.php',
            type: 'POST',
            dataType: 'JSON',
            data:{
                fetchSub: 1,
                SubID: itineraryID
            },
            success: function(x){
                let y = JSON.parse(JSON.stringify(x));
                y.forEach(child => {
                    let content =  '<div class="callout callout-success row">'+
                        '<div class="col-md-11">'+
                            '<h5>'+ child.sub_iti_name +'</h5>'+
                        '</div><div class="col-md-1"><button class="btn btn-sm btn-danger dlt-sub-act" data-custom=' + child.iti_id + ' data-id="'+ child.siti_id +'" ><i class="fas fa-trash-alt"></i></button></div>'+
                    '</div>';
                    $(content).appendTo('#sub_' + itineraryID);
                });
            }
        });
    }
    $('#IterinaryCreate').delegate('.dlt-sub-act','click', function(){
        let ID = $(this).attr('data-id');
        let ItiData = $(this).attr('data-custom');
        $.ajax({
            url: '../../pages/admin/process/apiRemovePackage.php',
            type: 'POST',
            data: {
                subDelete: 1,
                subID: ID
            },
            complete: function(){
                Swal.fire({
                    title: 'Successfully Deleted',
                    type: 'success'
                }).then(() =>{
                    ReinitializeData(ItiData);
                });
            }
        });
    });
    function ReinitializeData(ItID){
        $.ajax({
            url: '../../pages/admin/process/apiRemovePackage.php',
            type: 'POST',
            dataType: 'JSON',
            data:{
                reID: 1,
                ItID: ItID
            },
            success: function(x){
                let y = JSON.parse(JSON.stringify(x));
                let p = y.package_id;
                InitializeIterinaryView(p);
            },
            error: function(xhs, status, code){
                console.log(xhs, status, code);
            }
        })
    }
    function SetStartDirection(position){
        let marker = new google.maps.Marker({
            position: position,
            map: ItineraryMap
        });
        DirectPosition.push(marker);
    }
    function setMapOnAll(map) {
        for (let i = 0; i < DirectPosition.length; i++) {
          DirectPosition[i].setMap(map);
        }
    }
    function DirectionReset(){
        setMapOnAll(null);
        DirectPosition = [];
    }
    $('#IterinaryCreate').delegate('.dlt-act', 'click', function(){
        let id = $(this).attr('data-id');
        let package = $(this).attr('data-for');
        let location = $(this).attr('data-loc');
        $.ajax({
            url: '../../pages/admin/process/apiRemovePackage.php',
            type: 'POST',
            data: {
                dataDlt: id,
            },
            error : function(xhs, status, code){
                console.log("Error In Delete: " + " " + status + " " + code);
            },
            success: function(){
                $('#forLocation' + location).empty();
                GenerateIterinaryDetails(location,package);
            }
        });
    });
    $('#IterinaryCreate').delegate('.btnAddIterinary', 'click', function(){
        let config = $(this).attr('data-config');
        let location = $(this).attr('data-id');
        let day = $('#option_' + location).val();
        let type = $('#type_' + location).val();
        let time = $('#datePick' + location).val();
        let activity = $('#Activity' + location).val();
        $.ajax({
            url: '../../pages/admin/process/apiRemovePackage.php',
            type: 'POST',
            data: {
                insertData: 1,
                package: config,
                location: location,
                day: day,
                type: type,
                time: time,
                activity: activity
            },
            error: function(xhs, status, code){
                console.log(xhs, status, code);
            },
            success: function(){
                time = $('#datePick' + location).val("");
                activity = $('#Activity' + location).val("");
                $('#forLocation' + location).empty();
                InitializeIterinaryView(config);
            }
        });
    });
    $(".btnStatus").click(function(){
        let $ID = $(this).attr("data-id");
        $.ajax({
            url: '../../pages/admin/process/apiRemovePackage.php',
            type: 'POST',
            data: {
                toggleData : $ID,
            },
            error: function(xhs, status, code){
                console.log(xhs, status, code);
            },
            success: function(){
                let $this = $('#status_' + $ID);
                let $badge = $('#badge_' + $ID);
                if($this.hasClass("btn-danger")){
                    $this.removeClass("btn-danger").addClass("btn-success");
                    $this.html("Enable");
                    $badge.removeClass("badge-sucess").addClass("badge-danger");
                    $badge.html("Disabled");
                }else{
                    $this.removeClass("btn-success").addClass("btn-danger");
                    $this.html("Disable");
                    $badge.removeClass("badge-danger").addClass("badge-success");
                    $badge.html("Enabled");
                }
            }
        });
    });
    // Delete Package
    $('.btnDelete').click(function(){
        let $thisButton = $(this);
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: '../../pages/admin/process/apiRemovePackage.php',
                    type: 'POST',
                    data: {
                        DeletePackage: $thisButton.attr('data-id'),
                    },
                    success : function (){
                        Swal.fire(
                            'Deleted!',
                            'Successfully deleted.',
                            'success'
                          ).then(()=> {
                              window.location.reload(1);
                          });
                    }
                });
              
            }
          });
    });
}
if(uri == 'ctn-mgmt'){
    $(function(){
        var typingTime;
        var doneTypingInterval = 2000;
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 2000
        });
        $.ajax({
            url: '../../pages/admin/process/editContentMgmt.php?tac',
            dataType: 'JSON',
            success : function(y){
                let x = JSON.parse(JSON.stringify(y));
                $('#termAndConditionEdit').summernote('destroy');
                $('#termAndConditionEdit').html(x[0]);
                $('#termAndConditionEdit').summernote({
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
                    followingToolbar: false,
                    callbacks: {
                        onKeyup : function(){
                            clearTimeout(typingTime);
                            typingTime = setTimeout(saveChangesTAC,doneTypingInterval);
                        }
                    }
                });
            },
            error : function(xhs, status, code){
                console.log(xhs + " " + status + " " + code);
            }
        });
        $.ajax({
            url: '../../pages/admin/process/editContentMgmt.php?au',
            dataType: 'JSON',
            success : function(y){
                $('#aboutUsEdit').summernote('destroy');
                let x = JSON.parse(JSON.stringify(y));
                $('#aboutUsEdit').html(x[0]);
                $('#aboutUsEdit').summernote({
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
                    followingToolbar: false,
                    callbacks: {
                        onKeyup : function(){
                            clearTimeout(typingTime);
                            typingTime = setTimeout(saveChagesAU,doneTypingInterval);
                        }
                    }
                });
            }
        });
        function saveChagesAU(){
            let x = $('#aboutUsEdit').val();
            $.ajax({
                url: '../../pages/admin/process/editContentMgmt.php',
                type: 'POST',
                data: {
                    auPost: x
                },
                success : function(){
                    Toast.fire({
                        title: 'Saved Changes',
                        type: 'success'
                    })
                }
            });
        }
        function saveChangesTAC(){
            let x = $('#termAndConditionEdit').val();
            $.ajax({
                url: '../../pages/admin/process/editContentMgmt.php',
                type: 'POST',
                data : {
                    tacPost : x
                },
                success : function(){
                    Toast.fire({
                        title: 'Saved Changes',
                        type: 'success'
                    });
                }
            });
            
        }
    });
}
if(uri == 'rqst-mgmt'){
    $('#requestsTB').DataTable();
    var inclusionEdit = [];
    var $ID;
    $(function (){
        $.ajax({
            url: '../../pages/admin/process/checkInclusion.php?fetch',
            type: 'GET',
            dataType: 'JSON',
            success: function(x){
                inclusionEdit = JSON.parse(JSON.stringify(x));
                $('#inclusionEdit').select2({
                    data : x,
                    minimumResultsForSearch: 5
                })
            }
        })
    });
    $('.preview').click(function(){
        $ID = $(this).attr('data-preview');
        $.ajax({
            url : '../../pages/admin/process/previewRequest.php',
            type : 'POST',
            dataType: 'JSON',
            data : {
                RequestID : $ID,
            },
            success: function(x){
                let y = JSON.parse(JSON.stringify(x));
                showPreview(y.package_name, y.package_description,y.Inclusion, $ID);
            },
            error: function(xhs, status, code){
                alert(xhs + " " + status + " " + code);
            }
        });
    });
    $('.sam').click(function(){
        let s = $(this).attr('data-id');
        $.ajax({
            url: '../../pages/admin/process/apiRemovePackage.php',
            type: 'POST',
            data: {
                ID1: s
            },
            success: function(){
                window.location.reload(1);
            }
        })
    });
    $('.dec').click(function(){
        let s = $(this).attr('data-id');
        $.ajax({
            url: '../../pages/admin/process/apiRemovePackage.php',
            type: 'POST',
            data: {
                ID2: s
            },
            success: function(){
                window.location.reload(1);
            }
        })
    });
    $('.csam').click(function(){
        let s = $(this).attr('data-id');
        $.ajax({
            url: '../../pages/admin/process/apiRemovePackage.php',
            type: 'POST',
            data: {
                ID3: s
            },
            success: function(){
                //window.location.reload(1);
            }
        })
    });
    $('.cdec').click(function(){
        let s = $(this).attr('data-id');
        $.ajax({
            url: '../../pages/admin/process/apiRemovePackage.php',
            type: 'POST',
            data: {
                ID4: s
            },
            success: function(){
                window.location.reload(1);
            }
        })
    });
    function showPreview(packageName, description, inclusion){
        let y = inclusion.slice(0,-1);
        let x = y.split("|");
        x.forEach(z => {
            $('option[value="'+z+'"]').attr('selected', 'true');
            
        });
        $('#inclusionEdit').select2();
        $('#preview').modal('toggle');
        $('#PackageName').val(packageName);
        $('#PackageDescription').summernote('destroy');
        $('#PackageDescription').html(description);
        $('#PackageDescription').summernote({
            height: 180,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ],
        });
    }
    $('#preview-edit').submit(function(x){
        x.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "This Package Will Be Changed.",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.value) {
                let packageName = $('#PackageName').val();
                let packagePrice = $('#PackagePrice').val();
                let inclusion = $('#inclusionEdit').val();
                let description = $('#PackageDescription').val();
                console.log($ID);
                console.log(packageName);
                console.log(packagePrice);
                console.log(inclusion);
                console.log(description);
                // $.ajax({
                //     url: '../../pages/admin/process/apiRemovePackage.php',
                //     type: 'POST',
                //     data: {
                //         DeletePackage: $thisButton.attr('data-id'),
                //     },
                //     success : function (){
                //         Swal.fire(
                //             'Updated!',
                //             'Successfully Updated.',
                //             'success'
                //           ).then(()=> {
                //               window.location.reload(1);
                //           });
                //     }
                // });
              
            }
          });
    });
}
if(uri == 'edit-location'){
    $(function(){
        $('.btnDel').click(function(){
            let ID = $(this).attr('data-id');
            $.ajax({
                url: '../../pages/admin/process/apiRemovePackage.php',
                type: 'POST',
                data: {
                    LocationDelete: 1,
                    ID: ID
                },
                complete: function(){
                    window.location.reload(1);
                }
            });
        });
    });

}