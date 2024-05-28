@extends('dashboard.layout')
@section('title','Products')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="">UBold</a></li>
                    <li class="breadcrumb-item"><a href="">eCommerce</a></li>
                    <li class="breadcrumb-item active">Products</li>
                </ol>
            </div>
            <h4 class="page-title">Products</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="row">
                <div class="col-lg-8">
                    <form class="form-inline">
                        <div class="form-group mx-sm-3"></div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="text-lg-right mt-3 mt-lg-0">
                        <a href="{{route('dashboard.product.create')}}"
                            class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-plus-circle mr-1"></i> Add
                            New</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    @foreach ($products as $product)
    <div class="col-md-6 col-xl-3">
        <div class="card-box product-box">
            <div class="product-action">
                <a href="{{route('dashboard.product.edit',$product->id)}}"
                    class="btn btn-success btn-xs waves-effect waves-light"><i class="mdi mdi-pencil"></i></a>
                <a href="{{route('dashboard.product.destroy',$product->id)}}"
                    class="btn btn-danger btn-xs waves-effect waves-light"><i class="mdi mdi-close"></i></a>
            </div>
            <div class="bg-light">
                <img src="{{ asset('assets/img/products/' . $product->image) }}" alt="product-pic" class="img-fluid">
            </div>
            <div class="product-info">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="font-16 mt-0 sp-line-1"><a href="" class="text-dark">{{$product->name}}</a> </h5>
                        <h5 class="m-0"> </h5>
                    </div>
                    <div class="col-auto">
                        <div class="product-price-tag">
                            {{$product->price}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="row">
    <div class="col-12">
        <ul class="pagination pagination-rounded justify-content-end mb-3">
            <li class="page-item">
                <a class="page-link" href="" aria-label="Previous">
                    <span aria-hidden="true">«</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            <li class="page-item active"><a class="page-link" href="">1</a></li>
            <li class="page-item"><a class="page-link" href="">2</a></li>
            <li class="page-item"><a class="page-link" href="">3</a></li>
            <li class="page-item"><a class="page-link" href="">4</a></li>
            <li class="page-item"><a class="page-link" href="">5</a></li>
            <li class="page-item">
                <a class="page-link" href="" aria-label="Next">
                    <span aria-hidden="true">»</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </div>
</div>
@endsection