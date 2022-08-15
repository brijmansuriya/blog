@extends('front.layouts.master')

@section('css')
<style>
.page-item.active .page-link {
    background-color: #191b1d;
    border-color: #191b1d;
}
.page-link {
    color: #191b1d;
}

.page-link:focus {
    box-shadow: 0 0 0 0.2rem rgb(0 123 255 / 25%);
}

.page-link:hover {
    color: #191b1d;
}
</style>
@endsection
@section('content')
   <!--section-scroll-->
    <div class="section-scroll wrapper-full no-margin">
        <div class="container-fluid">
            <div class="">
                <div class="marquee page-title" style="text-align: center;">Keep up with latest post</div>
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
                        <div class="col-sm-3">
                        {{-- post-list-image --}}
                            <div class="">
                                <a href="{{ route('home.post',$item->slug) }}">
                                    <img class="img-br" src="{{$item->image}}" alt="">
                                </a>
                            </div>
                        </div>  
                        <div class="col-sm-9">
                            <div class="post-list-content">
                                
                                <h2 class="entry-title">
                                    <a href="{{ route('home.post',$item->slug) }}">{{$item->title}}</a>
                                </h2>
                                <div class="post-btn">
                                    <a href="{{ route('home.post',$item->slug) }}" class="btn-read-more">Continue Reading <i class="las la-long-arrow-alt-right"></i></a>
                                </div>
                            </div>
                        </div>
                        </div>
                    @endforeach
                    <div class="pagination mb-5 mt-5">
                      {{$post->links("pagination::bootstrap-4")}}
                    </div>
                   
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