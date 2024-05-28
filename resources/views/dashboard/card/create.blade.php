@extends('dashboard.layout')
@section('title','Create Cart')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="">UBold</a></li>
                    <li class="breadcrumb-item"><a href="">eCommerce</a></li>
                    <li class="breadcrumb-item active">Add Card</li>
                </ol>
            </div>
            <h4 class="page-title">Add Card</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">General</h5>
            <form action="{{route('dashboard.card.store')}}" enctype="multipart/form-data" method="post"
                class="dropzone" id="myAwesomeDropzone" data-plugin="dropzone" data-previews-container="#file-previews"
                data-upload-preview-template="#uploadPreviewTemplate">
                @csrf
                <div class="form-group mb-3">
                    <label for="Card-name">Card Name <span class="text-danger">*</span></label>
                    <input type="text" id="Card-name" name="name" class="form-control" placeholder="e.g : Apple iMac">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="Card-description">Card Description <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="description" id="Card-description" rows="5"
                        placeholder="Please enter description"></textarea>
                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card-box">
            <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">Card Images</h5>

            <div class="fallback">
                <input name="image" type="file" multiple />
            </div>
            @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
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
    </form>
</div>
@endsection