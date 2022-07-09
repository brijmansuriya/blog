

@extends('admin.layouts.master')
@section('content')
<div class="content-wrapper">

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{$dateTableTitle}}</h4>
                  
                    <form class="forms-sample"  method="POST" action="{{ route('school.update',$school->id) }}">
                        @csrf
                           @method('PUT')
                        <div class="form-group">
                            <label for="exampleInputUsername1">Name</label>
                            <input type="text" class="form-control" name='name' value="{{$school->name}}" placeholder="Name">
                             <div class="error">{{ $errors->school_error->first('name') }}</div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Email</label>
                            <input type="text" class="form-control" name='email' value="{{$school->email}}" placeholder="Email">
                             <div class="error">{{ $errors->school_error->first('email') }}</div>
                        </div>
                     
                        <div class="form-group">
                            <label class="form-label" for="custom-select">Select Courses</label>
                            <select id="courses" name="courses" class="form-control custom-select">
                                <option value="0" >Select Courses</option>
                                @foreach($courses as $course)
                                <option value="{{$course->id}}"
                                 @if($school->courses == $course->id) selected @endif
                                 >{{$course->name}}</option>
                                @endforeach
                            </select>
                            <div class="error">{{ $errors->storyandgame_error->first('courses') }}</div>
                        </div>
                        {{-- <div class="form-group">
                            <label for="exampleInputUsername1">Password</label>
                            <input type="text" class="form-control" name='password' value="" placeholder="Password">
                             <div class="error">{{ $errors->school_error->first('password') }}</div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">confirm password</label>
                            <input type="text" class="form-control" name='confirm_password' value="" placeholder="confirm password">
                             <div class="error">{{ $errors->school_error->first('confirm_password') }}</div>
                        </div> --}}
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
