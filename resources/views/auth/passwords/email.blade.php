@extends('layouts.app')

@section('content')


<div class="col-lg-5">
        <div class="card shadow-lg border-0 rounded-lg mt-5">
            <div class="card-header"><h3 class="text-center font-weight-light my-4">{{ __('Reset Password') }}</h3></div>
            <div class="card-body">
                <div class="small mb-3 text-muted">Enter your email address and we will send you a link to reset your password.</div>
                <form method="POST" action="{{ route('password.email') }}>
                @csrf
                    <div class="form-floating mb-3">
                        <input class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus id="inputEmail" type="email" placeholder="name@example.com" />
                        <label for="inputEmail">{{ __('E-Mail Address') }}</label>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                        <span>Return to <a class="small" href="{{ route('login') }}">login</a></span>
                        <button type="submit" class="btn btn-primary">
                            {{ __('Send Password Reset Link') }}
                        </button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center py-3">
                <div class="small">Need an account?<a href="{{ route('register') }}"> Sign up!</a></div>
            </div>
        </div>
    </div>




    @endsection
