@extends('frontend.layouts.app')
@section('content')
 <!-- Login Register -->

 <section>
     @php
         $accessKey = 'cd7ac9c06b2b3bc8915cb8c08d2e2a93';   
         $profileId = 'AC9E8149-F889-4C78-893B-EAF207B3C7AC';
         $uuid = '12341234';
         $signedDateTime = date("Y-m-d\TH:i:s\Z");
         $refNumber = '12341234';
         $signature = 'HMAC-SHA256';

         $signed_field_names = [
                                'access_key',
                                'profile_id',
                                'transaction_uuid',
                                'signed_field_names',
                                'unsigned_field_names',
                                'signed_date_time',
                                'locale',
                                'transaction_type',
                                'reference_number',
                                'amount',
                                'currency',
                                'payment_method',
                                'bill_to_forename',
                                'bill_to_surname',
                                'bill_to_email',
                                'bill_to_phone',
                                'bill_to_address_line1',
                                'bill_to_address_city',
                                'bill_to_address_state',
                                'bill_to_address_country',
                                'bill_to_address_postal_code'
                                ];
                                // foreach ($signed_field_names as $key) {
                                //     $concat += $key.'='. 
                                // }
     @endphp
    <form id="frm-nicasia" action="https://testsecureacceptance.cybersource.com/pay" method="post">
        <div class="form-group">
            <input type="hidden" name="access_key" value="{{ $accessKey }}">
            <input type="hidden" name="profile_id" value="{{ $profileId }}">
            <input type="hidden" name="transaction_uuid" value="{{ $uuid }}">
            <input type="hidden" name="signed_field_names" value="access_key,profile_id,transaction_uuid,signed_field_names,unsigned_field_names,signed_date_time,locale,transaction_type,reference_number,amount,currency">
            <input type="hidden" name="unsigned_field_names">
            <input type="hidden" name="signed_date_time" value="{{ $signedDateTime }}">
            <input type="hidden" name="locale" value="en">

            <input type="hidden" name="transaction_type" size="25" value="authorization"> 
            <input type="hidden" name="reference_number" size="25">
            <input type="hidden" name="amount" size="25" value="100">
            <input type="hidden" name="currency" size="25" value="USD">

            {{-- <input type="hidden" name="auth_trans_ref_no">
            <input type="hidden" name="amount" value="2.00">
            <input type="hidden" name="transaction_type" value="sale">
            <input type="hidden" name="reference_number" value="{{ $refNumber }}">
            <input type="hidden" name="currency" value="NPR">
            <input type="hidden" name="payment_method" value="card">
            <input type="hidden" name="signature" value="{{ $signature }}"> --}}

            {{-- <input type="hidden" name="card_type" value="001">
            <input type="hidden" name="card_number" value="">
            <input type="hidden" name="card_expiry_date" value=""> --}}

            {{-- <input type="hidden" name="bill_to_forename" value="Rajim">
            <input type="hidden" name="bill_to_surname" value="Ali">
            <input type="hidden" name="bill_to_email" value="ali.rajim12@gmail.com">
            <input type="hidden" name="bill_to_phone" value="9849428177">
            <input type="hidden" name="bill_to_address_line1" value="Kathmandu">
            <input type="hidden" name="bill_to_address_city" value="Kathmandu">
            <input type="hidden" name="bill_to_address_state" value="Kathmandu">
            <input type="hidden" name="bill_to_address_country" value="NP">
            <input type="hidden" name="bill_to_address_postal_code" value="Kathmandu"> --}}
            <button type="submit">Submit Form</button>
        </div>
    </form>
 </section>



 <section id="login-register-wrapper" class="py-5">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-4 col-md-7 mx-auto form-wrapper">
                <form class="px-3 py-4" action="{{ route('login') }}" method="POST">
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
                        @if(\App\BusinessSetting::where('type', 'google_login')->first()->value == 1 || \App\BusinessSetting::where('type', 'facebook_login')->first()->value == 1 || \App\BusinessSetting::where('type', 'twitter_login')->first()->value == 1)
                        <div class="row mb-4 px-3 justify-content-center align-items-center">
                            <h6 class="mb-xl-0 mb-md-2 mb-2 mr-2 custom-font-size">Sign in with</h6>
                            <div class="social-media d-flex justify-content-center h-100">
                                @if (\App\BusinessSetting::where('type', 'facebook_login')->first()->value == 1)
                                <div class="facebook text-center mr-3">
                                    <a href="{{ route('social.login', ['provider' => 'facebook']) }}" class="fa fa-facebook" aria-hidden="true"></a>

                                    {{-- <a class="fa fa-facebook" aria-hidden="true"></a> --}}
                                </div>
                                @endif
                                @if(\App\BusinessSetting::where('type', 'google_login')->first()->value == 1)
                                <div class="twitter text-center mr-3">
                                    <a href="{{ route('social.login', ['provider' => 'google']) }}" class="fa fa-google" aria-hidden="true"></a>

                                    {{-- <a class="fa fa-google" aria-hidden="true"></a> --}}
                                </div>
                                @endif
                                @if (\App\BusinessSetting::where('type', 'twitter_login')->first()->value == 1)
                                <div class="linkedin text-center mr-3">
                                    <a href="{{ route('social.login', ['provider' => 'twitter']) }}" class="fa fa-twitter" aria-hidden="true"></a>

                                    {{-- <a class="fa fa-twitter" aria-hidden="true"></a> --}}
                                </div>
                                @endif
                            </div>
                        </div>
                        @endif
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