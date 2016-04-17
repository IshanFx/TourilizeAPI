@extends('app')
@section('content')

<div id="page-wrapper" class="col-md-8 col-md-offset-1">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">
                    Steps <small></small>
                </h2>

            </div>
        </div>
        <div>
            <h4>Follow these step before work with the API</h4><br>
            <h5>1. First create User Account</h5>
            <h5>2. When creating Account It will return API key for Key. Remember that key.</h5>
            <h5>3. If you forget the API key go to main page and click get key button and enter email and password.
                It will return the API key.
            </h5>
            <h5>4. request data and get What you need. Please follow documentaion when do request</h5>
        </div>

        <br><br>
        <!-- /.row -->
        <div class="tokenAppend">

        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>


@endsection
