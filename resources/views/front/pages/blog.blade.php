@extends('front.layouts.master')


@section('content')

<body>
    <!--post-single-->
    <section class="post-single post-single-layout-2">
        <div class="post-single-image">
            <img src="{{ asset('frontend/assets/img/blog/lg-1.jpg') }}" style="height: 200px;width: 100%;" alt="">
        </div>
           
        <div class="container-fluid">
            <div class="row">
                <!--content-->
                <div class="col-lg-8 oredoo-content">
                    <div class="theiaStickySidebar">
                             <div class="post-single-title">  
                                <h3> {{$postdata->title}}</h3>        
                                <ul class="entry-meta">
                                    <li class="post-author-img"><img src="{{ asset('frontend/assets/img/author/1.jpg') }}" alt=""></li>
                                    <li class="post-author"> <a href="author.html">Meriam Smith</a></li>
                                    <li class="entry-cat"> <a href="blog-layout-1.html" class="category-style-1"> <span class="line"></span> Livestyle</a></li>
                                    <li class="post-date"> <span class="line"></span> february 10 ,2022</li>
                                </ul>
                                
                            </div>

                          {!!$postdata->body!!}
                          
                   </div>
                </div>

                @include('front.layouts.right-sidebar')
            </div>
        </div>
    </section>
</body>



@endsection
@section('script')
{{-- <script src="{{ URL::asset('assets/libs/morris-js/morris-js.min.js')}}"></script> --}}
@endsection
