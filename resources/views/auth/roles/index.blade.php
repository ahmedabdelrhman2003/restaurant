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


                        <li class="breadcrumb-item active"> Roles</li>
                    </ol>
                </div>
                <h4 class="page-title">Roles</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <h4>Roles</h4>
                        </div>

                        <div class="col-md-6">
                            <div class="text-md-right">
                                <a href="{{ route('role.create') }}" style="color: white;">
                                    <button type="button" class="btn btn-danger waves-effect waves-light mb-2 mr-2"><i
                                            class="mdi mdi-basket mr-1"> add roles</i></button></a>
                            </div>
                        </div><!-- end col-->

                    </div>

                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap table-borderless table-hover mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th>role</th>




                                    <th style="width: 82px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($roles as $role)
                                <tr>
                                    <td>
                                        {{ $role->name }}
                                    </td>

                                    <td>
                                        <a href="{{ route('role.view', $role->id) }}"><i class=" mdi mdi-eye"
                                                class="icon-dual"></i></a>


                                        <a href="{{ route('role.edit', $role->id) }}" class="action-icon">
                                            <i class="mdi mdi-square-edit-outline"></i>
                                        </a>
                                        <a href="{{ route('role.destroy', $role->id) }}" class="action-icon"
                                            onclick="return confirm('Are you sure you want to delete this?')">
                                            <i class="mdi mdi-delete"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="div">{{ $roles->links('pagination::bootstrap-5') }}</div>
                    </div>


                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->

    </div>
</div>

@endsection