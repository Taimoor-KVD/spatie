<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel 7 User Roles and Permissions Project') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Custome CSS -->
    <style>
        .txt-white{
            color:white;
        }
        .txt-white:hover {
            color:lightgray;
            text-decoration:none;
        }
    </style>
</head>
<body>
    <div id="app">
        @if(Auth::check())
            <nav class="navbar navbar-expand-md navbar-light navbar-laravel bg-secondary">
        @else
            <nav class="navbar navbar-expand-md navbar-light navbar-laravel bg-light">
        @endif
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @if(Auth::check())
                            <li class="txt-white"><b>Welcome,</b> {{ ucfirst(Auth::user()->name) }}</li>
                        @endif
                    </ul>


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                        @can('user-list')
                            <li class="nav-link">
                                <a class="txt-white" href="{{ route('users.index') }}">Manage Users</a>
                            </li>
                        @endcan
                        @can('role-list')
                            <li class="nav-link">
                                <a class="txt-white" href="{{ route('roles.index') }}">Manage Role</a>
                            </li>
                        @endcan
                        @can('product-list')    
                            <li class="nav-link">
                                <a class="txt-white" href="{{ route('products.index') }}">Manage Product</a>
                            </li>
                        @endcan
                        @can('permission-list')
                            <li class="nav-link">
                                <a class="txt-white" href="permissions">Manage Permission</a>
                            </li>
                        @endcan
                            <li class="nav-item nav-link dropdown">
                                <a id="navbarDropdown" class="txt-white dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa fa-user"></i> <span class="caret"></span>
                                </a>


                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        <main class="py-4">
            <div class="container">
            @yield('content')
            </div>
        </main>
    </div>
    @stack('custom-scripts')
</body>
</html>