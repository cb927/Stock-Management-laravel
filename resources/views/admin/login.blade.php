
@extends('layouts.auth')

@section('content')

<div class="container-fluid p-0">
    <div class="row no-gutters">
        <div class="col-sm-6 col-lg-5 col-xxl-3  align-self-center order-2 order-sm-1">
            <div class="d-flex align-items-center h-100-vh">
                <div class="login p-50">
                    <h1 class="mb-2">Admin Login</h1>
                    <p>Welcome back, please login to your account.</p>
                    <form method="POST" action="{{ route('admin.login') }}" class="mt-3 mt-sm-5">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="control-label">Email*</label>
                                    <input name="email" type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Email" required autocomplete="email" autofocus />

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="control-label">Password*</label>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required autocomplete="current-password" />

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-block d-sm-flex  align-items-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="gridCheck">
                                            Remember Me
                                        </label>
                                    </div>
                                    @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="ml-auto">Forgot Password ?</a>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <button type="submit" class="btn btn-primary text-uppercase">Sign In</button>
                            </div>
                            <div class="col-12  mt-3">
                                <p>Don't have an account ?<a href="{{ route('admin.register') }}"> Sign Up</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xxl-9 col-lg-7 bg-gradient o-hidden order-1 order-sm-2">
            <div class="row align-items-center h-100">
                <div class="col-7 mx-auto ">
                    <img class="img-fluid" src="{{ asset('assets/img/bg/login.svg')}}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection