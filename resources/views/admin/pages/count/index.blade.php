

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
            <div class="col-10">
                <form id="filter-form" class="filter-form">
                    <div class="form-group">
                        <select id="school_id" name="school_id" class="form-control custom-select"  style="width: 140px;">
                            <option value="0">Select school</option>
                            @foreach($schooldata as $school)
                            <option value="{{$school->id}}">{{$school->name}}</option>
                            @endforeach
                        </select>

                        <select id="courses_id" name="courses_id" class="form-control custom-select"  style="width: 140px;">
                            <option value="0">Select courses</option>
                           
                        </select> 

                        <button  class="btn btn-sm btn-primary waves-effect waves-light filter-form" value="Submit">
                                <span class="btn-label">
                                    <i class="fa fa-search "></i>
                                </span>
                        </button>
                    </div>
                </form>
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
        $('#count-tab').addClass('active');


        $('#school_id').change(function() {
        var nid = $(this).val();
        
            if (nid) {
                $.ajax({
                    type: "get",
                    url: "{{url('school/coursesdropdown')}}/" + nid,
                    success: function(res) {
                        if (res) {
                            $("#courses_id").empty();
                            $("#courses_id").append('<option value="0">Select Courses</option>');
                            var dataa=[];
                            $.each(res, function(key, value) {
                            dataa +='<option value="' + value.id + '">' + value.name + '</option>';
                            });
                            $("#courses_id").append(dataa);
                        }
                    }
                });
            }
        });

    </script>
@endsection
