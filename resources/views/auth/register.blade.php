@extends('layouts.app')

@section('content')
    <div class="col-lg-7">
        <div class="card shadow-lg border-0 rounded-lg mt-5">
            <div class="card-header"><h3 class="text-center font-weight-light my-4">{{ __('Create Account') }}</h3></div>
            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" id="inputLastName" type="text" placeholder="User Name" />
                                <label for="inputLastName">{{ __('Name') }}</label>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="inputEmail" type="email" placeholder="name@example.com" />
                        <label for="inputEmail">{{ __('E-Mail Address') }}</label>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control @error('password') is-invalid @enderror" name="password" id="inputPassword" type="password" placeholder="Create a password" />
                                <label for="inputPassword">{{ __('Password') }}</label>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" name="password_confirmation" id="inputPasswordConfirm" type="password" placeholder="Confirm password" />
                                <label for="inputPasswordConfirm">{{ __('Confirm Password') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 mb-0">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center py-3">
                <div class="small">Have an account?<a href="{{ route('login') }}"> Go to login</a></div>
            </div>
        </div>
    </div>
@endsection
