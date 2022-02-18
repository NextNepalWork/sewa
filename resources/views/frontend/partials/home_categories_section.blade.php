@foreach (\App\HomeCategory::where('status', 1)->get() as $key => $homeCategory)
    @if ($homeCategory->category != null)
    {{-- @php
    echo '<pre>';
        print_r($homeCategory->category);
        echo '</pre>';
    @endphp --}}
    <section class="mb-4">
        <div class="container">
            <div class="px-2 py-4 p-md-4 bg-white shadow-sm">
                <div class="section-title-1 clearfix">
                   <div class="section_title_block d-flex justify-content-between align-item-center h-100">
                      <h2 class="position-relative mb-0">{{ __($homeCategory->category->name) }}</h2>
                      <a class="btn_view" href="{{ route('products.category', $homeCategory->category->slug) }}"> View All <span class="pl-2 "><i class="fa fa-angle-right"
                               aria-hidden="true"></i></span></a>
                      </header>
                   </div>
                </div>
                {{-- <div class="section-title-1 clearfix">
                    <h3 class="heading-5 strong-700 mb-0 float-lg-left">
                        <span class="mr-4">{{ __($homeCategory->category->name) }}</span>
                    </h3>
                    <ul class="inline-links float-lg-right nav mt-3 mb-2 m-lg-0">
                        <li><a href="{{ route('products.category', $homeCategory->category->slug) }}" class="active">View More</a></li>
                    </ul>
                </div> --}}
                <div class="caorusel-box arrow-round gutters-5">
                    <div class="slick-carousel" data-slick-items="6" data-slick-xl-items="5" data-slick-lg-items="4"  data-slick-md-items="3" data-slick-sm-items="2" data-slick-xs-items="2">
                    @foreach (filter_products(\App\Product::where('published', 1)->where('category_id', $homeCategory->category->id))->latest()->limit(12)->get() as $key => $product)
                        <div class="caorusel-card">
                            <div class="product-box-2 bg-white alt-box my-2">
                                <div class="position-relative overflow-hidden">
                                    @php
                                        $image = 'uploads/No_Image.jpg';
                                        if (!($product->photos)->isEmpty()) {
                                            $json = json_decode($product->photos);
                                            if (array_key_exists('0', $json)) {                                                            
                                                if (file_exists(public_path($filepath))){
                                                    $image = $json[0];
                                                }
                                            }
                                        }
                                        
                                    @endphp
                                    <a href="{{ route('product', $product->slug) }}" class="d-block product-image h-100 text-center">
                                    <img class="img-fit lazyload" src="{{ asset('frontend/images/placeholder.jpg') }}" 
                                    data-src="{{ asset($image) }}" alt="{{ __($product->name) }}">
                                    </a>
                                    <div class="product-btns clearfix">
                                        <button class="btn add-wishlist" title="Add to Wishlist" onclick="addToWishList({{ $product->id }})" tabindex="0">
                                            <i class="la la-heart-o"></i>
                                        </button>
                                        <button class="btn add-compare" title="Add to Compare" onclick="addToCompare({{ $product->id }})" tabindex="0">
                                            <i class="la la-refresh"></i>
                                        </button>
                                        <button class="btn quick-view" title="Quick view" onclick="showAddToCartModal({{ $product->id }})" tabindex="0">
                                            <i class="la la-eye"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="p-md-3 p-2">
                                    <div class="price-box d-flex align-items-center">
                                        @if(home_base_price($product->id) != home_discounted_base_price($product->id))
                                            <span class="cut-price">{{ home_base_price($product->id) }}</span>
                                        @endif
                                            <h6 class="m-0 gray">{{ home_discounted_base_price($product->id) }}</h6>
                                        {{-- <span class="product-price strong-600">{{ home_discounted_base_price($product->id) }}</span> --}}
                                    </div>
                                    <div class="star-rating star-rating-sm mt-1">
                                        {{ renderStarRating($product->rating) }}
                                    </div>
                                    <h6 class="product-title p-0">
                                        <a href="{{ route('product', $product->slug) }}" class="text-truncate theme-color-sub">{{ __($product->name) }}</a>
                                    </h6>
                                    @if (\App\Addon::where('unique_identifier', 'club_point')->first() != null && \App\Addon::where('unique_identifier', 'club_point')->first()->activated)
                                        <div class="club-point mt-2 bg-soft-base-1 border-light-base-1 border">
                                            {{ __('Club Point') }}:
                                            <span class="strong-700 float-right">{{ $product->earn_point }}</span>
                                        </div>
                                    @endif
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
@endforeach
