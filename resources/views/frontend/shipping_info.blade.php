@extends('frontend.layouts.app')

@section('content')


   <!--======================================================= CART START ======-->
   {{-- <section id="cart_user" class="py-5">
      <div class="container">
       @if(Session::has('cart'))
        
       <div class="row">
        
          <div class="col-xl-8 col-md-12 bg-white p-3">
             <div class="table-responsive-lg">
                <table class="table">
                   <thead>
                      <tr>
                         <th class="img_table text-left th_size border-0">Image</th>
                         <th class="text-left th_size border-0">Product Name</th>
                         <th class="text-left th_size border-0">Quantity</th>
                         <th class="text-left th_size border-0">Total</th>
                         <th class="text-left remove_block_last border-0">Remove</th>
                      </tr>
                   </thead>
                   <!-- /thead -->
                   <tbody>
                    @php
                    $total = 0;
                    @endphp
                    @foreach (Session::get('cart') as $key => $cartItem)
                        @php
                        $product = \App\Product::find($cartItem['id']);
                        $total = $total + $cartItem['price']*$cartItem['quantity'];
                        $product_name_with_choice = $product->name;
                        if ($cartItem['variant'] != null) {
                            $product_name_with_choice = $product->name.' - '.$cartItem['variant'];
                        }
                        // if(isset($cartItem['color'])){
                        //     $product_name_with_choice .= ' - '.\App\Color::where('code', $cartItem['color'])->first()->name;
                        // }
                        // foreach (json_decode($product->choice_options) as $choice){
                        //     $str = $choice->name; // example $str =  choice_0
                        //     $product_name_with_choice .= ' - '.$cartItem[$str];
                        // }
                        @endphp
                      <tr>
                         <td id="">
                            <a class="img_men_cart" href="detail.html">
                               <img
                                  src="{{ asset($product->thumbnail_img) }}"
                                  class="img-fluid" alt="{{ $product->name }}">
                            </a>
                         </td>
                         <td class="">
                            {{ $product_name_with_choice }}
                         </td>
                         <td class="">
                            <div class="input_b">
                               <b onclick="decreaseValue()" value="Decrease Value" class="minus_b">-</b>
                               <input type="number" id="numbers" value="0" class="count_b disabled=" name=" qty">
                               <b class="plus_b " onclick="increaseValue()" value="Increase Value">+</b>
                            </div>
                         </td>
                         <td class="">
                            <span class="cart-grand-total-price">{{ single_price($cartItem['price']) }}</span>
                         </td>
                         <td class=""><a href="#" onclick="removeFromCartView(event, {{ $key }})" title="cancel" class="icon"><i class="fa fa-trash-o"></i></a>
                         </td>
                      </tr>
                      @endforeach
                   </tbody>
                   <!-- /tbody -->
                </table>

             </div>
             <div class="button_block d-flex justify-content-between align-items-center">
                <a href=""> <span><i class="fa fa-reply-all"></i></span> Return to shop</a>
                <!-- <a href="" class="btn_custom">Continue to Shipping</a> -->
                @if(Auth::user())
                <a href="{{ route('checkout.get_shipping_info') }}"> <button class="btn_custom"> Continue to Shipping</button></a>
                @else
                <a href="{{ route('user.login') }}"> <button class="btn_custom"> Continue to Shipping</button></a>
                @endif
             </div>
          </div>
       
          @include('frontend.partials.cart_summary')
       </div>
       @endif
    </div>
 </section> --}}

 <div id="page-content">
   {{-- <section class="slice-xs sct-color-2 border-bottom">
       <div class="container container-sm">
           <div class="row cols-delimited justify-content-center">
               <div class="col">
                   <div class="icon-block icon-block--style-1-v5 text-center ">
                       <div class="block-icon c-gray-light mb-0">
                           <i class="la la-shopping-cart"></i>
                       </div>
                       <div class="block-content d-none d-md-block">
                           <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize">1. {{__('My Cart')}}</h3>
                       </div>
                   </div>
               </div>

               <div class="col">
                   <div class="icon-block icon-block--style-1-v5 text-center active">
                       <div class="block-icon mb-0">
                           <i class="la la-map-o"></i>
                       </div>
                       <div class="block-content d-none d-md-block">
                           <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize">2. {{__('Shipping info')}}</h3>
                       </div>
                   </div>
               </div>

               <div class="col">
                   <div class="icon-block icon-block--style-1-v5 text-center">
                       <div class="block-icon mb-0 c-gray-light">
                           <i class="la la-truck"></i>
                       </div>
                       <div class="block-content d-none d-md-block">
                           <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize">3. {{__('Delivery info')}}</h3>
                       </div>
                   </div>
               </div>

               <div class="col">
                   <div class="icon-block icon-block--style-1-v5 text-center">
                       <div class="block-icon c-gray-light mb-0">
                           <i class="la la-credit-card"></i>
                       </div>
                       <div class="block-content d-none d-md-block">
                           <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize">4. {{__('Payment')}}</h3>
                       </div>
                   </div>
               </div>

               <div class="col">
                   <div class="icon-block icon-block--style-1-v5 text-center">
                       <div class="block-icon c-gray-light mb-0">
                           <i class="la la-check-circle"></i>
                       </div>
                       <div class="block-content d-none d-md-block">
                           <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize">5. {{__('Confirmation')}}</h3>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section> --}}
   <section id="order_list_top">
      <div class="container">
         <div class="row delivery_row_block">
  
            <div class="offset-md-1 offset-0 col-md-2 col-4  text-center ">
               <div class="img_order_list ">
                  <div class="img_block_icon">
                     <img src="{{asset('frontend/assets/images/logo/cart.svg')}}" class="img-fluid" alt="">
                  </div>
                  <div class="content_img ">
                     <h6 class=""> 1.My Cart</h6>
                  </div>
               </div>
            </div>
            <div class="col-md-2 col-4  text-center">
               <div class="img_order_list">
                  <div class="img_block_icon">
                     <img src="{{asset('frontend/assets/images/map.svg')}}" class="img-fluid" alt="">
                  </div>
                  <div class="content_img">
                     <h6 class="active-item"> 2.Shipping Info</h6>
                  </div>
               </div>
            </div>
            <div class="col-md-2 col-4  text-center">
               <div class="img_order_list">
                  <div class="img_block_icon">
                     <img src="{{asset('frontend/assets/images/delivery_new.svg')}}" class="img-fluid" alt="">
                  </div>
                  <div class="content_img">
                     <h6 class=""> 3 Delivery Info</h6>
                  </div>
               </div>
            </div>
            <div class="col-md-2 col-4  text-center">
               <div class="img_order_list">
                  <div class="img_block_icon">
                     <img src="{{asset('frontend/assets/images/payment.svg')}}" class="img-fluid" alt="">
                  </div>
                  <div class="content_img">
                     <h6 class=""> 4. Payment</h6>
                  </div>
               </div>
            </div>
            <div class="col-md-2 col-4  text-center  mr-xl-5 mr-0 pr-xl-5 pr-0">
               <div class="img_order_list">
                  <div class="img_block_icon">
                     <img src="{{asset('frontend/assets/images/confirmation.svg')}}" class="img-fluid" alt="">
                  </div>
                  <div class="content_img">
                     <h6 class=""> 5.Confirmation</h6>
                  </div>
               </div>
            </div>
         </div>
      </div>
  </section>

   <section id="cart_user" class="py-5">
       <div class="container">
           <div class="row">
               <div class="col-xl-8 col-md-12">
                   <form class="form-default" data-toggle="validator" action="{{ route('checkout.store_shipping_infostore') }}" role="form" method="POST">
                       @csrf
                           @if(Auth::check())
                               <div class="row" id="shipping">
                                   @foreach (Auth::user()->addresses as $key => $address)
                                       <div class="col-md-6">
                                           <label class="active card bg-white p-3">
                                               <input type="radio" class="radio" name="address_id" value="{{ $address->id }}" @if ($address->set_default)
                                                   checked
                                               @endif required>
                                               <span class="plan-details">
                                                <span class="plan-type d-block">Address: <span class="right_bold">{{ $address->address }}</span> </span>
                                                <span class="plan-type d-block">Postal Code: <span>{{ $address->postal_code }}</span> </span>
                                                <span class="plan-type d-block">City:<span class="right_bold">{{ $address->city }}</span> </span>
                                                <span class="plan-type d-block">Country: <span class="right_bold">{{ $address->country }}</span> </span>
                                                <span class="plan-type d-block">Phone: <span class="right_bold">{{ $address->phone }}</span> </span>
                                                </span>
                                           </label>
                                       </div>
                                   @endforeach
                                   <input type="hidden" name="checkout_type" value="logged">
                                   <div class="col-md-6">
                                    <button type="button" class="btn add_btn_img" onclick="add_new_address()">
                                       <img src="https://image.flaticon.com/icons/png/512/1104/1104261.png" alt="Add new address" class="img-fluid"> 
                                     </button>
                                   </div>
                               </div>
                           @else
                               <div class="card">
                               <div class="card-body">
                                   <div class="row">
                                       <div class="col-md-12">
                                           <div class="form-group">
                                               <label class="control-label">{{__('Name')}}</label>
                                               <input type="text" class="form-control" name="name" placeholder="{{__('Name')}}" required>
                                           </div>
                                       </div>
                                   </div>

                                   <div class="row">
                                       <div class="col-md-12">
                                           <div class="form-group">
                                               <label class="control-label">{{__('Email')}}</label>
                                               <input type="text" class="form-control" name="email" placeholder="{{__('Email')}}" required>
                                           </div>
                                       </div>
                                   </div>

                                   <div class="row">
                                       <div class="col-md-12">
                                           <div class="form-group">
                                               <label class="control-label">{{__('Address')}}</label>
                                               <input type="text" class="form-control" name="address" placeholder="{{__('Address')}}" required>
                                           </div>
                                       </div>
                                   </div>

                                   <div class="row">
                                       <div class="col-md-6">
                                           <div class="form-group">
                                               <label class="control-label">{{__('Select your country')}}</label>
                                               <select class="form-control custome-control" data-live-search="true" name="country">
                                                   @foreach (\App\Country::where('status', 1)->get() as $key => $country)
                                                       <option value="{{ $country->name }}">{{ $country->name }}</option>
                                                   @endforeach
                                               </select>
                                           </div>
                                       </div>
                                       <div class="col-md-6">
                                           <div class="form-group has-feedback">
                                               <label class="control-label">{{__('City')}}</label>
                                               <input type="text" class="form-control" placeholder="{{__('City')}}" name="city" required>
                                           </div>
                                       </div>
                                   </div>

                                   <div class="row">
                                       <div class="col-md-6">
                                           <div class="form-group has-feedback">
                                               <label class="control-label">{{__('Postal code')}}</label>
                                               <input type="number" min="0" class="form-control" placeholder="{{__('Postal code')}}" name="postal_code" required>
                                           </div>
                                       </div>
                                       <div class="col-md-6">
                                           <div class="form-group has-feedback">
                                               <label class="control-label">{{__('Phone')}}</label>
                                               <input type="number" min="0" class="form-control" placeholder="{{__('Phone')}}" name="phone" required>
                                           </div>
                                       </div>
                                   </div>
                                   <input type="hidden" name="checkout_type" value="guest">
                               </div>
                               </div>
                           @endif
                       <div class="row">
                           <div class="col-md-12 mb-3 mb-md-">
                              <div class="button_block d-flex justify-content-between align-items-center mb-4 mb-md-0">
                                 <a href="{{ route('home') }}"> <span><i class="fa fa-reply-all"></i></span> Return to shop</a>
                                 <button class="btn_custom" type="submit">Continue to Delivery Info
                                 </button>
                              </div>
                           </div>
                       </div>
                   </form>
               </div>

               <div class="col-xl-4 col-md-7 m-auto m-xl-0">
                   @include('frontend.partials.cart_summary')
               </div>
           </div>
       </div>
   </section>
</div>
 <!--======================================================= CART END ======-->

<div class="modal fade" id="new-address-modal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-zoom" role="document">
   <div class="modal-content">
      <div class="modal-header">
            <h6 class="modal-title" id="exampleModalLabel">{{__('New Address')}}</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
      </div>
      <form class="form-default" role="form" action="{{ route('addresses.store') }}" method="POST">
            @csrf
            <div class="modal-body">
               <div class="p-3">
                  <div class="row">
                        <div class="col-md-2">
                           <label>{{__('Address')}}</label>
                        </div>
                        <div class="col-md-10">
                           <textarea class="form-control textarea-autogrow mb-3" placeholder="{{__('Your Address')}}" rows="1" name="address" required></textarea>
                        </div>
                  </div>
                  <div class="row">
                        <div class="col-md-2">
                           <label>{{__('Country')}}</label>
                        </div>
                        <div class="col-md-10">
                           <div class="mb-3">
                              <select class="form-control mb-3 selectpicker" data-placeholder="{{__('Select your country')}}" name="country" required>
                                    @foreach (\App\Country::where('status', 1)->get() as $key => $country)
                                       <option value="{{ $country->name }}">{{ $country->name }}</option>
                                    @endforeach
                              </select>
                           </div>
                        </div>
                  </div>
                  <div class="row">
                        <div class="col-md-2">
                           <label>{{__('City')}}</label>
                        </div>
                        <div class="col-md-10">
                           <input type="text" class="form-control mb-3" placeholder="{{__('Your City')}}" name="city" value="" required>
                        </div>
                  </div>
                  <div class="row">
                        <div class="col-md-2">
                           <label>{{__('Postal code')}}</label>
                        </div>
                        <div class="col-md-10">
                           <input type="text" class="form-control mb-3" placeholder="{{__('Your Postal Code')}}" name="postal_code" value="" required>
                        </div>
                  </div>
                  <div class="row">
                        <div class="col-md-2">
                           <label>{{__('Phone')}}</label>
                        </div>
                        <div class="col-md-10">
                           <input type="text" class="form-control mb-3" placeholder="{{__('+880')}}" name="phone" value="" required>
                        </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn btn-base-1">{{ __('Save') }}</button>
            </div>
      </form>
   </div>
</div>
</div>

@endsection

@section('script')
<script type="text/javascript">
    function add_new_address(){
        $('#new-address-modal').modal('show');
    }
</script>
@endsection
