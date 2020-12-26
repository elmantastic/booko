@extends('layouts.app')

@section('content')
<div class="">
    <div class="row login-screen">
        <div class="col-sm-4 text-center img-login-sm align-self-center" style="padding: 3%; margin: auto; height: 100%">
            <div class="container">
            <p class="h4 mb-4 text-left font-weight-bold">{{ __('Login') }}</p>
            <p class="text-left">Login first before you continue to main page</p>

            <form method="POST" action="{{ route('login') }}" style="padding: 0;">
                @csrf
                <label for="email" class="in text-white" style="color: #495057; margin-right: 100%;">Email</label>
                <input id="email" type="email" class="form-control mb-4 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus style=" border-radius: 25px">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <label for="password" class="in text-white" style="color: #495057; margin-right: 100%;">Password</label>
                <input id="password" type="password" class="form-control mb-4 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" style="border-radius: 25px">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="form-check text-left mt-0">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>

                <div class="form-group row mb-0">
                    <div class="col">
                        <button type="submit" class="btn btn-primary btn-block" style="border-radius: 25px; margin-top: 2%">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link text-success" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>
            </form>
            </div>
        </div>
            <div class="text-center col center img-login-lg" style="padding: 2%; background-image: url('{{ asset('assets/images/Login/booksWallpaper.jpg')}}'); background-size:cover; background-repeat: no-repeat;"> 
                    <div class="mt-5" style="margin: auto 0;">
                    <i class="fa fa-user-circle fa-10x mb-4" aria-hidden="true" style="color: white; margin-top: 5%;"></i>
                    <h2 class="account-text">Create Your Account</h2>
                    </div>
                    <h4 class="account-description">Signup to create an account</h4> 
                    <a class="btn btn-lg btn-primary btn-block text-white sign mt-5" href="{{ route('register') }}" type="submit" style="border-radius: 25px;width: 80%;margin-top: 2%; border-radius: 25px; width: 25%; margin: auto">{{ __('SIGN UP') }}</a>
                    </div>
</div>
</div>
@endsection

