@extends('frontend.layouts.app')
@section('content')

 <!-- Login Register -->
 <section id="login-register-wrapper" class="py-5">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-4 col-md-7 mx-auto form-wrapper">
                <form class="px-3 py-4" action="{{ route('login') }}" method="POST">
                    @csrf
                    @if (\App\Addon::where('unique_identifier', 'otp_system')->first() != null && \App\Addon::where('unique_identifier', 'otp_system')->first()->activated)
                    <span>{{ __('Use country code before number') }}</span>

<!-- Login Register -->
<section id="login-register-wrapper" class="py-5">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-4 col-md-7 mx-auto form-wrapper">
                <form class="px-3 py-4" role="form" action="{{ route('login') }}" method="POST">
                    @csrf
                    @if (\App\Addon::where('unique_identifier', 'otp_system')->first() != null && \App\Addon::where('unique_identifier', 'otp_system')->first()->activated)
                        <span>{{ __('Use country code before number') }}</span>

                    @endif
                    <div class="text-center">
                        <h2 class="font-weight-bold title my-xl-3 my-md-3 my-4">Login</h2>
                        <div class="form-group position-relative mb-xl-4 mb-md-3 mb-2">
                            @if (\App\Addon::where('unique_identifier', 'otp_system')->first() != null && \App\Addon::where('unique_identifier', 'otp_system')->first()->activated)

                            <input type="email"
                                class="form-control border-top-0 border-right-0 border-left-0 rounded-0 shadow-none bg-transparent {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                id="username" value="{{ old('email') }}" placeholder="Email" name="email">

                            <i class="fa fa-user-o" aria-hidden="true"></i>
                            @else
                            <input type="email"
                                class="form-control border-top-0 border-right-0 border-left-0 rounded-0 shadow-none bg-transparent {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                id="username" value="{{ old('email') }}" placeholder="Email" name="email">
                            @endif
                        </div>
                        <div class="form-group position-relative mb-xl-4 mb-md-3 mb-2">
                            <input type="password" class="form-control border-top-0 border-right-0 border-left-0 rounded-0
                                    shadow-none bg-transparent {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="password" placeholder="Type Password">
                            <i class="fa fa-key" aria-hidden="true"></i>
                        </div>
                        <div class="row my-2">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }} >
                                    <label class="form-check-label custom-font-size" for="defaultCheck1">
                                        Remember me
                                    </label>

                                <input type="text" class="form-control border-top-0 border-right-0 border-left-0 rounded-0 shadow-none bg-transparent {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="{{__('Email Or Phone')}}" name="email" id="email">
                            @else
                                <input type="email" class="form-control border-top-0 border-right-0 border-left-0 rounded-0 shadow-none bg-transparent {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="{{ __('Email') }}" name="email">
                            @endif
                            <i class="fa fa-user-o" aria-hidden="true"></i>
                        </div>
                        <div class="form-group position-relative mb-xl-4 mb-md-3 mb-2">
                            <input type="password" class="form-control border-top-0 border-right-0 border-left-0 rounded-0 shadow-none bg-transparent {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{__('Password')}}" name="password" id="password" placeholder="Type Password">
                            <i class="fa fa-key" aria-hidden="true"></i>
                        </div>
                        
                        <div class="row my-2">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input id="demo-form-checkbox defaultCheck1" class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label custom-font-size" for="defaultCheck1">
                                        Remember me
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6 text-xl-right text-lg-right text-center mt-xl-0 mt-lg-0 mt-2">
                                <a href="{{ route('password.request') }}">Forgot Password?</a>
                            </div>
                        </div>

                        <button type="submit" class="btn-custom text-uppercase text-white py-2">{{ __('Login') }}</button>
                        
                        <p class="text-center mt-4 custom-font-size">
                            Don't have an account?
                            <span>
                                <a href="{{ route('user.registration') }}">Register</a>
                            </span>
                        </p>
                        <div class="row mb-4 px-3 justify-content-center align-items-center">
                            <h6 class="mb-xl-0 mb-md-2 mb-2 mr-2 custom-font-size">Sign in with</h6>
                            @if(\App\BusinessSetting::where('type', 'google_login')->first()->value == 1 || \App\BusinessSetting::where('type', 'facebook_login')->first()->value == 1 || \App\BusinessSetting::where('type', 'twitter_login')->first()->value == 1)
                                <div class="social-media d-flex justify-content-center h-100">
                                    @if (\App\BusinessSetting::where('type', 'facebook_login')->first()->value == 1)
                                    <div class="facebook text-center mr-3">
                                        <a href="{{ route('social.login', ['provider' => 'facebook']) }}" class="fa fa-facebook" aria-hidden="true"></a>
                                    </div>
                                    @endif
                                    @if(\App\BusinessSetting::where('type', 'google_login')->first()->value == 1)
                                    <div class="twitter text-center mr-3">
                                        <a href="{{ route('social.login', ['provider' => 'google']) }}" class="fa fa-google" aria-hidden="true"></a>
                                    </div>
                                    @endif
                                    @if (\App\BusinessSetting::where('type', 'twitter_login')->first()->value == 1)
                                    <div class="linkedin text-center mr-3">
                                        <a href="{{ route('social.login', ['provider' => 'twitter']) }}" class="fa fa-twitter" aria-hidden="true">
                                    </a>
                                    </div>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @if (env("DEMO_MODE") == "On")
        <div class="bg-white p-4 mx-auto mt-4">
            <div class="">
                <table class="table table-responsive table-bordered mb-0">
                    <tbody>
                        <tr>
                            <td>{{__('Seller Account')}}</td>
                            <td><button class="btn btn-info" onclick="autoFillSeller()">Copy credentials</button></td>
                        </tr>
                        <tr>
                            <td>{{__('Customer Account')}}</td>
                            <td><button class="btn btn-info" onclick="autoFillCustomer()">Copy credentials</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    @endif
    </div>
