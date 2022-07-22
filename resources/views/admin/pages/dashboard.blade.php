@extends('admin.layouts.master')

@section('content')
<div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3 class="font-weight-bold">Welcome {{auth()->user()->name}}</h3>
            <h6 class="font-weight-normal mb-0"><span
                class="text-primary"></span></h6>
          </div>
         
        </div>
      </div>
    </div>
  <!----------------- add new row ------------------- -->
  </div>
@endsection
@section('script')

<script>
 $('#dashbord-tab').addClass('active');
</script>
{{-- <script src="{{ URL::asset('assets/libs/morris-js/morris-js.min.js')}}"></script> --}}
@endsection