@extends('admin.layouts.master')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{$dateTableTitle}}</h4>
                    <form class="forms-sample" action="{{route('category.store')}}" method="POST" >
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">Name</label>
                            <input type="text" class="form-control" name='name' id="exampleInputUsername1" value="" placeholder="Name">
                             <div class="error">{{ $errors->category_error->first('name') }}</div>
                        </div>
                         <div class="form-group">
                            <label class="form-label" for="custom-select">Courses</label>
                            <select id="courses" name="courses_id" class="form-control custom-select">
                                <option value="0">Select courses</option>
                                @foreach($courses as $coursesdata)
                                <option value="{{$coursesdata->id}}">{{$coursesdata->name}}</option>
                                @endforeach
                            </select>
                             <div class="error">{{ $errors->storyandgame_error->first('courses_id') }}</div>
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

      $('#category-tab').addClass('active');
    $('#category-tab-a').addClass('active');
    imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
            blah.src = URL.createObjectURL(file)
        }
    }

</script>
<script type="text/javascript">
        $('#category-tab').addClass('active');
</script>
@endsection
