@extends('app')
@section('content')
<?php
    $host = "http://api.tourilize.com";
    $apiurlguiderfindall = $host."/guider/findall";
    $apiurlguiderfindid = $host."/guider/{id}";
    $apiurlguiderfindname  = $host."/guider/name/{name}";
    $apiurlguiderfindcategory = $host."/guider/category/{categoryname}";
?>
    <div id="page-wrapper" class="col-md-5 col-md-offset-1">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Guider API
                    </h1>
                </div>
            </div>

            <div class="row">

                <div class="row">

                    <div class="col-md-12">
                        <h4>
                            Guider Details
                        </h4>
                        <p >
                            Get the details of approved guiders' .Request url is mentioned bellow
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
                                {{ $apiurlguiderfindall }}
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
                            Guider Details By Id
                        </h4>
                        <p>
                            If you Know the guider ID you can use this request to grab data. Respose is same as mention above.
                        </p>
                        <table class="table table-bordered ">
                            <tr>
                                <th>Parameters</th>
                                <th>Description</th>
                                <th>type</th>
                            </tr>
                            <tr>
                                <td>ID</td>
                                <td>Add the guider ID</td>
                                <td>Text</td>
                            </tr>
                        </table>
                        <br>
                        <div class="well col-md-12 well-sm">
                            {{ $apiurlguiderfindid }}
                        </div>
                    </div>

                </div>

                <hr>

                <div class="row">
                    <div class="col-md-12">
                        <h4>
                            Guider Details By Name
                        </h4>
                        <p>
                            If you Know the guider name you can use this request to grab data. Respose is same as mention above.
                        </p>
                        <table class="table table-bordered ">
                            <tr>
                                <th>Parameters</th>
                                <th>Description</th>
                                <th>type</th>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>Add the guider name</td>
                                <td>Text</td>
                            </tr>
                        </table>
                        <br>
                        <div class="well col-md-12 well-sm">
                           {{ $apiurlguiderfindname }}
                        </div>
                    </div>

                </div>

                <hr>

                <div class="row">
                    <div class="col-md-12">
                        <h4>
                            Guider Details By Category
                        </h4>
                        <h5>
                            If you need to grab the details of guider which are belong to particular category,
                            <br>you can use this request. Respose is same as mention above.
                        </h5>
                        <table class="table table-bordered ">
                            <tr>
                                <th>Parameters</th>
                                <th>Description</th>
                                <th>type</th>
                            </tr>
                            <tr>
                                <td>Category</td>
                                <td>Add the guider category</td>
                                <td>Text</td>
                            </tr>
                        </table>
                        <br>
                        <div class="well col-md-12 well-sm">
                            {{ $apiurlguiderfindcategory }}
                        </div>
                    </div>

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
@endsection