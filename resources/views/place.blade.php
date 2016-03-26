@extends('app')
@section('content')
    <?php
    $host = "http://api.tourilize.com";
    $apiurlplacefindall ="GET: ". $host . "/place/findall";
    $apiurlplacefindid = "GET: ". $host . "/place/{id}";
    $apiurlplacefindname = "GET: ". $host . "/place/name/{name}";
    $apiurlplacefinddistrict = "GET: ". $host . "/place/district/{districtname}";
    $apiurlplacefindcategory = "GET: ". $host . "/place/category/{categoryname}";
    $apiurlplacefindlatlong = "GET: ". $host . "/place/location/{latitude}/{longitude}/{count}";
    $apiurlplacecreate = "POST: ". $host . "/place/create";
    $apiurlplaceupdate = "POST: ". $host . "/place/{id}/update";

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
                        Create New Place
                    </h4>

                    <p>
                        You can submit the new visting place is the API doesn't have. Before submit please check whether the
                        all data can submit.
                    </p>
                    <br>
                    <table class="table table-bordered ">
                        <tr>
                            <th>Parameters</th>
                            <th>Description</th>
                            <th>Type</th>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>Add the place Name</td>
                            <td>Text</td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td>Add the place Description</td>
                            <td>Text</td>
                        </tr>
                        <tr>
                            <td>Climate</td>
                            <td>Add the place of place</td>
                            <td>Text</td>
                        </tr>
                        <tr>
                            <td>Category</td>
                            <td>Add the category related to place</td>
                            <td>Text</td>
                        </tr>
                        <tr>
                            <td>District</td>
                            <td>Add the district where place establish</td>
                            <td>Text</td>
                        </tr>
                        <tr>
                            <td>Latitude</td>
                            <td>Add the latitude coordinate of the place</td>
                            <td>Float</td>
                        </tr>
                        <tr>
                            <td>Longitude</td>
                            <td>Add the longitude coordinate of the place</td>
                            <td>Float</td>
                        </tr>
                    </table>

                    <div class="well col-md-12 well-sm">
                        {{ $apiurlplacecreate }}
                    </div>

                    <p>
                        Response to this request return this JSON Object.
                    </p>

                    <div class="well col-md-12 well-sm">
                       <p>
                           {<br><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;"Id" : "23",<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;"Name" : "Unawatuna",<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;"Description" : "This is Good Place to visit",<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;"Climate" : "Sunny",<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;"Category" : "Beach",<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;"District" : "Galle",<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;"Latitude" : "6.7890",<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;"Longitude" : "79.3245"<br><br>
                            }
                        </p>
                    </div>


                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-md-12 ">
                    <h4>
                        Update Place Details By Id
                    </h4>

                    <p>
                       You can Update current place details. But you cannot update every values.only <br>
                        discription,climate and category can update.

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
                        <tr>
                            <td>Description</td>
                            <td>Description of place </td>
                            <td>Text</td>
                        </tr>
                        <tr>
                            <td>Category</td>
                            <td>Category of place</td>
                            <td>Text</td>
                        </tr>
                        <tr>
                            <td>Climate</td>
                            <td>Climate of place</td>
                            <td>Text</td>
                        </tr>

                    </table>

                    <div class="well col-md-12 well-sm">
                        {{ $apiurlplaceupdate }}
                    </div>
                </div>

            </div>

            <hr>

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
                        Response to this request return this JSON Array of data.
                    </p>

                    <div class="well col-md-12 well-sm">
                        <p>
                            [<br>
                            &nbsp;&nbsp;{<br><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;"Id" : "1",<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;"Name" : "Yaala",<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;"Description" : "This is Good Place to visit",<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;"Climate" : "Sunny",<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;"Category" : "Forest",<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;"District" : "Dambulla",<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;"Latitude" : "6.7890",<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;"Longitude" : "79.3245"<br><br>
                            &nbsp;&nbsp;},<br>
                            &nbsp;&nbsp;{<br><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;"Id" : "23",<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;"Name" : "Unawatuna",<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;"Description" : "This is Good Place to visit",<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;"Climate" : "Sunny",<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;"Category" : "Beach",<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;"District" : "Galle",<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;"Latitude" : "6.7890",<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;"Longitude" : "79.3245"<br><br>
                            &nbsp;&nbsp;}<br>
                            ]
                        </p>
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
                        If you Know the place ID you can use this request to grab data. Respose is same as creating
                        new place.

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
                        If you Know the place name you can use this request to grab data.Respose is same as creating
                        new place.
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
                        Respose is same as creating new place.
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
                        <br>you can use this request.Respose is same as creating
                        new place..
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
                        latitude and longitude.<br>you can use this request.Respose is same as creating
                        new place..
                    </h5>

                    <br>
                    <table class="table table-bordered ">
                        <tr>
                            <th>Parameters</th>
                            <th>Description</th>
                            <th>Type</th>
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