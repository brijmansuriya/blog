@extends('admin.layouts.master')
@section('content')
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">{{$dateTableTitle}}</h4>
                  <form class="forms-sample" action="{{route('subcategory.store')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                    <div class="form-group">
                      <label for="exampleInputUsername1">Name</label>
                      <input type="text" class="form-control" name='name' id="exampleInputUsername1"  placeholder="Name">
                        <div class="error">{{ $errors->category_error->first('name') }}</div>
                    </div>
                     <div class="form-group">
                            <label class="form-label" for="custom-select">Select courses</label>
                            <select id="courses_id"  name="courses_id" class="form-control custom-select">
                                <option value="0" selected>Open this select menu</option>
                                @foreach($courses as $coursesdata)
                                <option value="{{$coursesdata->id}}">{{$coursesdata->name}}</option>
                                @endforeach
                            </select>
                        </div>
                     <div class="form-group">
                            <label class="form-label"
                                    for="custom-select">Select category</label>
                            <select id="cid"  name="cid" class="form-control custom-select">
                                <option value="0" selected>Select Category</option>
                                {{-- @foreach($categorydata as $categoryname)
                                <option value="{{$categoryname->id}}">{{$categoryname->name}}</option>
                                @endforeach --}}
                                
                            </select>
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
