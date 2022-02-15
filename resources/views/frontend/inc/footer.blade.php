 <!--=============================FOOTER START  ============================ -->
 <footer id="footer" class="footer-bg-color position-relative padding_top pt-5" style="--r1: 130%; --r2: 71.5%">
    <div class="container">
       <div class="row">
                @php
                     $generalsetting = \App\GeneralSetting::first();
              @endphp
          <div class="col-lg-4 col-12">
             <div class="footer-logo-box text_white">
                <div class="header-logo">
                   <a class="footer-logo navbar-brand text-white font-weight-bold text-uppercase font-weight-bolder mb-4 p-0"
                      href="{{ route('home') }}">
                      @if($generalsetting->logo != null)
                      <img loading="lazy"  src="{{ asset($generalsetting->logo) }}" alt="{{ env('APP_NAME') }}" height="44">
                    @else
                      <img loading="lazy"  src="{{ asset('frontend/images/logo/logo.png') }}" alt="{{ env('APP_NAME') }}" height="44">
                  @endif
                   </a>
                </div>
                <p class="text-white font-weight-normal">
                    {{ $generalsetting->description }}
                </p>
                <ul class="d-flex">
                    @if ($generalsetting->facebook != null)
                   <li class="logo-bg">
                      <a href="{{ $generalsetting->facebook }}" class="text-white"><i class="fa fa-facebook"
                            aria-hidden="true"></i></a>
                    @endif
                   </li>
                   @if ($generalsetting->instagram != null)
                   <li class="feature_in_bg ml-3">
                      <a href="{{ $generalsetting->instagram }}" class="text-white"=""=""><i class="fa fa-instagram"
                            aria-hidden="true"></i></a>
                   </li>
                   @endif
                   @if ($generalsetting->google_plus != null)
                   <li class="logo-bg ml-3">
                      <a href="{{ $generalsetting->google_plus }}" class="text-white"=""=""><i class="fa fa-google"
                            aria-hidden="true"></i></a>
                   </li>
                   @endif
                   @if ($generalsetting->twitter != null)
                   <li class="logo-bg ml-3">
                      <a href="{{ $generalsetting->twitter }}" class="text-white"=""=""><i class="fa fa-twitter"
                            aria-hidden="true"></i></a>
                   </li>
                   @endif
                </ul>
             </div>
          </div>
          <div class="col-lg-2 col-6">
             <div class="footer-title text_white footer_after">
                <h4 class="mb-2 mb-md-4 text-white">Quick Links</h4>
                <ul class="text-white">
                    @foreach (\App\Link::all() as $key => $link)
                   <li class="mb-2">
                      <a href="{{ $link->url }}" class="text-white"> {{ $link->name }}</a>
                   </li>
                   @endforeach
                </ul>
             </div>
          </div>
          <div class="col-lg-2 col-6">
             <div class="footer-title text_white footer_after">
                <h4 class="text-white mb-2 mb-md-4">My Account</h4>
                <ul>
                    @auth
                    <li class="mb-2">
                        <a href="{{ route('logout') }}" class="text-white">Logout</a>
                     </li>      
                      @else             
                   <li class="mb-2">
                      <a href="{{ route('user.login') }}" class="text-white">Login</a>
                   </li>
                   <li class="mb-2">
                    <a href="{{ route('user.registration') }}" class="text-white">Register</a>
                 </li>
                 @endauth  
                   <li class="mb-2">
                      <a href="{{ route('wishlists.index') }}" class="text-white">My Wishlist</a>
                   </li>
                   <li class="mb-2">
                      <a href="{{ route('orders.track') }}" class="text-white">Track Order</a>
                   </li>     
                </ul>
             </div>
          </div>
          <div class="col-lg-4 col-12 mt-4 mt-lg-0">
             <div class="footer-title text_white footer_after">
                <h4 class="text-white mb-2 mb-md-4">Find Us</h4>
                <ul>
                   <li class="text-white mb-2">
                      <span class="pr-3"><i class="fa fa-map-marker" aria-hidden="true"></i></span>{{ $generalsetting->address  }}
                   </li>
                   <li class="text-white mb-2">
                      <a href="tel:+61283870907, +61452145677" class="text-light"><span class="pr-3"><i
                               class="fa fa-phone" aria-hidden="true"></i></span>
                               {{ $generalsetting->phone }}</a>
                   </li>
                   <li>
                      <a href="mailto:{{ $generalsetting->email  }}" class="text-white"><span class="pr-3"><i
                               class="fa fa-envelope-square" aria-hidden="true"></i></span>{{ $generalsetting->email  }}</a>
                   </li>
                </ul>
             </div>
          </div>
       </div>
       <hr />
       <div class="row">
          <div class="col-md-12 text-center pb-3 pt-2">
             <p class="mb-0 text-white text-center font-weight-normal">
                Copyright All Right Reserved <?php echo(date("Y")) ?>.
                <span class="testimonial-title">Power by NEXT NEPAL </span>
             </p>
          </div>
       </div>
    </div>
 </footer>
 <!--=============================FOOTER END  ============================ -->