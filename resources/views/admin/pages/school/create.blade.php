@extends('admin.layouts.master')
@section('content')
<div class="content-wrapper">

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{$dateTableTitle}}</h4>
                  
                    <form class="forms-sample" action="{{route('school.store')}}" method="POST" >
                    
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">Name</label>
                            <input type="text" class="form-control" name='name' value="" placeholder="Name">
                             <div class="error">{{ $errors->school_error->first('name') }}</div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Email </label>
                            <input type="text" class="form-control" name='email' value="" placeholder="Email ">
                             <div class="error">{{ $errors->school_error->first('email') }}</div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Password </label>
                            <input type="text" class="form-control" name='password' value="" placeholder="Password">
                             <div class="error">{{ $errors->school_error->first('password') }}</div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">confirm password </label>
                            <input type="text" class="form-control" name='confirm_password' value="" placeholder="confirm password">
                             <div class="error">{{ $errors->school_error->first('confirm_password') }}</div>
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
<script src="{{ URL::asset('backend/js/file-upload.js')}}"></script>
<script type="text/javascript">

      $('#school-tab').addClass('active');
    $('#school-tab-a').addClass('active');
    imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
            blah.src = URL.createObjectURL(file)
        }
    }

</script>
@endsection