@extends('app')
@section('content')
<?php
    $host = "http://api.tourilize.com";
    $apiurlguiderfindall = $host."/guider/findall";
    $apiurlguiderfindid = $host."/guider/{id}";
    $apiurlguiderfindname  = $host."/guider/name/{name}";
    $apiurlguiderfindcategory = $host."/guider/category/{categoryname}";
?>
    <div id="page-wrapper" class="col-md-8">

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
                <div class="col-md-10">
                    <h4>
                        Guider Details
                    </h4>
                    <p >
                        Get the details of approved guiders' .Request url is mentioned bellow
                    </p>
                    <br>
                    <div class="row">
                        <div class="well col-md-10 well-sm">
                            {{ $apiurlguiderfindall }}
                        </div>
                    </div>
                    <p>
                        Response to this request return this JSON Array of datas.
                    </p>
                    <div class="row">
                        <div class="well col-md-10 well-sm">

                        </div>
                    </div>



                </div>

                <div class="row">
                    <div class="col-md-10">
                        <h4>
                            Guider Details By Id
                        </h4>
                        <p>
                            If you Know the guider ID you can use this request to grab data. Respose is same as mention above.
                        </p>
                        <br>
                        <div class="well col-md-10 well-sm">
                            {{ $apiurlguiderfindid }}
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-10">
                        <h4>
                            Guider Details By Name
                        </h4>
                        <p>
                            If you Know the guider name you can use this request to grab data. Respose is same as mention above.
                        </p>
                        <br>
                        <div class="well col-md-10 well-sm">
                           {{ $apiurlguiderfindname }}
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-10">
                        <h4>
                            Guider Details By Category
                        </h4>
                        <h5>
                            If you need to grab the details of guider which are belong to particular category,
                            <br>you can use this request. Respose is same as mention above.
                        </h5>

                        <br>
                        <div class="well col-md-10 well-sm">
                            {{ $apiurlguiderfindcategory }}
                        </div>
                    </div>

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
@endsection