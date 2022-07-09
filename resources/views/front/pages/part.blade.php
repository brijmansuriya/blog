@extends('front.layouts.master')
@section('content')

<div class="mdk-header-layout__content page-content ">

    <div class="page-section border-bottom-2">
        <div class="container page__container">

            <div class="page-separator">
                <div class="page-separator__text">Start Now</div>
            </div>
            <div class="row">
            @foreach($gameandstory as $gameandstorys)
                <div class="col-sm-6 col-md-6 col-xl-6">
                    <div class="card card-sm card--elevated p-relative o-hidden overlay overlay--primary js-overlay mdk-reveal js-mdk-reveal " data-partial-height="44" data-toggle="popover" data-trigger="click">
                        <a href="#" class="js-image" data-position="">
                            <img src="{{url('public/images/paths/sketch_430x168.png')}}" alt="course">
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
                                        <a class="card-title mb-4pt" href="#">{{$gameandstorys->name}}</a>
                                    </div>
                                    <a href="instructor-edit-course.html" class="ml-4pt material-icons text-20 card-course__icon-favorite">edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
                {{-- <div class="col-sm-6 col-md-6 col-xl-6">
                            <div class="card card-sm card--elevated p-relative o-hidden overlay overlay--primary js-overlay mdk-reveal js-mdk-reveal "
                                 data-partial-height="44"
                                 data-toggle="popover"
                                 data-trigger="click">
                                <a href="game.php"
                                   class="js-image"
                                   data-position="">
                                    <img src="public/images/paths/sketch_430x168.png"
                                         alt="course">
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
                                                <a class="card-title mb-4pt"
                                                   href="game.php">Game</a>
                                            </div>
                                            <a href="game.php"
                                               class="ml-4pt material-icons text-20 card-course__icon-favorite">edit</a>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div> --}}
            </div>
        </div>
    </div>
</div>



{{-- <div class="mdk-header-layout__content page-content">
              @include('front.include.flash-message')
                <div class="py-32pt navbar-submenu">
                    <div class="container page__container">
                        <div class="progression-bar progression-bar--active-accent">
                            <span class="progression-bar__item-content">
                                <i class="material-icons progression-bar__item-icon"></i>
                                <span class="progression-bar__item-text h5 mb-0 text-uppercase">Teacher Registration details</span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="pt-32pt pt-sm-64pt pb-32pt">
                    <div class="container page__container">
                        <div class="page-section container page__container">
                            <div class="col-md-7 p-0">
                                <div class="form-group">
                                    <label class="form-label"
                                        >School photo</label
                                    >
                                    <div class="media align-items-center">
                                        <a href="" class="media-left mr-16pt">
                                            <img
                                                src="public/images/people/110/guy-3.jpg"
                                                alt="people"
                                                width="56"
                                                class="rounded-circle"
                                            />
                                        </a>
                                        <div class="media-body">
                                            <div class="custom-file">
                                                <input
                                                    type="file"
                                                    class="custom-file-input"
                                                    id="inputGroupFile01"
                                                />
                                                <label
                                                    class="custom-file-label"
                                                    for="inputGroupFile01"
                                                    >Choose file</label
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">
                                        School name</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        value="Arena School"
                                        placeholder="Your profile name ..."
                                    />
                                    <small class="form-text text-muted"
                                        >Your profile name will be used as part
                                        of your public profile URL
                                        address.</small
                                    >
                                </div>

                                <div class="form-group">
                                    <label class="form-label">About you</label>
                                    <textarea
                                        rows="3"
                                        class="form-control"
                                        placeholder="About you ..."
                                    ></textarea>
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input
                                            type="checkbox"
                                            class="custom-control-input"
                                            checked
                                            id="customCheck1"
                                        />
                                        <label
                                            class="custom-control-label"
                                            for="customCheck1"
                                            >Display your real name on your
                                            profile</label
                                        >
                                        <small class="form-text text-muted"
                                            >If unchecked, your profile name
                                            will be displayed instead of your
                                            full name.</small
                                        >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input
                                            type="checkbox"
                                            class="custom-control-input"
                                            checked
                                            id="customCheck2"
                                        />
                                        <label
                                            class="custom-control-label"
                                            for="customCheck2"
                                            >Allow everyone to see your
                                            profile</label
                                        >
                                        <small class="form-text text-muted"
                                            >If unchecked, your profile will be
                                            private and no one except you will
                                            be able to view it.</small
                                        >
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    Save changes
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
@endsection