@extends('frontend.layouts.app')

@section('title'){{$detailedProduct->name}}@stop

@section('meta_description'){{ $detailedProduct->meta_description }}@stop

@section('meta_keywords'){{ $detailedProduct->tags }}@stop

@section('meta')
<script>
  .but
  {
    padding-bottom : 100px;
  }
</script>
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{ $detailedProduct->meta_title }}">
    <meta itemprop="description" content="{{ $detailedProduct->meta_description }}">
    <meta itemprop="image" content="{{ asset($detailedProduct->meta_img) }}">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@publisher_handle">
    <meta name="twitter:title" content="{{ $detailedProduct->meta_title }}">
    <meta name="twitter:description" content="{{ $detailedProduct->meta_description }}">
    <meta name="twitter:creator" content="@author_handle">
    <meta name="twitter:image" content="{{ asset($detailedProduct->meta_img) }}">
    <meta name="twitter:data1" content="{{ single_price($detailedProduct->unit_price) }}">
    <meta name="twitter:label1" content="Price">

    <!-- Open Graph data -->
    <meta property="og:title" content="{{ $detailedProduct->meta_title }}" />
    <meta property="og:type" content="product" />
    <meta property="og:url" content="{{ route('product', $detailedProduct->slug) }}" />
    <meta property="og:image" content="{{ asset($detailedProduct->meta_img) }}" />
    <meta property="og:description" content="{{ $detailedProduct->meta_description }}" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />
    <meta property="og:price:amount" content="{{ single_price($detailedProduct->unit_price) }}" />
@endsection

@section('content')


    <main class="no-main">
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="ps-breadcrumb__list">
                    <li class="active"><a href="/">Home</a></li>
                    <li class="active"><a href="">Product</a></li>
                    {{-- <li class="active"><a href="shop.html">Drinks</a></li> --}}
                    <li><a href="javascript:void(0);">{{ $detailedProduct->slug }}</a></li>
                </ul>
            </div>
        </div>
<<<<<<< HEAD
        <section class="section--product-type">
            <div class="container">
                <div class="product__detail">
                    <div class="row">
                        <div class="col-12 col-lg-9">
                            <div class="ps-product--detail">
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <div class="ps-product__variants">
                                            <div class="ps-product__gallery">
                                                {{-- <div class="ps-gallery__item active"><img src="{{ asset(json_decode($detailedProduct->photos)[0]) }}" data-src="{{ asset(json_decode($detailedProduct->photos)[0]) }}" xoriginal="{{ asset(json_decode($detailedProduct->photos)[0]) }}" />
                                             </div> --}}
                                              @if(isset($detailedProduct->photos) && !empty($detailedProduct->photos))
                                                @foreach (json_decode($detailedProduct->photos) as $key => $photo)

                                                    <div class="ps-gallery__item"><img src="{{ asset($photo) }}" data-src="{{ asset($photo) }}" @if($key==0) xpreview="{{ asset($photo) }}" @endif /></div>
=======
    </section>
    <!-- Breadcrumbs Ends -->

    <!-- Product Detail  -->
    <section id="product-detail-wrapper" class="py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-12 col-12">
                    <div class="product-carousel">
                        @if(is_array(json_decode($detailedProduct->photos)) && count(json_decode($detailedProduct->photos)) > 0)
                        <!-- Swiper and EasyZoom plugins start -->
                        <div class="swiper-container gallery-top" style="height: 400px">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide easyzoom easyzoom--overlay ">
                                    @if (!empty(json_decode($detailedProduct->photos)[0]))
                                        @if (file_exists(json_decode($detailedProduct->photos)[0]))
                                            <img src="{{ asset('frontend/images/placeholder.jpg') }}" class="xzoom img-fluid lazyload" src="{{ asset('frontend/images/placeholder.jpg') }}" data-src="{{ asset(json_decode($detailedProduct->photos)[0]) }}" xoriginal="{{ asset(json_decode($detailedProduct->photos)[0]) }}" />
                                        @else
                                            <img src="{{ asset('frontend/images/placeholder.jpg') }}" class="xzoom img-fluid lazyload" />
                                        @endif
                                    @else
                                        <img src="{{ asset('frontend/images/placeholder.jpg') }}" class="xzoom img-fluid lazyload"/>
                                    @endif
                                    
                                </div>
                            </div>
                            <!-- Add Arrows -->
                            <div class="swiper-button-next swiper-button-white" style="background:none;"></div>
                            <div class="swiper-button-prev swiper-button-white" style="background:none;"></div>
                        </div>

                        <div class="swiper-container gallery-thumbs">
                            <div class="swiper-wrapper">
                                @foreach (json_decode($detailedProduct->photos) as $key => $photo)
                                    <a href="{{ asset($photo) }}">
                                        @if (!empty($photo))
                                            @if (file_exists($photo))
                                                <img src="{{ asset('frontend/images/placeholder.jpg') }}" class="xzoom-gallery lazyload" src="{{ asset('frontend/images/placeholder.jpg') }}" width="80" data-src="{{ asset($photo) }}"  @if($key == 0) xpreview="{{ asset($photo) }}" @endif>
                                            @else
                                                <img src="{{ asset('frontend/images/placeholder.jpg') }}" class="xzoom-gallery lazyload" src="{{ asset('frontend/images/placeholder.jpg') }}" width="80" @if($key == 0) xpreview="{{ asset('frontend/images/placeholder.jpg') }}" @endif>
                                            @endif
                                        @else
                                            <img src="{{ asset('frontend/images/placeholder.jpg') }}" class="xzoom-gallery lazyload" src="{{ asset('frontend/images/placeholder.jpg') }}" width="80" @if($key == 0) xpreview="{{ asset('frontend/images/placeholder.jpg') }}" @endif>
                                        @endif
                                        
                                    </a>
                                @endforeach
>>>>>>> 8d403621953df626a96a5dc787d7136a49da1a10

                                                @endforeach
                                              @endif
                                            </div>
                                            <div class="ps-product__thumbnail">
                                                @php
                                                    if(isset($detailedProduct->photos) && !empty($detailedProduct->photos)){
                                                        $photo = json_decode($detailedProduct->photos)[0];
                                                    }else{
                                                        $photo = 'frontend/images/placeholder.jpg';
                                                    }
                                                @endphp
                                                <div class="ps-product__zoom"><img id="ps-product-zoom" src="{{ asset($photo) }}" data-src="{{ asset($photo) }}" xoriginal="{{ asset($photo) }}" />
                                                    <ul class="ps-gallery--poster" id="ps-lightgallery-videos" data-video-url="#">
                                                        <li data-html="#video-play"><span></span><i class="fa fa-play-circle"></i></li>
                                                    </ul>
                                                </div>
                                                <div style="display:none;" id="video-play">
                                                    <video class="lg-video-object lg-html5" controls preload="none">
                                                        <source src="#" type="video/mp4" />Your browser does not support HTML5 video.
                                                    </video>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">

                                        <div class="product__header">
                                            <h3 class="product__name">{{ __($detailedProduct->name) }}</h3>
                                            <div class="row">
                                                <div class="col-12 col-lg-12 product__code">
                                                    <select class="rating-stars">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4" selected="selected">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                    @php
                                                        $total = 0;
                                                        $total += $detailedProduct->reviews->count();
                                                    @endphp
                                                    <span class="product__review">{{ $total }} Customer {{__('Reviews')}}</span>
                                                    {{-- <span class="product__id">SKU: <span>#VEG20938</span> --}}
                                                    @if (\App\BusinessSetting::where('type', 'conversation_system')->first()->value == 1)
                                                        <div class="col-auto">
                                                            <div class="but" style="margin-bottom:30px">

                                                                <a class="ps-product__addcart btn-success" onclick="show_chat_modal()">{{__('Text Seller ')}}</a>


                                                            </div>

                                                        </div>
                                                    @endif

                                                </div>

                                            </div>
                                        </div>

                                        @php
                                            $qty = 0;
                                            if($detailedProduct->variant_product){
                                            	foreach ($detailedProduct->stocks as $key => $stock) {
                                            		$qty += $stock->qty;
                                            	}
                                            }
                                            else{
                                            	 $qty = $detailedProduct->current_stock;
                                            }
<<<<<<< HEAD
                                        @endphp


                                        <div class="ps-product__sale">
                                            <span class="price-sale">{{ home_discounted_price($detailedProduct->id) }}</span>
                                            <span class="price"> {{ home_price($detailedProduct->id) }}</span>

                                            @if(($detailedProduct->discount_type) === 'amount')
                                                <span class="ps-product__off">Rs.{{ $detailedProduct->discount }} Off</span>
                                            @elseif (($detailedProduct->discount_type) === 'percent')
                                                <span class="ps-product__off">{{ $detailedProduct->discount }} % Off</span>
                                            @endif

=======
                                        </style> --}}
                                        <li class="mr-2">
                                            <div id="share"></div>
                                        </li>
                                        {{-- <li class="mr-2">
                                            <a href="#">
                                                <i class="fa fa-youtube-play" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="mr-2">
                                            <a href="#">
                                                <i class="fa fa-facebook" aria-hidden="true"></i></a>
                                        </li>
                                        <li class="mr-2">
                                            <a href="#">
                                                <i class="fa fa-instagram" aria-hidden="true"></i>
                                            </a>
                                        </li> --}}
                                    </ul>
                                    
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="row align-items-center">
                            <div class="sold-by col-auto">
                                <small class="mr-2">Vendor: </small><br>
                                @if ($detailedProduct->added_by == 'seller' && \App\BusinessSetting::where('type', 'vendor_system_activation')->first()->value == 1)
                                    <a href="{{ route('shop.visit', $detailedProduct->user->shop->slug) }}">{{ $detailedProduct->user->shop->name }}</a>
                                @else
                                    {{ __('Inhouse product') }}
                                @endif
                            </div>
                            {{-- @if (\App\BusinessSetting::where('type', 'conversation_system')->first()->value == 1)
                                <div class="col-auto">
                                    <button class="btn btn-primary" onclick="show_chat_modal()">{{__('Message Seller')}}</button>
                                </div>
                            @endif --}}
                        </div>
                        <hr>
                        <div class="descrip mb-2" style="max-height: fit-content">
                            <h5>Description</h5>
                            {{-- <p> --}}
                                {!! $detailedProduct->description !!}
                            {{-- </p> --}}
                        </div>
>>>>>>> 8d403621953df626a96a5dc787d7136a49da1a10

                                        </div>


                                         @if ( $qty > 0)
                                            <div class="ps-product__avai alert__success">
                                                Availability: <span>{{ __($qty) }} in stock</span>
                                            </div>
                                        @else
                                            <div class="ps-product__avai alert__error">
                                                Out Of Stock
                                                <span></span>
                                            </div>
                                        @endif
                                        <div class="ps-product__info">
                                            <ul class="ps-list--rectangle">
                                                @if ($detailedProduct->added_by == 'seller' && \App\BusinessSetting::where('type', 'vendor_system_activation')->first()->value == 1)
                                                    <li> 
                                                        <span>
                                                            <i class="icon-store">

                                                            </i>
                                                        </span>
                                                        Sold By:
                                                        <a href="{{ ($detailedProduct->user->shop)?route('shop.visit', $detailedProduct->user->shop->slug):'#' }}">
                                                            <b> 
                                                                {{ ($detailedProduct->user->shop)?$detailedProduct->user->shop->name:'#' }}
                                                            </b>
                                                        </a>
                                                    </li>
                                                @else
                                                    <li> <span><i class="icon-store"></i></span><a href=""><b> {{ __('Naulo') }}</b></a></li>
                                                @endif
                                            </ul>
                                        </div>


                                        <div class="ps-product__shopping">
                                            <form id="option-choice-form">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $detailedProduct->id }}">



                                                <!-- Quantity + Add to cart -->
                                                <div class="row no-gutters">
                                                    <div class="col-2">
                                                        <div class="product-description-label mt-2">{{__('Quantity')}}:</div>
                                                    </div>
                                                    <div class="col-10">
                                                        <div class="product-quantity d-flex align-items-center">
                                                            <div class="input-group input-group--style-2 pr-3" style="width: 160px;">
                                          <span class="input-group-btn">
                                             <button class="btn btn-number" type="button" data-type="minus" data-field="quantity" disabled="disabled">
                                                <i class="la la-minus"></i>
                                             </button>
                                          </span>
                                                                <input type="text" name="quantity" class="form-control input-number text-center" placeholder="1" value="1" min="1" max="10">
                                                                <span class="input-group-btn">
                                             <button class="btn btn-number" type="button" data-type="plus" data-field="quantity">
                                                <i class="la la-plus"></i>
                                             </button>
                                          </span>
                                                            </div>
                                                            <div class="avialable-amount">
                                                                <a class="ps-product__icon" href="" onclick="addToWishList({{ $detailedProduct->id }})" title="Add to Wishlist"><i class="icon-heart"></i></a>
                                                                {{-- <a class="ps-product__icon" title="Share Product"><i class="icon-share"></i></a> --}}

                                                            </div>
                                                        </div>
                                                        
                                                      
                                                    </div>
                                                  <style>
                                                    .css{
                                                      padding: 5px 10px;
                                                      margin: 0 5px;
                                                      border: 2px solid gray;
                                                    }
                                                  </style>
                                                    @if (count(json_decode($detailedProduct->colors)) > 0)
                                <div class="form-group col-lg-8 col-md-6">
                                    <div class="image-select pl-4">
                                        <h5>Color</h5>
                                        <div class="my-color">
                                            @foreach (json_decode($detailedProduct->colors) as $key => $color)
                                            <label class="radio m-0" style="background: {{ $color }};" for="{{ $detailedProduct->id }}-color-{{ $key }}" data-toggle="tooltip">
                                                <input type="radio" id="{{ $detailedProduct->id }}-color-{{ $key }}" name="color" value="{{ $color }}" @if($key == 0) checked @endif>
                                                <span style="background:{{$color}}; border:{{$color}}"></span> 
                                            </label>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                @endif

                                @if ($detailedProduct->choice_options != null)
<<<<<<< HEAD
                                  @foreach (json_decode($detailedProduct->choice_options) as $key => $choice)
                                  <div class="form-group col-lg-12 col-md-6">
                                      <div class="size-wrapper">
                                          <div class="size-select">
                                              <h5>{{ \App\Attribute::find($choice->attribute_id)->name }}</h5>
                                              <div class="select-size">
                                                  @foreach ($choice->values as $key => $value)
                                                  {{-- <div class="size">S</div> --}}
                                                  <input type="radio" id="{{ $choice->attribute_id }}-{{ $value }}" name="attribute_id_{{ $choice->attribute_id }}" value="{{ $value }}" @if($key == 0) checked @endif>
                                                  <label class="size css" for="{{ $choice->attribute_id }}-{{ $value }}">{{ $value }}</label>
                                                  @endforeach
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  @endforeach
                                @endif
                                                </div>

                                                <hr>

                                                <div class="row no-gutters pb-3 d-none" id="chosen_price_div">
                                                    <div class="col-2">
                                                        <div class="product-description-label">{{__('Total Price')}}:</div>
                                                    </div>
                                                    <div class="col-10">
                                                        <div class="product-price">
                                                            <strong id="chosen_price">

                                                            </strong>
                                                        </div>
                                                    </div>
                                                </div>

                                            </form>


                                            {{-- <div class="ps-product__quantity">
                                                             <label>Quantity: </label>
                                                             <div class="def-number-input number-input safari_only">
                                                                 <button class="minus" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i class="icon-minus"></i></button>
                                                                 <input class="quantity" min="0" name="quantity" value="1" type="number" />
                                                                 <button class="plus" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i class="icon-plus"></i></button>
                                                         </div>



                                                         </div> --}}

                                            <div class="button-sec">
                                                @if ( $qty > 0)
                                                    <a class="ps-product__addcart btn-success" onclick=buyNow()><i class="icon-bag2"></i>Buy Now</a>
                                                    <a class="ps-product__addcart ps-button" onclick="addToCart()"><i class="icon-cart"></i>Add to cart</a>

                                                @else
                                                    <a class="ps-product__addcart ps-button"><i class="icon-cart"></i>Out Of Stock</a>
                                                @endif
=======
                                {{-- {{dd($detailedProduct->choice_options)}} --}}
                                @foreach (json_decode($detailedProduct->choice_options) as $key => $choice)
                                <div class="form-group col-lg-12 col-md-6">
                                    <div class="size-wrapper">
                                        <div class="size-select">
                                            <h5>{{ \App\Attribute::find($choice->attribute_id)->name }}</h5>
                                            <div class="select-size">
                                                {{-- {{dd($choice->values)}} --}}
                                                @foreach ($choice->values as $key => $value)
                                                {{-- <div class="size">S</div> --}}
                                                {{-- <input type="hidden" id="{{ $choice->attribute_id }}-{{ $value }}" name="attribute_id_{{ $choice->attribute_id }}" value="{{ $value }}" @if($key == 0) checked @endif>
                                                <label class="size" for="{{ $choice->attribute_id }}-{{ $value }}">{{ $value }}</label> --}}

                                                <input type="radio" id="{{ $choice->attribute_id }}-{{ $value }}" name="attribute_id_{{ $choice->attribute_id }}" value="{{ $value }}" @if($key == 0) checked @endif>
                                                    <label for="{{ $choice->attribute_id }}-{{ $value }}" class="size">{{ $value }}</label>
                                                @endforeach
