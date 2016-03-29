<html >
<head>
    <link href="{{ url('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ url('css/sb-admin.css') }}" rel="stylesheet">
    <link href="{{ url('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ url('css/app.css')}}" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Nunito:300' rel='stylesheet' type='text/css'>
    <title></title>
</head>
<body>
<div class="maintopic">
    <h2 >TouriLize API</h2>
</div>
<nav class="navbar navbar-default">
<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="index.html"></a>
</div>
<!-- Top Menu Items -->
<ul class="nav navbar-right top-nav">

    <li><a href="{{ url('/') }}">API Key</a></li>
    <li><a href="#">Demo</a></li>
    <li><a href="{{ url('doc/user') }}">Register</a></li>
    {{--<li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li>
                <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
            </li>
        </ul>
    </li>--}}
</ul>
</nav>
<div id="wrapper">
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    @include('sidenav')
    @yield('content')
</div>
{{--<script src="{{ asset('js/vendor/jquery.min.js')}}"  type="text/javascript"></script>
<script src="{{asset('js/vendor/what-input.min.js')}}"  type="text/javascript"></script>
<script src="{{asset('js/app.js')}}"  type="text/javascript"></script>
<script src="{{asset('js/foundation.min.js')}}"  type="text/javascript"></script>--}}




</body>
</html>