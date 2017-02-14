<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.header')
</head>
<body class="@yield('body-class')">

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">

            @yield('content')

        </div>
    </div>
</div>

@include('partials/js/bottom')

</body>
</html>
