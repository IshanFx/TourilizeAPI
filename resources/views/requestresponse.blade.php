@extends('app')
@section('content')

    <div id="page-wrapper" class="col-md-5 col-md-offset-1">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Request / Response code
                    </h1>
                </div>
            </div>
            <div class="row">

                <div class="row">
                    <div class="col-md-12">
                        <h4>Response</h4>
                        <p >
                            Each request are menctione in each section of the docuemnt.All the request are based on restful
                            principles. Accoring the function user can perform GET,POST,PUT,DELETE request if it available.
                            You can check each section to identify available request.
                        </p>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h4>Response</h4>
                        <p >
                            All the responses are JSON object or JSON array. Capable to use with any plateform which can
                            handle JSON.
                        </p>
                        <br>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
    </div>
@endsection