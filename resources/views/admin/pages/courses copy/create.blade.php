@extends('admin.layouts.master')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{$dateTableTitle}}</h4>
                    <form class="forms-sample" action="{{route('courses.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">Name</label>
                            <input type="text" class="form-control" name='name' id="exampleInputUsername1" placeholder="Name">
                            <div class="error">{{ $errors->courses_error->first('name') }}</div>
                        </div>
                         <div class="form-group">
                            <label>File upload</label>
                            <input type="file" name="image" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image" name="image">
                                <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                                <select id="category" name="addmorecid" class="form-control custom-select category" onchange="category(this);">
                                    <option value="0" >Select category</option>
                                    @foreach($categorydata as $categoryname)
                                    <option value="{{$categoryname->id}}" >{{$categoryname->name}}</option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="form-group">
                            <label>Sub Category</label>
                                <select id="subcategory" name="scid" class="form-control custom-select" >
                                    <option value="0">Select subcategory</option>
                                    @foreach($subcategorydata as $subcategory)
                                    <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="form-group">
                           <img id="blah" src="{{ url('/uploads/site_setting/test.jpg')}}"  width="200" height="200" alt="your image" />
                        </div>
                        {{-- <div class="form-group">
                            <label class="form-label" for="custom-select">Url </label>
                              <input type="text" class="form-control" name='url' id="url" placeholder="Enter ifrem">
                             <div class="error">{{ $errors->courses_error->first('url') }}</div>
                        </div> --}}
                       
                          <table class="table table-bordered mb-4" id="dynamicTable" >  
                            <tr>
                               
                                <th>Game Story</th>
                                <th>Url</th>
                                <th>Action</th>
                            </tr>
                            <tr>  
                               
                                <td>
                                 
                                        <select id="gscategory_0" name="addmore[0][gsid]" class="form-control custom-select">
                                            <option value="0">Select category</option>
                                                @foreach($storyandgamedata as $storyandgame)
                                                <option value="{{$storyandgame->id}}">{{$storyandgame->name}}</option>
                                                @endforeach
                                        </select>
                                      
                                
                                </td>  
                                <td>
                                        <input type="text" name="addmore[0][url]" placeholder="Enter your Url" value="" class="form-control" />
                                </td>    
                            </tr>  

                        </table>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                        <button type="button" name="add" id="add" class="btn btn-success">Add More</button> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script-bottom')

<script src="{{ URL::asset('backend/js/file-upload.js')}}"></script>
<script type="text/javascript">
    //imgInp.onchange = evt => {
    //    const [file] = imgInp.files
   //     if (file) {
   //         blah.src = URL.createObjectURL(file)
  //      }
   // }
</script>
<script type="text/javascript">
    $('#courses-tab').addClass('active');
/*
function category(rowid){
     var tabId = rowid.id.split("_").pop();
    // alert(tabId);
     var nid = $(rowid).val();
     if (nid) {
            $.ajax({
                type: "get",
                 url: "{{url('storyandgame/subdropdown')}}/" + nid,
                  success: function(res) {
                    if (res) {
                       //  alert("#subcategory_"+tabId);
                        $("#subcategory_"+tabId).empty();
                        $("#subcategory_"+tabId).append('<option value="0">Select Sub category</option>');
                        var dataa=[];
                        $.each(res, function(key, value) {
                          dataa +='<option value="' + value.id + '">' + value.name + '</option>';
                        });
                        $("#subcategory_"+tabId).append(dataa);
                    }
                }
            });
        }
}*/
   
  $('.category').change(function() {
    
    var tabId = this.id.split("_").pop();

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
    $('#subcategory').change(function() {
        var nid = $(this).val();
      
        if (nid) {
            $.ajax({
                type: "get",
                 url: "{{url('storyandgame/gsdropdown')}}/" + nid,
                  success: function(res) {
                    if (res) {
                        $("#gscategory").empty();
                        $("#gscategory").append('<option value="0">Select Game Story</option>');
                        var dataa=[];
                        $.each(res, function(key, value) {
                          dataa +='<option value="' + value.id + '">' + value.name + '</option>';
                        });
                        $("#gscategory").append(dataa);
                    }
                }
            });
        }
    });
</script>
<script>
   var i = 0;
    $("#add").click(function(){
        ++i;
        $("#dynamicTable").append('<tr>\

            <td>\
                <select id="gscategory_'+i+'" name="addmore['+i+'][gsid]" class="form-control custom-select">\
                    <option value="0">Select category</option>\
                    @foreach($storyandgamedata as $storyandgame)\
                    <option value="{{$storyandgame->id}}">{{$storyandgame->name}}</option>\
                    @endforeach\
                </select>\
            </td>\
            <td>\
                <input type="text" name="addmore['+i+'][url]" placeholder="Enter your Url" class="form-control" />\
            </td>\
            <td>\
                <button type="button" class="btn btn-danger remove-tr">Remove</button>\
            </td>\
        </tr>');
    });
   
    $(document).on('click', '.remove-tr', function(){  
         $(this).parents('tr').remove();
    });  
</script>
@endsection

                      
                       
                       