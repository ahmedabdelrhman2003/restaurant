@extends('dashboard.layout')
@section('title', 'Kitchen')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="">UBold</a></li>
                        <li class="breadcrumb-item"><a href="">eCommerce</a></li>
                        <li class="breadcrumb-item active">Kitchen</li>
                    </ol>
                </div>
                <h4 class="page-title">Kitchen</h4>
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
                                            <th scope="row">{{ $item->product->name }}</th>
                                            <td><img src="{{ asset('assets/img/products/' . $item->product->image) }}"
                                                    alt="product-img" height="32">
                                            </td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ $item->product->price }} $</td>
                                            <td>{{ $item->quantity * $item->product->price }} $</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <th scope="row" colspan="4" class="text-right">Total :</th>
                                        <td>
                                            <div class="font-weight-bold">{{ $order->total }} $</div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center mb-3">
                                <a href="{{ route('dashboard.kitchen.prepared', $order->id) }}"
                                    class="btn w-sm btn-success waves-effect waves-light"
                                    control-id="ControlID-7">Prepared</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
