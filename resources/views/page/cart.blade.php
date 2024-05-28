@extends('page.layout')
@section('title', 'Cart')
@section('breadcrump')
    <div class="landing d-flex align-items-center justify-content-center">
        <div class="container-xxl row">
            <h1 class="display-3 mb-3 text-center secondary">Order</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="{{ route('page.home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="">Pages</a></li>
                    <li class="breadcrumb-item text active" aria-current="page">Cart</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection
@section('content')
    <section class="Order py-5">
        <div class="container">
            <div class="cart">
                <h1 class="ff-secondary primary h1 text-center mb-0 pb-5">Make your order now</h1>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered primary table-striped m-0">
                            <thead class="primary-back secondary bordered-head">
                                <tr>
                                    <th class="text-center py-3 px-4" style="min-width: 400px;">Product details</th>
                                    <th class="text-center py-3 px-4" style="width: 100px;">Price</th>
                                    <th class="text-center py-3 px-4" style="width: 120px;">Quantity</th>
                                    <th class="text-center py-3 px-4" style="width: 100px;">Total</th>
                                    <th class="text-center align-middle py-3 px-0" style="width: 40px;"><a
                                            href="{{ route('cart.delete') }}" class="shop-tooltip float-none text-light"
                                            title="" data-original-title="Clear cart">X</a></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (session('cart'))
                                    @php
                                        $total = 0;
                                    @endphp
                                    @foreach (session('cart') as $id => $details)
                                        @php
                                            $total += $details['price'] * $details['quantity'];
                                        @endphp
                                        <tr>
                                            <td class="p-3">
                                                <div class="media d-flex align-items-center gap-4">
                                                    <div class="media-body">
                                                        <a href="#"
                                                            class="d-block text-dark fs-4 fw-bold">{{ $details['name'] }}</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-right font-weight-semibold align-middle p-4">
                                                ${{ $details['price'] }}
                                            </td>
                                            <td class="align-number">
                                                <a id="plus" href="{{ route('cart.increment', $id) }}"
                                                    data-id="{{ $id }}">
                                                    <i class="fa-solid fa-plus secondary primary-back"
                                                        aria-hidden="true"></i>
                                                </a>
                                                <span class="mx-2">{{ $details['quantity'] }}</span>
                                                <a id="minus" href="{{ route('cart.decrement', $id) }}">
                                                    <i class="fa-solid fa-minus secondary primary-back"
                                                        aria-hidden="true"></i>
                                                </a>
                                            </td>
                                            <td class="text-right font-weight-semibold align-middle p-4">$
                                                {{ $details['quantity'] * $details['price'] }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('cart.destroy', $id) }}"> <i
                                                        class="shop-tooltip close float-none text-danger fw-bold"
                                                        data-original-title="Remove">X</i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between align-items-center pb-4">
                        <div class="d-flex gap-3">
                            <div class="text-right mt-4 mr-5">
                                <label class="text-muted font-weight-normal m-0">Total price</label>
                                <div class="text-large"><strong class="pricing">$ @if (isset($total))
                                            {{ $total }}
                                        @endif
                                    </strong></div>
                            </div>
                            <div class="text-right mt-4">
                                <label class="text-muted font-weight-normal m-0">Discount</label>
                                <div class="text-large"><strong class="discounting">0</strong></div>
                            </div>
                        </div>
                        <a type="button" href="{{ route('customer.index') }}"
                            class="btn btn-lg primary-back secondary mt-4">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- <script>
        $(document).ready(function() {
            $('#plus').click(function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                var url = "{{ route('cart.increment', ':id') }}".replace(':id', id);
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(response) {
                        //  'response' contains the HTML you want to load

                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error: ' + status + error);
                    }
                });
            });
        });
    </script> --}}
    {{-- <script>
        $(document).ready(function() {
            $('#minus').click(function(e) {
                e.preventDefault();

                // URL you want to load via AJAX
                var url = "{{ route('cart.increment', ':id') }}".replace(':id', id);

                $.ajax({
                    url: url,
                    type: 'POST',
                    success: function(response) {
                        //  'response' contains the HTML you want to load
                        $('#content').html(response);
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error: ' + status + error);
                    }
                });
            });
        });
    </script> --}}
@endsection
