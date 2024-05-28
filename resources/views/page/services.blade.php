@extends('page.layout')
@section('title','Services')
@section('breadcrump')
<div class="landing d-flex align-items-center justify-content-center">
    <div class="container-xxl">
        <h1 class="display-3 mb-3 text-center secondary">Our Services</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                <li class="breadcrumb-item"><a href="template.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item text active" aria-current="page">Services</li>
            </ol>
        </nav>
    </div>
</div>
@endsection
@section('content')
<section class="services py-5">
    <div class="container">
        @foreach ($cards as $card)
        <div class="card">
            <img class="mb-3" src="{{ asset('assets/img/cards/' . $card->image)}}" style="width: 80px;" alt="">
            <h5>{{$card->name}}</h5>
            <p class="mb-0">{{$card->description}}</p>
        </div>
        @endforeach
    </div>
</section>
@endsection