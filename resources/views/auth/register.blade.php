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


<link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">

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
    </div>
@endsection
  