<div class="d-user-avater text-center mb-4">
    @if (Auth::user()->avatar_original != null)
    <div class="image" style="background-image:url('{{ asset(Auth::user()->avatar_original) }}')"></div>
@else
    <img src="{{ asset('frontend/images/user.png') }}" class="image rounded-circle">
@endif
   <h5>{{ Auth::user()->name }}</h5>
  
</div>
 <ul class="sidebar pl-md-0 pl-4 pb-md-0 pb-3">
    <li class=" mb-3 p-2 active">
       <a href="{{ route('profile') }}"><span class="mr-2"><i class="fa fa-user"
                aria-hidden="true"></i></span>Profile</a>
    </li>
    <li class="mb-3 p-2">
       <a href="{{ route('order.status') }}"><span class="mr-2"><i class="fa fa-sort"
                aria-hidden="true"></i></span>Order Status</a>
    </li>
    <li class="mb-3 p-2">
       <a href="/cart"><span class="mr-2"><i class="fa fa-shopping-bag"
                aria-hidden="true"></i></span>My Cart</a>
    </li>
    <li class="mb-3 p-2">
       <a href="wishlist.html"><span class="mr-2"><i class="fa fa-shopping-bag"
                aria-hidden="true"></i></span>Wishlist</a>
    </li>
    <li class="mb-3 p-2 ">
       <a href="dashboard-change-password.html"><span class="mr-2"><i class="fa fa-lock"
                aria-hidden="true"></i></span>Change Password</a>
    </li>
    <li class="mb-3 p-2 ">
       <a href="{{ route('logout') }}"><span class="mr-2"><i class="fa fa-sign-out"
                aria-hidden="true"></i></span>Logout</a>
    </li>
 </ul>