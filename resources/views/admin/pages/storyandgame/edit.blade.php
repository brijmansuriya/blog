@extends('admin.layouts.master')
@section('content')
<div class="content-wrapper">

    <div class="row">

        <div class="col-xl-6">

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{$dateTableTitle}}</h4>
                    <form action="{{route('storyandgame.update',$storyandgame->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="exampleInputUsername1">Name</label>
                            <input type="text" class="form-control" name='name' id="exampleInputUsername1" value="{{$storyandgame->name}}" placeholder="Name">
                            <div class="error">{{ $errors->category_error->first('name') }}</div>
                           
                        </div>
                         <div class="form-group">
                            <label class="form-label" for="custom-select">Courses</label>
                            <select id="courses" name="courses_id" class="form-control custom-select">
                                <option value="0">Select courses</option>
                                @foreach($courses as $coursesdata)
                                <option value="{{$coursesdata->id}}" @if($coursesdata->id==$storyandgame->courses_id) selected @endif>{{$coursesdata->name}}</option>
                                @endforeach
                            </select>
                             <div class="error">{{ $errors->storyandgame_error->first('courses_id') }}</div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="custom-select">Select category</label>
                            <select id="cid" name="cid" class="form-control custom-select">
                                <option value="0" >Select category</option>
                                @foreach($categorydata as $category)
                                <option value="{{$category->id}}" @if($category->id==$storyandgame->cid) selected @endif>{{$category->name}}</option>
                                @endforeach
                            </select>
                             <div class="error">{{ $errors->storyandgame_error->first('cid') }}</div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="custom-select">Select sub category</label>
                            <select id="subcategory" name="scid" class="form-control custom-select">
                              <option value="0" >Select sub category</option>
                              @foreach($subcategorydata as $subcategory)
                                <option value="{{$subcategory->id}}" @if($subcategory->id==$storyandgame->scid) selected @endif>{{$subcategory->name}}</option>
                                @endforeach  
                            </select>
                             <div class="error">{{ $errors->storyandgame_error->first('scid') }}</div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                         <a class="btn btn-light" href="{{ route('storyandgame.index')  }}">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
    $('#storyandgame-tab').addClass('active');
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
</script>
@endsection
