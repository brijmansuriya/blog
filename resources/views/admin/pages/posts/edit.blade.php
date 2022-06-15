@extends('admin.layouts.master')
@section('content')

<div class="content-wrapper">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{$dateTableTitle}}</h4>
                <form action="{{route('posts.update',$posts->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">

                        <div class="col-md-12 form-group">
                            <label for="exampleInputUsername1">Post Name</label>
                            <input type="text" class="form-control" name='title' id="exampleInputUsername1" placeholder="Post Name" value="{{$posts->title}}">
                            <div class="error">{{ $errors->posts_error->first('title') }}</div>
                        </div>











    <table class="table table-bordered table-striped text-center" style="width: 90%; margin: 0 auto;">
                    <thead>
                        <!-- <th>Product Details</th> -->
                        <th>upload</th>
                        <!-- <th>Amount</th> -->
                    </thead>
                    <tbody id="addtarget">
                      @php
                     $cloop = 0;
                     $c=0;
                     $deletePage="";
                     @endphp
                        @foreach ($posts->PostBody as $row) 
                        @php
                            
                       $c++;
                       $cloop = $cloop + 1;
                       $subid = $row->id;
                        @endphp
                    
                        <tr>
                            <td>
                                <input type="hidden" value="<?=$subid?>" name="subid_<?=$cloop?>">
                                <div class="col-md-12 form-group">
                                    <label for="exampleTextarea1">Description</label>
                                    <textarea class="form-control editor" name='body_<?=$cloop?>' id="editor_<?=$cloop?>" rows="5">{{$row->body}}</textarea>
                                </div>
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
                <button type="button" class="addpro btn btn-inline btn-primary mt-3 mb-3 ml-4">Add Data</button>






                       

                        <div class="col-md-12 form-group">
                            <label> Post Fetch Image</label>
                            <input type="file" name="image" class="file-upload-default" id="imgInp">
                            <div class="input-group col-xs-12">
                                <input type="text" name="image" class="form-control file-upload-info" placeholder="Upload Image">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                            </div>
                            <div class="error">{{ $errors->posts_error->first('category_id') }}</div>
                        </div>


                        <div class="col-md-6 form-group">
                            <label>Category</label>
                            <select name="category_id" class="js-example-basic-single w-100 select2">
                                <option value="">Select</option>
                                @foreach($cetegory as $cet)
                                <option value="{{$cet->id}}" @if($posts->category_id = $cet->id)
                                    selected
                                    @endif>{{$cet->name}}</option>
                                @endforeach
                            </select>
                            <div class="error">{{ $errors->posts_error->first('category_id') }}</div>
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Keywords</label>
                            <select name="keywords[]" class="js-example-tokenizer w-100 select2" multiple="multiple">
                                @php
                                $keywords = explode(",",$posts->keywords);
                                print_r($keywords);
                                @endphp
                                @foreach($keywords as $keyword)
                                <option value="{{$keyword}}" selected>{{$keyword}}</option>
                                @endforeach
                            </select>
                            <div class="error">{{ $errors->posts_error->first('category_id') }}</div>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="exampleTextarea1">Meta Description</label>
                            <textarea class="form-control" name='metadescription' id="" rows="5">{{$posts->metadescription}}</textarea>
                            <div class="error">{{ $errors->category_error->first('body') }}</div>
                        </div>
                         <div class="col-md-12 form-group ml-4">
                            <input class="form-check-input" name="active" type="checkbox" value="1" id="flexCheckChecked" @if($posts->active ==1) checked @endif>
                            <label class="form-check-label" for="flexCheckChecked">
                                Active
                            </label>
                        </div>

                    </div>
                     <input type="hidden" name="cloop" id="cloop" value="<?php echo $cloop; ?>">

                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection
@section('script-bottom')
<script src="{{ URL::asset('backend/vendors/ckediter/ckeditor.js') }}"></script>
<script src="{{ URL::asset('backend/js/file-upload.js')}}"></script>
<script type="text/javascript">
    $('#aboutus-tab').addClass('active');
    $('#aboutus-tab-a').addClass('active');

 $(".addpro").click(function() {
        var count = $('#cloop').val();
        // alert(count);
        count++;
        $('#cloop').val(count);

        var datahtml = '<tr>\
                <td>\
                    <div class="col-md-12 form-group">\
                        <label for="exampleTextarea1">Description</label>\
                        <textarea class="form-control" id="editor_'+count+'" name="body_'+count+'"  rows="5"></textarea>\
                    </div>\
                </td>\
            </tr>';
        $("#addtarget").append(datahtml); 
        test(count);
    });

    imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
            blah.src = URL.createObjectURL(file)
        }
    }

    $(document).ready(function() {
         ClassicEditor.create(document.querySelector('#editor'), {
        ckfinder: {
            uploadUrl: '{{route('ckeditor.postimageuplode').'?_token='.csrf_token()}}'
        }
        });

        var test1 = $('#cloop').val();
        for (let i = 1; i <= test1; i++) {
            test(i);
        }

    });
     
  

    function test(count){
        ClassicEditor.create(document.querySelector('#editor_'+count), {
            ckfinder: {
                uploadUrl:'{{route('ckeditor.postimageuplode').'?_token='.csrf_token()}}'
            }
        });
    }




</script>


@endsection
