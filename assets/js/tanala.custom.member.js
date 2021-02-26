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
if(uri == null){
    $('.view').click(function(){
        let ID = $(this).attr('data-id');
        let current = window.location.href;
        $.ajax({
            url: '../../pages/member/process.member/process.view.php',
            type: 'POST',
            data: {
                Send: ID,
            },
            error: function(xhs, status, code){
                console.log(xhs, status, code);
            },
            complete: function(){
                if(window.location.pathname == '/pages/member/'){
                    window.location.href = current + 'index.php?page=view';
                }else{
                    window.location.href = current + '?page=view';
                }
            }
        })
    });
    
}
if(uri == 'snd-inquiry'){
    $('#sendInquiry').submit(function(e){
        e.preventDefault();
        let z = $('#subject').val();
        let y = $('#message').val();
        $.ajax({
            url: '../../pages/member/process.member/sendMessage.php',
            type: 'POST',
            data: {
                send: 1,
                title: z,
                message: y
            },
            success: function(){
                Swal.fire({
                    title: 'Send Successfully',
                    text: "You'll Recieve A Reply Within 3 Working Days",
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ok'
                }).then(() => {
                    window.location.reload(1);
                })
            },
            error: function(xhs, status, code){
                console.log(xhs,status, code);
            }
        })
    });
}
if(uri == 'snd-issue'){
    $('#sendIssue').submit(function(e){
        e.preventDefault();
        let z = $('#subject').val();
        let y = $('#message').val();
        $.ajax({
            url: '../../pages/member/process.member/sendMessage.php',
            type: 'POST',
            data: {
                sendIssue: 1,
                title: z,
                message: y
            },
            success: function(){
                Swal.fire({
                    title: 'Send Successfully',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ok'
                }).then(()=>{
                    window.location.reload(1);
                })
            },
            error: function(xhs, status, code){
                console.log(xhs,status, code);
            }
        })
    });
}
if(uri == 'view'){
    var markers = [],
        start = [],
        EndTra = [],
        end = [],
        waypts = [],
        directionService,
        directionRenderer,
        directionRendererIti,
        directionServiceIti,
        Toast;
    function initMap(){
        directionService = new google.maps.DirectionsService();
        directionRenderer = new google.maps.DirectionsRenderer()
        map = new google.maps.Map(document.getElementById("map"),{
            center: {lat: 12.8797, lng: 121.7740},
            zoom: 14
        });
        directionRenderer.setMap(map);
        directionServiceIti = new google.maps.DirectionsService();
        directionRendererIti = new google.maps.DirectionsRenderer();
        ItineraryMap = new google.maps.Map(document.getElementById("mapIterinary"),{
            center:{ lat: 12.8797, lng: 121.7740},
            zoom: 14
        });
        directionRendererIti.setMap(ItineraryMap);
    }
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
                let parent = $('#location');
                let dayDiv = $('#daysStay')
                let ctr = 0;
                EndTra = [];
                start = [];
                waypts = [];
                
                start.push("");
                EndTra.push("");
                parent.empty();
                dayDiv.empty();
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
    function GenerateDayDisplay(package,location){
        $.ajax({
            url: '../../pages/member/process.member/process.view.php',
            type: 'POST',
            dataType: 'JSON',
            data: {
                display: 1,
                package: package,
                location: location
            },
            success: function(x){
                let y = JSON.parse(JSON.stringify(x));
                return y.days;
            }
        });
    }
    $('#location').delegate('.locationBtn', 'click', function(){
        let x = $(this).attr('location-start');
        let y = $(this).attr('location-end');
        viewAndDisplay(directionService,directionRenderer, start[x], EndTra[y]);
    });
    $(function(){
        $.ajax({
            url : '../../pages/member/process.member/process.view.php',
            type: 'POST',
            dataType: 'JSON',
            data: {
                fetch: 1
            },
            error : function(xhs, status, code){
                
            },
            success: function(x){
                let y = JSON.parse(JSON.stringify(x));
                if(y[0] != 'true'){
                    let o = y.package_tours.slice(0,-1);
                    let x = o.split("|")
                    $('#packageName').html(y.package_name);
                    $('#breadCrumb').html(y.package_name);
                    $('#description').html(y.package_description);
                    $('#pricePack').html("PRICE: $"+y.package_price);
                    IterinaryView(y.package_id);
                    let prev = 0;
                    x.forEach(element => {
                        GenerateConfig(y.package_id,element);
                    });
                }else{
                    alert("Something Went Wrong");
                    window.location.href = window.location.origin + '/pages/member/';
                }
            }
        });
    });
    let configData = [];
    function GenerateConfig(package,location){
        $.ajax({
            url: '../../pages/member/process.member/process.view.php',
            type: 'POST',
            dataType: 'JSON',
            data: {
                fetchPackage: package,
                locationConfig: location
            },
            error: function(xhs, status, code){
                console.log(xhs, status, code);
            },
            success: function(x){
                let y = JSON.parse(JSON.stringify(x));
                    GenerateActivity(y.config_id);
                    configData.push(y.config_id);
                    // let day = '<div class="time-label">' +
                    //     '<span class="bg-red">Day '+ 
                    //     child.iterinary_day +  
                    //     '</span>'+
                    //     '</div>';
            }
        })
    }
    function GenerateActivity(config){
        $('#timeline').empty();
        $.ajax({
            url: '../../pages/member/process.member/process.view.php',
            type: 'POST',
            dataType: 'JSON',
            data: {
                configPackage: config,
            },
            error: function(xhs, status, code){
                console.log(xhs,status,code);
            },
            success: function(x){
                let y = JSON.parse(JSON.stringify(x));
                let prev = 0,
                    icon = "";
                y.forEach(child => {
                    if(prev != child.iterinary_day){
                        let day = '<div class="time-label">' +
                            '<span class="bg-red">Day '+ 
                            child.iterinary_day +  
                            '</span>'+
                            '</div>';
                        $('#timeline').append(day);
                        prev = child.iterinary_day;
                    }
                    switch(child.iterinary_type){
                        case '1':
                            icon = 'fa-plane-departure';
                            break;
                        case '2':
                            icon = 'fa-running';
                            break;
                        case '4':
                            icon = 'fa-building';
                            break;
                        case '5':
                            icon = 'fa-train';
                            break;
                        default:
                            icon = 'fa-running';
                            break;
                    }
                    let content = '<div id="sub_'+ child.it_id +'">'+
                    '<i class="fas '+icon+' bg-blue"></i>'+
                    '<div class="timeline-item">'+
                      '<span class="time"><i class="fas fa-clock"></i> '+ child.iterinary_time +'</span>'+
                      '<h3 class="timeline-header">'+child.iterinary_activity+'</h3>'+
                    '</div></div>';
                    $.ajax({
                        url: '../../pages/member/process.member/process.view.php',
                        type: 'POST',
                        dataType: 'JSON',
                        data: {
                            fetchSub: 1,
                            subID: child.it_id,
                        },
                        success: function(x){
                            let y = JSON.parse(JSON.stringify(x));
                            y.forEach(child2 =>{
                                let content2 = 
                                '<div class="timeline-item my-3 clickable-view" data-start-lat="' + child2.start_lat + '" data-start-lng="'+ child2.start_lng +'" data-end-lat="'+ child2.end_lat +'" data-end-lng="'+ child2.end_lng +'">'+
                                  '<h3 class="timeline-header">'+child2.sub_iti_name+'</h3>'+
                                '</div>';
                                $('#sub_' + child.it_id).append(content2);
                            });
                        }
                    });
                    $('#timeline').append(content);
                });
            }
        });
    }
    var markersIti = [];
    $('#timeline').delegate('.clickable-view', 'click', function(){
        let start_lat = $(this).attr('data-start-lat');
        let start_lng = $(this).attr('data-start-lng');
        let end_lat = $(this).attr('data-end-lat');
        let end_lng = $(this).attr('data-end-lng');
        if(start_lat != 0 && start_lat != null && start_lng != 0 && start_lat != null
            && end_lat != 0 && end_lat != null && end_lng != 0 && end_lat != null){
                directionRendererIti.setMap(ItineraryMap);
                viewAndDisplaySub(directionServiceIti,directionRendererIti,start_lat , start_lng, end_lat, end_lng);
                deleteItiMarkers();    
        }else{
            deleteItiMarkers();
            directionRendererIti.setMap(null);
            var markerIti = new google.maps.Marker({
                position: {
                    lat: parseFloat(start_lat),
                    lng: parseFloat(start_lng)
                },
                map: ItineraryMap,
            });
            markersIti.push(markerIti);
        }

    });
      function deleteItiMarkers() {
        for (let i = 0; i < markersIti.length; i++) {
            markersIti[i].setMap(null);
        }
        markersIti = [];
      }
    function viewAndDisplaySub(directionService,directionRenderer,OrgStartLat, OrgStartLng,OrgEndLat, OrgEndLng){
        let origin = new google.maps.LatLng(parseFloat(OrgStartLat),parseFloat(OrgStartLng));
        let end = new google.maps.LatLng(parseFloat(OrgEndLat),parseFloat(OrgEndLng));
        directionService.route(
            {
                origin: origin,
                destination: end,
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
    $(function(){
        
    });
    $('#reserve').click(function(){
        $('#configSet').empty();
        $('#ReservePackage').modal('toggle');
        // let content = '<form id="ConfigSubmit">' + 
        //             '<div class="card card-default">' + 
        //                 '<div class="card-header">' + 
        //                     '<h3>Config</h3>' +
        //                 '</div>'+
        //                 '<div class="card-body justify-content-center row" id="configIterinary">' +
        //                 '</div>'+
        //                 '<div class="card-footer">' +
        //                     '<button type="sumbit" class="btn btn-md btn-success float-right">Confirm</button>' +
        //                 '</div>' +
        //             '</div>'+
        //         '</form>';
        let content = '<div class="form-group">' +
        '<label>Reservation Date</label>' +

        '<div class="input-group">' +
          '<div class="input-group-prepend">' +
            '<span class="input-group-text"><i class="far fa-clock"></i></span>' +
          '</div>' +
          '<input type="text" class="form-control float-right" id="reservationtime">' +
        '</div>' +
      '</div><button class="btn btn-success btn-md" id="btnReserveDay">Confirm</button>';
        $('#configSet').append(content);
        let date = moment().format("YYYY-MM-DD");
        $('#reservationtime').daterangepicker({
            singleDatePicker: true,
            showDropdowns: false,
            minYear: 1901,
            maxYear: parseInt(moment().format('YYYY'),10)
          }, function(start, end, label) {
            date = start.format("YYYY-MM-DD");
          });
        $('#configSet').delegate('#btnReserveDay', 'click', function(){
            console.log(date);
            $.ajax({
                url: '../../pages/member/process.member/process.view.php',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    reserve: 1,
                    date: date
                },
                success: function(x){
                    console.log(x);
                    if(x[0] != 'X'){
                        window.location.reload(1);
                    }else{
                        Swal.fire("You're Already Reserved in this Package");
                    }
                }
            })
        });
    });
}
if(uri != 'view'){
    $(function(){
        $.ajax({
            url: '../../pages/member/process.member/process.view.php',
            type: 'POST',
            data: {
                remove: 1
            }
        });
    });
}
if(uri == 'create-tour'){
    var startDate,
        endDate,
        daysDiff;
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
        });
        $('#reservationtime').daterangepicker({
            minYear: 1901,
            maxYear: parseInt(moment().format('YYYY'),10)
          }, function(start, end, label) {
              startDate = start.format('YYYY-MM-DD');
              endDate = end.format('YYYY-MM-DD');
              let startD = moment(start.format('YYYY-MM-DD'));
              let endD = moment(end.format('YYYY-MM-DD'));
              daysDiff =  endD.diff(startD,'days');
          });
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
                  '<h5 class="description-header">$'+price+'/Day</h5>'+
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
        $('#ReservePackage').modal('toggle');
        selectedLocation.forEach(perLocation =>{
            $.ajax({
                url: '../../pages/member/process.member/process.view.php',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    fetchLoc: 1,
                    LocID: perLocation,
                },
                success: function(x){
                    let xx = JSON.parse(JSON.stringify(x));
                    let content = '<div class="col-md-4">' + 
                    '<div class="form-group">' +
                        '<label>' + xx.location_name + '</label>' +
                        '<input type="number" class="form-control" data-input="value"  id="'+ xx.location_id + '" placeholder="Days" required>' + 
                    '</div>' +
                '</div>';
                $('#configSet').append(content);
                },
                error : function (a,b,c){
                    console.log(a,b,c);
                }
            })
            
        });
        $('#config').submit(function(e){
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
                    let x = $('input[data-input="value"]');
                    let w = [];
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
                    let pname = $('#PackageName').val();
                    let convert = JSON.stringify(w);
                    $.ajax({
                        url: '../../pages/member/process.member/process.view.php',
                        type: 'POST',
                        data:{
                            insertCustom: 1,
                            config: convert,
                            dateS: startDate,
                            dateE: endDate,
                            pName: pname
                        },
                        success: function(){
                            window.location.reload(1);
                        },
                        error: function(a,b,c){
                            console.log(a,b,c);
                        }
                    })
                }
            });
        });
        
    });
    
}
if(uri == 'pending'){
    $(function(){
        $('#pending').DataTable();
    });
}
if(uri == 'tourHistory'){
    $(function(){
        $('#tourHis').DataTable();
    });
}