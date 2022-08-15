@extends('admin.layouts.master')
@section('content')

<link href="{{ URL::asset('assets/libs/summernote/summernote-lite.min.css')}}" rel="stylesheet" type="text/css" />

<div class="content-wrapper">
 @include('admin.include.flash-message')
    <div class="row">
        <div class="col-md-10 grid-margin stretch-card">
           
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{$dateTableTitle}}</h4>
                    <form action="{{ route('site-setting.update') }}" method="POST" id="form" enctype="multipart/form-data">
                        @CSRF

                        <div class="form-group mb-3">
                            <label for="validationCustom01">Site Title </label>
                            <input type="text" name="site_title" onkeyup="return verifyName(event)" required data-parsley-required-message="Please Enter Site Title" data-parsley-trigger="change" autocomplete="off" maxlength="40" class="form-control nameverify" id="validationCustom01" placeholder="Enter Site Title" value="{{ $data->site_title }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label>Site Logo</label>
                            <input type="file" id="site_logo" data-parsley-fileextension='jpg,png,jpeg,svg,PNG' data-parsley-validate data-parsley-trigger="change" data-parsley-imagemindimensions="300x300" onchange="return fileValidation()" name="site_logo" accept="image/*" class="form-control" data-parsley-trigger="change" autocomplete="off" placeholder="Site Logo" data-buttonname="btn-secondary">
                        </div>

                        <div class="row col-sm-2 mb-3 card img-preview">
                            <img src="{{ url('/uploads/site_setting')}}/{{$data->site_logo}}" class="preview" id="site-logo-img" height="120" width="200" style="border: 1px solid #ccc;">
                        </div>

                        <div class="form-group mb-3">
                            <label>Fav Icon</label>
                            <input type="file" id="fav_icon" data-parsley-fileextension='jpg,png,jpeg,svg,PNG' data-parsley-validate data-parsley-trigger="change" data-parsley-imagemindimensions="300x300" onchange="return fileValidation()" name="fav_icon" accept="image/*" class="form-control" data-parsley-trigger="change" autocomplete="off" placeholder="Fav Icon" data-buttonname="btn-secondary">
                        </div>

                        <div class="row col-sm-2 mb-3 card img-preview">
                            <img src="{{ url('/uploads/site_setting')}}/{{$data->fav_icon}}" class="preview" id="fav-icon-img" height="120" width="200" style="border: 1px solid #ccc;">
                        </div>
                        <button type="submit" id="button" onclick="return white_space_check();" class="btn submit-btn btn-sm btn-primary waves-effect waves-light" type="submit">
                            Update
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script src="{{ URL::asset('assets/libs/summernote/summernote-lite.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/pages/form-summernote.init.js')}}"></script>
<script type="text/javascript">
    $('#site-tab').addClass('active');
    $('#site-tab-a').addClass('active');

</script>
<script>
    $(document).ready(function() {
        $("#form").submit(function() {
            $(".result").text("");
            $(".loading-icon").removeClass("hide");
            $(".submit").attr("disabled", true);
            $(".btn-txt").text("Processing ...");
            $('#wrapper').css('opacity', '0.5');
            $('#button').attr('disabled', 'true');
        });
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#site-logo-img').css({
                    height: '120px'
                    , width: '200px'
                });
                $('#site-logo-img').attr('src', e.target.result);

            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#site_logo").change(function() {
        readURL(this);
    });


    function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#fav-icon-img').css({
                    height: '120px'
                    , width: '200px'
                });
                $('#fav-icon-img').attr('src', e.target.result);

            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#fav_icon").change(function() {
        readURL1(this);
    });

</script>
@endsection
