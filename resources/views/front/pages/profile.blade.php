@extends('front.layouts.master')
@section('content')
<div class="mdk-header-layout__content page-content">
    @include('front.include.flash-message')
    <div class="py-32pt navbar-submenu">
        <div class="container page__container">
            <div class="progression-bar progression-bar--active-accent">
                <span class="progression-bar__item-content">
                    <i class="material-icons progression-bar__item-icon"></i>
                    <span class="progression-bar__item-text h5 mb-0 text-uppercase">ENTER YOUR LOGIN DETAILS</span>
                </span>
            </div>
        </div>
    </div>
    <div class="pt-32pt pt-sm-64pt pb-32pt">
        <div class="container page__container">
            <div class="page-section container page__container">
                 <form  action="{{route('updateprofile',auth()->user()->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
              
                <div class="col-md-7 p-0">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                            <label class="form-label">School Logo </label>
                            </div>
                            <div class="col-9">
                              <p>(ideal size for logo 160*45 pixels )</p>
                            </div>
                        </div>
                        
                      
                        <div class="media align-items-center">
                            <a href="{{ url('uploads/courses/'.auth()->user()->image)}}" target="_blank" class="media-left mr-16pt">
                                <img src="{{ url('uploads/courses/'.auth()->user()->image)}}" alt="people" width="56" class="rounded-circle" />
                            </a>
                            <div class="media-body">
                                <div class="custom-file">
                                    <input type="file" name="image" accept="image/png, image/gif, image/jpeg" class="custom-file-input" value="" id="image" />
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            School name</label>
                        <input type="text" class="form-control" value="{{auth()->user()->name}}" name="name" placeholder="Your profile name ..." />
                        
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Save changes
                    </button>
                </div>
               </form> 
            </div>
        </div>
    </div>
</div>
@endsection
