@extends('app')
@section('content')

    <div id="page-wrapper" class="col-md-8 col-md-offset-1">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Error Response
                    </h1>
                </div>
            </div>

            <div class="row">
                <div class="row">
                    <div class="col-md-12">

                        <p >
                           This is the response codes send by API id some error occure. Base on this error response
                            you can configure your code.
                        </p>
                        <br>
                            <table class="table table-bordered">
                                <tr>
                                    <th>Code</th>
                                    <th>Message</th>
                                </tr>
                                <tr>
                                    <td>200 OK</td>
                                    <td>Request success</td>
                                </tr>
                                <tr>
                                    <td>404 Not Found</td>
                                    <td>Request URI not found</td>
                                </tr>
                                <tr>
                                    <td>500 Internal Error</td>
                                    <td>Internal server error</td>
                                </tr>
                            </table>
                    </div>
                </div>





                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Security
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="row">
                    <div class="col-md-12">
                        <p>
                           As the main security feature we are maintaining key based authentication mechanism.
                            Each user have unique token. When request service user need to pass that key with URI.
                            Please flow 'steps' page to make learn how to make key.
                        </p>
                        <br>


                    </div>
                    <div class="well col-md-12 well-sm">
                        <p>http://tourilize.com/api/place/{YOUR_KEY}</p>
                    </div>
                </div>





                <!-- /.row -->

            </div>
        </div>
    </div>
@endsection