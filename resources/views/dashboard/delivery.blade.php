@extends('dashboard.layout')
@section('title','Delivery')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="">UBold</a></li>
                    <li class="breadcrumb-item"><a href="">eCommerce</a></li>
                    <li class="breadcrumb-item active">Delivery</li>
                </ol>
            </div>
            <h4 class="page-title">Delivery</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        @foreach ($orders as $order)
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3">Items from the Order </h4>
                <div class="table-responsive">
                    <table class="table table-bordered table-centered mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th>Product name</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->order_items as $item)


                            <tr>
                                <th scope="row">{{$item->product->name}}</th>
                                <td><img src="{{ asset('assets/img/products/' . $item->product->image) }}"
                                        alt="product-img" height="32">
                                </td>
                                <td>{{$item->quantity}}</td>
                                <td>{{$item->product->price}} $</td>
                                <td>{{$item->quantity * $item->product->price}} $</td>
                            </tr>
                            @endforeach
                            <tr>
                                <th scope="row" colspan="4" class="text-right">Total :</th>
                                <td>
                                    <div class="font-weight-bold">{{$order->total}}</div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mb-3">Shipping Information</h4>
                                <p class="mb-2"><span class="font-weight-semibold mr-2">Fisrt Name:</span>
                                    {{$order->customer->first_name}}</p>
                                <p class="mb-2"><span class="font-weight-semibold mr-2">Last Name:</span>
                                    {{$order->customer->last_name}}</p>
                                <p class="mb-2"><span class="font-weight-semibold mr-2">Email:</span>
                                    {{$order->customer->email}}
                                </p>
                                <p class="mb-2"><span class="font-weight-semibold mr-2">Phone:</span>
                                    {{$order->customer->phone}}</p>
                                <p class="mb-2"><span class="font-weight-semibold mr-2">Street:</span>
                                    {{$order->customer->street}}
                                </p>
                                <p class="mb-2"><span class="font-weight-semibold mr-2">Apartment:</span>
                                    {{$order->customer->apartment}}</p>
                                <p class="mb-2"><span class="font-weight-semibold mr-2">Floor:</span>
                                    {{$order->customer->floor}}</p>
                                <p class="mb-0"><span class="font-weight-semibold mr-2">Notes:</span>
                                    {{$order->customer->message}}</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-12">
                    <div class="text-center mb-3">
                        <a href="{{route('dashboard.delivery.finished',$order->id)}}"
                            class="btn w-sm btn-success waves-effect waves-light" control-id="ControlID-7">Finished</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection