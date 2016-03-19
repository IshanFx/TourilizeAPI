@extends('app')
@section('content')
    <?php
    $host = "http://api.tourilize.com";
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
                            If you need to grab the details of hotel for each district you can this request. Respose is same as mention above.
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

            </div>
            <!-- /.container-fluid -->

        </div>
@endsection