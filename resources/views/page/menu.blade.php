@extends('page.layout')
@section('title', 'menu')
@section('breadcrump')
    <div class="landing d-flex align-items-center justify-content-center">
        <div class="container-xxl row">
            <h1 class="display-3 mb-3 text-center secondary">Food Menu</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="{{ route('page.menu') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text active" aria-current="page">Menu</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection
@section('content')
    <section class="menu py-5" id="menu">
        <div class="container-md">
            <h2 class="h2 my-auto text-center ff-secondary">Check Our Restaurace Menu</h2>

            <div class="tab-pane container fade show active mt-5" i>
                <div class="parent">
                    @foreach ($products as $product)
                        <div class="card">
                            <div class="image">
                                <img src="{{ asset('assets/img/products/' . $product->image) }}" alt="">
                            </div>
                            <div class="content">
                                <h3>{{ $product->name }}</h3>
                                <p>{{ $product->description }}</p>
                                <div class="order">
                                    <p class="price">{{ $product->price }}</p>
                                    <a href="{{ route('cart.add-cart', $product->id) }}"> <i
                                            class="fa-solid fa-cart-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

