@extends('admin.layouts.master')
@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">

                <div class="card-body">
                    <h4 class="card-title">Message</h4>

                    <p class="font-weight-bold">
                         Email :- {{ $show->email}}
                        <li> {{ $show->message}}
                        </li>
                    </p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
