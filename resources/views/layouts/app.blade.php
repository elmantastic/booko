<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        .badge{
            background: #D2312D;
            color: #FFF;
            font-size: 10px;
            font-weight: normal;
            height: 16px;
            padding: 3px 5px 3px 5px;
            position: absolute;
            right: -8px;
            top: -3px;
            }

        .badge-booko{
            position: absolute;
            right: -6px;
            top: -10px;
            z-index: 1;
            width: 20px;
            height: 20px;
            font-size : 12px;
            font-weight : 700;
            border : 1px solid white;
            text-align: center;
            line-height: 18px;
            border-radius: 50%;
            color: white;
            background: #1c684b;
        }
        
        .cart-booko{
            width : 40px;
            color : #1c684b;
            font-size : 16px;
            font-weight : normal;
            display : flex;
            justify-content : center;
            align-items : center;
            vertical-align: middle;
        }
        .cart-booko-btn {
            cursor : pointer;
            position: relative;
        }
        .separator-booko{
            margin: auto 10px;
            width: 2px;
            height: 50px;
            background : #f6f6f6;
            position: relative;
        }

        .section-title{
            font-size : 24px;
            font-weight : 700;
            color : #1c684b;
        }
        .products {
            padding: 4rem 0;
        }
        .section-title h2 {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 3rem;
            text-transform: capitalize;
            letter-spacing: 0.1rem;
        }
        .products-center {
            width: 90vw;
            margin: 0 auto;
            max-width: 1170px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            grid-column-gap: 1.5rem;
            grid-row-gap: 2rem;
        }

        .img-container {
            position: relative;
            overflow: hidden;
        }
        .bag-btn {
            position: absolute;
            top: 70%;
            right: 0;
            background: #1c684b;
            border: none;
            text-transform: uppercase;
            padding: 0.5rem 0.75rem;
            letter-spacing: 0.1rem;
            font-weight: bold;
            transition: all 0.3s linear;
            transform: translateX(101%);
            cursor: pointer;
        }
        .bag-btn:hover {
            color: white;
        }
        .fa-shopping-cart {
            margin-right: 0.5rem;
        }
        .img-container:hover .bag-btn {
            transform: translateX(0);
        }
        .product-img {
            display: block;
            width: 100%;
            min-height: 15rem;
            max-height: 18rem;
            transition: all 0.3s linear;
        }
        .img-container:hover .product-img {
            opacity: 0.5;
        }
        
        .product h4 {
            text-transform: capitalize;
            font-size: 1.1rem;
            margin-top: 0.3rem;
            letter-spacing: 0.1rem;
            text-align: center;
        }
        
        .product h5 {
            margin-top: 0.5rem;
            letter-spacing: 0.1rem;
            color: #1c684b;
            text-align: center;
            font-weight: 600;
        }

        .product   a {
            text-decoration: none;
            color: #1c684b;
        }
    </style>

    @livewireStyles
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo.png')}}" alt="" srcset="" height="30">
                    <!-- {{ asset('app.name', 'Laravel') }} -->
                </a>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                    @livewire('cart.cart-dialog')
                    <div class="separator-booko">
                    </div>
                    <!-- <button class="btn">
                        <i class="fa fa-shopping-basket"></i>
                        <span class="badge">3</span>
                    </button> -->
                    <span class="custom-separator-me" ></span>
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown form-inline">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <img height="40" src="{{ asset('images/elmantastic.jpg') }}" alt="Admin name" />
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="{{ url('/admin')}}"><i class="fa fa-user"></i> My Profile</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
            @yield('content')
            {{isset($slot) ? $slot : null}}
        </main>
    </div>
    @livewireScripts
</body>
</html>
