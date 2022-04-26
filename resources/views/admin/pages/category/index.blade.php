@extends('admin.layouts.master')
@section('content')

    @include('admin.include.flash-message')
	
					@include('admin.include.table')
			

@endsection
@section('script')

@include('admin.include.table_script')
@endsection		