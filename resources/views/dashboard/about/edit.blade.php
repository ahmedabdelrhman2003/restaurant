@extends('dashboard.layout')
@section('title', 'Edit About')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('page.home') }}">UBold</a></li>
                        <li class="breadcrumb-item"><a href="">eCommerce</a></li>
                        <li class="breadcrumb-item active">Edit About</li>
                    </ol>
                </div>
                <h4 class="page-title">Edit About</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Edit About</h5>
                <form action="{{ route('dashboard.about.update', 1) }}" method="post">
                    @csrf
                    <textarea class="form-control d-block" rows="5" name="description" placeholder="Enter Your text"
                        control-id="ControlID-3">{{ $about->description }}</textarea>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="btn btn-success waves-effect waves-light mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
