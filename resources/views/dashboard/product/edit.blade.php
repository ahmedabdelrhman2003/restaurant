@extends('dashboard.layout')
@section('title', 'Edit Product')
@section('css')
    <style>
        .content img {
            width: 175px;
            height: 175px;
            object-fit: contain;
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
                        <li class="breadcrumb-item active">Edit Products</li>
                    </ol>
                </div>
                <h4 class="page-title">Edit Products</h4>
            </div>
        </div>
    </div>
    <form action="{{ route('dashboard.product.update', $product->id) }}" enctype="multipart/form-data" method="post"
        class="dropzone" id="myAwesomeDropzone" data-plugin="dropzone" data-previews-container="#file-previews"
        data-upload-preview-template="#uploadPreviewTemplate">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">General</h5>

                    <div class="form-group mb-3">

                        <label for="product-name">Product Name <span class="text-danger">*</span></label>
                        <input type="text" id="product-name" name="name" class="form-control"
                            value="{{ $product->name }}" placeholder="e.g : Apple iMac">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="product-description">Product Description <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="description" id="product-description" rows="5"
                            placeholder="Please enter description">{{ $product->description }}</textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="product-price">Price <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="price" value="{{ $product->price }}"
                            id="product-price" placeholder="Enter amount" control-id="ControlID-5">
                        @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
            </div>
            <div class="col-lg-4">
                <div class="card-box">
                    <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">Menu Items</h5>
                    <div class="row justify-content-center">
                        <img src="{{ asset('assets/img/products/' . $product->image) }}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card-box">
                    <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">Product Images</h5>

                    <div class="fallback">
                        <input name="image" type="file" multiple />
                        @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="dropzone-previews mt-3" id="file-previews"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="text-center mb-3">
                    <button type="submit" class="btn w-sm btn-success waves-effect waves-light"
                        control-id="ControlID-6">Save</button>
                </div>

            </div>
        </div>
    </form>
@endsection
