@extends('front.layouts.master')
@section('content')

<div class="mdk-header-layout__content page-content ">

    <div class="page-section border-bottom-2">
        <div class="container page__container">

             @if($storyandgame != '' AND count($storyandgame))
            <div class="page-separator">
                <div class="page-separator__text">Start Now</div>
            </div>
            <div class="row">
         
            @foreach($storyandgame as $gameandstorys)

                <div class="col-sm-6 col-md-6 col-xl-6">
                    <div class="card card-sm card--elevated p-relative o-hidden overlay overlay--primary js-overlay mdk-reveal js-mdk-reveal " data-partial-height="44" data-toggle="popover" data-trigger="click">
                        <a href="{{ route('gameandstory',$gameandstorys->id) }}" class="js-image" data-position="">
                            <img src="{{url('public_front/images/paths/sketch_430x168.png')}}" alt="course">
                            <span class="overlay__content align-items-start justify-content-start">
                                <span class="overlay__action card-body d-flex align-items-center">
                                    <i class="material-icons mr-4pt">edit</i>
                                    <span class="card-title text-white">Edit</span>
                                </span>
                            </span>
                        </a>
                        <div class="mdk-reveal__content">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex">
                                        <a class="card-title mb-4pt" href="{{ route('gameandstory',$gameandstorys->id) }}">{{$gameandstorys->name}}</a>
                                    </div>
                                    <a href="instructor-edit-course.html" class="ml-4pt material-icons text-20 card-course__icon-favorite">edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <h2>No Data<h2>
            @endif


            </div>
        </div>
    </div>
</div>

@endsection
