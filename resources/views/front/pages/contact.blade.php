
    
@extends('front.layouts.master')


@section('content')

    <!--contact-->
    <section class="contact" style="margin-top: 150px;">
        <div class="container-fluid">
            <div class="contact-area">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="contact-image">
                            <img src="{{url('frontend/assets/img/1.jpg')}}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="contact-info">
                            <h3>feel free to contact us</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate deserunt suscipit error deleniti
                                porro, pariatur voluptatem iste quos maxime aspernatur.</p>
                        </div>
                        <!--form-->
                        <form action="https://assiagroupe.site/html/Oredoo/assets/php/mail.php" class="form contact_form " method="POST" id="main_contact_form">
                            <div class="alert alert-success contact_msg" style="display: none" role="alert">
                                Your message was sent successfully.
                            </div>
                            <div class="form-group">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name*" required="required">
                            </div>
                    
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email*" required="required">
                            </div>
                    
                            <div class="form-group">
                                <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject*" required="required">
                            </div>
                    
                            <div class="form-group">
                                <textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="Message*" required="required"></textarea>
                            </div>
                    
                            <button type="submit" name="submit" class="btn-custom">Send Message</button>
                        </form>
                    </div>
                </div> 

               

            </div>
        </div>
    </section> 
     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d235014.15049961975!2d72.5797426!3d23.0202434!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e848aba5bd449%3A0x4fcedd11614f6516!2sAhmedabad%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1652973887587!5m2!1sen!2sin" width="100%" height="450" style="border:0;    margin-bottom: -7px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>       


@endsection
@section('script')
{{-- <script src="{{ URL::asset('assets/libs/morris-js/morris-js.min.js')}}"></script> --}}
@endsection
