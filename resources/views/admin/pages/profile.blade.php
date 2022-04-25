@extends('admin.layouts.master')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                   
                </div>
                <h4 class="page-title">{{$pageTittle}}</h4>
            </div>
        </div>
    </div>
    @include('admin.include.flash-message')
    <div class="row">
          <div class="col-lg-4 col-xl-4">
            <div class="card-box text-center">
                <img src="{{$user->profile}}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                <h4 class="mb-0">{{$user->name}}</h4>
                <p class="text-muted">{{$user->email}}</p>

                <div class="text-left mt-3">
                    <p class="text-muted mb-2 font-13"><strong> Name :</strong> <span class="ml-2">{{$user->name}}</span></p>
                    <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ml-2">{{$user->email}}</span></p>
                    <p class="text-muted mb-2 font-13"><strong>Phone :</strong> <span class="ml-2">{{$user->phone_number}}</span></p>
                </div>
            </div> <!-- end card-box -->
        </div> <!-- end col-->

        <div class="col-lg-8 col-xl-8">
            <div class="card-box">
                <h3 class="page-title mb-3"><b>Update Profile</b></h3>
                <form action="{{ route('profile.update',$user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="name">Name<span class="text-danger">*</span></label>
                            <input type="text" name="name" parsley-trigger="change" value="{{$user->name}}" required placeholder="Enter Name" class="form-control" id="name" data-parsley-required-message="The name field is required.">
                            @error('name')
                            <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="email">Email<span class="text-danger">*</span></label>
                            <input type="text" name="email" parsley-trigger="change" value="{{$user->email}}" required placeholder="Enter last name" class="form-control" id="email" readonly>
                            @error('email')
                            <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 form-group">
                            <label for="email">Phone<span class="text-danger">*</span></label>
                            <input type="text" name="phone_number" parsley-trigger="change" value="{{$user->phone_number}}" required placeholder="Enter phone" class="form-control" id="phone" readonly>
                            @error('email')
                            <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    
                     <label for="image">Profile Picture<span class="text-danger">*</span></label>
                    <div class="col-6">
                            <div class="form-group">
                                <input type="file" data-parsley-trigger="change"  data-parsley-max-file-size="5" data-parsley-filemimetypes="image/jpeg, image/png" accept="image/*" data-parsley-file-mime-types-message="Only allowed jpeg & png files" onchange="readURL1(this);" id="inputGroupFile04" name="profile" class="custom-file-input" />
                                <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                                @error('profile')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                             
                    </div>

                    <div class="col-lg-6">
                            <div class="form-group">
                            @php
                                $default = '/images/default.png';
                            @endphp
                                <img class="border rounded p-0"  src="{{$user->profile}}" onerror="this.src='{{$default}}'" alt="your image" style="height: 130px;width: 130px; object-fit: cover;" id="blah1"/>
                            </div>
                    </div>

                    <div class="form-group text-right m-b-0">
                        <button class="btn btn-primary waves-effect waves-light" type="submit">
                            Update
                        </button>
                        <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                            Reset
                        </button>
                    </div>
                </form>
            </div> <!-- end card-box-->
        </div> <!-- end col -->
    </div>

    <div class="row">
        <div class="col-lg-4 col-xl-4">
        </div> <!-- end col-->
        <div class="col-lg-8 col-xl-8">
            <div class="card-box">
                <h3 class="page-title mb-3"><b>Change Password</b></h3>
                <form action="{{ route('change.password',$user->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="product-summary">Current Password</label>
                        <input type="password" name="current_password" id="current_password" required class="form-control" data-parsley-required-message="The Current Password field is required.">
                        @error('current_password')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="product-summary">New Password</label>
                        <input type="password" name="new_password" minlength="8" id="new_password" required  class="form-control" data-parsley-required-message="The New Password field is required.">
                        @error('new_password')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="product-summary">Confirm New Password</label>
                        <input type="password" name="confirm_new_password" minlength="8" id="confirm_new_password" data-parsley-equalto="#new_password" required class="form-control" data-parsley-required-message="The Confirm New Password field is required.">
                        @error('confirm_new_password')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group text-right m-b-0">
                        <button class="btn btn-primary waves-effect waves-light" type="submit">
                            Update
                        </button>
                        <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                            Reset
                        </button>
                    </div>
                </form>
            </div> <!-- end card-box-->
        </div> <!-- end col -->
    </div>
   
</div>

@endsection
@section('script')
<script type="text/javascript">
   function readURL1(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah1').attr('src', e.target.result);
            $('.blah1').attr('href', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}  
</script>
@endsection