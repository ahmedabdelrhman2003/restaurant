@extends('dashboard.layout')
@section('title','Edit Role')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">

                        <li class="breadcrumb-item"><a href="{{ route('role.index') }}"> Roles</a></li>
                        <li class="breadcrumb-item active"> View Role</li>
                    </ol>
                </div>
                <h4 class="page-title">View Role</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Roles</h5>

                <div class="form-group mb-3">
                    <label for="product-name">role name<span class="text-danger">*</span></label>
                    <div class="div">{{ $role->name }}</div>
                </div>
                <div class="form-group mb-3">
                    <label for="product-name">role permissions<span class="text-danger">*</span></label>
                    <div class="div">
                        @foreach ($role->permissions as $permission)
                        {{ $permission->name }} &nbsp;, &nbsp;
                        @endforeach
                    </div>
                </div>




            </div> <!-- end card-box -->
        </div> <!-- end col -->
    </div>
</div> <!-- container -->
@endsection