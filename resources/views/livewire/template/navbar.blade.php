<div class="sticky-top">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('assets/images/Logo/logo.png')}}" alt="" srcset="" height="30">
                <!-- {{ asset('app.name', 'Laravel') }} -->
            </a>
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item ml-3">
                        <a class="nav-link" href="{{ url('/products')}}">Products</a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Category
                    </a>
                    <div class="dropdown-menu dropdown-multicol2" aria-labelledby="navbarDropdown">
                        <div class="dropdown-col">
                        @foreach($categories as $index=>$category)
                            <a class="dropdown-item" href="{{ url('products/category', $category->id)}}">{{$category->name}}</a>
                            @if(((int)$index+1)%5 == 0)
                                </div>
                                <div class="dropdown-col">
                            @endif
                        @endforeach
                        </div>
                    </div>
                    </li>
                    <li>
                    
                    </li>
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
                            <li class="nav-item align-self-center">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif
                        
                        @if (Route::has('register'))
                            <li class="nav-item align-self-center">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown form-inline">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <img height="40" src="{{ asset('/images')}}/{{$currentUser->avatar}}" alt="Admin name" />
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
</div>
