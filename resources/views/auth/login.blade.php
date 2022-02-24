@extends('layouts.app')
<div class="container-fluid h-100 p-0">
    <div class="row justify-content-center no-gutters d-flex align-items-stretch h-100">
    <div class="col-md-7 bg-login-register d-none d-md-block h-100">
        <img class="w-100 h-100" src="{{ asset('img/img.png') }}" alt="">
        <img class="img-fluid hotline" src="{{ asset('img/hotline.png') }}" alt="">

    </div>
        <div class="col-md-5">
                <div class="conOfleftSide">
                    <div class="conOflogo-img pb-3">
                    <img class="img-fluid" src="{{ asset('img/logo.png') }}" alt="">
                    </div>

                                      <h3 class="text-center text-dark pb-3"> Login Account</h3>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div class="form-group row d-flex justify-content-center">
                                            <div class="col-md-12">
                                                <input id="email" type="email" placeholder="Email Address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row d-flex justify-content-center">
                                            <div class="col-md-12">
                                                <input id="password" type="password"  placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row  d-flex justify-content-center">
                                            <div class="col-md-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                    <label class="form-check-label" for="remember">
                                                        {{ __('Remember Me') }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-0 text-center d-flex justify-content-center">
                                            <div class="col-md-12 text-center">
                                                <button type="submit" class="btn m-auto btn-primary w-100" style=" padding: 1rem; ">
                                                    {{ __('Login') }}
                                                </button>

                                                @if (Route::has('password.request'))
                                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                                        {{ __('Forgot Your Password?') }}
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </form>
                                </div>
                </div>
    </div>
</div>
<div class="d-none">
@section('content')
</div>


@endsection

<style>
    .conOflogo-img{
        width: 30%;
    }
    .conOfleftSide{
        width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    height: 100%;
    align-items: center;
}
    }
    .bg-login-register {
        background-color: #4e73df;
            background-image: linear-gradient(
        180deg
        ,#4e73df 10%,#224abe 100%);
            background-size: cover;
            position: relative;
    }
    .hotline{
        position: absolute;
        left: 2%;
        bottom: 2%;
    }
    .card-body {
        padding-top: 30vh !important;
    }
</style>
