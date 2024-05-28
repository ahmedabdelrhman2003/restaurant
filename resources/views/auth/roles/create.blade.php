@extends('dashboard.layout')
@section('title','Create Cart')
@section('content')

<!-- Start Content-->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">

                        <li class="breadcrumb-item"><a href="{{ route('role.index') }}">Roles</a></li>


                        <li class="breadcrumb-item active">create role</li>
                    </ol>
                </div>
                <h4 class="page-title">Add Role</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">create</h5>

                <form action="{{ route('role.store') }}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="product-name">role name<span class="text-danger">*</span></label>
                        <input type="text" name="name" value="{{ old('name') }}" id="product-name" class="form-control"
                            placeholder="enter role name">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">

                        <label for="exampleFormControlSelect1">permissions<span class="text-danger">*</span></label>
                        <select multiple class="form-control" name="permissionId[]" id="exampleFormControlSelect1"
                            style="height: 10rem">
                            @foreach ($permissions as $permission)
                            <option value="{{ $permission->id }}" ma>{{ $permission->name }}</option>
                            @endforeach
                        </select>

                        @error('permissionId')
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