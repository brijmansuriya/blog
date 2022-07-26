@extends('admin.layouts.master')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{$dateTableTitle}}</h4>
                    <form class="forms-sample" action="{{route('video.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">Title</label>
                            <input type="text"  class="form-control" name='title' id="exampleInputUsername1" placeholder="Enter title">
                            <div class="error">{{ $errors->video_error->first('title') }}</div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Url</label>
                            <input type="text" class="form-control" name='url' id="exampleInputUsername1" placeholder="Url">
                            <div class="error">{{ $errors->video_error->first('url') }}</div>
                        </div>
                         <div class="form-group">
                            <label class="form-label" for="custom-select">Courses</label>
                            <select id="courses_id" name="courses_id" class="form-control custom-select">
                                <option value="0">Select courses</option>
                                @foreach($courses as $coursesdata)
                                <option value="{{$coursesdata->id}}">{{$coursesdata->name}}</option>
                                @endforeach
                            </select>
                             <div class="error">{{ $errors->video_error->first('courses_id') }}</div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="custom-select">Select category</label>
                            <select id="cid" name="cid" class="form-control custom-select">
                                <option value="0" >Select category</option>
                               
                            </select>
                             <div class="error">{{ $errors->video_error->first('cid') }}</div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="custom-select">Select sub category</label>
                            <select id="scid" name="scid" class="form-control custom-select">
                             <option value="0" >Select sub category</option>
                            </select>
                             <div class="error">{{ $errors->video_error->first('scid') }}</div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="custom-select">Select story and game</label>
                            <select id="gsid" name="gsid" class="form-control custom-select">
                             <option value="0" >Select story and game</option>
                            </select>
                             <div class="error">{{ $errors->video_error->first('gsid') }}</div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script-bottom')
<script type="text/javascript">
    $('#video-tab').addClass('active');
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
                        $("#scid").empty();
                        $("#scid").append('<option value="0">Select Sub category</option>');
                        $("#gsid").empty();
                        $("#gsid").append('<option value="0">Select category</option>');
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
    $('#cid').change(function() {
        var nid = $(this).val();
        if (nid) {
            $.ajax({
                type: "get",
                 url: "{{url('subcategory/subdropdown/')}}/" + nid,
                  success: function(res) {
                    if (res) {
                        $("#scid").empty();
                        $("#scid").append('<option value="0">Select Sub category</option>');

                        $("#gsid").empty();
                        $("#gsid").append('<option value="0">Select category</option>');

                        var dataa=[];
                        $.each(res, function(key, value) {
                          dataa +='<option value="' + value.id + '">' + value.name + '</option>';
                        });
                        $("#scid").append(dataa);
                    }
                }
            });
        }
    });
    $('#scid').change(function() {
        var nid = $(this).val();
        if (nid) {
            $.ajax({
                type: "get",
                 url: "{{url('storyandgame/gsdropdown')}}/" + nid,
                  success: function(res) {
                    if (res) {
                        $("#gsid").empty();
                        $("#gsid").append('<option value="0">Select Sub category</option>');
                        var dataa=[];
                        $.each(res, function(key, value) {
                          dataa +='<option value="' + value.id + '">' + value.name + '</option>';
                        });
                        $("#gsid").append(dataa);
                    }
                }
            });
        }
    });
    $('#subcategory').change(function() {
        var nid = $(this).val();
        if (nid) {
            $.ajax({
                type: "get",
                 url: "{{url('storyandgame/gsdropdown')}}/" + nid,
                  success: function(res) {
                    if (res) {
                        $("#gsid").empty();
                        $("#gsid").append('<option value="0">Select category</option>');
                        var dataa=[];
                        $.each(res, function(key, value) {
                          dataa +='<option value="' + value.id + '">' + value.name + '</option>';
                        });
                        $("#gsid").append(dataa);
                    }
                }
            });
        }
    });
</script>
@endsection
