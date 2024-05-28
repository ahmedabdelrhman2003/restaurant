@extends('dashboard.layout')
@section('title',' About')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="">UBold</a></li>
                    <li class="breadcrumb-item"><a href="">Ecommerce</a></li>
                    <li class="breadcrumb-item active">About</li>
                </ol>
            </div>
            <h4 class="page-title">About</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <div id="products-datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <table
                                    class="table table-centered table-striped dt-responsive nowrap w-100 dataTable no-footer dtr-inline collapsed"
                                    id="products-datatable" role="grid" aria-describedby="products-datatable_info"
                                    style="width: 1182px;">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="products-datatable"
                                                rowspan="1" colspan="1" style="width: 193.4px;"
                                                aria-label="Customer: activate to sort column ascending">
                                                Name</th>
                                            <th style="width: 75.8px;" class="sorting_disabled" rowspan="1" colspan="1"
                                                aria-label="Action">Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr role="row" class="even">
                                            <td class="table-user">
                                                <a href="" class="text-body font-weight-semibold">About
                                                    Us</a>
                                            </td>
                                            <td>
                                                <a href="{{route('dashboard.about.show',1)}}" class="action-icon"> <i
                                                        class="fas fa-eye"></i></a>
                                                <a href="{{route('dashboard.about.edit',1)}}" class="action-icon">
                                                    <i class="mdi mdi-square-edit-outline"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection