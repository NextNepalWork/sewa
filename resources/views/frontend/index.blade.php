@extends('frontend.layouts.app')
@section('content')
<section id="slider" class="body_bg">
    <div class="container p-0">
       <div class="row no-gutters">
          <div class="col-lg-3 col-12 d-md-block d-none">
             <div class="category_title_top d-flex justify-content-between theme_bg">
                <div class="category_title">
                   <h5 class="mb-0">All Categories</h5>
                </div>
                <div class="category_btn">
                   <a href="{{ route('categories.all') }}">View All</a>
                </div>
             </div>
             <ul class="bg-white border_one d-lg-block d-none">
                @foreach (\App\Category::all()->take(11) as $key => $category)
                    @php
                        $brands = array();
                    @endphp
                    <li class="px-3 product_icon position-relative d-block" data-id="{{ $category->id }}">
                    <div style="
                            display: flex;
                            justify-content: space-between;
                            ">
                        <div>
                            <a href="{{ route('products.category', $category->slug) }}" class="sub_icon"><span class="pr-2 category_icon_img">
                                <img
                                    src="{{ $category->icon }}"
                                    class="img-fluid" alt=""></span>
                                    {{ __($category->name) }}
                                </a>
                        </div>
                        <div class="icon_show_category">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </div>
                    </div>
                    <ul class="sub_menu_list">
                        @if(count($category->subcategories)>0)
                        @foreach ($category->subcategories as $sub)
                        <li>
                            <a href="{{ route('products.subcategory', $category->slug) }}">
                                <span class="mr-2"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                {{$sub->name}}
                            </a>
                        </li>
                        @endforeach                                        
                        @endif
                    </ul>
                    </li>
                @endforeach
             </ul>
          </div>
          <div class="col-lg-9 col-12">
             <div class="slider_banner">
                @foreach (\App\Slider::where('published', 1)->get() as $key => $slider)
                    <div class="slider_item position-relative">
                    <a href="{{ $slider->link }}" target="_blank"> <img
                            src="{{ asset($slider->photo) }}"
                            class="d-block w-100 img-fluid" data-src="{{ asset($slider->photo) }}" alt="{{ env('APP_NAME')}}"  /></a>
                    </div>
                @endforeach
             </div>
          </div>
       </div>
    </div>
 </section>

    <!--============================================================ CATEGORY START=-->
    <section id="category_section" class="">
        <div class="container">
           <div class="grid-container slick_category">
            @foreach (\App\Category::where('featured', 1)->get() as $key => $category)
              <div class="category_men_block">
                 <a href="{{ route('products.category', $category->slug) }}">
                    <div class="grid-item">
                       <img src="{{ asset($category->banner) }}"
                        data-src="{{ asset($category->banner) }}"
                          alt="{{ __($category->name) }}" class="img-fluid img-fit lazyloaded">
                    </div>
                    <div class="text_cate">
                       <h3>{{ __($category->name) }}</h3>
                    </div>
                 </a>
              </div>
            @endforeach
           </div>
        </div>
    </section>
     

    <!--=========================================== BEST SELLING START ======-->
    @php
        $flash_deal = \App\FlashDeal::where('status', 1)->where('featured', 1)->first();    
        $time = [];
        // dd($flash_deal->flash_deal_products);
        // dd(strtotime(date('d-m-Y')),$flash_deal->start_date,$flash_deal->end_date);
    @endphp
    {{-- @if($flash_deal != null && strtotime(date('d-m-Y')) >= $flash_deal->start_date && strtotime(date('d-m-Y')) <= $flash_deal->end_date) --}}
    <section id="productlist" class="pb-5">
        <div class="container">
        <div class="row">
           <div class="col-md-3">
             <div class="flash_men">
                @foreach ($flash_deal->flash_deal_products as $key => $flash_deal_product)
                    @php
                        $product = \App\Product::find($flash_deal_product->product_id);
                        $enddate = $flash_deal->end_date;
                        $time = date('m/d/Y', $enddate);
                        // dd($product);
                    @endphp

                    @if ($product != null && $product->published != 0)
                        <div class="special_offer_men p-4 text-center">
                            <div class="special_header d-flex justify-content-between align-items-center">
                                <div class="special_title">
                                <h4>Special Offer</h4>
                                </div>
                                <div class="savings">
                                    <span class="savings-text">
                                        <span class="font-weight-normal"> Save</span> 
                                            <span class="woocommerce-Price-amount amount font-weight-bold"><bdi>
                                                <span class="woocommerce-Price-currencySymbol">
                                                    {{ ($flash_deal_product->discount_type == 'amount')?'Rs.':'%' }}
                                                </span>
                                                {{ $flash_deal_product->discount }}
                                                </bdi>
                                            </span> 
                                    </span>
                                </div>
                            </div>
                            <div class="special_left">
                                <a href="{{ route('product', $product->slug) }}">
                                    @if (!empty($product->featured_img))
                                        <img class="img-fit lazyload" src="{{ asset($product->featured_img) }}" alt="{{ __($product->name . '-' . $product->unit_price ) }}">
                                    @else
                                        <img class="img-fit lazyload" src="{{ asset(json_decode($product->photos)[0]) }}" alt="{{ __($product->name . '-' . $product->unit_price ) }}">
                                    @endif  
                                    {{-- <img src="https://electro.madrasthemes.com/wp-content/uploads/2016/03/consal-300x300.png" class="img-fluid" alt=""> --}}
                                    <h6>{{ __($product->name) }}</h6>
                                </a>
                            </div>
                            <div class="special_price_le py-2">
                                <h4> 
                                    <span class="red_text">
                                        {{ home_discounted_base_price($product->id) }}
                                    </span> 
                                    @if(home_base_price($product->id) != home_discounted_base_price($product->id))
                                        <small>
                                            <strike>
                                                {{ home_base_price($product->id) }}
                                            </strike>
                                        </small> 
                                    @endif
                                </h4>
                            </div>
                            <div class="special_countdown">
                                <div class="content_left">
                                <h5 id="headline">Hurry Up! Offer ends in:</h5>
                                <div id="countdown">
                                    <ul class="d-flex align-items-center justify-content-center">
                                        <!-- <li class="d-flex flex-column"><span id="days"></span>days</li> -->
                                        <span class="demo"></span>
                                        {{-- <li class="d-flex flex-column"><span id="hours"></span>Hours</li>
                                        <li class="d-flex flex-column"><span id="minutes"></span>Minutes</li>
                                        <li class="d-flex flex-column"><span id="seconds"></span>Seconds</li> --}}
                                    </ul>
                                </div>
                                </div>
                            </div>
                        </div>

                    @endif
                @endforeach
             </div>
           </div>
           <div class="col-md-9">
              <div class="row mb-4">
                 <div class="col-md-12">
                    <div class="section_title_block d-flex justify-content-between align-item-center h-100">
                       <h2 class="position-relative mb-0">Featured Products</h2>
                       <a class="btn_view" href=""> View All featured products<span class="pl-2 "><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                       </header>
                    </div>
                 </div>
              </div>
              <div class="row">
                 <div class="col-md-12">
                    <div class="product-lists">
                       <div class="right-side-wrapper">
                          <div class="grid-container2 best_selling">
                            @foreach (filter_products(\App\Product::where('published', 1)->where('featured', '1'))->limit(12)->get() as $key => $product)
                            {{-- @php
                                dd($product);
                            @endphp --}}
                                <div class="grid-item">
                                    <div class="product-grid-item">
                                    <div class="category-title">
                                        <div class="category">
                                            <a class="m-0" href="{{ route('products.category', $product->category->slug) }}">{{ $product->category->name }}</a>
                                        </div>
                                        <h6 class="title">
                                            <a href="{{ route('product', $product->slug) }}" class="">{{ __($product->name) }}</a>
                                        </h6>
                                    </div>
                                    <div class="product-grid-image">
                                        <a href="{{ route('product', $product->slug) }}">
                                            @php
                                                $filepath = $product->featured_img;
                                            @endphp
                                            @if(isset($filepath))
                                                @if (file_exists(public_path($filepath)))
                                                    <img src="{{ asset($product->featured_img) }}" alt="{{ $product->name }}" data-src="{{ asset($product->thumbnail_img) }}" class="img-fluid pic-1">
                                                @else
                                                    <img src="{{ asset('uploads/No_Image.jpg') }}" alt="{{ $product->name }}" data-src="{{ asset('uploads/No_Image.jpg') }}" class="img-fluid pic-1">
                                                @endif
                                            @else
                                                <img src="{{ asset('uploads/No_Image.jpg') }}" alt="{{ $product->name }}" data-src="{{ asset('uploads/No_Image.jpg') }}" class="img-fluid pic-1">
                                            @endif
                                        </a>
                                        <span class="product-discount-label">
                                            {{ ($product->discount_type == 'amount')?'Rs.':'' }}
                                            {{ $product->discount }}
                                            {{ !($product->discount_type == 'amount')?'%':'' }}                                            
                                        </span>
                                    </div>
                                    <div class="price-cart text-center pt-2">
                                        <div class="price d-flex align-items-center">
                                            <h6 class="m-0 gray">{{ home_discounted_base_price($product->id) }}</h6>
                                            @if(home_base_price($product->id) != home_discounted_base_price($product->id))
                                                <span>{{ home_base_price($product->id) }}</span>
                                            @endif
                                        </div>
                                        <a class="all-deals ico effect" onclick="showAddToCartModal({{ $product->id }})" data-toggle="tooltip" data-placement="right"
                                           title="Add to Cart"><i class="fa fa-shopping-cart icon"></i> </a>
                                    </div>
                                    <div class="cart-compare">
                                        <a class="all-deals effect gray" href="javasctipy:void(0);" onclick="addToWishList({{$product->id}})"
                                            ><i class="fa fa-heart icon mr-2"></i>Wishlist
                                        </a>
                                        <a class="all-deals effect gray" href="javasctipy:void(0);" onclick="addToCompare({{$product->id}})">
                                        <i class="fa fa-exchange icon mr-2"></i>Compare
                                        </a>
                                    </div>
                                    </div>
                                </div>
                            @endforeach
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </section>
    {{-- @endif --}}
 <!--============================================= BEST SELLING END ======-->
 @if (\App\BusinessSetting::where('type', 'best_selling')->first()->value == 1)
