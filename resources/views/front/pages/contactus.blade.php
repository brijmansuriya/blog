@extends('front.layouts.master')

@section('content')
<section class="login">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-8 m-auto">
                    <div class="login-content">
                        <h4>Sign up</h4>
                        <!--form-->              
                        <form  class="sign-form widget-form" action="{{ route('contactus') }}" method="post">@csrf
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Username*" name="username" value="">
                            </div>

                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email Address*" name="email" value="">
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password*" name="password" value="">
                            </div>
                            <div class="sign-controls form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="rememberMe">
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn-custom">Sign Up</button>
                            </div>
                           
                        </form>
                           <!--/-->
                    </div> 
                </div>
             </div>
        </div>
    </section>  

@endsection
