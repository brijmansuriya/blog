@extends('admin.layouts.master')
@section('content')
<div class="content-wrapper">

    <div class="row">

        <div class="col-xl-6">

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{$dateTableTitle}}</h4>
                    <form action="{{route('video.update',$videodata->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="exampleInputUsername1">Title</label>
                            <input type="text" class="form-control" name='title' id="exampleInputUsername1" value="{{$videodata->title}}" placeholder="Enter title">
                            <div class="error">{{ $errors->video_error->first('title') }}</div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Url</label>
                            <input type="text" class="form-control" name='url' id="url" value="{{$videodata->url}}" placeholder="url">
                            <div class="error">{{ $errors->category_error->first('url') }}</div>
                        </div>
                         <div class="form-group">
                            <label class="form-label" for="custom-select">Courses</label>
                            <select id="courses" name="courses_id" class="form-control custom-select">
                                <option value="0">Select courses</option>
                                @foreach($courses as $coursesdata)
                                <option value="{{$coursesdata->id}}" @if($coursesdata->id==$videodata->courses_id) selected @endif>{{$coursesdata->name}}</option>
                                @endforeach
                            </select>
                             <div class="error">{{ $errors->video_error->first('courses_id') }}</div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="custom-select">Select category</label>
                            <select id="cid" name="cid" class="form-control custom-select">
                                <option value="0" >Select category</option>
                                @foreach($categorydata as $category)
                                <option value="{{$category->id}}" @if($category->id==$videodata->cid) selected @endif>{{$category->name}}</option>
                                @endforeach
                            </select>
                             <div class="error">{{ $errors->video_error->first('cid') }}</div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="custom-select">Select sub category</label>
                            <select id="subcategory" name="scid" class="form-control custom-select">
                              <option value="0" >Select sub category</option>
                              @foreach($subcategorydata as $subcategory)
                                <option value="{{$subcategory->id}}" @if($subcategory->id==$videodata->scid) selected @endif>{{$subcategory->name}}</option>
                                @endforeach  
                            </select>
                             <div class="error">{{ $errors->video_error->first('scid') }}</div>
                        </div>
                          <div class="form-group">
                            <label class="form-label" for="custom-select">Select story and game</label>
                            <select id="gsid" name="gsid" class="form-control custom-select">
                             <option value="0" >Select story and game</option>
                                @foreach($gamestorydata as $gamestory)
                                     <option value="{{$gamestory->id}}" @if($gamestory->id==$videodata->gsid) selected @endif>{{$gamestory->name}}</option>
                                @endforeach  
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
@section('script')
<script type="text/javascript">
    $('#video-tab').addClass('active');
    $('#category').change(function() {
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
    $('#cid').change(function() {
        var nid = $(this).val();
        if (nid) {
            $.ajax({
                type: "get",
                 url: "{{url('subcategory/subdropdown')}}/" + nid,
                  success: function(res) {
                    if (res) {
                        $("#subcategory").empty();
                        $("#subcategory").append('<option value="0">Select Sub category</option>');
                        var dataa=[];
                        $.each(res, function(key, value) {
                          dataa +='<option value="' + value.id + '">' + value.name + '</option>';
                        });
                        $("#subcategory").append(dataa);
                    }
                }
            });
        }
    });
    $('#courses').change(function() {
        var nid = $(this).val();
        if (nid) {
            $.ajax({
                type: "get",
                 url: "{{url('category/dropdown')}}/" + nid,
                  success: function(res) {
                    if (res) {
                        $("#cid").empty();
                        $("#cid").append('<option value="0">Select category</option>');
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
