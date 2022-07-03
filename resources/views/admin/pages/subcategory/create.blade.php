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
                            <label class="form-label"
                                    for="custom-select">Select sub category</label>
                            <select id="custom-select"  name="cid" class="form-control custom-select">
                                <option value="0" selected>Open this select menu</option>
                                @foreach($categorydata as $categoryname)
                                <option value="{{$categoryname->id}}">{{$categoryname->name}}</option>
                                @endforeach
                                
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
  <script src="{{ URL::asset('backend/js/file-upload.js')}}"></script>
<script type="text/javascript">

imgInp.onchange = evt => {
  const [file] = imgInp.files
  if (file) {
    blah.src = URL.createObjectURL(file)
  }
}
</script>
@endsection
