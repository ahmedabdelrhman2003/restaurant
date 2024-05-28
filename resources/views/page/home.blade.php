@extends('page.layout')
@section('title', 'Home')
@section('content')
    <section class="l-page py-5">
        <div class="container row justify-content-center align-items-center mx-auto">
            <div class="content col-lg-6">
                <h1 class="display-3 secondary">Enjoy Our Delicious Meal</h1>
                <p class="py-4 mb-0 secondary"> we believe that every meal should be a delightful experience, a symphony
                    of flavors that tantalize your taste buds and leave you craving for more. Step into our world of
                    culinary excellence and embark on a gastronomic journey like no other.</p>
                <a href="#menu" type="button">Make Your Order</a>
            </div>
            <div class="image col-lg-6">
                <img src="{{ url('assets/photos/hero.webp') }}" alt="">
            </div>
        </div>
    </section>
    <section class="services py-5">
        <div class="container">
            @foreach ($cards as $card)
                <div class="card">
                    <img class="mb-3" src="{{ asset('assets/img/cards/' . $card->image) }}" style="width: 80px;"
                        alt="">
                    <h5>{{ $card->name }}</h5>
                    <p class="mb-0">{{ $card->description }}</p>
                </div>
            @endforeach
        </div>
    </section>
    <section class="about py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="img col-lg-6 px-4">
                    <img src="{{ url('assets/photos/about-1.webp') }}" alt="">
                    <img class="mt-auto" src="{{ url('assets/photos/about-2.webp') }}" alt="">
                    <img class="ms-auto" src="{{ url('assets/photos/about-3.webp') }}" alt="">
                    <img src="{{ url('assets/photos/about-4.webp') }}" alt="">
                </div>
                <div class="text col-lg-6 px-4">
                    <div class="content">
                        <h5>About us</h5>
                        <h1>Welcome to <i class="fa fa-utensils me-2"></i>Restaurace</h1>
                        <p class="my-4">
                            @if (isset($about))
                                {{ $about->description }}
                            @endif
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
                    <button> <a class="secondary" href="{{ route('page.about') }}">Read more</a></button>
                </div>
            </div>
        </div>
    </section>
    <section class="menu py-5" id="menu">
        <div class="container-md">
            <h2 class="h2 my-auto text-center ff-secondary">Check Our Restaurace Menu</h2>

            <div class="tab-content">


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
        </div>
    </section>
    <section class="feedback py-5">
        <div class="container row mx-auto">
            <div class="image col-lg-6 col-md-12 col-12 px-0"></div>
            <div class="content py-4 col-lg-6 col-md-12 col-12">
                <h5 class="ff-secondary text-start fw-normal">Feedback</h5>
                <h1 class="mb-4">Give us your feedback</h1>
                <form action="{{ route('dashboard.feedback.store') }}" method="post">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="name" placeholder="Your Name"
                                    name="name" minlength="5" required>
                                <label for="name">Your Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Your Email" required>
                                <label for="email">Your Email</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="phone" class="form-control" id="phone" name="phone"
                                    placeholder="Your Phone" minlength="11" maxlength="11" required>
                                <label for="phone">Your Phone</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="address" class="form-control" id="address" name="address"
                                    placeholder="Your Address" maxlength="80">
                                <label for="address">Your Address</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Give us more details" name="message" id="message"
                                    style="height: 100px"></textarea>
                                <label for="message">Give us more details</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <input class="btn primary-back secondary w-100 py-3" type="submit" value="Send">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
