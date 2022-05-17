@extends('front.layouts.master')

@section('content')
   <!--section-scroll-->
    <div class="section-scroll wrapper-full no-margin">
        <div class="container-fluid">
            <div class="section-scroll-marquee">
                <div class="marquee page-title">***********Latest Blog Post*********</div>
            </div>
        </div>
    </div>
    <!--Blog-home-->
    <section class="blog-home6">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 ">
                    <!--post1-->

                    @foreach($post as $item)  

                    <div class="post-list post-list-style4">
                        <div class="post-list-image">
                            <a href="{{ route('home.post',$item->slug) }}">
                                <img class="img-br" src="{{$item->image}}" alt="">
                            </a>
                        </div>
                        <div class="post-list-content">
                            <ul class="entry-meta">
                                <li class="entry-cat">
                                    <a  class="category-style-1">Branding</a>
                                </li>
                                <li class="post-date"> <span class="line"></span> {{$item->created_at}}</li>
                            </ul>
                            <h4 class="entry-title">
                                <a href="{{ route('home.post',$item->slug) }}">{{$item->title}}</a>
                            </h4>
                            <div class="post-btn">
                                <a href="{{ route('home.post',$item->slug) }}" class="btn-read-more">Continue Reading <i class="las la-long-arrow-alt-right"></i></a>
                            </div>
                        </div>
                        <div class="post-list-exerpt">
                            <div class="post-exerpt">
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                    Sapiente nesciunt dicta minima iure ducimus id fugit tenetur qui quo eum pariatur
                                    suscipit rerum minus deserunt,
                                    obcaecati, quidem libero. Quis officiis maiores quia distinctio tempore natus,
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach

                   
                    <!--pagination-->
                    {{-- <div class="pagination">
                        <div class="pagination-area">
                            <div class="pagination-list">
                                <ul class="list-inline">
                                    <li><a href="#"><i class="las la-arrow-left"></i></a></li>
                                    <li><a href="#" class="active">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#"><i class="las la-arrow-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div> --}}
                    <!--/-->
                </div>
            </div>
        </div>
    </section>

@endsection
@section('script')
{{-- <script src="{{ URL::asset('assets/libs/morris-js/morris-js.min.js')}}"></script> --}}
@endsection