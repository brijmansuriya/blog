@extends('admin.layouts.master')
@section('content')
<div class="content-wrapper">

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{$dateTableTitle}}</h4>
                    <form class="forms-sample" action="{{route('school.store')}}" method="POST" enctype="multipart/form-data">
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
                            <label class="form-label" for="custom-select">Select Courses</label>
                            <select id="courses" name="courses[]" class="form-control custom-select select2" multiple='multiple'>
                                <option value="0" >Select Courses</option>
                                @foreach($courses as $course)
                                <option value="{{$course->id}}"
                                 {{-- @if($storyandgame->cid == $course->id) selected @endif --}}
                                 >{{$course->name}}</option>
                                @endforeach
                            </select>
                            <div class="error">{{ $errors->storyandgame_error->first('courses') }}</div>
                        </div>
                       
                        <div class="form-group">
                            <label for="exampleInputUsername1">Password </label>
                            <input type="text" class="form-control" name='password' value="" placeholder="Password">
                             <div class="error">{{ $errors->school_error->first('password') }}</div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Confirm password </label>
                            <input type="text" class="form-control" name='confirm_password' value="" placeholder="confirm password">
                             <div class="error">{{ $errors->school_error->first('confirm_password') }}</div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputUsername1">School add date</label>

                             <input  class="form-control" name='add_date' value="" placeholder="school date" id="datepicker">

                             <div class="error">{{ $errors->school_error->first('add_date') }}</div>
                        </div>


                        <div class="form-group">
                            <label>School Logo</label>
                            <input type="file" name="image" id="image" class="file-upload-default">
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
                        <a class="btn btn-light" href="{{ route('school.index') }}">Cancel</a>
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
$("#select2id").val(["1", "2"]);
      $('#school-tab').addClass('active');
    $('#school-tab-a').addClass('active');

      image.onchange = evt => {
        const [file] = image.files
        if (file) {
            blah.src = URL.createObjectURL(file)
        }
    }

</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" rel="stylesheet"/>
<style type="text/css">
        .datepicker {
            font-size: 0.875em;
        }
      
        .datepicker td, .datepicker th {
            width: 1.5em;
            height: 1.5em;
        }
        
    </style>
<script type="text/javascript">
    $('#datepicker').datepicker({
        weekStart: 1,
        daysOfWeekHighlighted: "6,0",
        autoclose: true,
        todayHighlight: true,
        dateFormat: 'yy-mm-dd'
    });
    $('#datepicker').datepicker("setDate", new Date());
</script>

@endsection
