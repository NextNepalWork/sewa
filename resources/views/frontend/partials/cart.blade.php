<a href="" class="position-relative" id="dropdownMenuButton " data-toggle="dropdown"
aria-haspopup="true" aria-expanded="false">
<img data-toggle="tooltip" data-placement="top" title=""
   data-original-title="Cart" src="{{asset('./frontend/assets/images/logo/cart.svg')}}" class="img-fluid"
   alt="" />
   @if(Session::has('cart'))
   <sup class="sub_block">{{ count(Session::get('cart'))}}</sup>
@else
   <sup class="sub_block">0</sup>
@endif
</a>
<ul class="dropdown-menu dropdown-menu-right px-0">
    <li>
        <div class="dropdown-cart px-0">
            @if(Session::has('cart'))
                @if(count($cart = Session::get('cart')) > 0)
                    <div class="dc-header">
                        <h3 class="heading heading-6 strong-700">{{__('Cart Items')}}</h3>
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