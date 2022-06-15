@extends('admin.layouts.master')
@section('content')
<div class="content-wrapper">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{$dateTableTitle}}</h4>
                <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="col-md-12 form-group">
                            <label for="exampleInputUsername1">Post Name</label>
                            <input type="text" class="form-control" name='title' id="exampleInputUsername1" placeholder="Post Name">
                            <div class="error">{{ $errors->posts_error->first('title') }}</div>
                        </div>
                    
                   

                <table class="table table-bordered table-striped text-center" style="width: 95%; margin: 0 auto;">
                    {{-- <thead>
                        <!-- <th>Product Details</th> -->
                        <th>upload</th>
                        <!-- <th>Amount</th> -->
                    </thead> --}}
                    <tbody id="addtarget">
                        <?php
                     $cloop = 0;
                     $c=0;
                     $deletePage="";
               
                      $count = 1;
                      $cloop = 0;
                      while ($count > $cloop) {
                        $cloop = $cloop + 1;
                        
                        ?>
                            <tr>
                                <td>
                                     <div class="col-md-12 form-group">
                                        <label for="exampleTextarea1">Description</label>
                                        <textarea class="form-control" name='body_1' $cloop  rows="5" id="editor_1"></textarea>
                                        <div class="error">{{ $errors->category_error->first('body') }}</div>
                                    </div>
                                </td>
                            </tr>
                        <?php
                    }
                  ?>
                    </tbody>
                </table>

                  <button type="button" class="addpro btn btn-inline btn-primary mt-3 mb-3 ml-4">Add Data</button>
                    {{-- <div class="col-md-12 form-group">
                        <label for="exampleTextarea1">Description</label>
                        <textarea class="form-control editor" name='body'  rows="5"></textarea>
                        <div class="error">{{ $errors->category_error->first('body') }}</div>
                    </div> --}}
                          <div class="col-md-12 form-group">
                            <label> Post Fetch Image</label>
                            <input type="file" name="image" class="file-upload-default" id="imgInp">
                            <div class="input-group col-xs-12">
                                <input type="text" name="image" class="form-control file-upload-info" placeholder="Upload Image">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                            </div>
                            
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Category</label>
                            <select name="category_id" class="js-example-basic-single w-100 select2">
                                <option value="">Select</option>
                                @foreach($cetegory as $cet)
                                <option value="{{$cet->id}}">{{$cet->name}}</option>
                                @endforeach
                            </select>
                            <div class="error">{{ $errors->posts_error->first('category_id') }}</div>
                        </div>

                    <div class="col-md-6 form-group">
                        <label>Keywords</label>
                        <select name="keywords[]" class="js-example-tokenizer w-100 select2" multiple="multiple">
                        </select>
                     
                    </div>

                    <div class="col-md-12 form-group">
                        <label for="exampleTextarea1">Meta Description</label>
                        <textarea class="form-control " name='metadescription'  rows="5"></textarea>
                        <div class="error">{{ $errors->category_error->first('body') }}</div>
                    </div>
                    <div class="col-md-12 form-group ml-4">
                        <input class="form-check-input" name="active" type="checkbox" value="1" id="flexCheckChecked" checked>
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

    $('#aboutus-tab').addClass('active');
    $('#aboutus-tab-a').addClass('active');

    imgInp.onchange = evt => {
    const [file] = imgInp.files
    if (file) {
        blah.src = URL.createObjectURL(file)
        }
    }

    ClassicEditor.create(document.querySelector('#editor_1'), {
        ckfinder: {
            uploadUrl:'{{route('ckeditor.postimageuplode').'?_token='.csrf_token()}}'
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
