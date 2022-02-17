<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Vecation feast  </title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
   
    <!-- Styles -->
    <link rel="stylesheet" href="{{asset("node_modules/line-awesome/dist/line-awesome/css/line-awesome.min.css")}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">


    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet"> 
    <link rel="stylesheet" href="{{asset("node_modules/angular-material/angular-material.css")}}">

    <!--  Scripts -->
    <script src="{{asset("node_modules/angular/angular.js")}}"></script>
    <script src="{{asset("node_modules/angular-aria/angular-aria.js")}}"></script>
    <script src="{{asset("node_modules/angular-animate/angular-animate.js")}}"></script>
    <script src="{{asset("node_modules/angular-messages/angular-messages.js")}}"></script>
    <script src="{{asset("node_modules/angular-material/angular-material.js")}}"></script>
    <script src="{{asset("node_modules/angular-route/angular-route.js")}}"></script>
</head>
<body ng-app="myApp">
    @if ($message = Session::get('error'))
        <div class="alert shadow-sm alert-warning alert-dismissible fade show" role="alert">
            <strong class="y-center">  
                <i class="fa fa-exclamation-circle text-warning alert-icon"></i> 
                {{$message}}
            </strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if ($message = Session::get('success'))
        <div class="alert shadow-sm alert-success alert-dismissible fade show" role="alert">
            <strong class="y-center">
                <i class="fa fa-check-circle text-success alert-icon"></i> 
                {{$message}} 
            </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <main id="app" > 
        <div class="d-flex" id="wrapper">
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Page content-->
                <div class="container-fluid {{Route::is("login") ? "p-0" : "p-3"}}">
                    @yield('content')
                </div>
            </div>
        </div>
    </main>
    
    
    <script src="{{asset("js/app.js")}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</html>
