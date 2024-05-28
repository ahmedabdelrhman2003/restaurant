@extends('page.layout')
@section('title','Customer')
@section('breadcrump')
<div class="landing d-flex align-items-center justify-content-center">
    <div class="container-xxl">
        <h1 class="display-3 mb-3 text-center secondary">Checkout</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                <li class="breadcrumb-item"><a href="template.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item"><a href="#">Order</a></li>
                <li class="breadcrumb-item text active" aria-current="page">Checkout</li>
            </ol>
        </nav>
    </div>
</div>
@endsection
@section('content')
<section class="checkout py-5">
    <div class="container">
        <div class="row">
            <div class="content py-4 col-12">
                <h1 class="mb-4">Billing information</h1>
                <form action="{{route('customer.store')}}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="First name" placeholder="First Name"
                                    name="first_name" minlength="5" required control-id="ControlID-1">
                                <label for="First name">First Name</label>
                                @error('first_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="Last Name" name="last_name"
                                    placeholder="Last Name" required control-id="ControlID-2">
                                <label for="Last Name">Last Name</label>
                                @error('last_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="Email" name="email" placeholder="Email"
                                    required control-id="ControlID-3">
                                <label for="Email">Email</label>
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="Phone" name="phone" placeholder="Phone"
                                    required control-id="ControlID-4">
                                <label for="Phone">Phone</label>
                                @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="text" name="street" class="form-control" id="Street" placeholder="Street"
                                    required control-id="ControlID-5">
                                <label for="Street">Street</label>
                                @error('street')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input class="form-control" placeholder="Apartment" name="apartment" id="Apartment"
                                    required control-id="ControlID-6">
                                <label for="Apartment">Apartment</label>
                                @error('apartment')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input class="form-control" placeholder="Floor" name="floor" id="Floor" required
                                    control-id="ControlID-7">
                                <label for="Floor">Floor</label>
                                @error('floor')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Give us order notes" name="message"
                                    id="Notes" style="height: 100px" control-id="ControlID-9"></textarea>
                                <label for="Notes">Give us order notes</label>
                                @error('message')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <input class="primary-back secondary w-100 py-3" type="submit" value="Submit"
                                control-id="ControlID-10">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection