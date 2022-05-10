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
                        <div class="col-md-6 form-group">
                            <label>Category</label>
                            <select name="category_id" class="js-example-basic-single w-100 select2">
                                <option value="" >Select</option>
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
                            <div class="error">{{ $errors->posts_error->first('category_id') }}</div>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="exampleInputUsername1">Post Name</label>
                            <input type="text" class="form-control" name='title' id="exampleInputUsername1" placeholder="Post Name">
                            <div class="error">{{ $errors->posts_error->first('title') }}</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea1">Description</label>
                        <textarea class="form-control" name='body' id="editor" rows="5"></textarea>
                        <div class="error">{{ $errors->category_error->first('body') }}</div>
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea1">Meta Description</label>
                        <textarea class="form-control" name='metadescription' id="editor" rows="5"></textarea>
                        <div class="error">{{ $errors->category_error->first('body') }}</div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{ URL::asset('backend/vendors/ckediter/ckeditor.js') }}"></script>
<script type="text/javascript">
    $('#aboutus-tab').addClass('active');
    $('#aboutus-tab-a').addClass('active');
    ClassicEditor.create(document.querySelector('#editor'),{
        ckfinder: {
            uploadUrl: '{{route('ckeditor.postimageuplode').'?_token='.csrf_token()}}'
        }
        });
</script>
@endsection
