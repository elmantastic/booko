@extends('layouts.app')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center" style="margin-top:80px;">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-white bg-primary mb-3">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
 -->

 <div class="">
    <div class="row login-screen">
        <div class="text-center col center img-register-lg" style="padding: 2%; background-image: url('{{ asset('assets/images/Login/booksWallpaper.jpg')}}'); background-size:cover; background-repeat: no-repeat; "> 
        </div>
        <div class="text-over-img-register">
                <i class="fa fa-user-circle fa-10x mb-4" aria-hidden="true" style="color: white; margin-top: 5%;"></i>
                <h1 class="account-text font-weight-bold">Already have account?</h1>
                <h3 class="account-description">Sign in now</h3> 
                <a class="btn btn-lg btn-primary btn-block text-white sign mt-5" href="{{ route('login') }}" type="submit" style="border-radius: 25px;">{{ __('SIGN IN') }}</a>
        </div>
        <div class="col-sm-4 text-center img-register-sm align-self-center">
            <div class="container ">
            <p class="h2 mb-4 text-left font-weight-bold">{{ __('Register') }}</p>
            <p class="text-left">Sign up now to get access to buy all our product</p>

            <form method="POST" action="{{ route('register') }}" style="padding: 0;">
                @csrf
                <label for="name" class="in text-white" style="color: #495057; margin-right: 100%;">Name</label>
                <div class="form-group" style="margin-bottom: 25px;">
                    <input type="text" class="form-control item @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="{{ __('Your Name') }}" style="border-radius: 25px">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <label for="email" class="in text-white" style="color: #495057; margin-right: 100%;">Email</label>
                <div class="form-group"  style="margin-bottom: 25px;">
                    <input type="email" class="form-control item @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autocomplete="email"placeholder="{{ __('you@booko.com') }}" style="border-radius: 25px">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <label for="password" class="in text-white" style="color: #495057; margin-right: 100%;">Password</label>
                <div class="form-group"  style="margin-bottom: 25px;">
                    <input type="password" class="form-control item  @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="new-password" placeholder="{{ __('Password') }}" style="border-radius: 25px">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div> 
                <label for="confirmPassword" class="in text-white float-left" style="color: #495057;">Confirm Password</label>
                <div class="form-group"  style="margin-bottom: 25px;">
                    <input type="password" class="form-control item" id="password-confirm" name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('Confirm Password') }}" style="border-radius: 25px">
                </div>

                <div class="form-group" style="border-radius:30px;padding: 5px 5px; font-size: 18px;background-color: #5791ff;border: none;margin-top:50px;">
                    <button type="submit" class="btn btn-block register" style="color:#ffffff;">{{ __('Register') }}</button>
                </div>
            </form>
            </div>
        </div>
        
    </div>
</div>

@endsection
  

<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">

<div class="registration-form" style="padding: 50px 0;">
        <form method="POST" action="{{ route('register') }} " style=" background-color: #fff;max-width: 500px;margin: auto;padding: 50px 70px;border-top-left-radius: 30px;border-top-right-radius: 30px;box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);">
        @csrf

            <div class="form-icon" style="text-align: center; background-color: #5891ff;border-radius: 50%;font-size: 40px;color: white; width: 100px;height: 100px; margin: auto;margin-bottom: 50px;line-height: 100px;">
                <span><i class="icon icon-user"></i></span>
            </div>

            <div class="form-group" style="margin-bottom: 25px;">
                <input type="text" class="form-control item @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="{{ __('Name') }}">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                 @enderror
            </div>

            <div class="form-group"  style="margin-bottom: 25px;">
                <input type="email" class="form-control item @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autocomplete="email"placeholder="{{ __('E-Mail Address') }}">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group"  style="margin-bottom: 25px;">
                <input type="password" class="form-control item  @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="new-password" placeholder="{{ __('Password') }}">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div> 
            
            <div class="form-group"  style="margin-bottom: 25px;">
                <input type="password" class="form-control item" id="password-confirm" name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('Confirm Password') }}">
            </div>

            <div class="form-group" style="border-radius:30px;padding: 5px 5px; font-size: 18px;background-color: #5791ff;border: none;margin-top:50px;">
                <button type="submit" class="btn btn-block register" style="color:#ffffff;">{{ __('Register') }}</button>
            </div>
        </form>
    </div> -->