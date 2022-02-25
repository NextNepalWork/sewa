@extends('frontend.layouts.app')

@section('content')

   <!--======================================================= ORDER TOP LIST START ==-->
   <section id="order_list_top">
    <div class="container">
       <div class="row delivery_row_block">

          <div class="offset-md-1 offset-0 col-md-2 col-4  text-center ">
             <div class="img_order_list ">
                <div class="img_block_icon">
                   <img src="./frontend/assets/images/logo/cart.svg" class="img-fluid" alt="">
                </div>
                <div class="content_img ">
                   <h6 class=""> 1.My Cart</h6>
                </div>
             </div>
          </div>
          <div class="col-md-2 col-4  text-center">
             <div class="img_order_list">
                <div class="img_block_icon">
                   <img src="./frontend/assets/images/map.svg" class="img-fluid" alt="">
                </div>
                <div class="content_img">
                   <h6 class=""> 2.Shipping Info</h6>
                </div>
             </div>
          </div>
          <div class="col-md-2 col-4  text-center">
             <div class="img_order_list">
                <div class="img_block_icon">
                   <img src="./frontend/assets/images/delivery_new.svg" class="img-fluid" alt="">
                </div>
                <div class="content_img">
                   <h6 class="active-item"> 3 Delivery Info</h6>
                </div>
             </div>
          </div>
          <div class="col-md-2 col-4  text-center">
             <div class="img_order_list">
                <div class="img_block_icon">
                   <img src="./frontend/assets/images/payment.svg" class="img-fluid" alt="">
                </div>
                <div class="content_img">
                   <h6 class=""> 4. Payment</h6>
                </div>
             </div>
          </div>
          <div class="col-md-2 col-4  text-center  mr-xl-5 mr-0 pr-xl-5 pr-0">
             <div class="img_order_list">
                <div class="img_block_icon">
                   <img src="./frontend/assets/images/confirmation.svg" class="img-fluid" alt="">
                </div>
                <div class="content_img">
                   <h6 class=""> 5.Confirmation</h6>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
 <!--======================================================= ORDER TOP LIST END ======-->

    <!--======================================================= CART START ======-->
    <section id="cart_user" class="py-5">
      <div class="container">
         <div class="row">
            <div class="col-xl-8 col-md-12 bg-white p-3">
               <form class="form-default" data-toggle="validator" action="{{ route('checkout.store_delivery_info') }}" role="form" method="POST">
                  @csrf
                  @php
                      $admin_products = array();
                      $seller_products = array();
                      foreach (Session::get('cart') as $key => $cartItem){
                          if(\App\Product::find($cartItem['id'])->added_by == 'admin'){
                              array_push($admin_products, $cartItem['id']);
                          }
                          else{
                              $product_ids = array();
                              if(array_key_exists(\App\Product::find($cartItem['id'])->user_id, $seller_products)){
                                  $product_ids = $seller_products[\App\Product::find($cartItem['id'])->user_id];
                              }
                              array_push($product_ids, $cartItem['id']);
                              $seller_products[\App\Product::find($cartItem['id'])->user_id] = $product_ids;
                          }
                      }
                  @endphp
                  <div class="title_delivery mb-4">
                  <h6>{{ \App\GeneralSetting::first()->site_name }} Products</h6>
               </div>
               @if (!empty($admin_products))
               <div class="row">
                  <div class="col-md-6">
                     <div class="row">
                        @foreach ($admin_products as $key => $id)
                        <div class="col-md-12">
                           <div class="delivery_info_block d-flex align-items-center mb-4">
                              <div class="delivery_info_img">
                                 <img
                                 src="{{ asset(\App\Product::find($id)->thumbnail_img) }}"
                                    class="img-fluid" loading="lazy" alt="{{ \App\Product::find($id)->name }}">
                              </div>
                              <div class="delivery_info_text ml-3">
                                 <h5>{{ \App\Product::find($id)->name }}</h5>
                              </div>
                           </div>
                        </div>
                        @endforeach
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="row">
                        <div class="col-xl-6 col-md-12">
                           <div class="shipping_radio custom-radio">
                              <input type="radio" class="shipping_radio-input" id="defaultUnchecked"
                              name="shipping_type_admin" value="home_delivery" checked class="d-none" onchange="show_pickup_point(this)" data-target=".pickup_point_id_admin">
                              <label class="shipping_radio-label" for="defaultUnchecked">Home Delivery</label>
                           </div>
                        </div>
                        @if (\App\BusinessSetting::where('type', 'pickup_point')->first()->value == 1)
                        <div class="col-xl-6 col-md-12">
                           <div class="shipping_radio custom-radio">
                              <input type="radio" class="shipping_radio-input" id="defaultUnchecke"
                              name="shipping_type_admin" value="pickup_point" class="d-none" onchange="show_pickup_point(this)" data-target=".pickup_point_id_admin">
                              <label class="shipping_radio-label" for="defaultUnchecke">Local Pickup </label>
                           </div>
                        </div>
                        @endif
                        <div class="col-md-12">
                           <div class="container_block">
                              @if (\App\BusinessSetting::where('type', 'pickup_point')->first()->value == 1)
                              <div class="main_delivery_info pickup_point_id_admin d-none">
                                 <select id="select_box" name="pickup_point_id_admin" data-placeholder="Select a pickup point">
                                    <option>{{__('Select your nearest pickup point')}}</option>
                                    @foreach (\App\PickupPoint::where('pick_up_status',1)->get() as $key => $pick_up_point)
                                    <option value="{{ $pick_up_point->id }}" data-address="{{ $pick_up_point->address }}" data-phone="{{ $pick_up_point->phone }}">
                                        {{ $pick_up_point->name }}
                                    </option>
                                @endforeach
                                 </select>
                              </div>
                              @endif
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               @endif

               @if (!empty($seller_products))
               <div class="title_delivery mb-4">
                  <h6>{{ \App\Shop::where('user_id', $key)->first()->name }}  Products</h6>
               </div>
               <div class="row">
                  <div class="col-md-6">
                     <div class="row">
                        @foreach ($seller_products as $key => $seller_products)
                        <div class="col-md-12">
                           <div class="delivery_info_block d-flex align-items-center mb-4">
                              <div class="delivery_info_img">
                                 <img
                                 src="{{ asset(\App\Product::find($id)->thumbnail_img) }}"
                                    class="img-fluid" loading="lazy" alt="{{ \App\Product::find($id)->name }}">
                              </div>
                              <div class="delivery_info_text ml-3">
                                 <h5>{{ \App\Product::find($id)->name }}</h5>
                              </div>
                           </div>
                        </div>
                        @endforeach
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="row">
                        <div class="col-xl-6 col-md-12">
                           <div class="shipping_radio custom-radio">
                              <input type="radio" class="shipping_radio-input" id="defaultUnchecked"
                              name="shipping_type_admin" value="home_delivery" checked class="d-none" onchange="show_pickup_point(this)" data-target=".pickup_point_id_admin">
                              <label class="shipping_radio-label" for="defaultUnchecked">Home Delivery</label>
                           </div>
                        </div>
                        @if (\App\BusinessSetting::where('type', 'pickup_point')->first()->value == 1)
                        @if (is_array(json_decode(\App\Shop::where('user_id', $key)->first()->pick_up_point_id)))
                        <div class="col-xl-6 col-md-12">
                           <div class="shipping_radio custom-radio">
                              <input type="radio" class="shipping_radio-input" id="defaultUnchecke"
                              name="shipping_type_admin" value="pickup_point" class="d-none" onchange="show_pickup_point(this)" data-target=".pickup_point_id_admin">
                              <label class="shipping_radio-label" for="defaultUnchecke">Local Pickup </label>
                           </div>
                        </div>
                        @endif
                        @endif
                        <div class="col-md-12">
                           <div class="container_block">
                              @if (\App\BusinessSetting::where('type', 'pickup_point')->first()->value == 1)
                              @if (is_array(json_decode(\App\Shop::where('user_id', $key)->first()->pick_up_point_id)))
                              <div class="main_delivery_info pickup_point_id_admin d-none">
                                 <select id="select_box" name="pickup_point_id_admin" data-placeholder="Select a pickup point">
                                    <option>{{__('Select your nearest pickup point')}}</option>
                                    @foreach (json_decode(\App\Shop::where('user_id', $key)->first()->pick_up_point_id) as $pick_up_point)
                                    @if (\App\PickupPoint::find($pick_up_point) != null)
                                    <option value="{{ \App\PickupPoint::find($pick_up_point)->id }}" data-address="{{ \App\PickupPoint::find($pick_up_point)->address }}" data-phone="{{ \App\PickupPoint::find($pick_up_point)->phone }}">
                                       {{ \App\PickupPoint::find($pick_up_point)->name }}
                                   </option>
                                 @endif
                                @endforeach
                                 </select>
                              </div>
                              @endif
                              @endif
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               @endif

               <div class="col-md-12">
                  <div class="button_block d-flex justify-content-between align-items-center">
                     <a href=""> <span><i class="fa fa-reply-all"></i></span> Return to shop</a>
                     <!-- <a href="" class="btn_custom">Continue to Shipping</a> -->
                    <button type="submit" class="btn_custom"> Continue to Payment</button>
                  </div>
               </div>
            </form>
            </div>
            @include('frontend.partials.cart_summary')
            {{-- <div class="col-xl-4 col-md-7 m-auto m-xl-0 ">
               <div class="cart-summary sub_border_shadow mt-4 mt-xl-0 p-xl-4 p-lg-4 p-md-3 p-3 bg-white text-left">
                  <div class="cart_user_top">
                     <div class="cart_summary d-flex justify-content-between">
                        <strong class="cart_text mb-3 d-block font-weight-bold">Summary</strong>
                        <span class="item_block">1 Items</span>
                     </div>
                  </div>
                  <div class="cart-price d-flex justify-content-between mb-2">
                     <h6 class="">
                        PRODUCT</h6>
                     <span class="cart_text">TOTAL</span>
                  </div>
                  <div class="cart-price d-flex justify-content-between mb-2">
                     <h6 class="">Pearl Green Tea - regular <span>× 1</span> </h6>
                     <span class="cart_text">NPR 0</span>
                  </div>
                  <div class="cart-price d-flex justify-content-between mb-2">
                     <h6 class="">
                        SUBTOTAL </h6>
                     <span class="cart_text">Rs810.00</span>
                  </div>
                  <div class="cart-price d-flex justify-content-between mb-2">
                     <h6 class="">
                        TAX </h6>
                     <span class="cart_text">Rs0.00</span>
                  </div>
                  <div class="cart-price d-flex justify-content-between mb-2">
                     <h6 class="">
                        TOTAL SHIPPING </h6>
                     <span class="cart_text">Rs100.00</span>
                  </div>
                  <hr>
                  <div class="cart-price d-flex justify-content-between ">
                     <h6 class="">TOTAL</h6>
                     <span class="cart_text">Rs910.00</span>
                  </div>
                  <div class="cart-price border-0 mt-3">
                     <form class="form-inline border-0">
                        <input type="hidden">
                        <div class="form-group flex-grow-1">
                           <input type="text" class="form-control w-100 rounded-0" name="code"
                              placeholder="Have coupon code? Enter here" required="">
                        </div>
                        <button type="submit" class="btn btn-base-1">Apply</button>
                     </form>
                  </div>
               </div>
            </div> --}}
         </div>

      </div>
   </section>
   <!--======================================================= CART END ======-->


@endsection

@section('script')
    <script type="text/javascript">
        function display_option(key){

        }
        function show_pickup_point(el) {
        	var value = $(el).val();
        	var target = $(el).data('target');

            console.log(value);

        	if(value == 'home_delivery'){
                if(!$(target).hasClass('d-none')){
                    $(target).addClass('d-none');
                }
        	}else{
        		$(target).removeClass('d-none');
        	}
        }

    </script>
@endsection