<section id="productlist" class="padding_bottom">
    <div class="container">
    <div class="row">
       <div class="col-md-12">
          <div class="section_title_block d-flex justify-content-between align-item-center h-100">
             <h2 class="position-relative mb-0">Best Selling</h2>
             {{-- <a class="btn_view" href=""> View All Best Selling  <span class="pl-2 "><i class="fa fa-angle-right" aria-hidden="true"></i></span></a> --}}
             </header>
          </div>
       </div>
       <div class="product-lists">
          <div class="right-side-wrapper">
             <div class="grid-container2 slider_feature">
                @foreach (filter_products(\App\Product::where('published', 1)->orderBy('num_of_sale', 'desc'))->limit(20)->get() as $key => $product)
                <div class="grid-item mb-4 ">
                  <div class="product-grid-item ">
                     <div class="category-title">
                        <div class="category">
                           <a class="m-0">{{ $product->category->name }}</a>
                        </div>
                        <h6 class="title">
                           <a href="{{ route('product', $product->slug) }}" class="">{{ __($product->name) }}</a>
                        </h6>
                     </div>
                     <div class="product-grid-image">
                        <a href="{{ route('product', $product->slug) }}">
                            @php
                                $filepath = $product->featured_img;
                            @endphp
                            @if(isset($filepath))
                                @if (file_exists(public_path($filepath)))
                                    <img src="{{ asset($product->featured_img) }}" alt="{{ $product->name }}" data-src="{{ asset($product->thumbnail_img) }}" class="img-fluid pic-1">
                                @else
                                    <img src="{{ asset('uploads/No_Image.jpg') }}" alt="{{ $product->name }}" data-src="{{ asset('uploads/No_Image.jpg') }}" class="img-fluid pic-1">
                                @endif
                            @else

                           <img src="https://infosecmonkey.com/wp-content/themes/InfoSecMonkey/assets/img/No_Image.jpg" data-src="{{ asset($product->thumbnail_img) }}" class="img-fluid pic-1">
                           @endif
                            </a>
                            @if (! $product->discount == 0)
                            <span class="product-discount-label">-{{$product->discount}}%</span>
                        @endif
                         </div>
                         <div class="price-cart text-center pt-2">
                            <div class="price d-flex align-items-center">
                               <h6 class="m-0 gray">{{ home_discounted_base_price($product->id) }}</h6>
                               @if(home_base_price($product->id) != home_discounted_base_price($product->id))
                                   <span>{{ home_base_price($product->id) }}</span>
                                   @endif
                            </div>
                            <a class="all-deals ico effect" onclick="showAddToCartModal({{ $product->id }})" data-toggle="tooltip" data-placement="right"
                               title="Add to Cart"><i class="fa fa-shopping-cart icon"></i> </a>
                         </div>
                         <div class="cart-compare">
                            <a class="all-deals effect gray" onclick="addToWishList({{ $product->id }})" tabindex="0"><i class="fa fa-heart icon mr-2"></i>Wishlist
                            </a>
                            <a class="all-deals effect gray" href=""> <i class="fa fa-exchange icon mr-2"></i>Compare
                            </a>
                         </div>
                      </div>
                   </div>
                   @endforeach
                </div>

                                <img src="{{ asset('uploads/No_Image.jpg') }}" alt="{{ $product->name }}" data-src="{{ asset('uploads/No_Image.jpg') }}" class="img-fluid pic-1">
                            @endif
                        </a>
                        @if (! $product->discount == 0)
                        <span class="product-discount-label">
                            {{ ($product->discount_type == 'amount')?'Rs.':'' }} {{ $product->discount }}{{ !($product->discount_type == 'amount')?' %':'' }}
                        </span>
                    @endif
                     </div>
                     <div class="price-cart text-center pt-2">
                        <div class="price d-flex align-items-center">
                           <h6 class="m-0 gray">{{ home_discounted_base_price($product->id) }}</h6>
                           @if(home_base_price($product->id) != home_discounted_base_price($product->id))
                               <span>{{ home_base_price($product->id) }}</span>
                               @endif
                        </div>
                        <a class="all-deals ico effect" onclick="showAddToCartModal({{ $product->id }})" data-toggle="tooltip" data-placement="right"
                           title="Add to Cart"><i class="fa fa-shopping-cart icon"></i> </a>
                     </div>
                     <div class="cart-compare">
                        <a class="all-deals effect gray" onclick="addToWishList({{ $product->id }})">
                            <i class="fa fa-heart icon mr-2"></i>Wishlist
                        </a>
                        <a class="all-deals effect gray" onclick="addToCompare({{ $product->id }})"> 
                            <i class="fa fa-exchange icon mr-2"></i>Compare
                        </a>
                     </div>
                  </div>
               </div>
               @endforeach

             </div>
          </div>
       </div>
    </div>
 </section>
 @endif

    {{-- <div id="section_featured">

    </div> --}}
     <!--============================================= BANNER START ======-->
   <section id="banner_two" class="mb-5">
    <div class="container">
       <div class="row">
        @foreach (\App\Banner::where('position', 1)->where('published', 1)->take(2)->get() as $key => $banner)
          <div class="col-md-6 mb-3">
             <a href="{{ $banner->url }}">
                <div class="two_banner_img">
                   <img src="{{ asset($banner->photo) }}" class="img-fluid" alt="{{ env('APP_NAME') }} promo">
                </div>
             </a>
          </div>
          @endforeach
       </div>
    </div>
 </section>
 <!--=========================================== BANNER END ======-->
 

    {{-- <div id="section_best_selling">

    </div> --}}

    {{-- @if(\App\BusinessSetting::where('type', 'classified_product')->first()->value == 1)
        @php
            $customer_products = \App\CustomerProduct::where('status', '1')->where('published', '1')->take(10)->get();
        @endphp
       @if (count($customer_products) > 0)
           <section class="mb-4">
               <div class="container">
                   <div class="px-2 py-4 p-md-4 bg-white shadow-sm">
                       <div class="section-title-1 clearfix">
                           <h3 class="heading-5 strong-700 mb-0 float-left">
                               <span class="mr-4">{{__('Classified Ads')}}</span>
                           </h3>
                           <ul class="inline-links float-right">
                               <li><a href="{{ route('customer.products') }}" class="active">{{__('View More')}}</a></li>
                           </ul>
                       </div>
                       <div class="caorusel-box arrow-round">
                           <div class="slick-carousel" data-slick-items="6" data-slick-xl-items="5" data-slick-lg-items="4"  data-slick-md-items="3" data-slick-sm-items="2" data-slick-xs-items="2">
                               @foreach ($customer_products as $key => $customer_product)
                                   <div class="product-card-2 card card-product my-2 mx-1 mx-sm-2 shop-cards shop-tech">
                                       <div class="card-body p-0">
                                           <div class="card-image">
                                               <a href="{{ route('customer.product', $customer_product->slug) }}" class="d-block">
                                                <img class="img-fit lazyload mx-auto" src="{{ asset('frontend/images/placeholder.jpg') }}" data-src="{{ asset(json_decode($customer_product->photos)[0]) }}" alt="{{ __($customer_product->name) }}">
                                               </a>
                                           </div>

                                           <div class="p-sm-3 p-2">
                                               <div class="price-box">
                                                   <span class="product-price strong-600">{{ single_price($customer_product->unit_price) }}</span>
                                               </div>
                                               <h2 class="product-title p-0 text-truncate-1">
                                                   <a href="{{ route('customer.product', $customer_product->slug) }}">{{ __($customer_product->name) }}</a>
                                               </h2>
                                               <div>
                                                   @if($customer_product->conditon == 'new')
                                                       <span class="product-label label-hot">{{__('new')}}</span>
                                                   @elseif($customer_product->conditon == 'used')
                                                       <span class="product-label label-hot">{{__('Used')}}</span>
                                                   @endif
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               @endforeach
                           </div>
                       </div>
                   </div>
               </div>
           </section>
       @endif
   @endif --}}

    {{-- <div class="mb-4">
        <div class="container">
            <div class="row gutters-10 ">
                @foreach (\App\Banner::where('position', 2)->where('published', 1)->get() as $key => $banner)
                    <div class="col-lg-{{ 12/count(\App\Banner::where('position', 2)->where('published', 1)->get()) }}">
                        <div class="media-banner mb-3 mb-lg-0">
                            <a href="{{ $banner->url }}" target="_blank" class="banner-container">
                                <img src="{{ asset('frontend/images/placeholder-rect.jpg') }}" data-src="{{ asset($banner->photo) }}" alt="{{ env('APP_NAME') }} promo" class="img-fluid lazyload">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div> --}}

    <!--============================================= JUST FOR YOU START ======-->
    <section id="product-listing-wrapper" class=" product_listing">
        <div class="container">
           <div class="product-lists">
              <div class="row">
                 <div class="col-md-12">
                    <div class="section_title_block d-flex justify-content-between align-item-center h-100">
                       <h2 class="position-relative mb-0">Latest Products</h2>
                       <a class="btn_view" href=""> View All <span class="pl-2 "><i class="fa fa-angle-right"
                                aria-hidden="true"></i></span></a>
                       </header>
                    </div>
                 </div>
  
                 <div class="col-xl-12">
  
                    <div class="grid-container  slider_feature">
                        @foreach (filter_products(\App\Product::orderBy('id','DESC')->where('current_stock','>',0)->with('stocks'))->limit(12)->get() as $key => $product)
                       <div class="grid-item mb-4">
                          <div class="product-grid-item">
                             <div class="category-title">
                                <div class="category">
                                   <a class="m-0">{{ $product->category->name }}</a>
                                </div>
                                <h6 class="title">
                                   <a href="{{ route('product', $product->slug) }}" class="">{{ __($product->name) }}</a>
                                </h6>
                             </div>
                             <div class="product-grid-image">
                                <a href="{{ route('product', $product->slug) }}">
                                    @php
                                $filepath = $product->featured_img;
                                @endphp
                                
                                @if(isset($filepath))
                                @if (file_exists(public_path($filepath)))
                                <img src="{{ asset($product->featured_img) }}" alt="{{ $product->name }}" data-src="{{ asset($product->thumbnail_img) }}" class="img-fluid pic-1">
                                @else
                                <img src="{{ asset('uploads/No_Image.jpg') }}" alt="{{ $product->name }}" data-src="{{ asset('uploads/No_Image.jpg') }}" class="img-fluid pic-1">
                                    @endif
                                @else
                                    <img src="{{ asset('uploads/No_Image.jpg') }}" alt="{{ $product->name }}" data-src="{{ asset('uploads/No_Image.jpg') }}" class="img-fluid pic-1">
                                @endif
                                {{-- @if(isset($filepath))
                                    <img src="{{ asset( $product->featured_img) }}" alt="{{ $product->name }}" data-src="{{ asset($product->thumbnail_img) }}" class="img-fluid pic-1"> </a>  
                                @else
                                    <img src="https://infosecmonkey.com/wp-content/themes/InfoSecMonkey/assets/img/No_Image.jpg" data-src="{{ asset($product->thumbnail_img) }}" class="img-fluid pic-1">
                                @endif --}}
                                </a>
                                
                                @if (! $product->discount == 0)                                
                                    <span class="product-discount-label">
                                        {{ ($product->discount_type == 'amount')?'Rs.':'' }} {{ $product->discount }}{{ !($product->discount_type == 'amount')?' %':'' }}
                                    </span>
                                @endif
                             </div>
                             <div class="price-cart text-center pt-2">
                                <div class="price d-flex align-items-center">
                                   <h6 class="m-0 gray">{{ home_discounted_base_price($product->id) }}</h6>
                                   @if(home_base_price($product->id) != home_discounted_base_price($product->id))
                                   <span>{{ home_base_price($product->id) }}</span>
                                   @endif
                                </div>
                                <a class="all-deals ico effect" onclick="showAddToCartModal({{ $product->id }})" data-toggle="tooltip" data-placement="right"
                                    title="Add to Cart"><i class="fa fa-shopping-cart icon"></i> </a>
                             </div>
                             <div class="cart-compare">
                                
                                
                        <a class="all-deals effect gray" onclick="addToWishList({{ $product->id }})">
                            <i class="fa fa-heart icon mr-2"></i>Wishlist
                        </a>
                        <a class="all-deals effect gray" onclick="addToCompare({{ $product->id }})"> 
                            <i class="fa fa-exchange icon mr-2"></i>Compare
                        </a>
                             </div>
                          </div>
                       </div>
                      @endforeach
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </section>
      <!--============================================= JUST FOR YOU END ======-->
    <div id="section_best_sellers">

    </div>


    <div id="section_home_categories">

    </div>
    <!-- <section class="mb-3">
        <div class="container">
            <div class="row gutters-10">
                <div class="col-lg-6">
                    <div class="section-title-1 clearfix">
                        <h3 class="heading-5 strong-700 mb-0 float-left">
                            <span class="mr-4">{{__('Top 10 Catogories')}}</span>
                        </h3>
                        <ul class="float-right inline-links">
                            <li>
                                <a href="{{ route('categories.all') }}" class="active">{{__('View All Catogories')}}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="row gutters-5">
                    <div class="mb-3 col-6">
                                <a href="#" class="bg-white border d-block c-base-2 box-2 icon-anim pl-2">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col-3 text-center">
                                            <img src="" data-src="" alt="" class="img-fluid img lazyload">
                                        </div>
                                        <div class="info col-7">
                                            <div class="name text-truncate pl-3 py-4">dfsf</div>
                                        </div>
                                        <div class="col-2 text-center">
                                            <i class="la la-angle-right c-base-1"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @foreach (\App\Category::where('top', 1)->get() as $category)
                            <div class="mb-3 col-6">
                                <a href="{{ route('products.category', $category->slug) }}" class="bg-white border d-block c-base-2 box-2 icon-anim pl-2">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col-3 text-center">
                                            <img src="{{ asset('frontend/images/placeholder.jpg') }}" data-src="{{ asset($category->banner) }}" alt="{{ __($category->name) }}" class="img-fluid img lazyload">
                                        </div>
                                        <div class="info col-7">
                                            <div class="name text-truncate pl-3 py-4">{{ __($category->name) }}</div>
                                        </div>
                                        <div class="col-2 text-center">
                                            <i class="la la-angle-right c-base-1"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="section-title-1 clearfix">
                        <h3 class="heading-5 strong-700 mb-0 float-left">
                            <span class="mr-4">{{__('Top 10 Brands')}}</span>
                        </h3>
                        <ul class="float-right inline-links">
                            <li>
                                <a href="{{ route('brands.all') }}" class="active">{{__('View All Brands')}}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="row gutters-5">
                        @foreach (\App\Brand::where('top', 1)->get() as $brand)
                            <div class="mb-3 col-6">
                                <a href="{{ route('products.brand', $brand->slug) }}" class="bg-white border d-block c-base-2 box-2 icon-anim pl-2">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col-3 text-center">
                                            <img src="{{ asset('frontend/images/placeholder.jpg') }}" data-src="{{ asset($brand->logo) }}" alt="{{ __($brand->name) }}" class="img-fluid img lazyload">
                                        </div>
                                        <div class="info col-7">
                                            <div class="name text-truncate pl-3 py-4">{{ __($brand->name) }}</div>
                                        </div>
                                        <div class="col-2 text-center">
                                            <i class="la la-angle-right c-base-1"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section> -->
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            // flash counter
            var data=@json($time);
            var countDownDate = new Date(data).getTime();

            // Update the count down every 1 second
            var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();
            //   alert(countDownDate);

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            // console.log(document.getElementsByClassName("demo"));

            // Output the result in an element with id="demo"
            $('.demo').text(days + " days : " + hours + " hours : "+ minutes + " minutes : " + seconds + " seconds");
            //document.getElementsByClassName("demo").innerHTML = days + "d " + hours + "h "+ minutes + "m " + seconds + "s ";

            // If the count down is over, write some text
            if (distance < 0) {
            clearInterval(x);
            $('.demo').text("EXPIRED");
            //document.getElementsByClassName("demo").innerHTML = "EXPIRED";
            }
            }, 1000);
            // flash counter

            $.post('{{ route('home.section.featured') }}', {_token:'{{ csrf_token() }}'}, function(data){
                // console.log(data);
                $('#section_featured').html(data);
                slickInit();
            });

            $.post('{{ route('home.section.best_selling') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_best_selling').html(data);
                slickInit();
            });

            $.post('{{ route('home.section.home_categories') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_home_categories').html(data);
                slickInit();
            });

            $.post('{{ route('home.section.best_sellers') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_best_sellers').html(data);
                slickInit();
            });
        });
    </script>
@endsection

