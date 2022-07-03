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
                            <label class="form-label" for="custom-select">Select category</label>
                            <select id="category" name="cid" class="form-control custom-select">
                                <option value="0" >Select category</option>
                                @foreach($categorydata as $categoryname)
                                <option value="{{$categoryname->id}}">{{$categoryname->name}}</option>
                                @endforeach
                            </select>
                             <div class="error">{{ $errors->storyandgame_error->first('cid') }}</div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="custom-select">Select sub category</label>
                            <select id="subcategory" name="scid" class="form-control custom-select">
                            </select>
                             <div class="error">{{ $errors->storyandgame_error->first('scid') }}</div>
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
    $('#storyandgame-tab').addClass('active');
    $('#category').change(function() {
        var nid = $(this).val();
        if (nid) {
            $.ajax({
                type: "get",
                 url: "{{url('storyandgame/subdropdown')}}/" + nid,
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
</script>
@endsection
