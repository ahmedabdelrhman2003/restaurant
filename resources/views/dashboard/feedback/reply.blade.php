@extends('dashboard.layout')
@section('title', 'Feedback')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="">UBold</a></li>
                        <li class="breadcrumb-item"><a href="">Ecommerce</a></li>
                        <li class="breadcrumb-item active">Feedback details</li>
                    </ol>
                </div>
                <h4 class="page-title">Feedback Details</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">Customer Feedback</h4>
                    <p class="mb-2"><span class="font-weight-semibold mr-2">Name:</span> {{ $feedback->name }}</p>
                    <p class="mb-2"><span class="font-weight-semibold mr-2">Email:</span> {{ $feedback->email }}
                    </p>
                    <p class="mb-2"><span class="font-weight-semibold mr-2">Phone:</span> {{ $feedback->phone }}</p>
                    <p class="mb-2"><span class="font-weight-semibold mr-2">Address:</span> {{ $feedback->address }}</p>
                    <p class="mb-2"><span class="font-weight-semibold mr-2">Details:</span> {{ $feedback->message }}</p>
                    <form action="{{ route('dashboard.feedback.send', $feedback->id) }}" method="post">
                        @csrf
                        <textarea class="form-control mb-0" name="reply" id="Card-description" rows="5" placeholder="Enter your reply"></textarea>
                        <button type="submit" class="btn btn-success mt-2">Reply</button>
                        @error('reply')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