>>>>>>> 8d403621953df626a96a5dc787d7136a49da1a10
                                            </div>
                                        </div>

                                        <div class="ps-product__footer"><a class="ps-product__shop" href="shop-view-grid.html"><i class="icon-store"></i><span>Store</span></a><a class="ps-product__addcart ps-button"><i class="icon-cart"></i>Add to cart</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3">
                            <div class="ps-product--extention">
                                <div class="extention__block">
                                    <div class="extention__item">
                                        <div class="extention__icon"><i class="icon-truck"></i></div>
                                        <div class="extention__content"> <b class="text-black">Free Shipping </b>apply to all orders over <span class="text-success">Rs1000</span></div>
                                    </div>
                                </div>
                                <div class="extention__block">
                                    <div class="extention__item">
                                        <div class="extention__icon"><i class="icon-leaf"></i></div>
                                        <div class="extention__content">Guranteed <b class="text-black">100% Organic </b>from natural farmas </div>
                                    </div>
                                </div>
                                <div class="extention__block">
                                    <div class="extention__item border-none">
                                        <div class="extention__icon"><i class="icon-repeat-one2"></i></div>
                                        <div class="extention__content"> <b class="text-black">1 Day Returns </b>if you change your mind</div>
                                    </div>
                                </div>
                                @php
                                    $generalsetting = \App\GeneralSetting::first();
                                @endphp
                                @if(($detailedProduct->user->shop))
                                    <div class="extention__block extention__contact">
                                        <!--<p> <span class="text-black"></p>!-->
                                        <h4 class="extention__phone"><a href="{{ ($detailedProduct->user->shop)?route('shop.visit', $detailedProduct->user->shop->slug):'#' }}">{{ ($detailedProduct->user->shop)?$detailedProduct->user->shop->name:'#' }}</a></h4>
                                    </div>
                                @endif
                                <p class="extention__footer">Become a Vendor? <a href="{{url('shops/create')}}">Register now</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                @php
                    $reviews_count = \App\Review::where('product_id',$detailedProduct->id)->count();

                        $total_rating = 0;
                        $rating = 0;
                        $percent = [
                            '1' => 0,
                            '2' => 0,
                            '3' => 0,
                            '4' => 0,
                            '5' => 0,
            ];
                    if($reviews_count > 0){
                        $reviews = \App\Review::where('product_id',$detailedProduct->id)->get();

                        foreach ($reviews as $key => $value) {
                            $total_rating = $total_rating + $value->rating;
                            $rating = $total_rating / $reviews_count;
                            $percent[$value->rating] += 1;
                        }
                        // print_r($percent);
                            // echo $total_rating.'<br>';
                            // echo round($rating, 0);
                    }
                    // dd($reviews);
                @endphp
                <div class="product__content">
                    <ul class="nav nav-pills" role="tablist" id="productTabDetail">
                        <li class="nav-item"><a class="nav-link active" id="description-tab" data-toggle="tab" href="#description-content" role="tab" aria-controls="description-content" aria-selected="true">Description</a></li>
                        {{-- <li class="nav-item"><a class="nav-link" id="nutrition-tab" data-toggle="tab" href="#nutrition-content" role="tab" aria-controls="nutrition-content" aria-selected="false">Nutrition</a></li> --}}
                        <li class="nav-item"><a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews-content" role="tab" aria-controls="reviews-content" aria-selected="false">Reviews({{$reviews_count}})</a></li>
                        <li class="nav-item"><a class="nav-link" id="qa-tab" data-toggle="tab" href="#qa-content" role="tab" aria-controls="qa-content" aria-selected="false">Q&A</a></li>
                        <li class="nav-item"><a class="nav-link" id="vendor-tab" data-toggle="tab" href="#vendor-content" role="tab" aria-controls="vendor-content" aria-selected="false">Vendor Info</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="description-content" role="tabpanel" aria-labelledby="description-tab">
                            <p class="block-content"> <?php echo $detailedProduct->description; ?></p>

                        </div>
<<<<<<< HEAD
                        <div class="tab-pane fade" id="nutrition-content" role="tabpanel" aria-labelledby="nutrition-tab">
                            <div class="heading-2">Ingredients </div>
                            <p class="block-content">Allergy Advice: For allergens see highlighted ingredients</p>
                            <p class="block-content">Beef, Preservatives (Potassium Lactate, Sodium Acetates, Sodium Nitrite, Potassium Nitrite), Salt, Sugar, Maize Starch, Spices, Caramelised Sugar Powder, Smoked Paprika, Garlic Powder, Onion Powder, Rapeseed Oil, Thyme, Parsley, Prepared with 109g of Beef per 100g of finished product.</p>
                            <div class="heading-2">Dietary Information </div>
                            <p class="block-content">May Contain Celery, May Contain Cereals Containing Gluten, May Contain Eggs, May Contain Fish, May Contain Milk, May Contain Mustard, May Contain Soya.</p>
                            <table class="table">
                                <thead class="thead-light">
                                <tr>
                                    <th><b class="text-black">Typical Values(*)</b></th>
                                    <th><b class="text-black">per 100g</b></th>
                                    <th><b class="text-black">per slice (20g)</b></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Energy</td>
                                    <td>536kj</td>
                                    <td>107kj</td>
                                </tr>
                                <tr>
                                    <td>Fat</td>
                                    <td>127kcal</td>
                                    <td>25kcal</td>
                                </tr>
                                <tr>
                                    <td>Of which saturates</td>
                                    <td>0.9g</td>
                                    <td>0.2g</td>
                                </tr>
                                <tr>
                                    <td>Carbohydrate</td>
                                    <td>0.7g</td>
                                    <td>0.1g</td>
                                </tr>
                                <tr>
                                    <td>Of which sugars</td>
                                    <td>0.5g</td>
                                    <td>0.1g</td>
                                </tr>
                                <tr>
                                    <td>Fibre</td>
                                    <td>0.5g</td>
                                    <td>0.1g</td>
                                </tr>
                                <tr>
                                    <td>Protein</td>
                                    <td>24.2g</td>
                                    <td>4.8g</td>
                                </tr>
                                <tr>
                                    <td>Salt</td>
                                    <td>1.82g</td>
                                    <td>0.36g</td>
                                </tr>
                                </tbody>
                            </table>
                            <p class="text-center pb-4"><i>* Based on a 2,000 calorie diet. Your daily values may be higher or lower depending on your calorie needs:</i></p>
                        </div>
                        <div class="tab-pane fade" id="reviews-content" role="tabpanel" aria-labelledby="reviews-tab">
                            <div class="ps-product--reviews">
                                <div class="row">
                                    <div class="col-12 col-lg-5">
                                        <div class="review__box">
                                            <div class="product__rate">{{round($rating, 0)}}</div>
                                            <select class="rating-stars">
                                                <option value="1" {{(round($rating, 0) == 1)?'selected="selected"':''}}>1</option>
                                                <option value="2" {{(round($rating, 0) == 2)?'selected="selected"':''}}>2</option>
                                                <option value="3" {{(round($rating, 0) == 3)?'selected="selected"':''}}>3</option>
                                                <option value="4" {{(round($rating, 0) == 4)?'selected="selected"':''}}>4</option>
                                                <option value="5" {{(round($rating, 0) == 5)?'selected="selected"':''}}>5</option>
                                            </select>
                                            <p>Avg. Star Rating: <b class="text-black">({{$reviews_count}} reviews)</b></p>
                                            <div class="review__progress">
                                                <div class="progress-item"><span class="star">5 Stars</span>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-warning" role="progressbar" style="width: {{($reviews_count > 0)?round((($percent[5]/$reviews_count)*100),0):0}}%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div><span class="percent">{{($reviews_count > 0)?round((($percent[5]/$reviews_count)*100),0):0}}%</span>
                                                </div>
                                                <div class="progress-item"><span class="star">4 Stars</span>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-warning" role="progressbar" style="width: {{($reviews_count > 0)?round((($percent[4]/$reviews_count)*100),0):0}}%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div><span class="percent">{{($reviews_count > 0)?round((($percent[4]/$reviews_count)*100),0):0}}%</span>
                                                </div>
                                                <div class="progress-item"><span class="star">3 Stars</span>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-warning" role="progressbar" style="width: {{($reviews_count > 0)?round((($percent[3]/$reviews_count)*100),0):0}}%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div><span class="percent">{{($reviews_count > 0)?round((($percent[3]/$reviews_count)*100),0):0}}%</span>
                                                </div>
                                                <div class="progress-item"><span class="star">2 Stars</span>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-warning" role="progressbar" style="width: {{($reviews_count > 0)?round((($percent[2]/$reviews_count)*100),0):0}}%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div><span class="percent">{{($reviews_count > 0)?round((($percent[2]/$reviews_count)*100),0):0}}%</span>
                                                </div>
                                                <div class="progress-item"><span class="star">1 Stars</span>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-warning" role="progressbar" style="width: {{($reviews_count > 0)?round((($percent[1]/$reviews_count)*100),0):0}}%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div><span class="percent">{{($reviews_count > 0)?round((($percent[1]/$reviews_count)*100),0):0}}%</span>
