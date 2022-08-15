<meta charset="UTF-8">
<meta name="description" content="{{$site_setting->site_meta}}">
<meta name="keywords" content="{{$site_setting->site_keyword}}">
<meta name="author" content="{{$site_setting->site_title}}">

<meta property="og:title" content="{{$site_setting->site_title}}" />
<meta property="og:url" content="https://asynchronoustechnology.com/" />
<meta property="og:description" content="{{$site_setting->site_meta}}" />
<meta property="og:image" content="{{url('/uploads/site_setting')}}/{{$site_setting->site_logo}}" />
<meta property="og:type" content="article" />

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<title>{{$site_setting->site_title}}</title>
<link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/line-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/fontawesome.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/custom.css') }}">
<link rel="icon" sizes="16x16" href="{{url('/uploads/site_setting')}}/{{$site_setting->fav_icon}}">
@yield('css')