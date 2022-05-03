@extends('admin.layouts.master')
@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{$dateTableTitle}}</h4>
                    <form class="forms-sample" action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">Name</label>
                            <input type="text" class="form-control" name='name' id="exampleInputUsername1" placeholder="Name">
                            <div class="error">{{ $errors->category_error->first('name') }}</div>
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea1">Description</label>
                            <textarea class="form-control" name='description' id="editor" rows="5"></textarea>
                            <div class="error">{{ $errors->category_error->first('description') }}</div>
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
<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
<script type="text/javascript">
    $('#aboutus-tab').addClass('active');
    $('#aboutus-tab-a').addClass('active');

     ClassicEditor.create(document.querySelector( '#editor' ),{
          ckfinder:{
            uploadUrl:'{{ route('post.uplode').'?_token='.csrf_token() }}'
          }
      } )
      .then( editor => {
              console.log( editor );
      } )
      .catch( error => {
              console.error( error );
      } );

</script>
@endsection
