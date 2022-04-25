@extends('admin.layouts.master')
@section('css')
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
						<li class="breadcrumb-item">CMS</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	@include('admin.include.flash-message')
	<div class="row">
		<div class="col-xl-12">
			<div class="card">
				<div class="card-body" >
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Name</th>
								<th>Description</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($cms as $data)
							<tr>
								<td>{{$data->name}}</td>
								<td>{!!$data->description!!}</td>
								<td><a href="{{route('cms.edit',$data->id)}}"><i class="fa fa-edit" style="color: #172774;"></i></a></td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
