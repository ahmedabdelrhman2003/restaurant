@extends('page.layout')
@section('title','About')
@section('breadcrump')
<h1 class="display-3 mb-3 text-center secondary">About Us</h1>
<div class="landing d-flex align-items-center justify-content-center">
    <div class="container-xxl">
        <h1 class="display-3 mb-3 text-center secondary">About Us</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                <li class="breadcrumb-item"><a href="{{route('page.home')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="">Pages</a></li>
                <li class="breadcrumb-item text active" aria-current="page">About Us</li>
            </ol>
        </nav>
    </div>
</div>
@endsection
@section('content')
<section class="about py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="img col-lg-6 px-4">
                <img src="{{url('assets/photos/about-1.webp')}}" alt="">
                <img class="mt-auto" src="{{url('assets/photos/about-2.webp')}}" alt="">
                <img class="ms-auto" src="{{url('assets/photos/about-3.webp')}}" alt="">
                <img src="{{url('assets/photos/about-4.webp')}}" alt="">
            </div>
            <div class="text col-lg-6 px-4">
                <div class="content">
                    <h5>About us</h5>
                    <h1>Welcome to <i class="fa fa-utensils me-2"></i>Restaurace</h1>
                    <p class="my-4">
                        {{$about->description}}
                    </p>
                </div>
                <div class="buttons">
                    <div class="butt">
                        <div class="num">
                            <h1>50</h1>
                        </div>
                        <div class="info">Popular <br> <b>MASTER CHEFS</b>
                        </div>
                    </div>
                    <div class="butt">
                        <div class="num">
                            <h1>15</h1>
                        </div>
                        <div class="info">Years of<br><b> EXPERIENCE</b></div>
                    </div>
                </div>
                <button> <a href="{{route('page.about')}}">Read more</a></button>
            </div>
        </div>
    </div>
</section>
@endsection