</section>
<!-- Login Register Ends -->
    {{-- <section class="gry-bg" id="login_section">
        <div class="profile login">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-8 mx-auto">
                        <div class="card border-0">
                            <div class="text-center px-35 pt-5">
                                <h1 class="heading heading-4 strong-500">
                                    {{__('Login to your account.')}}
                                </h1>
                            </div>
                            <div class="px-5 py-3 py-lg-4">
                                <div class="">
                                    <form class="form-default" role="form" action="{{ route('login') }}" method="POST">
                                        @csrf
                                        @if (\App\Addon::where('unique_identifier', 'otp_system')->first() != null && \App\Addon::where('unique_identifier', 'otp_system')->first()->activated)
                                            <span>{{ __('Use country code before number') }}</span>
                                        @endif
                                        <div class="form-group">
                                            <div class="input-group input-group--style-1">
                                                @if (\App\Addon::where('unique_identifier', 'otp_system')->first() != null && \App\Addon::where('unique_identifier', 'otp_system')->first()->activated)
                                                    <input type="text" class="form-control form-control-sm {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="{{__('Email Or Phone')}}" name="email" id="email">
                                                @else
                                                    <input type="email" class="form-control form-control-sm {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="{{ __('Email') }}" name="email">
                                                @endif
                                                <span class="input-group-addon">
                                                    <i class="text-md la la-user"></i>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group input-group--style-1">
                                                <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{__('Password')}}" name="password" id="password">
                                                <span class="input-group-addon">
                                                    <i class="text-md la la-lock"></i>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <div class="checkbox pad-btm text-left">
                                                        <input id="demo-form-checkbox" class="magic-checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                        <label for="demo-form-checkbox" class="text-sm">
                                                            {{ __('Remember Me') }}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 text-right">
                                                <a href="{{ route('password.request') }}" class="link link-xs link--style-3">{{__('Forgot password?')}}</a>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-styled btn-base-1 btn-md w-100">{{ __('Login') }}</button>
                                        </div>
                                    </form>
                                    @if(\App\BusinessSetting::where('type', 'google_login')->first()->value == 1 || \App\BusinessSetting::where('type', 'facebook_login')->first()->value == 1 || \App\BusinessSetting::where('type', 'twitter_login')->first()->value == 1)
                                        <div class="or or--1 mt-3 text-center">
                                            <span>or</span>
                                        </div>
                                        <div>
                                        @if (\App\BusinessSetting::where('type', 'facebook_login')->first()->value == 1)
                                            <a href="{{ route('social.login', ['provider' => 'facebook']) }}" class="btn btn-styled btn-block btn-facebook btn-icon--2 btn-icon-left px-4 mb-3">
                                                <i class="icon fa fa-facebook"></i> {{__('Login with Facebook')}}
                                            </a>
                                        @endif
                                        @if(\App\BusinessSetting::where('type', 'google_login')->first()->value == 1)
                                            <a href="{{ route('social.login', ['provider' => 'google']) }}" class="btn btn-styled btn-block btn-google btn-icon--2 btn-icon-left px-4 mb-3">
                                                <i class="icon fa fa-google"></i> {{__('Login with Google')}}
                                            </a>
                                        @endif
                                        @if (\App\BusinessSetting::where('type', 'twitter_login')->first()->value == 1)
                                            <a href="{{ route('social.login', ['provider' => 'twitter']) }}" class="btn btn-styled btn-block btn-twitter btn-icon--2 btn-icon-left px-4">
                                                <i class="icon fa fa-twitter"></i> {{__('Login with Twitter')}}
                                            </a>
                                        @endif
                                        </div>
                                    @endif

                                </div>
                            </div>
                            <div class="col-md-6 text-xl-right text-lg-right text-center mt-xl-0 mt-lg-0 mt-2">
                                <a href="{{ route('password.request') }}">Forgot Password?</a>
                            </div>
                        </div>
                        <button class="btn-custom text-uppercase text-white py-2" type="submit">
                        Login
                        </button>
                        <p class="text-center mt-4 custom-font-size">
                            Don't have an account?
                            <span>
                                <a href="{{ route('user.registration') }}">Register</a>
                            </span>
                        </p>
                        <div class="row mb-4 px-3 justify-content-center align-items-center">
                            <h6 class="mb-xl-0 mb-md-2 mb-2 mr-2 custom-font-size">Sign in with</h6>
                            <div class="social-media d-flex justify-content-center h-100">
                                <div class="facebook text-center mr-3">
                                    <a class="fa fa-facebook" aria-hidden="true"></a>
                                </div>
                                <div class="twitter text-center mr-3">
                                    <a class="fa fa-twitter" aria-hidden="true"></a>
                                </div>
                                <div class="linkedin text-center mr-3">
                                    <a class="fa fa-linkedin" aria-hidden="true"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</section>
<!-- Login Register Ends -->

    </section> --}}

@endsection
@section('script')
    <script type="text/javascript">
        function autoFillSeller(){
            $('#email').val('seller@example.com');
            $('#password').val('123456');
        }
        function autoFillCustomer(){
            $('#email').val('customer@example.com');
            $('#password').val('123456');
        }
    </script>
@endsection