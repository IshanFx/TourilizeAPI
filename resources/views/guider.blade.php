@extends('app')
@section('content')
<?php
    $host = "http://www.tourilize.com/api";
    $apiurlguidercreate ="POST : ". $host."/guider/create";
    $apiurlguiderupdate ="POST : ". $host."/guider/{id}/update";
    $apiurlguiderfindall ="GET : ". $host."/guider";
    $apiurlguiderfindid ="GET : ". $host."/guider/{id}";
    $apiurlguiderfindname  ="GET : ". $host."/guider/name/{name}";
    $apiurlguiderfindcategory ="GET : ". $host."/guider/category/{categoryname}";
    $apiurlguiderdelete ="DELETE : ". $host."/guider/{id}";
?>
    <div id="page-wrapper" class="col-md-8  col-md-offset-1">

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
                <div class="col-md-12">
                    <h4>
                        Add new Guider Details
                    </h4>
                    <p>
                        You can submit the new hotel details . Before submit please check whether the
                        all data is available.
                    </p>
                    <table class="table table-bordered ">
                        <tr>
                            <th>Parameters</th>
                            <th>Description</th>
                            <th>Type</th>
                            <th>Required</th>
                        </tr>
                        <tr>
                            <td>FirstName</td>
                            <td>Add the First Name</td>
                            <td>Text</td>
                            <td>Yes</td>
                        </tr>
                        <tr>
                            <td>LastName</td>
                            <td>Add the last name </td>
                            <td>Text</td>
                            <td>Yes</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>Add the address of the guider</td>
                            <td>Text</td>
                            <td>Yes</td>
                        </tr>
                        <tr>
                            <td>Telephone</td>
                            <td>Add the telephone number of guider</td>
                            <td>Number</td>
                            <td>Yes</td>
                        </tr>
                        <tr>
                            <td>NIC</td>
                            <td>Add the NIC  of guider</td>
                            <td>Text</td>
                            <td>Yes</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>Add the email address of guider</td>
                            <td>Text</td>
                            <td>Yes</td>
                        </tr>

                    </table>
                    <br>
                    <div class="well col-md-12 well-sm">
                        {{ $apiurlguidercreate }}
                    </div>
                    <p>
                        Response to this request return this JSON Object.
                    </p>

                    <div class="well col-md-12 well-sm">
                        <p>
                            {<br><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;"Id" : "23",<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;"FirstName" : "Lahiru ",<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;"LastName" : "Pasan",<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;"Telephone" : "0712445234",<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;"Address" : "No 5 , Kandy",<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;"Email" : "lahirup@gmail.com",<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;"NIC" : "8912372347v",<br><br>

                            }
                        </p>
                    </div>
                </div>

            </div>

            <hr>

            <div class="row">
                <div class="col-md-12">
                    <h4>
                        Remove Guider Details
                    </h4>
                    <p>
                        You can remove the guider using the guider ID
                    </p>
                    <table class="table table-bordered ">
                        <tr>
                            <th>Parameters</th>
                            <th>Description</th>
                            <th>Type</th>
                            <th>Required</th>
                        </tr>
                        <tr>
                            <td>ID</td>
                            <td>Add the guider ID</td>
                            <td>Text</td>
                            <td>Yes</td>
                        </tr>


                    </table>
                    <br>
                    <div class="well col-md-12 well-sm">
                        {{ $apiurlguiderdelete }}
                    </div>
                    <p>
                        Response to this request is guider's id.
                    </p>

                    <div class="well col-md-12 well-sm">
                        <p>
                            {<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;"Id" : "23"<br>
                            }
                        </p>
                    </div>
                </div>

            </div>

            <hr>

            <div class="row">
                <div class="col-md-12">
                    <h4>
                        Update Guider Details By Id
                    </h4>
                    <p>
                        You can Update guider details. But you cannot update every values.only <br>
                        address,telephone,email and category can update.
                    </p>
                    <table class="table table-bordered ">
                        <tr>
                            <th>Parameters</th>
                            <th>Description</th>
                            <th>Type</th>
                            <th>Required</th>

                        </tr>
                        <tr>
                            <td>ID</td>
                            <td>Add the guider ID</td>
                            <td>Text</td>
                            <td>Yes</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>Add the address of the guider</td>
                            <td>Text</td>
                            <td>Yes</td>
                        </tr>
                        <tr>
                            <td>Telephone</td>
                            <td>Add the telephone number of guider</td>
                            <td>Number</td>
                            <td>Yes</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>Add the email address of guider</td>
                            <td>Text</td>
                            <td>Yes</td>
                        </tr>
                    </table>
                    <br>
                    <div class="well col-md-12 well-sm">
                        {{ $apiurlguiderupdate }}
                    </div>
                </div>

            </div>

            <hr>

                <div class="row">

                    <div class="col-md-12">
                        <h4>
                            Guider Details
                        </h4>
                        <p >
                            Get the details of approved guiders' .Request url is mentioned bellow
                        </p>
                        <br>

                            <div class="well col-md-12 well-sm">
                                {{ $apiurlguiderfindall }}
                            </div>

                        <p>
                            Response to this request return this JSON Array of datas.
                        </p>

                            <div class="well col-md-12 well-sm">
                                <p>
                                    [<br>
                                    &nbsp;&nbsp;{<br><br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;"Id" : "23",<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;"FirstName" : "Lahiru ",<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;"LastName" : "Pasan",<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;"Telephone" : "0712445234",<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;"Address" : "No 5 , Kandy",<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;"Email" : "lahirup@gmail.com",<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;"NIC" : "8912372347v",<br><br>
                                    &nbsp;&nbsp;},<br>
                                    &nbsp;&nbsp;{<br><br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;"Id" : "23",<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;"FirstName" : "Lahiru ",<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;"LastName" : "Pasan",<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;"Telephone" : "0712445234",<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;"Address" : "No 5 , Kandy",<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;"Email" : "lahirup@gmail.com",<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;"NIC" : "8912372347v",<br><br>
                                    &nbsp;&nbsp;}<br>
                                    ]
                                </p>
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
                            If you Know the guider ID you can use this request to grab data.
                            Respose is same as creating new guider.
                        </p>
                        <table class="table table-bordered ">
                            <tr>
                                <th>Parameters</th>
                                <th>Description</th>
                                <th>Type</th>
                                <th>Required</th>
                            </tr>
                            <tr>
                                <td>ID</td>
                                <td>Add the guider ID</td>
                                <td>Text</td>
                                <td>Yes</td>
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
                            If you Know the guider name you can use this request to grab data.
                            Respose is same as creating new guider.
                        </p>
                        <table class="table table-bordered ">
                            <tr>
                                <th>Parameters</th>
                                <th>Description</th>
                                <th>Type</th>
                                <th>Required</th>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>Add the guider name</td>
                                <td>Text</td>
                                <td>Yes</td>
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
                            <br>you can use this request. Respose is same as creating new guider.
                        </h5>
                        <table class="table table-bordered ">
                            <tr>
                                <th>Parameters</th>
                                <th>Description</th>
                                <th>Type</th>
                                <th>Required</th>
                            </tr>
                            <tr>
                                <td>Category</td>
                                <td>Add the guider category</td>
                                <td>Text</td>
                                <td>Yes</td>
                            </tr>
                        </table>
                        <br>
                        <div class="well col-md-12 well-sm">
                            {{ $apiurlguiderfindcategory }}
                        </div>
                    </div>

                </div>
                <!-- /.row -->


            <!-- /.container-fluid -->

        </div>
@endsection