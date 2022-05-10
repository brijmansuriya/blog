<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>{{$site_setting->site_title}}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{url('/uploads/site_setting')}}/{{$site_setting->fav_icon}}">

        @include('admin.layouts.head')
  </head>

@yield('body')

@yield('content')

@include('admin.layouts.footer-script')    
    </body>
</html>