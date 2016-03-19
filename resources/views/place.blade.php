@extends('app')
@section('content')
    <?php
    $host = "http://api.tourilize.com";
    $apiurlplacefindall = $host . "/place/findall";
    $apiurlplacefindid = $host . "/place/{id}";
    $apiurlplacefindname = $host . "/place/name/{name}";
    $apiurlplacefinddistrict = $host . "/place/district/{districtname}";
    $apiurlplacefindcategory = $host . "/place/category/{categoryname}";
    $apiurlplacefindlatlong = $host . "/place/location/{latitude}/{longitude}/{count}";

    ?>
    <div id="page-wrapper" class="col-md-5 col-md-offset-1">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Place API
                    </h1>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <h4>
                        Place Details
                    </h4>

                    <p>
                        Get the details of places you can visit.Request url is mentioned bellow
                    </p>
                    <br>

                    <div class="well col-md-12 well-sm">
                        {{ $apiurlplacefindall }}
                    </div>

                    <p>
                        Response to this request return this JSON Array of datas.
                    </p>

                    <div class="well col-md-12 well-sm">

                    </div>


                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-md-12 ">
                    <h4>
                        Place Details By Id
                    </h4>

                    <p>
                        If you Know the place ID you can use this request to grab data. Respose is same as mention
                        above.
                    </p>
                    <br>
                    <table class="table table-bordered ">
                        <tr>
                            <th>Parameters</th>
                            <th>Description</th>
                            <th>type</th>
                        </tr>
                        <tr>
                            <td>ID</td>
                            <td>Add the place ID</td>
                            <td>Number</td>
                        </tr>
                    </table>

                    <div class="well col-md-12 well-sm">
                        {{ $apiurlplacefindid }}
                    </div>
                </div>

            </div>

            <hr>

            <div class="row">
                <div class="col-md-12">
                    <h4>
                        Place Details By Name
                    </h4>

                    <p>
                        If you Know the place name you can use this request to grab data. Respose is same as mention
                        above.
                    </p>
                    <br>
                    <table class="table table-bordered ">
                        <tr>
                            <th>Parameters</th>
                            <th>Description</th>
                            <th>type</th>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>Add the place Name</td>
                            <td>Text</td>
                        </tr>
                    </table>
                    <div class="well col-md-12 well-sm">
                        {{ $apiurlplacefindname }}
                    </div>
                </div>

            </div>

            <hr>

            <div class="row">
                <div class="col-md-12">
                    <h4>
                        Place Details By District
                    </h4>

                    <p>
                        If you need to grab the details of visting places for each district you can this request.
                        Respose is same as mention above.
                    </p>
                    <br>
                    <table class="table table-bordered ">
                        <tr>
                            <th>Parameters</th>
                            <th>Description</th>
                            <th>type</th>
                        </tr>
                        <tr>
                            <td>District</td>
                            <td>Add the District Name</td>
                            <td>Text</td>
                        </tr>
                    </table>
                    <div class="well col-md-12 well-sm">
                        {{ $apiurlplacefinddistrict }}
                    </div>
                </div>

            </div>

            <hr>

            <div class="row">
                <div class="col-md-12">
                    <h4>
                        Place Details By Category
                    </h4>
                    <h5>
                        If you need to grab the details of visting places for each categories like heritage,beach,forest
                        etc.
                        <br>you can use this request. Respose is same as mention above.
                    </h5>

                    <br>
                    <table class="table table-bordered ">
                        <tr>
                            <th>Parameters</th>
                            <th>Description</th>
                            <th>type</th>
                        </tr>
                        <tr>
                            <td>Category</td>
                            <td>Add the place category Name</td>
                            <td>Text</td>
                        </tr>
                    </table>
                    <div class="well col-md-12 well-sm">
                        {{ $apiurlplacefindcategory }}
                    </div>
                </div>

            </div>

            <hr>

            <div class="row">
                <div class="col-md-12">
                    <h4>
                        Place Details based on Latitude and Longitude
                    </h4>
                    <h5>
                        If you need to get the details of visiting places near your current location you can use
                        this request.This request can use to get any number of visiting places based on providing
                        latitude and longitude.<br>you can use this request. Respose is same as mention above.
                    </h5>

                    <br>
                    <table class="table table-bordered ">
                        <tr>
                            <th>Parameters</th>
                            <th>Description</th>
                            <th>type</th>
                        </tr>
                        <tr>
                            <td>Latitude</td>
                            <td>Add longitude location</td>
                            <td>Text</td>
                        </tr>
                        <tr>
                            <td>Longitude</td>
                            <td>Add longitude location</td>
                            <td>Text</td>
                        </tr>
                        <tr>
                            <td>Count</td>
                            <td>Add no of result need</td>
                            <td>Number</td>
                        </tr>
                    </table>
                    <div class="well col-md-12 well-sm">
                        {{ $apiurlplacefindlatlong }}
                    </div>
                </div>

            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
@endsection