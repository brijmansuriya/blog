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
            @foreach($coursesdata as $value)
               
                <div class="col-md-6 col-lg-4 col-xl-3 card-group-row__col">
                    <div class="card card-sm card--elevated p-relative o-hidden overlay overlay--primary-dodger-blue js-overlay card-group-row__card" data-toggle="popover" data-trigger="click">
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
                                    {{-- <small class="text-50 font-weight-bold mb-4pt">Level 2</small> --}}
                                </div>
                                {{-- <a href="#" data-toggle="tooltip" data-title="Add Favorite" data-placement="top" data-boundary="window" class="ml-4pt material-icons text-20 card-course__icon-favorite">favorite_border</a> --}}
                            </div>
                            {{-- <div class="d-flex">
                                <div class="rating flex">
                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                    <span class="rating__item"><span class="material-icons">star_border</span></span>
                                </div>
                            </div> --}}
                        </div>
                        {{-- <div class="card-footer">
                            <div class="row justify-content-between">
                                <div class="col-auto d-flex align-items-center">
                                    <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                    <p class="flex text-50 lh-1 mb-0"><small>6 hours</small></p>
                                </div>
                                <div class="col-auto d-flex align-items-center">
                                    <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                    <p class="flex text-50 lh-1 mb-0"><small>12 lessons</small></p>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            @endforeach
            @endif
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
@endsection
