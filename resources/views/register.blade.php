@extends('app')
@section('content')

    <div id="page-wrapper" class="col-md-9">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">
                        Register <small></small>
                    </h2>

                </div>
            </div>
            <div class="row">
                <div>
                    <div class="col-md-8 col-md-offset-2">
                        <form>
                            <div class="form-group">
                                <label for="exampleInputEmail1">First Name</label>
                                <input type="text" class="form-control" id="firstname" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Last Name</label>
                                <input type="text" class="form-control" id="lastname" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Email</label>
                                <input type="email" class="form-control" id="email" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="password" >
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-success" id="btnregister">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <br><br>
            <!-- /.row -->
            <div class="row">
                <div class="tokenAppend">

                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
    <!-- Modal -->

    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function(){

            $('#btnregister').click(function(){
                var email = $('#email').val();
                var pass = $('#password').val();
                var fname = $('#firstname').val();
                var lname = $('#lastname').val();

                console.log(email);
                console.log(pass);
                console.log(fname);
                console.log(lname);

                $.ajax({
                    url:"{{ url('user/create') }}",
                    type: "POST",
                    dataType:"json",
                    data: {username:email,password:pass,firstname:fname,lastname:lname},
                    success: function (e) {
                        $('.tokenAppend .alert').remove();
                        $('.tokenAppend').append(
                                '<div class="alert alert-success" role="alert">Your Token : '+ e.token+'</div>'
                        );
                    }, error: function (e) {
                        console.log("error_sub_load!", e)
                    }
                })


            });

        });

    </script>
@endsection
