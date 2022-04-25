@extends('admin.layouts.master')
@section('css')
<link href="{{ URL::asset('assets/libs/summernote/summernote-lite.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
        <div class="col-12">
            <div class="page-title-box">
            <h4 class="page-title float-left">{{$dateTableTitle}}</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{route('cms.index')}}">CMS</a></li>
                        <li class="breadcrumb-item">Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
	<div class="row">
		<div class="col-xl-12">
			<div class="card">
				<div class="card-body" >
                <form action="{{route('cms.update',$cms->id)}}" method="POST"  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="email">Description<span class="text-danger">*</span></label>
                                <textarea name="description" parsley-trigger="change"  placeholder="Enter email" data-parsley-required-message="The description field is required." class="form-control" id="description" data-parsley-errors-container="#your-div-id" required>
                               {{$cms->description}}</textarea>
                               <div class="error">{{ $errors->cms_error->first('description') }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-right m-b-0">
                        <button class="btn btn-primary waves-effect waves-light" type="submit">
                            Update
                        </button>
                        <a href="{{ route('cms.index') }}" class="btn btn-secondary waves-effect m-l-5">Cancel</a>
                    </div>
                </form>
				</div>
			</div>	
		</div>
	</div>
</div>
@endsection
@section('script')
<script src="{{ URL::asset('assets/js/pages/form-summernote.init.js')}}"></script>
<script src="{{ URL::asset('assets/libs/summernote/summernote-lite.min.js')}}"></script>
<script type="text/javascript">
$('#cms-tab').addClass('active');
$('#cms-tab-a').addClass('active');

 $('#description').summernote({
        height: 300,
        fontSizes: ['8', '9', '10', '11', '12', '14', '18'],
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']]
        ]
        
    });
</script>
@endsection