@extends('admin.layouts.master')
@section('content')
    @include('admin.include.flash-message')

    <div class="content-wrapper">
        <div class="row">
            <div class="col-2">
                <div class="page-title-box">
                    <h4 class="page-title">{{ $dateTableTitle }}</h4>
                </div>
            </div>
             <div class="col-6">
                <form id="filter-form" class="filter-form">
                    <div class="form-group">
                        <select id="courses_id" name="courses_id" class="form-control custom-select"  style="width: 166px;">
                            <option value="0">Select courses</option>
                            @foreach($courses as $coursesdata)
                            <option value="{{$coursesdata->id}}">{{$coursesdata->name}}</option>
                            @endforeach
                        </select>
                        <select id="cid" name="cid" class="form-control custom-select" style="width: 170px;">
                                <option value="0" >Select category</option>
                        </select>
                  
                        <button  class="btn btn-sm btn-primary waves-effect waves-light filter-form" value="Submit">
                                <span class="btn-label">
                                    <i class="fa fa-search "></i>
                                </span>
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-4">
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
        $('#subcategory-tab').addClass('active');

        $('#courses_id').change(function() {
        var nid = $(this).val();
        if (nid) {
            $.ajax({
                type: "get",
                 url: "{{url('category/dropdown')}}/" + nid,
                  success: function(res) {
                    if (res) {
                        $("#cid").empty();
                        $("#cid").append('<option value="0">Select Sub category</option>');
                        var dataa=[];
                        $.each(res, function(key, value) {
                          dataa +='<option value="' + value.id + '">' + value.name + '</option>';
                        });
                        $("#cid").append(dataa);
                    }
                }
            });
        }
    });

    </script>
@endsection
