@extends('frontend.layouts.app')

@section('content')

    <!-- Profile -->
    <section id="profile-wrapper" class="py-3">
        <div class="container">
           <div class="row py-xl-5 py-md-3 py-0">
              <div class="col-xl-3 col-lg-4 col-12 mb-xl-0 mb-lg-0 mb-3">
                 <div class="dashboard-list py-lg-5 px-lg-3">
                    @if(Auth::user()->user_type == 'seller')
                        @include('frontend.inc.seller_side_nav')
                    @elseif(Auth::user()->user_type == 'customer')
                        @include('frontend.inc.customer_side_nav')
                    @endif
                 </div>
  
              </div>
              <div class="col-xl-9 col-lg-8 col-md-12 col-12 ">
                <form  action="{{ route('customer.profile.update') }}" method="POST" enctype="multipart/form-data"></form>
                 <div class="profile-side-detail-edit">
                    <div class="dashboard-content d-flex align-items-center h-100">
                       <div class="submit-section">
                          <h4 class="font-weight-bold mb-3">Account</h4>
                          <div class="form-row">
                             <div class="form-group col-md-6 mb-4"><label>Your Name</label>
                                <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" placeholder="{{__('Your Name')}}">
                             </div>
                             <div class="form-group col-md-6 mb-4">
                                <label>Email</label>
                                <input type="email" class="form-control" placeholder="{{__('Your Email')}}" name="email" value="{{ Auth::user()->email }}" disabled>
                             </div>
                            
                             <div class="form-group col-md-6 mb-4">
                                <label> Password</label>
                                <input type="password" class="form-control mb-3" placeholder="{{__('New Password')}}" name="new_password">
                             </div>
                             <div class="form-group col-md-6 mb-4">
                                <label>Confirm Password</label>
                                <input type="password" class="form-control mb-3" placeholder="{{__('Confirm Password')}}" name="confirm_password">
                             </div>
                             <div class="form-group col-md-6 mb-4">
                                <label>Choose Image</label>
                                <input type="file" class="form-control" name="photo" id="file-3" class="custom-input-file custom-input-file--4" data-multiple-caption="{count} files selected" accept="image/*" />
                             </div>
                             <div class="form-group col-12 mx-auto text-center">
                                <button type="submit" class="btn-custom rounded-0 px-5 text-left d-block">Save</button>
                             </div>
  
                          </div>
                       </div>
                    </div>         
                 </div>
                 <div class="form-box bg-white mt-4">
                    <div class="form-box-title px-3 py-2">
                        {{__('Addresses')}}
                    </div>
                    <div class="form-box-content p-3">
                        <div class="row gutters-10">
                            @foreach (Auth::user()->addresses as $key => $address)
                                <div class="col-lg-6">
                                    <div class="border p-3 pr-5 rounded mb-3 position-relative">
                                        <div class='mb-2'>
                                            <span class="alpha-6">Address:</span>
                                            <span class="strong-600 ml-2">{{ $address->address }}</span>
                                        </div>
                                        <div class='mb-2'>
                                            <span class="alpha-6">Postal Code:</span>
                                            <span class="strong-600 ml-2">{{ $address->postal_code }}</span>
                                        </div>
                                        <div class='mb-2'>
                                            <span class="alpha-6">City:</span>
                                            <span class="strong-600 ml-2">{{ $address->city }}</span>
                                        </div>
                                        <div class='mb-2'>
                                            <span class="alpha-6">Country:</span>
                                            <span class="strong-600 ml-2">{{ $address->country }}</span>
                                        </div>
                                        <div class='mb-2'>
                                            <span class="alpha-6">Phone:</span>
                                            <span class="strong-600 ml-2">{{ $address->phone }}</span>
                                        </div>
                                        @if ($address->set_default)
                                            <div class="position-absolute right-0 bottom-0 pr-2 pb-3">
                                                <span class="badge badge-primary bg-base-1">Default</span>
                                            </div>
                                        @endif
                                        <div class="dropdown position-absolute right-0 top-0">
                                            <button class="btn bg-gray px-2" type="button" data-toggle="dropdown">
                                                <i class="la la-ellipsis-v"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                                @if (!$address->set_default)
                                                    <a class="dropdown-item" href="{{ route('addresses.set_default', $address->id) }}">Make This Default</a>
                                                @endif
                                                {{-- <a class="dropdown-item" href="">Edit</a> --}}
                                                <a class="dropdown-item" href="{{ route('addresses.destroy', $address->id) }}">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="col-lg-6 mx-auto" onclick="add_new_address()">
                                <div class="border p-3 rounded mb-3 c-pointer text-center bg-light">
                                    <i class="la la-plus la-2x"></i>
                                    <div class="alpha-7">Add New Address</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
              </div>
           </div>
        </div>
        </div>
     </section>
     <!-- Profile Ends -->

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
