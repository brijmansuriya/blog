
@extends('admin.layouts.master')
@section('content')
<div class="content-wrapper">

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{$dateTableTitle}}</h4>
                  
                  <h5>School Name :- {{$school->name}}</h5>
                    <form class="forms-sample"  method="POST" action="{{ route('school.passwordupdate',$school->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">Password</label>
                            <input type="text" class="form-control" name='password' value="" placeholder="Password">
                             <div class="error">{{ $errors->school_error->first('password') }}</div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">confirm password</label>
                            <input type="text" class="form-control" name='confirm_password' value="" placeholder="confirm password">
                             <div class="error">{{ $errors->school_error->first('confirm_password') }}</div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a class="btn btn-light" href="{{ route('school.index')  }}">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{ URL::asset('backend/js/file-upload.js')}}"></script>
<script type="text/javascript">

    $('#school-tab').addClass('active');
    $('#school-tab-a').addClass('active');
    image.onchange = evt => {
        const [file] = image.files
        if (file) {
            blah.src = URL.createObjectURL(file)
        }
    }

</script>

@endsection
