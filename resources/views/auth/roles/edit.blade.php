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
                        <li class="breadcrumb-item"><a href="{{ route('role.index') }}">Roles</a></li>

                        <li class="breadcrumb-item active">Edit Role</li>
                    </ol>
                </div>
                <h4 class="page-title">Edit Role</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Edit Role</h5>

                <form action="{{ route('role.update', $role->id) }}" method="post">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="product-name">role<span class="text-danger">*</span></label>
                        <input type="text" name="name" value="{{ $role->name }}" id="product-name" class="form-control"
                            placeholder="enter your role">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group mb-3">

                        <label for="exampleFormControlSelect1">permissions<span class="text-danger">*</span></label>
                        <select multiple class="form-control" name="permissionId[]" id="exampleFormControlSelect1">

                            @foreach ($permissions as $permission)
                            {{-- @if (in_array($permission->id, $role->permissions)) --}}
                            @if ($role->permissions->contains($permission->id))
                            <option value="{{ $permission->id }}" selected>{{ $permission->name }}
                            </option>
                            @else
                            <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                            @endif
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
    </div>
</div>
@endsection