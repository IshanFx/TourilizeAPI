@extends('app')
@section('content')
<?php
$host = "http://api.tourilize.com";
$apiurlreviewfindid ="GET: ". $host . "/review/{placeid}";
$apiurlreviewcreate = "POST: ". $host . "/review/create";
?>
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
                <div class="col-md-12">
                    <h4>
                        Create New Review
                    </h4>

                    <p>
                        You can submit new review belong to perticular place. Before submit please check whether the
                        all data are available .
                    </p>
                    <br>
                    <table class="table table-bordered ">
                        <tr>
                            <th>Parameters</th>
                            <th>Description</th>
                            <th>Type</th>
                        </tr>
                        <tr>
                            <td>Place Id</td>
                            <td>Add the place Id </td>
                            <td>Text</td>
                        </tr>
                        <tr>
                            <td>Comment</td>
                            <td>Your review about place</td>
                            <td>Text</td>
                        </tr>
                        <tr>
                            <td>User</td>
                            <td>Name of the user who submit review</td>
                            <td>Text</td>
                        </tr>

                    </table>

                    <div class="well col-md-12 well-sm">
                        {{ $apiurlreviewcreate }}
                    </div>

                    <p>
                        Response to this request return this JSON Object.
                    </p>

                    <div class="well col-md-12 well-sm">
                        <p>
                            {<br><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;"Place Id" : "23",<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;"Comment" : "Good Place",<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;"User" : "Jason"<br><br>
                            }
                        </p>
                    </div>


                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-md-12">
                    <h4>
                        Review Details by Place Id
                    </h4>

                    <p>
                        Get the review of particular place based on it Id.Request url is mentioned bellow
                    </p>
                    <br>

                    <div class="well col-md-12 well-sm">
                        {{ $apiurlreviewfindid }}
                    </div>

                    <p>
                        Response to this request return this JSON data.
                    </p>

                    <div class="well col-md-12 well-sm">
                        <p>
                            [<br>
                            &nbsp;&nbsp;{<br><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;"Place Id" : "23",<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;"User" : "Jonathan",<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;"Comments" :
                            [<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"comment": "I visited Many time good place",<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"user": "Jonathen "<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;},<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"comment": "Beautiful Place",<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"user": "Krishan"<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;},<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"comment": "I visited Many time good place",<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"user": "Jonathen "<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}<br><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;]<br><br>
                            &nbsp;&nbsp;}<br><br>

                            ]
                        </p>
                    </div>


                </div>
            </div>

            <hr>
            <!-- /.container-fluid -->

        </div>
    </div>
@endsection