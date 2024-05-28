@extends('page.layout')
@section('title', 'feedback')
@section('breadcrump')
    <div class="landing d-flex align-items-center justify-content-center">
        <div class="container-xxl row">
            <h1 class="display-3 mb-3 text-center secondary">Feedback</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="{{ route('page.home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text active" aria-current="page">Feedback</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection
@section('content')
    <section class="feedback py-5">
        <div class="container row mx-auto">
            <div class="image col-lg-6 col-md-12 col-12 px-0"></div>
            <div class="content py-4 col-lg-6 col-md-12 col-12">
                <h5 class="ff-secondary text-start fw-normal">Feedback</h5>
                <h1 class="mb-4">Give us your feedback</h1>
                <form action="{{ route('dashboard.feedback.store') }}" method="post">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="name" placeholder="Your Name"
                                    name="name" minlength="5" required>
                                <label for="name">Your Name</label>
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Your Email" required>
                                <label for="email">Your Email</label>
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="phone" class="form-control" id="phone" name="phone"
                                    placeholder="Your Phone" minlength="11" maxlength="11" required>
                                <label for="phone">Your Phone</label>
                                @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
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
                                <textarea class="form-control" placeholder="Give us more details" name="message" id="message" style="height: 100px"></textarea>
                                <label for="message">Give us more details</label>
                                @error('message')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
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
