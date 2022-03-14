{{-- <div class="col-xl-4 col-md-7 m-auto m-xl-0 "> --}}
    <div class="cart-summary sub_border_shadow mt-4 mt-xl-0  p-xl-4 p-lg-4 p-md-3 p-3 bg-white text-left">
       <div class="cart_user_top">
          <div class="cart_summary d-flex justify-content-between">
             <strong class="cart_text mb-3 d-block font-weight-bold">{{__('Summary')}}</strong>
             <span class="item_block">{{ count(Session::get('cart')) }} {{__('Items')}}</span>
          </div>
          <hr style="margin-top:0px">
       </div>
       <div class="cart-price d-flex justify-content-between mb-2">
          <h6 class="">
             PRODUCT</h6>
          <span class="cart_text">TOTAL</span>
       </div>
       @php
       $subtotal = 0;
       $tax = 0;
       $shipping = 0;
       if (\App\BusinessSetting::where('type', 'shipping_type')->first()->value == 'flat_rate') {
           $shipping = \App\BusinessSetting::where('type', 'flat_rate_shipping_cost')->first()->value;
       }
       $admin_products = array();
       $seller_products = array();
      @endphp
      @foreach (Session::get('cart') as $key => $cartItem)
         @php
            $product = \App\Product::find($cartItem['id']);
            if($product->added_by == 'admin'){
                  array_push($admin_products, $cartItem['id']);
            }
            else{
                  $product_ids = array();
                  if(array_key_exists($product->user_id, $seller_products)){
                     $product_ids = $seller_products[$product->user_id];
                  }
                  array_push($product_ids, $cartItem['id']);
                  $seller_products[$product->user_id] = $product_ids;
            }
            $subtotal += $cartItem['price']*$cartItem['quantity'];
            $tax += $cartItem['tax']*$cartItem['quantity'];
            if (\App\BusinessSetting::where('type', 'shipping_type')->first()->value == 'product_wise_shipping') {
                  $shipping += $cartItem['shipping'];
            }
            $product_name_with_choice = $product->name;
            if ($cartItem['variant'] != null) {
                  $product_name_with_choice = $product->name.' - '.$cartItem['variant'];
            }
         @endphp
         <div class="cart-price d-flex justify-content-between mb-2">
            <h6 class=""> {{ $product_name_with_choice }}<span>× {{ $cartItem['quantity'] }}</span> </h6>
            <span class="cart_text">{{ single_price($cartItem['price']*$cartItem['quantity']) }}</span>
         </div>
         @php
         if (\App\BusinessSetting::where('type', 'shipping_type')->first()->value == 'seller_wise_shipping') {
            if(!empty($admin_products)){
                  $shipping = \App\BusinessSetting::where('type', 'shipping_cost_admin')->first()->value;
            }
            if(!empty($seller_products)){
                  foreach ($seller_products as $key => $seller_product) {
                     $shipping += \App\Shop::where('user_id', $key)->first()->shipping_cost;
                  }
            }
         }
      @endphp
         <div class="cart-price d-flex justify-content-between mb-2">
            <h6 class="">
               SUBTOTAL </h6>
            <span class="cart_text">{{ single_price($subtotal) }}</span>
         </div>
         <div class="cart-price d-flex justify-content-between mb-2">
            <h6 class="">
               TAX </h6>
            <span class="cart_text">{{ single_price($tax) }}</span>
         </div>
         <div class="cart-price d-flex justify-content-between mb-2">
            <h6 class="">
               TOTAL SHIPPING </h6>
            <span class="cart_text">{{ single_price($shipping) }}</span>
         </div>
         @if (Session::has('coupon_discount'))
         <div class="cart-price d-flex justify-content-between mb-2">
         <h6 class="">
            COUPON DISCOUNT </h6>
         <span class="cart_text">{{ single_price(Session::get('coupon_discount')) }}</span>
         </div>
         @endif
         <hr>
         <div class="cart-price d-flex justify-content-between ">
         @php
         $total = $subtotal+$tax+$shipping;
         if(Session::has('coupon_discount')){
               $total -= Session::get('coupon_discount');
         }
            @endphp
            <h6 class="">TOTAL</h6>
            <span class="cart_text">{{ single_price($total) }}</span>
         </div>
         @endforeach
         @if (Auth::check() && \App\BusinessSetting::where('type', 'coupon_system')->first()->value == 1)
         @if (Session::has('coupon_discount'))
         <div class="cart-price border-0 mt-3">
            <form class="form-inline border-0" action="{{ route('checkout.remove_coupon_code') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <input type="hidden">
               <div class="form-group flex-grow-1">
                  {{ \App\Coupon::find(Session::get('coupon_id'))->code }}
               </div>
               <button type="submit" class="btn btn-base-1" style="background-color: var(--theme_color)">Change Coupon</button>
               </form>
               @else
               <form class="form-inline border-0" action="{{ route('checkout.apply_coupon_code') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group flex-grow-1">
                     <input type="text" class="form-control w-100 rounded-0" name="code" placeholder="{{__('Have coupon code? Enter here')}}" required>
               </div>
               <button type="submit" class="btn btn-base-1" style="background-color: var(--theme_color)">Apply</button>
            </form>
         </div>
         @endif
         @endif
   </div>
 {{-- </div> --}}