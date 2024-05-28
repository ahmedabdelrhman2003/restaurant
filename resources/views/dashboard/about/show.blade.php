@extends('dashboard.layout')
@section('title','Display About')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="">UBold</a></li>
                    <li class="breadcrumb-item"><a href="">eCommerce</a></li>
                    <li class="breadcrumb-item active">Display About</li>
                </ol>
            </div>
            <h4 class="page-title">Display About</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">About</h5>
            <p class="mt-2">{{$about->description}}</p>
        </div>
    </div>
</div>
@endsection