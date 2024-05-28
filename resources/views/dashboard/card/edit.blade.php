@extends('dashboard.layout')
@section('title','Edit Card')

@section('css')
<style>
    .jvectormap-label {
        display: none;
    }
</style>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="">UBold</a></li>
                    <li class="breadcrumb-item"><a href="">eCommerce</a></li>
                    <li class="breadcrumb-item active">Edit Card</li>
                </ol>
            </div>
            <h4 class="page-title">Edit Card</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">General</h5>
            <form action="{{route('dashboard.card.update',$card->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label for="Card-name">Card Name <span class="text-danger">*</span></label>
                    <input type="text" id="Card-name" name="name" value="{{$card->name}}" class="form-control"
                        placeholder="e.g : Apple iMac" control-id="ControlID-2">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="Card-description">Card Description <span class="text-danger">*</span></label>
                    <textarea class="form-control d-block" name="description" id="product-description" rows="5"
                        placeholder="Enter description" style="display: none;"
                        control-id="ControlID-3">{{$card->description}}</textarea>
                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <div class="fallback">
                        <input name="image" type="file" control-id="ControlID-6" />
                        @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="card-box mt-3">
                        <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">Card Items</h5>
                        <div class="row justify-content-center">
                            <div class="col-lg-3 col-md-3 d-flex justify-content-center">
                                <img src="{{ asset('assets/img/cards/' . $card->image)}}" style="width: 50px;" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="text-center mb-3">
                        <button type="submit" class="btn w-sm btn-success waves-effect waves-light"
                            control-id="ControlID-6">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection