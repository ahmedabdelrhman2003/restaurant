@extends('dashboard.layout')
@section('title','Edit Role')
@section('content')

<!-- Start Content-->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">


                        <li class="breadcrumb-item active">Create Admin</li>
                    </ol>
                </div>
                <h4 class="page-title">Add Admin</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Admin</h5>

                <form action="{{ route('auth.register') }}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="product-name">name<span class="text-danger">*</span></label>
                        <input type="text" name="name" value="{{ old('name') }}" id="product-name" class="form-control"
                            placeholder="enter your name">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="product-name">email<span class="text-danger">*</span></label>
                        <input type="email" name="email" value="{{ old('email') }}" id="product-name"
                            class="form-control" placeholder="e.g : Apple iMac">
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="product-name">password<span class="text-danger">*</span></label>
                        <input type="password" name="password" id="product-name" class="form-control"
                            placeholder="enter your password">
                        @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">

                        <label for="exampleFormControlSelect1">roles<span class="text-danger">*</span></label>
                        <select class="form-control" name="role" id="exampleFormControlSelect1">
                            @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>

                        @error('role')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>






                    <div class="text-center mb-3">

                        <button type="submit" class="btn w-lg btn-success waves-effect waves-light">Save</button>

                    </div>

                </form>

            </div> <!-- end card-box -->
        </div> <!-- end col -->



        <!-- end col-->

        <!-- end col-->
    </div>
</div>
@endsection