=======
                        <div class="tab-pane fade p-3" id="second" role="tabpanel" aria-labelledby="second-tab">
                            <div class="row align-items-center justify-content-center">
                                @if(Auth::check())
                                            @php
                                                $commentable = false;
                                            @endphp
                                            @foreach ($detailedProduct->orderDetails as $key => $orderDetail)
                                                @if($orderDetail->order != null && $orderDetail->order->user_id == Auth::user()->id && $orderDetail->delivery_status == 'delivered' && \App\Review::where('user_id', Auth::user()->id)->where('product_id', $detailedProduct->id)->first() == null)
                                                    @php
                                                        $commentable = true;
                                                    @endphp
                                                @endif
                                            @endforeach
                                            {{-- @if ($commentable) --}}
                                            <div class="col-lg-4 col-12 mx-auto">
                                                <!-- User Comment -->
                                                <div class="user-comment py-4 px-3">
                                                    <div class="title mb-3 text-center">
                                                        <h2 class="font-weight-bold mb-2">Add a comment</h2>
                                                    </div>
                                                    <div class="col-12">
                                                        <form class="form-default" role="form" action="{{ route('reviews.store') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="product_id" value="{{ $detailedProduct->id }}">
                                                            <div class="row">
                                                                <div class="col-12 my-2">
                                                                    <input type="text" class="form-control rounded-0" name="name" value="{{ Auth::user()->name }}" class="form-control" disabled required>
                                                                    {{-- <input type="text" class="form-control rounded-0"
                                                                        placeholder="Name"> --}}
                                                                </div>
                                                                <div class="col-12 my-2">
                                                                    <input type="text" class="form-control rounded-0" name="email" value="{{ Auth::user()->email }}" class="form-control" required disabled>
                                                                    {{-- <input type="email" class="form-control rounded-0"
                                                                        placeholder="Email address"> --}}
                                                                </div>
                                                                <div class="col-12 my-2">
                                                                    <div class="col-text-area d-flex justify-content-center">
                                                                        <textarea class="w-100 p-3 rounded-0" rows="4" name="comment" placeholder="{{__('Your review')}}" required></textarea>
                                                                        {{-- <textarea class="w-100 p-3 rounded-0"
                                                                            placeholder="Add Comment"></textarea> --}}
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="d-flex justify-content-center mb-4">
                                                                        <div class="p-ratings">
                                                                            <input type="radio" id="star5" name="rating" value="5" required/>
                                                                    <label class="star" for="star5" title="Awesome" aria-hidden="true"></label>
                                                                    <input type="radio" id="star4" name="rating" value="4" required/>
                                                                    <label class="star" for="star4" title="Great" aria-hidden="true"></label>
                                                                    <input type="radio" id="star3" name="rating" value="3" required/>
                                                                    <label class="star" for="star3" title="Very good" aria-hidden="true"></label>
                                                                    <input type="radio" id="star2" name="rating" value="2" required/>
                                                                    <label class="star" for="star2" title="Good" aria-hidden="true"></label>
                                                                    <input type="radio" id="star1" name="rating" value="1" required/>
                                                                    <label class="star" for="star1" title="Bad" aria-hidden="true"></label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="button-wrapper mx-auto mb-3">
                                                                    <button type="submit" class="btn-custom px-4 color-white">Send</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
