<!DOCTYPE html>
<html>
<head>
    <title>
        @yield('pageTitle')
    </title>

    <link href="https://fonts.googleapis.com/css?family=Lato|Roboto:100" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('css/my-styles.css')}}"/>

</head>
<body>
{{-- This is navigation--}}
<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#moje_manu"
                    aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="/" class="navbar-brand"><i class="fa fa-cogs" aria-hidden="true"></i> LaravelNewApp</a>
        </div>

        <div class="collapse navbar-collapse" id="moje_manu">
            <ul class="nav navbar-nav btn-xs">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Posts <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/posts">Post - List</a></li>
                        <li><a href="/posts/new">Post - Add new</a></li>

                    </ul>
                </li>
                <li><a href="/aboutus">About Us</a></li>
                <li><a href="/contact">Contact Us</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right btn-xs">
                <li><a href="/register"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Sign Up</a></li>
                <li><a href="/login"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a></li>
            </ul>
        </div>
    </div>
</nav>
{{-- End of navigation --}}
<div class="container">
    @yield('bodyContent')


    <div class="container">
        <footer>
            <p><i class="fa fa-copyright"></i> Page provided by <strong><a href="#">Pimpek Max</a></strong></p>
        </footer>
    </div>

</div>
<script type="text/javascript" src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/my-js.js')}}"></script>
</body>
</html>
