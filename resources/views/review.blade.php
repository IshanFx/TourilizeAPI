@extends('app')
@section('content')

    <div id="page-wrapper" class="col-md-8 col-md-offset-1">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Place Review API
                    </h1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-10">
                    <h4>
                        Review Details
                    </h4>
                    <p >
                        Get the details of review for all places. This will return place details with review data
                        .Request url is mentioned bellow
                    </p>
                    <br>
                    <div class="row">
                        <div class="well col-md-10 well-sm">
                            http://api.tourilize.com/page/place
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
                            Review Details By Place ID
                        </h4>
                        <p>
                            If you Know the place ID you can use this request to grab data the review data to particular place
                            . Respose is same as mention above.
                        </p>
                        <br>
                        <div class="well col-md-10 well-sm">
                            http://api.tourilize.com/page/place
                        </div>
                    </div>

                </div>


                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
    </div>
@endsection