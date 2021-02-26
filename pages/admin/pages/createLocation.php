<?php
    include('process/upload.php');
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Location</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Add Location</li>
                        <li class="breadcrumb-item active">Tour Package</li>
                    </ol>
                </div>
            </div> 
        </div>
    </section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add Location</h3>
                    </div>
                    <form id="CreateLocation" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="LocationAddress">Location Name</label>
                                        <input type="text" name="locationAddress" class="form-control" id="LocationAddress" placeholder="Address" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="Longhitude">Longhitude</label>
                                        <input type="text" class="form-control" name="longhitude" id="Longhitude" placeholder="Longhitude" readonly="readonly">
                                    </div>
                                    <div class="form-group">
                                        <label for="Latitude">Latitude</label>
                                        <input type="text" class="form-control" name="latitude" id="Latitude" placeholder="Latitude" readonly="readonly">
                                    </div>
                                    <div class="form-group">
                                        <label for="LocationPhoto">Photo</label>
                                        <div class="input-group">
                                            <div class="input-images" id="LocationPhoto" style="width: 100%">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Price">Package Price In USD</label>
                                        <input type="text" name="pricing" class="form-control" id="Price" placeholder="Price" required>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div id="map" style="height: 450px"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Inclusion</label>
                                        <select class="select2" name="inclusion[]" multiple="multiple" data-placeholder="Select an Inclusion" style="width: 100%;" autocomplete="off" required>
                                        </select>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                <div class="form-group">
                                    <label>Location Description</label>
                                    <textarea class="textarea" placeholder="Place some text here" name="description"
                                            style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
                                </div>
                                </div>
                            </div>
                        </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                <button class="btn btn-primary" type="submit" name="Add">Add Location</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBbSmW0o0udL-0Kkllfh2ntL72mIi6loC8&callback=initMap" defer></script>