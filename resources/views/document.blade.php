@extends('app')
@section('content')

        <div id="page-wrapper" class="col-md-8 col-md-offset-1">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">
                            Introduction <small>API</small>
                        </h2>

                    </div>
                </div>
                <div>
                    <h4>
                        This is a REST API which can use to develop application related tourism. As the API this provide better
                        feature to get details about places which the visit and hotels details, guiders details etc.
                    </h4>
                </div>
                <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal">
                    GET Key
                </button>
                <br><br>
                <!-- /.row -->
                <div class="tokenAppend">

                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Key</h4>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="useremail" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Password">
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" id="btnkey" class="btn btn-primary" data-dismiss="modal" >Get Key</button>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

        <script>
            $(document).ready(function(){

                $('#btnkey').click(function(){
                    var email = $('#useremail').val();
                    var pass = $('#password').val();
                    console.log(email);
                    console.log(pass);

                        $.ajax({
                            url:"{{ url('token/create') }}",
                            type: "POST",
                            dataType:"json",
                            data: {username:email,password:pass},
                            success: function (e) {
                                $('.tokenAppend').append(
                                    '<div class="alert alert-success" role="alert">Your Key : '+ e.token+'</div>'
                                );
                            }, error: function (e) {
                                console.log("error_sub_load!", e)
                            }
                        })


                });

            });

        </script>
@endsection
