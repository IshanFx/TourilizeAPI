@extends('app')
@section('content')
    <?php
    $host = "http://api.tourilize.com";
    $apiurlhotelcreate = $host."/hotel/create";
    $apiurlhotelupdate = $host."/hotel/{id}/update";
    $apiurlhotelfindall = $host."/hotel/findall";
    $apiurlhotelfindid = $host."/hotel/{id}";
    $apiurlhotelfindname  = $host."/hotel/name/{name}";
    $apiurlhotelfinddistrict = $host."/hotel/district/{districtname}";
    ?>
    <div id="page-wrapper" class="col-md-5 col-md-offset-1">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Hotel API
                    </h1>
                </div>
            </div>

                <div class="row">
                <div class="col-md-12">
                    <h4>
                        Add new Hotel Details
                    </h4>
                    <p>
                        You can submit the new hotel details if the API doesn't have. Before submit please check whether the
                        all data can submit.
                    </p>
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
                            <td>Address</td>
                            <td>Add the address of the hotel</td>
                            <td>Text</td>
                        </tr>
                        <tr>
                            <td>Telephone</td>
                            <td>Add the telephone number of hotel</td>
                            <td>Number</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>Add the email address of hotel</td>
                            <td>Text</td>
                        </tr>
                        <tr>
                            <td>District</td>
                            <td>Add the district where hotel establish</td>
                            <td>Text</td>
                        </tr>
                        <tr>
                            <td>Latitude</td>
                            <td>Add the latitude coordinate of the hotel</td>
                            <td>Float</td>
                        </tr>
                        <tr>
                            <td>Longitude</td>
                            <td>Add the longitude coordinate of the hotel</td>
                            <td>Float</td>
                        </tr>
                    </table>
                    <br>
                    <div class="well col-md-12 well-sm">
                        {{ $apiurlhotelcreate }}
                    </div>
                    <p>
                        Response to this request return this JSON Object.
                    </p>

                    <div class="well col-md-12 well-sm">
                        <p>
                            {<br><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;"Id" : "23",<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;"Name" : "Lake Side",<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;"Description" : "Best Hotel",<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;"Telephone" : "0712445234",<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;"Address" : "No 5 , Kandy",<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;"Email" : "info@lakeside.com",<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;"District" : "Kandy",<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;"Latitude" : "6.7890",<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;"Longitude" : "79.3245"<br><br>
                            }
                        </p>
                    </div>
                </div>

            </div>

                <hr>

                <div class="row">
                <div class="col-md-12">
                    <h4>
                       Update Hotel Details By Id
                    </h4>
                    <p>
                        You can Update hotel details. But you cannot update every values.only <br>
                        name,address,telephone,description and email can update.
                    </p>
                    <table class="table table-bordered ">
                        <tr>
                            <th>Parameters</th>
                            <th>Description</th>
                            <th>type</th>
                        </tr>
                        <tr>
                            <td>ID</td>
                            <td>Add the hotel ID</td>
                            <td>Number</td>
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
                            <td>Address</td>
                            <td>Add the address of the hotel</td>
                            <td>Text</td>
                        </tr>
                        <tr>
                            <td>Telephone</td>
                            <td>Add the telephone number of hotel</td>
                            <td>Number</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>Add the email address of hotel</td>
                            <td>Text</td>
                        </tr>
                    </table>
                    <br>
                    <div class="well col-md-12 well-sm">
                        {{ $apiurlhotelupdate }}
                    </div>
                </div>

            </div>

                <hr>

                <div class="row">
                    <div class="col-md-12">
                        <h4>
                            Hotel Details
                        </h4>
                        <p >
                            Get the details of available hotels .Request url is mentioned bellow
                        </p>
                        <br>

                        <div class="well col-md-12 well-sm">
                            {{ $apiurlhotelfindall }}
                        </div>

                        <p>
                            Response to this request return this JSON Array of datas.
                        </p>

                            <div class="well col-md-12 well-sm">
                                <p>
                                    [<br>
                                    &nbsp;&nbsp;{<br><br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;"Id" : "2",<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;"Name" : "Lake Side",<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;"Description" : "Best Hotel",<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;"Telephone" : "0712445234",<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;"Address" : "No 5 , Kandy",<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;"Email" : "info@lakeside.com",<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;"District" : "Kandy",<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;"Latitude" : "6.7890",<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;"Longitude" : "79.3245"<br><br>
                                    &nbsp;&nbsp;},<br>
                                    &nbsp;&nbsp;{<br><br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;"Id" : "3",<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;"Name" : "Lake Side",<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;"Description" : "Best Hotel",<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;"Telephone" : "0712445234",<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;"Address" : "No 5 , Kandy",<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;"Email" : "info@lakeside.com",<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;"District" : "Kandy",<br>
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
                    <div class="col-md-12">
                        <h4>
                            Hotel Details By Id
                        </h4>
                        <p>
                            If you Know the hotel ID you can use this request to grab data. Respose is same as mention above.
                            Respose is same as creating new hotel.
                        </p>
                        <table class="table table-bordered ">
                            <tr>
                                <th>Parameters</th>
                                <th>Description</th>
                                <th>type</th>
                            </tr>
                            <tr>
                                <td>ID</td>
                                <td>Add the hotel ID</td>
                                <td>Number</td>
                            </tr>
                        </table>
                        <br>
                        <div class="well col-md-12 well-sm">
                           {{ $apiurlhotelfindid }}
                        </div>
                    </div>

                </div>

                <hr>

                <div class="row">
                    <div class="col-md-12">
                        <h4>
                            Hotel Details By Name
                        </h4>
                        <p>
                            If you Know the hotel name you can use this request to grab data. Respose is same as mention above.
                            Respose is same as creating new hotel.
                        </p>
                        <table class="table table-bordered ">
                            <tr>
                                <th>Parameters</th>
                                <th>Description</th>
                                <th>type</th>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>Add the hotel name</td>
                                <td>Text</td>
                            </tr>
                        </table>
                        <br>
                        <div class="well col-md-12 well-sm">
                            {{ $apiurlhotelfindname }}
                        </div>
                    </div>

                </div>

                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <h4>
                            Hotel Details By District
                        </h4>
                        <p>
                            If you need to grab the details of hotel for each district you can this request.
                            Respose is same as creating new hotel.
                        </p>
                        <table class="table table-bordered ">
                            <tr>
                                <th>Parameters</th>
                                <th>Description</th>
                                <th>type</th>
                            </tr>
                            <tr>
                                <td>District</td>
                                <td>Add the hotel district</td>
                                <td>Text</td>
                            </tr>
                        </table>
                        <br>
                        <div class="well col-md-12 well-sm">
                            {{ $apiurlhotelfinddistrict }}
                        </div>
                    </div>

                </div>
                <!-- /.row -->


            <!-- /.container-fluid -->

        </div>
@endsection