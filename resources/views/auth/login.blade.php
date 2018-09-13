@extends('layouts.app')

@section('content')
<div class="container text-center">
    <form class="form-signin" method="POST" action="{{ route('login') }}">
        @csrf

        <img class="mb-4 rounded" src="{{asset('storage/others/red.svg')}}" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        
        <label for="email" class="sr-only">{{ __('E-Mail Address') }}</label>
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="E-Mail Address" required autofocus>
        @if ($errors->has('email'))
            <span class="invalid-feedback mb-1" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
        
        <label for="password" class="sr-only">{{ __('Password') }}</label>
        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>
        @if ($errors->has('password'))
            <span class="invalid-feedback mb-1" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
        
        <div class="checkbox mb-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

            <label class="form-check-label" for="remember">
                {{ __('Remember Me') }}
            </label>
        </div>
        
        <!--<label>
            <input type="checkbox" value="remember-me"> Remember me
        </label>-->
        
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">{{ __('Sign in') }}</button>
        
        <a class="btn btn-link" href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
        </a>

    </form>
</div>
@endsection
