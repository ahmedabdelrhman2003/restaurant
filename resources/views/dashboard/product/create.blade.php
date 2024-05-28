@extends('dashboard.layout')
@section('title','Create Product')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="">UBold</a></li>
                    <li class="breadcrumb-item"><a href="">eCommerce</a></li>
                    <li class="breadcrumb-item active">Add Products</li>
                </ol>
            </div>
            <h4 class="page-title">Add Products</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">General</h5>
            <form action="{{route('dashboard.product.store')}}" method="post" enctype="multipart/form-data"
                class="dropzone" id="myAwesomeDropzone" data-plugin="dropzone" data-previews-container="#file-previews"
                data-upload-preview-template="#uploadPreviewTemplate">
                @csrf
                <div class="form-group mb-3">
                    <label for="product-name">Product Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="product-name" class="form-control" placeholder="e.g : Apple iMac"
                        control-id="ControlID-2">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="product-description">Product Description <span class="text-danger">*</span></label>
                    <textarea class="form-control d-block" id="product-description" name="description" rows="5"
                        placeholder="Enter description" style="display: none;" control-id="ControlID-3"></textarea>
                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="product-price">Price <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="price" id="product-price" placeholder="Enter amount"
                        control-id="ControlID-5">
                    @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
        </div>
    </div>
    <div class="col-lg-12">
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
<div class="d-none" id="uploadPreviewTemplate">
    <div class="card mt-1 mb-0 shadow-none border">
        <div class="p-2">
            <div class="row align-items-center">
                <div class="col-auto">
                    <img data-dz-thumbnail="" src="#" class="avatar-sm rounded bg-light" alt="">
                </div>
                <div class="col pl-0">
                    <a href="" class="text-muted font-weight-bold" data-dz-name=""></a>
                    <p class="mb-0" data-dz-size=""></p>
                </div>
                <div class="col-auto">
                    <a href="" class="btn btn-link btn-lg text-muted" data-dz-remove="">
                        <i class="dripicons-cross"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection