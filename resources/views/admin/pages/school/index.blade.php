

@extends('admin.layouts.master')
@section('content')
    @include('admin.include.flash-message')

    <div class="content-wrapper">
        <div class="row">
            <div class="col-6">
                <div class="page-title-box">
                    <h4 class="page-title">{{ $dateTableTitle }}</h4>
                </div>
            </div>
            <div class="col-6">
                <div class="btn-group float-right  mb-2">
                    <a href="{{ $addUrl }}" class="btn btn-sm btn-primary waves-effect waves-light">
                        <span class="btn-label">
                            <i class="fa fa-plus"></i>
                        </span>
                        Add
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        @include('admin.include.table')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    @include('admin.include.table_script')
    <script type="text/javascript">
        $('#school-tab').addClass('active');
    </script>
@endsection
