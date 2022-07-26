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
                           <img id="blah" src="{{ url('/uploads/site_setting/test.jpg')}}"  width="200" height="200" alt="your image" />
                        </div>
                       
                       
                       
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                           <a class="btn btn-light" href="{{ route('courses.index')  }}">Cancel</a>
                     
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
</script>

@endsection

                      
                       
                       