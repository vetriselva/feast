<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> Admin CRM @yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
   
    <!-- Styles -->
    <link rel="stylesheet" href="{{asset("node_modules/line-awesome/dist/line-awesome/css/line-awesome.min.css")}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

    <link rel="stylesheet" href="{{asset("node_modules/angular-material/angular-material.css")}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
    <link href="{{ asset('css/print.css') }}" rel="stylesheet"> 
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet"> 

    <!--  Scripts -->
    <script src="{{asset("node_modules/angular/angular.js")}}"></script>
    <script src="{{asset("node_modules/angular-aria/angular-aria.js")}}"></script>
    <script src="{{asset("node_modules/angular-animate/angular-animate.js")}}"></script>
    <script src="{{asset("node_modules/angular-messages/angular-messages.js")}}"></script>
    <script src="{{asset("node_modules/angular-material/angular-material.js")}}"></script>
    <script src="{{asset("node_modules/angular-route/angular-route.js")}}"></script>

    

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.2/css/uikit.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.uikit.min.css">
    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.uikit.min.js"></script>
    @cloudinaryJS
</head>
<body ng-app="myApp">
    <input type="hidden" name="baseurl" value="{{URL::to('/')}}" id="baseurl">
    @if ($message = Session::get('error'))
        <div id="hideme" class="alert shadow-sm alert-warning alert-dismissible fade show" role="alert">
            <strong class="y-center">  
                <i class="fa fa-exclamation-circle text-warning alert-icon"></i> 
                {{$message}}
            </strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if ($message = Session::get('success'))
        <div id="hideme" class="alert shadow-sm alert-success alert-dismissible fade show" role="alert">
            <strong class="y-center">
                <i class="fa fa-check-circle text-success alert-icon"></i> 
                {{$message}} 
            </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <main id="app"> 
        <div class="d-flex" id="wrapper">
            @auth
                <!-- Sidebar-->
                <div class="border-end bg-side-nav" id="sidebar-wrapper">
                    <div class="sidebar-heading text-white">
                        <img style=" filter: brightness(10);width:10rem" alt="company-logo" src="{{asset("images/logo/text-logo-white.png")}}">
                    </div>
                    <div class="list-group list-group-flush">
                        <a class="list-group-item list-group-item-action  {{ Route::is("AdminDashboard") ? "active" : "" }}" href="{{route("AdminDashboard")}}">
                            <i class="side-nav-icon las la-tachometer-alt"></i>
                            <span>Dashboard</span>
                        </a>
                        <a class="list-group-item list-group-item-action {{ Route::is("lead", "lead-new", "lead-view")  ? "active" : "" }}" href="{{route("lead")}}">
                            <i class="side-nav-icon las la-suitcase"></i>
                            <span>Leads</span>
                        </a> 
                        <div>
                            @if (Role()->role_name == 'admin')
                            <div  id="panelsStayOpen-headingTwo">
                                <a class="accordion-button list-group-item list-group-item-action {{ Route::is("data-center") ? "active" : "" }} collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                    <i class="side-nav-icon las la-cog"></i>
                                    <span>Data Center</span>
                                </a>
                            </div>
                            
                                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse {{ Route::is("data-center") ? "show" : "" }}" aria-labelledby="panelsStayOpen-headingTwo">
                                    <div class="accordion-body">
                                        <li class="list-group-item list-group-item-action rounded {{ Request::route('type')  == 'Itinerary' ? "active" : "" }}"><a class="text-white" href="{{ route("data-center", ['type' => 'Itinerary']) }}">Itinerary Details  </a></li>
                                        <li class="list-group-item list-group-item-action rounded {{ Request::route('type')  == 'Hotels' ? "active" : "" }}"><a class="text-white" href="{{ route("data-center", ['type' => 'Hotels']) }}">Hotels Details</a></li>
                                        <li class="list-group-item list-group-item-action rounded {{ Request::route('type')  == 'Flights' ? "active" : "" }}"><a class="text-white" href="{{ route("data-center", ['type' => 'Flights']) }}">Flights Details</a></li>

                                        {{--  --}}
                                        <li class="list-group-item list-group-item-action rounded {{ Request::route('type')  == 'Package_Inclusions' ? "active" : "" }}"><a class="text-white" href="{{ route("data-center", ['type' => 'Package_Inclusions']) }}">Package Inclusions</a></li>
                                        <li class="list-group-item list-group-item-action rounded {{ Request::route('type')  == 'Package_Exclusions' ? "active" : "" }}"><a class="text-white" href="{{ route("data-center", ['type' => 'Package_Exclusions']) }}">Package Exclusions</a></li>
                                        <li class="list-group-item list-group-item-action rounded {{ Request::route('type')  == 'Payment_Policy' ? "active" : "" }}"><a class="text-white" href="{{ route("data-center", ['type' => 'Payment_Policy']) }}">Payment Policy</a></li>
                                        <li class="list-group-item list-group-item-action rounded {{ Request::route('type')  == 'Refound_Policy' ? "active" : "" }}"><a class="text-white" href="{{ route("data-center", ['type' => 'Refound_Policy']) }}">Refound Policy</a></li>
                                        <li class="list-group-item list-group-item-action rounded {{ Request::route('type')  == 'Cancel_Policy' ? "active" : "" }}"><a class="text-white" href="{{ route("data-center", ['type' => 'Cancel_Policy']) }}">Cancellation Policy</a></li>
                                        <li class="list-group-item list-group-item-action rounded {{ Request::route('type')  == 'State' ? "active" : "" }}"><a class="text-white" href="{{ route("data-center", ['type' => 'State']) }}"> State </a></li>
                                        <li class="list-group-item list-group-item-action rounded {{ Request::route('type')  == 'City' ? "active" : "" }}"><a class="text-white" href="{{ route("data-center", ['type' => 'City']) }}"> City </a></li>
                                        <li class="list-group-item list-group-item-action rounded {{ Request::route('type')  == 'Place' ? "active" : "" }}"><a class="text-white" href="{{ route("data-center", ['type' => 'Place']) }}"> Place </a></li>
                                        <li class="list-group-item list-group-item-action rounded {{ Request::route('type')  == 'Activities' ? "active" : "" }}"><a class="text-white" href="{{ route("data-center", ['type' => 'Activities']) }}"> Activities </a></li>
                                        <li class="list-group-item list-group-item-action rounded {{ Request::route('type')  == 'DayActivities' ? "active" : "" }}"><a class="text-white" href="{{ route("data-center", ['type' => 'DayActivities']) }}"> DayActivities </a></li>
                                        <li class="list-group-item list-group-item-action rounded {{ Request::route('type')  == 'Configs' ? "active" : "" }}"><a class="text-white" href="{{ route("data-center", ['type' => 'Configs']) }}"> Configs </a></li>
                                    </div>
                                </div>
                            @endif
                          </div>
                    </div>
                </div>
            @endauth
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                @auth
                    <!-- Top navigation-->
                    <nav id="top-nav-bar" class="navbar p-0 px-3 navbar-expand-lg navbar-light border-bottom">
                        <div class="container-fluid p-0">
                            <div class="content d-flex align-items-center">
                                <div class="me-3" id="sidebarToggle">
                                    <i class="fa text-secondary fa-align-left  btn p-0" aria-hidden="true"></i>
                                </div>
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        {{ Route::is("lead") ? "Leads" : "" }}
                                        {{ Route::is("lead-new") ? "Create Leads" : "" }}
                                        {{ Route::is("lead-view") ? "Leads view" : "" }}
                                        {{ Route::is("data-center") ? "Data Center" : "" }}
                                    </li>
                                </ol>
                            </div>
                              
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ms-auto mt-2 mt-lg-0 p-0">
                                    <li class="nav-item dropdown active">
                                        <a class="nav-link dropdown-toggle active" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa text-secondary fa-user-circle me-1"></i> {{ Auth::user()->name }}
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="#!">Profile</a>
                                            <a class="dropdown-item" href="#!">Help?</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form> 
                                        </div>
                                    </li> 
                                </ul>
                            </div>
                        </div>
                    </nav>
                @endauth
               
                <!-- Page content-->

                <div class="container-fluid main-contents print-padding {{Route::is("login") ? "p-0" : "p-3"}}">
                    {{-- {{ Auth::user()->is_admin == '1' ? "Admin" : "" }} --}}
                    @yield('content')
                </div>
            </div>
        </div>
    </main>
    
    
    <script src="{{asset("js/table.js")}}"></script>
    <script src="{{asset("js/app.js")}}"></script>
    <script src="{{asset("js/admin/lead.js")}}"></script>
    @stack("scripts")
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $("#hideme").delay(5000).slideUp(300);
        });
    </script>
</body>
</html>
