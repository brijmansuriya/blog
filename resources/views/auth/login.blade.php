@extends('front.layouts.master')
@section('content')
 @include('front.layouts.topbar')

@include('front.include.flash-message')


 <div class="mdk-header-layout__content page-content">
    <div class="py-32pt navbar-submenu">
        <div class="container page__container">
            <div class="progression-bar progression-bar--active-accent">
                <span class="progression-bar__item-content">
                    <span class="progression-bar__item-text h5 mb-0 text-uppercase">Teacher LOGIN details</span>
                </span>
            </div>
        </div>
    </div>

    <div class="pt-32pt pt-sm-64pt pb-32pt">
        <div class="container page__container">
            <form action="{{ route('login') }}" method="POST" class="col-md-5 p-0 mx-auto">   @csrf
                <div class="form-group">
                    <label class="form-label" for="email">Email:</label>
                    <input  name="email" value="{{ old('email') }}" required autocomplete="email" autofocus class="form-control  @error('email') is-invalid @enderror" placeholder="Your email address ..." />
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label" for="password">Password:</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password"  class="form-control  @error('password') is-invalid @enderror"
                        placeholder="Your first and last name ..." />
                          @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                         @enderror
                  
                  

                    @if (Route::has('password.request'))
                      <p class="text-right">
                        <a class="small" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                      </p>
                    @endif

                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>







@endsection
@section('script')
@endsection
