@extends('admin.layouts.master')
@section('content')
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">{{$dateTableTitle}}</h4>
                  <form class="forms-sample" action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                    <div class="form-group">
                      <label for="exampleInputUsername1">Name</label>
                      <input type="text" class="form-control" name='name' id="exampleInputUsername1"  placeholder="Name">
                        <div class="error">{{ $errors->category_error->first('name') }}</div>
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Description</label>
                      <textarea class="form-control"  name='description'  id="exampleTextarea1" rows="4"></textarea>
                        <div class="error">{{ $errors->category_error->first('description') }}</div>
                    </div>
                    <div class="form-group">
                      <label>File upload</label>
                      <input type="file" name="image" class="file-upload-default" id="imgInp">
                      <div class="input-group col-xs-12">
                        <input type="text" name="image" class="form-control file-upload-info"  placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                     <div class="form-group">
                      <label for="exampleTextarea1"></label>
                        <img id="blah" src="{{url('default.png')}}" alt="your image" style="width: 100px;" />
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
  <script src="{{ URL::asset('backend/js/file-upload.js')}}"></script>
<script type="text/javascript">
    $('#aboutus-tab').addClass('active');
    $('#aboutus-tab-a').addClass('active');

imgInp.onchange = evt => {
  const [file] = imgInp.files
  if (file) {
    blah.src = URL.createObjectURL(file)
  }
}
</script>
@endsection
