@extends('page.layout')
@section('title','Admin Login')
@section('breadcrump')
<div class="landing d-flex align-items-center justify-content-center">
    <div class="container-xxl row">
        <h1 class="display-3 mb-3 text-center secondary">Log In</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item"><a href="">Pages</a></li>
                <li class="breadcrumb-item text active" aria-current="page">Login</li>
            </ol>
        </nav>
    </div>
</div>
@endsection
@section('content')
<section class="login py-5">
    <div class="container">
        <form action="{{ route('auth.login-user') }}" method="post">
            @csrf
            @if (Session::has('faild'))
            <div class="alert alert-danger">{{ Session::get('faild') }}</div>
            @endif
            @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if (Session::has('error'))
            <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif
            <div class="image">
                <img src="{{url('assets/photos/bg-hero.webp')}}" alt="">
            </div>
            <div class="content">
                <input class="form-control" type="email" id="emailaddress" name="email" value="{{ old('email') }}"
                    required="" placeholder="Enter your email">
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input type="password" id="password" name="password" value="{{ old('password') }}" class="form-control"
                    placeholder="Enter your password">
                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input type="submit" value="Login">

            </div>
        </form>
    </div>
</section>
@endsection



@section('js')
<script>
    const btn = document.getElementById('btn');
        const pass = document.getElementById('password');
        btn.addEventListener('click', function() {
            if (pass.type === 'password') {
                pass.type = 'text';
            } else {
                pass.type = 'password';
            }

        })
</script>
@endsection