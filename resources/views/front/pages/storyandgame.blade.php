@extends('front.layouts.master')
@section('content')

 <div class="mdk-header-layout__content page-content ">
                <div class="bg-primary pb-lg-64pt py-32pt">
                    <div class="container page__container">
                        {{-- <div class="js-player embed-responsive embed-responsive-16by9 mb-32pt">
                            <div class="player embed-responsive-item">
                                <div class="player__content">
                                    <div class="player__image"
                                         style="--player-image: url(public/images/illustration/player.svg)"></div>
                                    <a href=""
                                       class="player__play bg-primary">
                                        <span class="material-icons">play_arrow</span>
                                    </a>
                                </div>
                            </div>
                                <div class="player__embed d-none">
                                    {{!! $storyandgame[0]['url'] !!}}
                                </div>
                        </div> --}}
                        {!! $storyandgame[0]['url'] !!}
                        <div class="d-flex flex-wrap align-items-end mb-16pt">
                            <h1 class="text-white flex m-0"></h1>
                            <p class="h1 text-white-50 font-weight-light m-0"></p>
                        </div>

                        {{-- <p class="hero__lead measure-hero-lead text-white-50 mb-24pt">day2day is now used to power backends, create hybrid mobile applications, architect cloud solutions, design neural networks and even control robots. Enter TypeScript: a superset of JavaScript for scalable, secure, performant and feature-rich applications.</p> --}}

                        <div class="d-flex flex-column flex-sm-row align-items-center justify-content-start">
                             {{ $storyandgame->links() }}
                            {{-- <a href="#"
                               class="btn btn-outline-white mb-16pt mb-sm-0 mr-sm-16pt">Watch Next <i class="material-icons icon--right">play_circle_outline</i></a> --}}
                            <a href="{{ url('/') }}" class="btn btn-white">Go Back</a>
                        </div>
                    </div>
                </div>
            </div>


@endsection

@section('script')
<script>
    $("iframe").css({'width':'100%','height':'500px'});
    $('.inline-flex').addClass('btn btn-white');
</script>
@endsection

