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
                        <li class="breadcrumb-item active">Edit User</li>
                    </ol>
                </div>
                <h4 class="page-title">Edit User</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Admin</h5>

                <form action="{{ route('auth.update', $admin->id) }}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="product-name">name<span class="text-danger">*</span></label>
                        <input type="text" name="name" value="{{ $admin->name }}" id="product-name" class="form-control"
                            placeholder="enter your name">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="product-name">email<span class="text-danger">*</span></label>
                        <input type="email" name="email" value="{{ $admin->email }}" id="product-name"
                            class="form-control" placeholder="">
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group mb-3">
                        <label for="product-name">role<span class="text-danger">*</span></label>
                        <select class="form-control" name="role" id="exampleFormControlSelect1">

                            @foreach ($roles as $role)
                            {{-- @if (in_array($permission->id, $role->permissions)) --}}
                            @if ($admin->role_id == $role->id)
                            <option value="{{ $role->id }}" selected>{{ $role->name }}
                            </option>
                            @else
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endif
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