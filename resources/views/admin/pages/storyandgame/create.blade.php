@extends('admin.layouts.master')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{$dateTableTitle}}</h4>
                    <form class="forms-sample" action="{{route('storyandgame.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">Name</label>
                            <input type="text" class="form-control" name='name' id="exampleInputUsername1" placeholder="Name">
                            <div class="error">{{ $errors->storyandgame_error->first('name') }}</div>
                        </div>
                         <div class="form-group">
                            <label class="form-label" for="custom-select">Courses</label>
                            <select id="courses_id" name="courses_id" class="form-control custom-select">
                                <option value="0">Select courses</option>
                                @foreach($courses as $coursesdata)
                                <option value="{{$coursesdata->id}}">{{$coursesdata->name}}</option>
                                @endforeach
                            </select>
                             <div class="error">{{ $errors->storyandgame_error->first('courses_id') }}</div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="custom-select">Select category</label>
                            <select id="cid" name="cid" class="form-control custom-select">
                                <option value="0" >Select category</option>
                               
                            </select>
                             <div class="error">{{ $errors->storyandgame_error->first('cid') }}</div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="custom-select">Select sub category</label>
                            <select id="scid" name="scid" class="form-control custom-select">
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
@section('script-bottom')
<script type="text/javascript">
    $('#storyandgame-tab').addClass('active');
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
</script>
<script type="text/javascript">
   
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
