@extends('frontend.layouts.app')

@section('content')
  <!-- Login Register -->
  <section id="login-register-wrapper" class="py-5">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-xl-4 col-lg-4 col-md-7 mx-auto form-wrapper">
                <form class="px-xl-4 px-lg-4 px-md-5 px-3 py-4" action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="text-center">
                        <h2 class="font-weight-bold my-xl-3 my-md-3 my-4">Register</h2>
                        <div class="form-group position-relative mb-xl-4 mb-md-3 mb-2">
                            <input type="text"
                                class="form-control border-top-0 border-right-0 border-left-0 rounded-0 shadow-none bg-transparent{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                id="name" value="{{ old('name') }}" placeholder="Fullname" name="name">
                            <i class="fa fa-user-o" aria-hidden="true"></i>
                            @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                        </div>
                        <div class="form-group position-relative mb-xl-4 mb-md-3 mb-2">
                            <input type="email" class="form-control border-top-0 border-right-0 border-left-0 rounded-0
                                    shadow-none bg-transparent{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" value="{{ old('email') }}" placeholder="Email">
                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                            @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                        </div>
                       
                        <div class="form-group position-relative mb-xl-4 mb-md-3 mb-2">
                            <input type="password"
                                class="form-control border-top-0 border-right-0 border-left-0 rounded-0 shadow-none bg-transparent {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                id="password" name="password" placeholder="Password">
                            <i class="fa fa-key" aria-hidden="true"></i>
                            @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                        </div>
                        <div class="form-group position-relative mb-xl-4 mb-md-3 mb-2">
                            <input type="password"
                                class="form-control border-top-0 border-right-0 border-left-0 rounded-0 shadow-none bg-transparent"
                                id="password_confirmation" placeholder="Re-type Password" name="password_confirmation">
                            <i class="fa fa-key" aria-hidden="true"></i>
                        </div>
                        <div class="form-group position-relative mb-xl-4 mb-md-3 mb-2">
                            <div class="g-recaptcha" data-sitekey="{{ env('CAPTCHA_KEY') }}">
                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="invalid-feedback" style="display:block">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- <div class="row my-2">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                    Remember me
                                </label>
                                    </div>
                                </div>
                                <div class="col-md-6 text-xl-right text-lg-right text-center mt-xl-0 mt-lg-0 mt-2">
                                    <a href="#">Forgot Password?</a>
                                </div>
                            </div> -->
                        <button type="submit" class="btn-custom px-5 text-uppercase ">
                            Create an Account
                        </button>
                        <p class="text-center mt-4 custom-font-size">
                            Already have an account?
                            <span>
                                <a href="{{ route('user.login') }}">Login</a>
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
@endsection

@section('script')
    <script type="text/javascript">

        var isPhoneShown = true;

        var input = document.querySelector("#phone-code");
        var iti = intlTelInput(input, {
            separateDialCode: true,
            preferredCountries: []
        });

        var countryCode = iti.getSelectedCountryData();


        input.addEventListener("countrychange", function() {
            var country = iti.getSelectedCountryData();
            $('input[name=country_code]').val(country.dialCode);
        });

        $(document).ready(function(){
            $('.email-form-group').hide();
        });

        function autoFillSeller(){
            $('#email').val('seller@example.com');
            $('#password').val('123456');
        }
        function autoFillCustomer(){
            $('#email').val('customer@example.com');
            $('#password').val('123456');
        }

        function toggleEmailPhone(el){
            if(isPhoneShown){
                $('.phone-form-group').hide();
                $('.email-form-group').show();
                isPhoneShown = false;
                $(el).html('Use Phone Instead');
            }
            else{
                $('.phone-form-group').show();
                $('.email-form-group').hide();
                isPhoneShown = true;
                $(el).html('Use Email Instead');
            }
        }
    </script>
@endsection
