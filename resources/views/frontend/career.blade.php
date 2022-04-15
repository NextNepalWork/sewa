@extends('frontend.layouts.app')


@section('content')
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col">
                    <ul class="breadcrumb">
                        <li><a href="{{ route('home') }}">{{__('Home')}}</a></li>
                        <li>Career</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="gry-bg py-4">
        <div class="container sm-px-0">
            <div class="row">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-sm-3" for="name">{{ __('Name') }}</label>
                        <input type="text" placeholder="{{ __('Name') }}" id="name" name="name" class="form-control"
                                required>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3" for="subject">{{ __('Subject') }}</label>
                        <input type="text" placeholder="{{ __('Subject') }}" id="subject" name="subject" class="form-control"
                                required>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3" for="message">{{ __('Message') }}</label>
                        <textarea name="message" id="" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label class="control-label">{{ __('CV') }}</label>
                            <input type="file">
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
                {{-- <div class="col-xl-9 "> --}}
                    {{-- {!! $page->content !!} --}}
                {{-- </div> --}}
            </div>
        </div>
    </section>
@endsection