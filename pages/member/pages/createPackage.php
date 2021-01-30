
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Package</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Tour Package</li>
                        <li class="breadcrumb-item active">Create Package</li>
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
                        <h3 class="card-title">Create Package</h3>
                    </div>
                    <form id="CreatePackage" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="PackageName">Package Name</label>
                                        <input type="text" name="PackageName" class="form-control" id="PackageName" placeholder="Address" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="LocationPhoto">Photo</label>
                                        <div class="input-group">
                                            <div class="input-images" id="LocationPhoto" style="width: 100%">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Tours">Tours</label>
                                        <table id="locationView" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Location</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php include("../../pages/admin/process/populateTable.php"); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div id="map"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Inclusion</label>
                                        <select class="select2" id="Inclusion" name="inclusion[]" multiple="multiple" data-placeholder="Select an Inclusion" style="width: 100%;" autocomplete="off" required>
                                        </select>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                <div class="form-group">
                                    <label>Location Description</label>
                                    <textarea class="textarea" id="PackageDescription" placeholder="Place some text here" name="description"
                                            style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
                                </div>
                                </div>
                            </div>
                        </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                <button class="btn btn-primary" type="submit" id="a" name="Add">Add Package</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBbSmW0o0udL-0Kkllfh2ntL72mIi6loC8&callback=initMap" defer></script>