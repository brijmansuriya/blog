@extends('admin.layouts.master')
@section('content')
<div class="container-fluid">
	<div class="row">
        <div class="col-12">
            <div class="page-title-box">
            <h4 class="page-title float-left">{{$dateTableTitle}}</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{route('about-us.index')}}">About Us</a></li>
                        <li class="breadcrumb-item">Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
	<div class="row">
		<div class="col-xl-6">
			<div class="card">
				<div class="card-body" >
                <form action="{{route('about-us.update',$aboutus->id)}}" method="POST"  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="name">Title<span class="text-danger">*</span></label>
                                <input type="text" name="title" parsley-trigger="change" value="{{$aboutus->title}}" required placeholder="Enter Title" maxlength ="255" data-parsley-required-message="The Title field is required." class="form-control" id="title">
                               <div class="error">{{ $errors->aboutus_error->first('title') }}</div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="description">Description<span class="text-danger">*</span></label>
                                <textarea type="text" name="description" parsley-trigger="change" required  placeholder="Enter Description" data-parsley-required-message="The Description field is required." class="form-control" id="description">{{$aboutus->description}}</textarea>
                                <div class="error">{{ $errors->aboutus_error->first('description') }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-right m-b-0">
                        <button class="btn btn-primary waves-effect waves-light" type="submit">
                            Update
                        </button>
                        <a href="{{ route('about-us.index') }}" class="btn btn-secondary waves-effect m-l-5">Cancel</a>
                    </div>
                </form>
				</div>
			</div>	
		</div>
	</div>
</div>
@endsection
@section('script')
<script type="text/javascript">
$('#aboutus-tab').addClass('active');
$('#aboutus-tab-a').addClass('active');
</script>
@endsection