

@extends('front.layouts.master')

@section('content')

    <!--author-->
    <section class="authors">
        <div class="container-fluid">
            <div class="row">  
                <!--author-image-->
                <div class="col-lg-12 col-md-12 ">
                        <div class="authors-info">
                        <div class="image">
                            <a href="author.html" class="image">
                                <img src="assets/img/author/1.jpg" alt="">
                            </a>
                        </div>
                        <div class="content">
                            <h4 >Sarah Jessica</h4>
                            <p>
                                 Etiam vitae dapibus rhoncus. Eget etiam aenean nisi montes felis pretium donec veni. Pede vidi condimentum et aenean hendrerit.
                                Quis sem justo nisi varius.
                            </p>
                            <div class="social-media">
                                <ul class="list-inline">
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" >
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" >
                                            <i class="fab fa-pinterest"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--/-->
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
{{-- <script src="{{ URL::asset('assets/libs/morris-js/morris-js.min.js')}}"></script> --}}
@endsection