<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.header')
</head>
<body class="@yield('body-class')">

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed"
                    data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://getbootstrap.com/examples/dashboard/#">Vocabulary</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="http://getbootstrap.com/examples/dashboard/#">Dashboard</a></li>
                <li><a href="http://getbootstrap.com/examples/dashboard/#">Settings</a></li>
                <li><a href="http://getbootstrap.com/examples/dashboard/#">Profile</a></li>
                <li><a href="http://getbootstrap.com/examples/dashboard/#">Help</a></li>
            </ul>
            <form class="navbar-form navbar-right">
                <input type="text" class="form-control" placeholder="Search...">
            </form>
        </div>
    </div>
</nav>


<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            @include('partials.menu')
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">@yield('page-header')</h1>

            @yield('content')

        </div>
    </div>
</div>

@include('partials/js/bottom')

</body>
</html>
