<header class="section-header top-header-bg d-md-block d-none">
    <div class="container px-0">
       <div class="top-header d-flex justify-content-end align-items-center">
          <div class="top-social-icon">
             <ul class="mb-0">
                <li class="d-flex align-items-center top_head_right">
                   <div class="dropdown user_login_mobile">
                      <button
                         class="text-light btn_account pb-0 btn bg-transparent dropdown-toggle pt-0 font-weight-normal "
                         type="button" data-toggle="dropdown">
                         Track Your Order

                         <span class="caret"></span>
                      </button>
                      <ul class="my_account dropdown-menu pl-3 ">
                         <div class="input_track_blo d-flex flex-column pb-2">
                            <label><small class="font-weight-bold">Track Your Order</small></label>
                            <div class="track_input_btn d-flex">
                               <input type="text" class="form-control" placeholder="Enter order id" />
                               <button class="btn_custom_go">Go</button>
                            </div>
                         </div>
                      </ul>
                   </div>
                   <!-- user login start  -->
                   <div class="dropdown user_login_mobile">
                      <button
                         class="text-light btn_account pb-0 btn bg-transparent dropdown-toggle pt-0 font-weight-normal "
                         type="button" data-toggle="dropdown">
                         <i class="fa fa-user-o" aria-hidden="true"></i> My Account
                         <span class="caret"></span>
                      </button>
                      <ul class="my_account dropdown-menu pl-3">
                          @auth
                          <li>
                            <a href="{{ route('dashboard') }}" class="font-weight-normal"><span class="pr-2"><i class="fa fa-user"
                                     aria-hidden="true"></i></span>
                               My Panel</a>
                         </li>
                         <li>
                            <a href="{{ route('logout') }}" class="font-weight-normal"><span class="pr-2"><i class="fa fa-user"
                                     aria-hidden="true"></i></span>
                               Logout</a>
                         </li>
                         @else
                         <li>
                            <a href="{{ route('user.login') }}" class="font-weight-normal"><span class="pr-2"><i class="fa fa-user"
                                     aria-hidden="true"></i></span>
                               Login</a>
                         </li>
                         <li>
                            <a href="{{ route('user.registration') }}" class="font-weight-normal"><span class="pr-2"><i
                                     class="fa fa-sign-in" aria-hidden="true"></i></span>Sign Up</a>
                         </li>
                         @endif
                      </ul>
                   </div>
                   <!-- cart modal start  -->
                   <!-- Modal -->
                   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                      aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                         <div class="modal-content">
                            <div class="modal-header">
                               <h5 class="modal-title text-dark font-weight-bold" id="exampleModalLabel">
                                  My Cart
                               </h5>
                               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                               </button>
                            </div>
                            <div class="modal-body mb-0 pb-0">
                               <div class="table-responsive px-md-3">
                                  <table class="table text-center mb-0">
                                     <tbody class="">
                                        <tr class="d-flex align-items-center">
                                           <td class="cart_img">
                                              <div>
                                                 <img
                                                    src="https://montechbd.com/shopist/demo/public/uploads/1619869340-h-250-tv2.png"
                                                    alt="image" />
                                              </div>
                                           </td>
                                           <td>
                                              <h5>Blue Diamond Almonds</h5>
                                              <h6>Rs233</h6>
                                           </td>
                                           <td>
                                              <a href="" class="gray_title"><i class="fa fa-trash-o"
                                                    aria-hidden="true"></i></a>
                                           </td>
                                        </tr>

                                     </tbody>
                                  </table>
                               </div>
                            </div>
                            <div class="modal-footer d-flex flex-column align-items-end">
                               <div class="cart_top_total">
                                  <h6 class="text-dark mr-1">Total Rs233</h6>
                               </div>
                               <div class="top_cartmodal_btn d-flex justify-content-between align-items-center w-100">
                                  <a href="cart.html" class="them_btn_new btn_cart_modal">View Cart</a>
                                  <a href="checkout.html" class="them_btn_new btn_cart_modal">Proceed Checkout</a>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                   <!-- cart modal end  -->
                   <!-- Popup Search Modal -->
                   <!-- Modal -->
                   <!-- Popup Search Modal Ends-->
                   <!-- search modal end  -->
                   <!-- search header end  -->
                </li>
             </ul>
          </div>
       </div>
    </div>
 </header>
 <div class="nav_bar header-sticky">
    <div class="container pl-0 ">
       <div class="row">
          <div class="col-md-2">
             <a class="navbar-brand text-dark font-weight-bold" href="{{ route('home') }}">
                @php
                $generalsetting = \App\GeneralSetting::first();
                 @endphp
                @if($generalsetting->logo != null)
                <img src="{{ asset($generalsetting->logo) }}" class="img-fluid" alt="{{ env('APP_NAME') }}">
            @else
                <img src="{{ asset('frontend/images/logo/logo.png') }}"  class="img-fluid" alt="{{ env('APP_NAME') }}">
            @endif
             </a>
          </div>
          <!-- search start  -->

          <div class="searchbar d-none d-md-block">
             <input class="search_input" type="text" name="" placeholder="Search..." />
             <a href="product-listing.html" class="search_icon"><i class="fas fa-search"></i></a>
          </div>


          <!-- search mobile new star  -->
          <div class="search_mobile_men  d-block d-md-none">
             <button class="search_icon_new" type="submit">
                <i class="fa fa-search"></i>
             </button>

             <div class="sub_search">
                <form action="" class="d-flex">
                   <input class="input_box" type="text" placeholder="Search.." name="search" />
                   <button class="search_top" type="submit">
                      <i class="fa fa-search" aria-hidden="true"></i>
                   </button>
                </form>
             </div>
          </div>
          <!-- search mobile new end  -->

          <div class="col-md-8">
             <div class="search_men d-none d-md-block">
                <form class="form-inline search_top">
                   <input class="form-control border-0 search_input" type="search" placeholder="Search for Products"
                      aria-label="Search" />
                   <div class="search_select border-0">
                      <select name="" id="" class="border-0 search_select_content px-2">
                         <option value="0" selected="selected">
                            All Categories
                         </option>
                         <option class="level-0" value="accessories">
                            Accessories
                         </option>
                         <option class="level-0" value="cameras-photography">
                            Cameras &amp; Photography
                         </option>
                         <option class="level-0" value="computer-components">
                            Computer Components
                         </option>
                         <option class="level-0" value="gadgets">Gadgets</option>
                         <option class="level-0" value="home-entertainment">
                            Home Entertainment
                         </option>
                         <option class="level-0" value="laptops-computers">
                            Laptops &amp; Computers
                         </option>
                         <option class="level-0" value="headphones-2">
                            Headphones
                         </option>
                         <option class="level-0" value="speakers-2">Speakers</option>
                      </select>
                   </div>
                   <div class="search_icon_top text-center">
                      <a href="product-listing.html" class="search_icon text-dark"><i class="fa fa-search"></i></a>
                   </div>
                </form>
             </div>
          </div>
          <div class="col-md-2">
             <ul class="cart_top_list d-flex justify-content-around mb-0 h-100 align-items-center ">

                <li>
                   <a href="{{ route('compare') }}" class="position-relative">
                      {{-- <sub class='sub_block'>1</sub> --}}
                      <img data-toggle="tooltip" data-placement="top" title="" data-original-title="Compare"
                         src="{{asset('./frontend/assets/images/logo/compare.svg')}}" class="img-fluid" alt="" />
                         @if(Session::has('compare'))
                         <sup class="sub_block">{{ count(Session::get('compare'))}}</sup>
                        @else
                         <sup class="sub_block">0</sup>
                     @endif
                        </a>
                </li>
                <li>
                  
                   <a href="{{ route('wishlists.index') }}" class="position-relative" id="wishlist" >
                      {{-- <sub class='sub_block'>0</sub> --}}
                      <img data-toggle="tooltip" data-placement="top" title=""
                         data-original-title="Wishlist" src="{{asset('./frontend/assets/images/logo/wishlist.svg')}}"
                         class="img-fluid" alt="" />
                         @if(Auth::check())
                         <sup class="sub_block" >{{ count(Auth::user()->wishlists)}}</sup>
                        @else
                         <sup class="sub_block">0</sup>
                         @endif
                        </a>
                    
                </li>
                <li>
                   <a href="" class="position-relative" id="dropdownMenuButton cart_header_table" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">
                      {{-- <sub class='sub_block'>1</sub> --}}
                      <img data-toggle="tooltip" data-placement="top" title=""
                         data-original-title="Cart" src="{{asset('./frontend/assets/images/logo/cart.svg')}}" class="img-fluid"
                         alt="" />
                         @if(Session::has('cart'))
                         <sup id="cart_items_sidenav"  class="sub_block">{{ count(Session::get('cart'))}}</sup>
                     @else
                         <sup id="cart_items_sidenav" class="sub_block">0</sup>
                     @endif
                        </a>
                   <!-- cart dropdown start  -->
                  
                   <div class="dropdown-menu" id="cart_header_table" aria-labelledby="dropdownMenuButton">
                     @if(Session::has('cart'))
                     @if(count($cart = Session::get('cart')) > 0)
                     <h6 class="text-center font-weight-bold pt-1">Cart Items </h6>
                  
                      <div class="table-responsive cart-items">
                         <table class="table mb-0"> 
                            <tbody>
                              @php
                              $total = 0;
                          @endphp
                          @foreach($cart as $key => $cartItem)
                              @php
                                  $product = \App\Product::find($cartItem['id']);
                                  $total = $total + $cartItem['price']*$cartItem['quantity'];
                              @endphp
                               <tr>
                                  <td class="img_header_cart">
                                     <div>
                                        <a href=""><img
                                              src="{{ asset(json_decode($product->photos)[0]) }}"
                                              alt="{{ __($product->name) }}"></a>
                                     </div>
                                  </td>
                                  <td class="cart_header_title"> <a href="" class="text-dark">{{ __($product->name) }}</a> </td>
                                  <td> <a onclick="removeFromCart({{ $key }})" class="header_cart_icon">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                     </a> </td>
                               </tr>
                               @endforeach
                            </tbody>
                         </table>
                      </div>

                      <div class="cart_header_price d-flex justify-content-between">
                         <div>
                            <h6>Subtotal</h6>
                         </div>
                         <div>
                            <h6>{{ single_price($total) }}</h6>
                         </div>
                      </div>

                      <div class="
                             top_cartmodal_btn
                             d-flex
                             justify-content-around
                             align-items-center
                             w-100 pt-2 
                           ">
                         <a href="{{ route('cart') }}" class="btn-custom rounded-0 py-2">
                            <img src="{{asset('./frontend/assets/images/logo/cart.svg')}}" class="img-fluid" alt="">&nbsp; View
                            Cart</a>
                            @if (Auth::check())
                         <a href="{{ route('checkout.shipping_info') }}" class="btn-custom rounded-0 py-2"> <img
                               src="{{asset('./frontend/assets/images/logo/cart.svg')}}" class="img-fluid" alt="">&nbsp; Proceed
                            Checkout</a>
                            @endif
                      </div>


                   </div>
                   @else
                   <span>Your cart is empty</span>
               
                   @endif
                
                  @else 
                  <div class="justify-content-center">
                     <span>Your cart is empty</span>
                  </div>
                  
               @endif
                   <!-- cart dropdown end  -->
                </li>
             </ul>
          </div>
       </div>
    </div>
    <!-- Button trigger modal -->
    <div class="mobile-menu d-lg-none d-md-block mr-4 position-absolute" data-toggle="modal"
       data-target="#rightsidebarfilter">
       <span><i class="fa fa-bars fa-2x text-light" aria-hidden="true"></i></span>
    </div>
    <!-- Button trigger modal -->
 </div>
 <!--======================================================= HEADER END ======-->