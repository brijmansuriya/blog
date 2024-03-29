@yield('css')
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title> Admin</title>
<link rel="stylesheet" href="{{ URL::asset('backend/vendors/select2/select2.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="{{ URL::asset('backend/vendors/feather/feather.css') }}">

<link rel="stylesheet" href="{{ URL::asset('backend/css/vertical-layout-light/style.css') }}">

<link href="{{ URL::asset('backend/vendors/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

<link rel="stylesheet" href="{{ URL::asset('backend/vendors/sweetalert2/sweetalert2.min.css') }}">

<link rel="shortcut icon" href="{{ URL::asset('backend/images/favicon.png') }}" />
<link rel="shortcut icon" href="{{url('/uploads/site_setting')}}/{{$site_setting->fav_icon}}">