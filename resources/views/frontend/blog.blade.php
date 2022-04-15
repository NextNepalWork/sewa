@extends('frontend.layouts.app')


@section('content')
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col">
                    <ul class="breadcrumb">
                        <li><a href="{{ route('home') }}">{{__('Home')}}</a></li>
                        <li>Blog</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="gry-bg py-4">
        <div class="container sm-px-0">
            <div class="row">
                <form action="">
                    <div class="form-group">
                        <label class="col-sm-3" for="title">{{ __('Name') }}</label>
                        <input type="text" placeholder="{{ __('Title') }}" id="title" name="title" class="form-control"
                                required>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3" for="title">{{ __('Subject') }}</label>
                        <input type="text" placeholder="{{ __('Title') }}" id="title" name="title" class="form-control"
                                required>
                    </div>
                </form>
                {{-- <div class="col-xl-9 "> --}}
                    {{-- {!! $page->content !!} --}}
                {{-- </div> --}}
            </div>
        </div>
    </section>
@endsection