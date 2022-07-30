@extends('front.layouts.master')
@section('content')

<div class="mdk-header-layout__content page-content ">
@include('front.include.flash-message')
    <div class="page-section border-bottom-2">
        <div class="container page__container">
      
            @if($coursesdata != "" AND count($coursesdata)>0)
            <div class="page-separator">
                <div class="page-separator__text"> Courses</div>
            </div>
            <div class="row card-group-row">
            @forelse($coursesdata as $value)
                <div class="col-md-6 col-lg-4 col-xl-3 card-group-row__col">
                    <div class="card card-sm card--elevated p-relative o-hidden overlay js-overlay card-group-row__card" data-toggle="popover" data-trigger="click">
                        <a href="{{ route('coursesview',$value->id) }}" class="card-img-top js-image" data-position="" data-height="140" style="background-image: url('<?=$value->image?>');">
                            <img src="{{$value->image}}" alt="course">
                            <span class="overlay__content">
                                <span class="overlay__action d-flex flex-column text-center">
                                    <i class="material-icons icon-32pt">play_circle_outline</i>
                                    <span class="card-title text-white">Preview</span>
                                </span>
                            </span>
                        </a>
                        <div class="card-body flex">
                            <div class="d-flex">
                                <div class="flex">
                                    <a class="card-title" href="{{ route('coursesview',$value->id) }}">{{$value->name}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p>Please Login</p>
            @endforelse
            @else
                <h2>Please Login</h2>

            @endif
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
@endsection