>>>>>>> 8d403621953df626a96a5dc787d7136a49da1a10
                                                </div>
                                            </div>
<<<<<<< HEAD
                                        </div>
                                    </div>
=======
                                            @endif
                                        {{-- @endif --}}
>>>>>>> 8d403621953df626a96a5dc787d7136a49da1a10



                                    @if(Auth::check())
                                        @php
                                            $commentable = false;
                                        @endphp
                                        @if(isset($detailedProduct->photos) && !empty($detailedProduct->photos))
                                                @foreach ($detailedProduct->orderDetails as $key => $orderDetail)
                                                    @if($orderDetail->order != null && $orderDetail->order->user_id == Auth::user()->id && $orderDetail->delivery_status == 'delivered' && \App\Review::where('user_id', Auth::user()->id)->where('product_id', $detailedProduct->id)->first() == null)
                                                        @php
                                                            $commentable = true;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                            @endif
                                        @if ($commentable)
                                            <div class="col-12 col-lg-7">
                                                <div class="review__title">Add A Review</div>
                                                <p class="mb-0">Your email will not be published. Required fields are marked <span class="text-danger">*</span></p>
                                                <form role="form" action="{{ route('reviews.store') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $detailedProduct->id }}">
                                                    <div class="form-row">
                                                        <div class="col-12 form-group--block">
                                                            <div class="input__rating">
                                                                <label>Your rating: <span>*</span></label>
                                                                <select class="rating-stars">
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4" selected="selected">4</option>
                                                                    <option value="5">5</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 form-group--block">
                                                            <label>Review: <span>*</span></label>
                                                            <textarea class="form-control" name="comment" placeholder="{{__('Your review')}}" required></textarea>
                                                        </div>
                                                        <div class="col-12 col-lg-6 form-group--block">
                                                            <label>Name: <span>*</span></label>
                                                            <input class="form-control" type="text" name="name" value="{{ Auth::user()->name }}" disabled required>
                                                        </div>
                                                        <div class="col-12 col-lg-6 form-group--block">
                                                            <label>Email:</label>
                                                            <input class="form-control" name="email" value="{{ Auth::user()->email }}" required disabled type="email">
                                                        </div>
                                                        <div class="col-12 form-group--block">
                                                            <button class="btn ps-button ps-btn-submit" type="submit">Submit Review</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        @endif
                                    @else

                                        <div class="text-center">
                                            {{ __('Please Login to Give a Review') }}
                                        </div>

                                    @endif
                                </div>
                                <div class="ps--comments">
                                    <h5 class="comment__title">{{$reviews_count}} Comments</h5>
                                    <ul class="comment__list">
                                        @foreach ($detailedProduct->reviews as $key => $review)

                                            <li class="comment__item">
                                                <div class="item__avatar"><img src="{{ asset($review->user->avatar_original) }}" data-src="{{ asset($review->user->avatar_original) }}" alt="{{ $review->user->name }}" /></div>
                                                <div class="item__content">
                                                    <div class="item__name">{{ $review->user->name }}</div>
                                                    <div class="item__date">- {{ date('d-m-Y', strtotime($review->created_at)) }}</div>
                                                    <div class="item__check"> <i class="icon-checkmark-circle"></i>Verified Purchase</div>
                                                    <div class="item__rate">
                                                        {{-- @for ($i=0; $i < $review->rating; $i++)
                                                            <i class="fa fa-star active"></i>
                                                        @endfor
                                                        @for ($i=0; $i < 5-$review->rating; $i++)
                                                            <i class="fa fa-star"></i>
                                                        @endfor --}}
                                                        <select class="rating-stars">
                                                            <option value="1" {{($review->rating == 1)?'selected="selected"':''}}>1</option>
                                                            <option value="2" {{($review->rating == 2)?'selected="selected"':''}}>2</option>
                                                            <option value="3" {{($review->rating == 3)?'selected="selected"':''}}>3</option>
                                                            <option value="4" {{($review->rating == 4)?'selected="selected"':''}}>4</option>
                                                            <option value="5" {{($review->rating == 5)?'selected="selected"':''}}>5</option>
                                                        </select>
                                                    </div>
                                                    <p class="item__des">{{ $review->comment }}</p>
                                                </div>
                                            </li>
                                        @endforeach
                                        @if(count($detailedProduct->reviews) <= 0) <div class="text-center">
                                            {{ __('There have been no reviews for this product yet.') }}
                                        </div>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="qa-content" role="tabpanel" aria-labelledby="qa-tab">Q&A</div>
                        <div class="tab-pane fade" id="vendor-content" role="tabpanel" aria-labelledby="vendor-tab">
                            <div class="ps-product__category">
                                <ul>
                                    @if($detailedProduct->brand)
                                        <li>Brand: <a href='/search?brand={{$detailedProduct->brand->slug}}' class='text-success'>{{ ($detailedProduct->brand)?$detailedProduct->brand->name:'' }}</a></li>
                                    @endif
                                    
                                    <li>Vendor: <a href="{{ ($detailedProduct->user->shop)?route('shop.visit', $detailedProduct->user->shop->slug):'#' }}" class='text-success'> {{ ($detailedProduct->user)?$detailedProduct->user->name:'' }}</a></li>
                                    <li>Categories: <a href='/search?category={{$detailedProduct->slug}}' class='text-success'>{{($detailedProduct->category)?$detailedProduct->category->name:''}},</a></li>
                                    <li>Tags: {{$detailedProduct->tags}},</li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        @include('frontend.inc.vendorrelated')




    </main>

    <div class="modal fade" id="chat_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-zoom product-modal" id="modal-size" role="document">
            <div class="modal-content position-relative">
                <div class="modal-header">
                    <h5 class="modal-title strong-600 heading-5">{{__('Any query about this product')}}</h5></br>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="" action="{{ route('conversations.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $detailedProduct->id }}">
                    <div class="modal-body gry-bg px-3 pt-3">
                        <div class="form-group">
                            <input type="text" class="form-control mb-3" name="title" value="{{ $detailedProduct->name }}" placeholder="Product Name" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="8" name="message" required placeholder="Your Question">{{ route('product', $detailedProduct->slug) }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-dismiss="modal">{{__('Cancel')}}</button>
                        <button type="submit" class="btn btn-base-1 btn-styled" style="color:green">{{__('Send')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="login_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-zoom" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">{{__('Login')}}</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="card">
                                <div class="card-body px-4">
                                    <form class="form-default" role="form" action="{{ route('cart.login.submit') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <div class="input-group input-group--style-1">
                                                <input type="email" name="email" class="form-control" placeholder="{{__('Email')}}">
                                                <span class="input-group-addon">
                                    <i class="text-md ion-person"></i>
                                 </span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group input-group--style-1">
                                                <input type="password" name="password" class="form-control" placeholder="{{__('Password')}}">
                                                <span class="input-group-addon">
                                    <i class="text-md ion-locked"></i>
                                 </span>
                                            </div>
                                        </div>

                                        <div class="row align-items-center">
                                            <div class="col-md-6">
                                                <a href="#" class="link link-xs link--style-3">{{__('Forgot password?')}}</a>
                                            </div>
                                            <div class="col-md-6 text-right">
                                                <button type="submit" class="btn btn-styled btn-base-1 px-4">{{__('Sign in')}}</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body px-4">
                                   
                                        <a href="{{url('auth/google/redirect')}}" class="btn btn-styled btn-block btn-google btn-icon--2 btn-icon-left px-4 my-4">
                                            <i class="icon fa fa-google"></i> {{__('Login with Google')}}
                                        </a>
                                  
                                   
                                        <a href="{{url('auth/facebook/redirect')}}" class="btn btn-styled btn-block btn-facebook btn-icon--2 btn-icon-left px-4 my-4">
                                            <i class="icon fa fa-facebook"></i> {{__('Login with Facebook')}}
                                        </a>
                                 
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
       $(document).ready(function() {
          $('#share').jsSocials({
             showLabel: false,
             showCount: false,
             shares: ["email", "twitter", "facebook", "linkedin", "pinterest", "stumbleupon", "whatsapp"]
          });
          getVariantPrice();
       });

       function CopyToClipboard(containerid) {
          if (document.selection) {
             var range = document.body.createTextRange();
             range.moveToElementText(document.getElementById(containerid));
             range.select().createTextRange();
             document.execCommand("Copy");

          } else if (window.getSelection) {
             var range = document.createRange();
             document.getElementById(containerid).style.display = "block";
             range.selectNode(document.getElementById(containerid));
             window.getSelection().addRange(range);
             document.execCommand("Copy");
             document.getElementById(containerid).style.display = "none";

          }
          showFrontendAlert('success', 'Copied');
       }

       function show_chat_modal() {
           @if(Auth::check())
           $('#chat_modal').modal('show');
           @else
           $('#login_modal').modal('show');
           @endif
       }
    </script>
@endsection