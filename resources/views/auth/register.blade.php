@extends('layouts.app')

@section('content')
<div class="container text-center">
    <form class="form-signin" method="POST" action="{{ route('register') }}">
        @csrf

        <img class="mb-4 rounded" src="{{asset('storage/others/blue.svg')}}" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Please sign up</h1>
        

        <label for="name" class="sr-only">{{ __('Name') }}</label>
        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Name" required autofocus>
        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif

        <label for="username" class="sr-only">{{ __('Username') }}</label>
        <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" placeholder="Username" required autofocus>
        @if ($errors->has('username'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('username') }}</strong>
            </span>
        @endif

        <label for="country" class="sr-only">{{ __('Country') }}</label>
        <select id="country" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country_id">
            @foreach($countries as $country)
                <option value="{{$country->id}}">{{$country->name}}</option>
            @endforeach
        </select>

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

        <label for="password-confirm" class="sr-only">{{ __('Confirm Password') }}</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
        
        <button class="btn btn-lg btn-primary btn-block" type="submit">{{ __('Sign up') }}</button>
        
        <a class="btn btn-link" href="{{ route('login') }}">
            {{ __('Already have an account, Sign in') }}
        </a>

    </form>
</div>
@endsection
