@extends('front.layouts.master')

@section('content')
  
<section class="login">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-8 m-auto">
                    <div class="login-content">
                     @include('admin.include.flash-message')
                        <h4>Contact Us</h4>
                        <!--form-->              
                        <form  class="sign-form widget-form" action="{{ route('contactus') }}" method="post">@csrf
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="email" required name="email" value="">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Message" name='message' rows="5"></textarea>
                            </div>
                        
                            <div class="form-group">
                                <button type="submit" class="btn-custom">Submit</button>
                            </div>
                           
                        </form>
                           <!--/-->
                    </div> 
                </div>
             </div>
        </div>
    </section>  

@endsection
