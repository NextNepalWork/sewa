<div class="dropdown-menu" id="cart_header_table" aria-labelledby="dropdownMenuButton">
    @if(Session::has('cart'))
    @if(count($cart = Session::get('cart')) > 0)
    <h6 class="text-center font-weight-bold pt-1">Cart Items</h6>
 
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
           <img src="./frontend/assets/images/logo/cart.svg" class="img-fluid" alt="">&nbsp; View
           Cart</a>
           @if (Auth::check())
        <a href="{{ route('checkout.shipping_info') }}" class="btn-custom rounded-0 py-2"> <img
              src="./frontend/assets/images/logo/cart.svg" class="img-fluid" alt="">&nbsp; Proceed
           Checkout</a>
           @endif
     </div>


  </div>