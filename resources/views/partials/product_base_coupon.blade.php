@if (Auth::user()->user_type == 'admin')
    <div class="panel-heading">
        <h3 class="panel-title">{{ __('Add Your Product Base Coupon') }}</h3>
    </div>
    <div class="form-group">
        <label class="col-lg-3 control-label" for="coupon_code">{{ __('Coupon code') }}</label>
        <div class="col-lg-9">
            <input type="text" placeholder="{{ __('Coupon code') }}" id="coupon_code" name="coupon_code"
                class="form-control" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-3 control-label" for="coupon_code">{{ __('New Customer Coupon') }}</label>
        <div class="col-lg-9">
            <input type="hidden" name="newCustomerCoupon" value='0'>
            <input type="checkbox" id="newCustomerCoupon" name="newCustomerCoupon" value='1'>
        </div>
    </div>
    <div class="product-choose-list">
        <div class="product-choose">
            <div class="form-group">
                <label class="col-lg-3 control-label">{{ __('Category') }}</label>
                <div class="col-lg-9">
                    <select class="form-control category_id demo-select2" name="category_ids[]" required>
                        @foreach (\App\Category::all() as $key => $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group" id="subcategory">
                <label class="col-lg-3 control-label">{{ __('Sub Category') }}</label>
                <div class="col-lg-9">
                    <select class="form-control subcategory_id demo-select2" name="subcategory_ids[]" required>

                    </select>
                </div>
            </div>
            <div class="form-group" id="subsubcategory">
                <label class="col-lg-3 control-label">{{ __('Sub Sub Category') }}</label>
                <div class="col-lg-9">
                    <select class="form-control subsubcategory_id demo-select2" name="subsubcategory_ids[]" required>

                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label" for="name">{{ __('Product') }}</label>
                <div class="col-lg-9">
                    <select name="product_ids[]" class="form-control product_id demo-select2" required>

                    </select>
                </div>
            </div>
            <hr>
        </div>
    </div>
    <div class="more hide">
        <div class="product-choose">
            <div class="form-group">
                <label class="col-lg-3 control-label">{{ __('Category') }}</label>
                <div class="col-lg-9">
                    <select class="form-control category_id" name="category_ids[]"
                        onchange="get_subcategories_by_category(this)">
                        @foreach (\App\Category::all() as $key => $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group" id="subcategory">
                <label class="col-lg-3 control-label">{{ __('Subcategory') }}</label>
                <div class="col-lg-9">
                    <select class="form-control subcategory_id" name="subcategory_ids[]"
                        onchange="get_subsubcategories_by_subcategory(this)">

                    </select>
                </div>
            </div>
            <div class="form-group" id="subsubcategory">
                <label class="col-lg-3 control-label">{{ __('Sub Sub Category') }}</label>
                <div class="col-lg-9">
                    <select class="form-control subsubcategory_id" name="subsubcategory_ids[]"
                        onchange="get_products_by_subsubcategory(this)">

                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label" for="name">{{ __('Product') }}</label>
                <div class="col-lg-9">
                    <select name="product_ids[]" class="form-control product_id">

                    </select>
                </div>
            </div>
            <hr>
        </div>
    </div>
    <div class="text-right">
        <button class="btn btn-primary" type="button" name="button"
            onclick="appendNewProductChoose()">{{ __('Add More') }}</button>
    </div>
    <br>
    <div class="form-group">
        <label class="col-lg-3 control-label" for="start_date">{{ __('Date') }}</label>
        <div class="col-lg-9">
            <div id="demo-dp-range">
                <div class="input-daterange input-group" id="datepicker">
                    <input type="text" class="form-control" name="start_date">
                    <span class="input-group-addon">{{ __('to') }}</span>
                    <input type="text" class="form-control" name="end_date">
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-3 control-label">{{ __('Discount') }}</label>
        <div class="col-lg-8">
            <input type="number" min="0" step="0.01" placeholder="{{ __('Discount') }}" name="discount"
                class="form-control" required>
        </div>
        <div class="col-lg-1">
            <select class="demo-select2" name="discount_type">
                <option value="amount">$</option>
                <option value="percent">%</option>
            </select>
        </div>
    </div>
@else
    <div class="form-box-title px-3 py-2">
        {{ __('Add Your Product Base Coupon') }}
    </div>
    <div class="form-box-content p-3">
        <div class="row">
            <label class="col-md-2 control-label" for="coupon_code">{{ __('Coupon code') }}</label>
            <div class="col-md-10">
                <input type="text" placeholder="{{ __('Coupon code') }}" id="coupon_code" name="coupon_code"
                    class="form-control" required>
            </div>
        </div>
        <br/>
        <div class="row">
            <label class="col-md-2 control-label" for="coupon_code">{{ __('New Customer Coupon') }}</label>
            <div class="col-md-10">
                <input type="hidden" name="newCustomerCoupon" value='0'>
                <input type="checkbox" id="newCustomerCoupon" name="newCustomerCoupon" value='1'>
            </div>
        </div>
        <br/>
        <div class="product-choose-list">
            <div class="product-choose">
                <div class="row">
                    <div class="col-md-2">
                        <label>{{ __('Category') }} <span class="required-star">*</span></label>
                    </div>
                    <div class="col-md-10">
                        <select class="form-control category_id demo-select2" name="category_ids[]" required>
                            <option value=""></option>
                            @foreach (\App\Category::all() as $key => $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br/>
                <div class="row" id="subcategory">
                    <div class="col-md-2">
                        <label>{{ __('Sub Category') }} <span class="required-star">*</span></label>
                    </div>
                    <div class="col-md-10">
                        <select class="form-control subcategory_id demo-select2" name="subcategory_ids[]" required>

                        </select>
                    </div>
                </div>
                <br/>
                <div class="row" id="subsubcategory">
                    <label class="col-md-2 control-label">{{ __('Sub Sub Category') }}</label>
                    <div class="col-md-10">
                        <select class="form-control subsubcategory_id demo-select2" name="subsubcategory_ids[]"
                            required>

                        </select>
                    </div>
                </div>
                <br/>
                <div class="row">
                    <label class="col-md-2 control-label" for="name">{{ __('Product') }}</label>
                    <div class="col-md-10">
                        <select name="product_ids[]" class="form-control product_id demo-select2" required>

                        </select>
                    </div>
                </div>
                <hr>
            </div>
        </div>
        <div class="more" hidden="hidden">
            <div class="product-choose">
                <div class="row">
                    <label class="col-md-2 control-label">{{ __('Category') }}</label>
                    <div class="col-md-10">
                        <select class="form-control category_id" name="category_ids[]"
                            onchange="get_subcategories_by_category(this)">
                            @foreach (\App\Category::all() as $key => $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br/>
                <div class="row" id="subcategory">
                    <label class="col-md-2 control-label">{{ __('Subcategory') }}</label>
                    <div class="col-md-10">
                        <select class="form-control subcategory_id" name="subcategory_ids[]"
                            onchange="get_subsubcategories_by_subcategory(this)">

                        </select>
                    </div>
                </div>
                <br/>
                <div class="row" id="subsubcategory">
                    <label class="col-md-2 control-label">{{ __('Sub Sub Category') }}</label>
                    <div class="col-md-10">
                        <select class="form-control subsubcategory_id" name="subsubcategory_ids[]"
                            onchange="get_products_by_subsubcategory(this)">

                        </select>
                    </div>
                </div>
                <br/>
                <div class="row">
                    <label class="col-md-2 control-label" for="name">{{ __('Product') }}</label>
                    <div class="col-md-10">
                        <select name="product_ids[]" class="form-control product_id">

                        </select>
                    </div>
                </div>
                <hr>
            </div>
        </div>
        <div class="text-right">
            <button class="btn btn-primary" type="button" name="button"
                onclick="appendNewProductChoose()">{{ __('Add More') }}</button>
        </div>
        <br/>
        <div class="row">
            <label class="col-md-2 control-label" for="start_date">{{ __('Date') }}</label>
            <div class="col-md-10">
                <div id="demo-dp-range">
                    <div class="input-daterange input-group" id="datepicker">
                        <input type="text" class="form-control" name="start_date">
                        <span class="input-group-addon">{{ __('to') }}</span>
                        <input type="text" class="form-control" name="end_date">
                    </div>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <label class="col-md-2 control-label">{{ __('Discount') }}</label>
            <div class="col-md-8">
                <input type="number" min="0" step="0.01" placeholder="{{ __('Discount') }}" name="discount"
                    class="form-control" required>
            </div>
            <div class="col-md-2">
                <select class="demo-select2" name="discount_type">
                    <option value="amount">$</option>
                    <option value="percent">%</option>
                </select>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-md-12 offset-md-2">
                <button class="btn btn-purple" type="submit">{{__('Save')}}</button>
            </div>
        </div>
    </div>
@endif

<script type="text/javascript">
    function appendNewProductChoose() {
        $('.product-choose-list').append($('.more').html());
        $('.product-choose-list').find('.product-choose').last().find('.category_id').select2();
    }

    function get_subcategories_by_category(el) {
        var category_id = $(el).val();
        console.log(category_id);
        $(el).closest('.product-choose').find('.subcategory_id').html(null);
        $.post('{{ route('subcategories.get_subcategories_by_category') }}', {
            _token: '{{ csrf_token() }}',
            category_id: category_id
        }, function(data) {
            for (var i = 0; i < data.length; i++) {
                $(el).closest('.product-choose').find('.subcategory_id').append($('<option>', {
                    value: data[i].id,
                    text: data[i].name
                }));
            }
            $(el).closest('.product-choose').find('.subcategory_id').select2();
            get_subsubcategories_by_subcategory($(el).closest('.product-choose').find('.subcategory_id'));
        });
    }

    function get_subsubcategories_by_subcategory(el) {
        var subcategory_id = $(el).val();
        console.log(subcategory_id);
        $(el).closest('.product-choose').find('.subsubcategory_id').html(null);
        $.post('{{ route('subsubcategories.get_subsubcategories_by_subcategory') }}', {
            _token: '{{ csrf_token() }}',
            subcategory_id: subcategory_id
        }, function(data) {
            for (var i = 0; i < data.length; i++) {
                $(el).closest('.product-choose').find('.subsubcategory_id').append($('<option>', {
                    value: data[i].id,
                    text: data[i].name
                }));
            }
            $(el).closest('.product-choose').find('.subsubcategory_id').select2();
            get_products_by_subsubcategory($(el).closest('.product-choose').find('.subsubcategory_id'));
        });
    }

    function get_products_by_subsubcategory(el) {
        var subsubcategory_id = $(el).val();
        console.log(subsubcategory_id);
        $(el).closest('.product-choose').find('.product_id').html(null);
        $.post('{{ route('products.get_products_by_subsubcategory') }}', {
            _token: '{{ csrf_token() }}',
            subsubcategory_id: subsubcategory_id
        }, function(data) {
            for (var i = 0; i < data.length; i++) {
                $(el).closest('.product-choose').find('.product_id').append($('<option>', {
                    value: data[i].id,
                    text: data[i].name
                }));
            }
            $(el).closest('.product-choose').find('.product_id').select2();
        });
    }

    $(document).ready(function() {
        $('.demo-select2').select2();
        //get_subcategories_by_category($('.category_id'));
    });

    $('.category_id').on('change', function() {
        get_subcategories_by_category(this);
    });

    $('.subcategory_id').on('change', function() {
        get_subsubcategories_by_subcategory(this);
    });

    $('.subsubcategory_id').on('change', function() {
        get_products_by_subsubcategory(this);
    });
</script>
