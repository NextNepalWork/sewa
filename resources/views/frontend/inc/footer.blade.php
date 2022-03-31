


{{-- <a href="" class='button_chat'>chat</a>
<a href="#" class='top_btn'><i class="fa fa-angle-up"></i></a> --}}

<!-- FOOTER -->
<footer id="footer" class="footer-bg-color position-relative padding_top pt-5" style="--r1: 130%; --r2: 71.5%">
    <div class="footer-top">
        <div class="container">
            <div class="row cols-xs-space cols-sm-space cols-md-space">

                @php
                     $generalsetting = \App\GeneralSetting::first();
              @endphp
          <div class="col-lg-3 col-12">
             <div class="footer-logo-box text_white">
               <div class="footer-title text_white footer_after">
                  <h4 class="mb-2 mb-md-4 text-white">Follow us on</h4>
                  <ul class="">
                     @if ($generalsetting->facebook != null)
                     <li class="mb-2">
                        <a href="{{ $generalsetting->facebook }}" class="text-white"><i class="fa fa-facebook"
                              aria-hidden="true"></i>&nbsp;Facebook</a>
                     @endif
                     </li>
                     @if ($generalsetting->instagram != null)
                     <li class="mb-2">
                        <a href="{{ $generalsetting->instagram }}" class="text-white"=""=""><i class="fa fa-instagram"
                              aria-hidden="true"></i>&nbsp;Instagram</a>
                     </li>
                     @endif
                     @if ($generalsetting->google_plus != null)
                     <li class="mb-2">
                        <a href="{{ $generalsetting->google_plus }}" class="text-white"=""=""><i class="fa fa-google"
                              aria-hidden="true"></i>&nbsp;Google</a>
                     </li>
                     @endif
                     @if ($generalsetting->twitter != null)
                     <li class="mb-2">
                        <a href="{{ $generalsetting->twitter }}" class="text-white"=""=""><i class="fa fa-twitter"
                              aria-hidden="true"></i>&nbsp;Twitter</a>
                     </li>
                     @endif
                  </ul>
               </div>
             </div>
          </div>
          <div class="col-lg-2 col-6">
            <div class="footer-title text_white footer_after">
               <h4 class="mb-2 mb-md-4 text-white">Pages</h4>
               <ul class="text-white">
                   @foreach (\App\Page::all() as $key => $link)
                  <li class="mb-2">
                     <a href="{{ route('custom-pages.show_custom_page',['slug' => $link->slug]) }}" class="text-white"> {{ $link->title }}</a>
                  </li>
                  @endforeach
               </ul>
            </div>
         </div>
          <div class="col-lg-2 col-6">
             <div class="footer-title text_white footer_after">
                <h4 class="mb-2 mb-md-4 text-white">Information</h4>
                <ul class="text-white">
                    {{-- @foreach (\App\Link::all() as $key => $link)
                   <li class="mb-2">
                      <a href="{{ $link->url }}" class="text-white"> {{ $link->name }}</a>
                   </li>
                   @endforeach --}}
                   {{-- @foreach (\App\Policy::all() as $key => $link) --}}
                     <li class="mb-2">
                        <a href="{{ route('sellerpolicy') }}" class="text-white">
                           {{__('Seller Policy')}}
                        </a>
                     </li>
                     <li class="mb-2">
                        <a href="{{ route('returnpolicy') }}" class="text-white">
                           {{__('Return Policy')}}
                        </a>
                     </li>
                     <li class="mb-2">
                        <a href="{{ route('terms') }}" class="text-white">
                           {{__('Terms & Conditions')}}
                        </a>
                     </li>
                     <li class="mb-2">
                        <a href="{{ route('sellerpolicy') }}" class="text-white">
                           {{__('Seller Policy')}}
                        </a>
                     </li>
                   {{-- @endforeach --}}
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
          <div class="col-lg-3 col-12 mt-4 mt-lg-0">
             <div class="footer-title text_white footer_after">
                <h4 class="text-white mb-2 mb-md-4">Customer Support</h4>
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
         <div class="col-md-6 text-center pb-3 pt-2">
            <p class="mb-0 text-white text-left font-weight-normal">
               We accept ConnectIps, Esewa, Khalti, Visa Card, Master Card
            </p>
         </div>
          <div class="col-md-6 text-center pb-3 pt-2">
             <p class="mb-0 text-white text-right font-weight-normal">
                Copyright All Right Reserved <?php echo(date("Y")) ?>.
                <span class="testimonial-title">Power by NEXT NEPAL </span>
             </p>
          </div>
       </div>
    </div>
 </footer>
 <!--=============================FOOTER END  ============================ -->