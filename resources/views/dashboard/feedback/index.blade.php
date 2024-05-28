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
                        <li class="breadcrumb-item active">Feedback</li>
                    </ol>
                </div>
                <h4 class="page-title">Feedback</h4>
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
                                                <th class="sorting" tabindex="0" aria-controls="products-datatable"
                                                    rowspan="1" colspan="1" style="width: 130.4px;"
                                                    aria-label="Phone: activate to sort column ascending">
                                                    Email</th>
                                                <th class="sorting" tabindex="0" aria-controls="products-datatable"
                                                    rowspan="1" colspan="1" style="width: 82.4px;"
                                                    aria-label="Balance: activate to sort column ascending">
                                                    Phone</th>
                                                <th class="sorting" tabindex="0" aria-controls="products-datatable"
                                                    rowspan="1" colspan="1" style="width: 68.4px;"
                                                    aria-label="Orders: activate to sort column ascending">
                                                    Address</th>
                                                <th class="sorting" tabindex="0" aria-controls="products-datatable"
                                                    rowspan="1" colspan="1" style="width: 68.4px;"
                                                    aria-label="Orders: activate to sort column ascending">
                                                    status</th>
                                                <th style="width: 75.8px;" class="sorting_disabled" rowspan="1"
                                                    colspan="1" aria-label="Action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($feedback as $item)
                                                <tr role="row" class="odd">

                                                    <td>
                                                        {{ $item->name }}
                                                    </td>
                                                    <td>
                                                        {{ $item->email }}
                                                    </td>
                                                    <td>
                                                        {{ $item->phone }}
                                                    </td>
                                                    <td>
                                                        {{ $item->address }}
                                                    </td>
                                                    <td>
                                                        {{ $item->status }}
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('dashboard.feedback.reply', $item->id) }}"
                                                            class="action-icon"> <i class="fas fa-eye"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <div class="dataTables_info" id="products-datatable_info" role="status"
                                        aria-live="polite">Showing customers 1 to 4 of 4</div>
                                </div>
                                <div class="col-sm-12 col-md-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="products-datatable_paginate">
                                        <ul class="pagination pagination-rounded">
                                            <li class="paginate_button page-item previous disabled"
                                                id="products-datatable_previous"><a href=""
                                                    aria-controls="products-datatable" data-dt-idx="0" tabindex="0"
                                                    class="page-link"><i class="mdi mdi-chevron-left"></i></a></li>
                                            <li class="paginate_button page-item active"><a href=""
                                                    aria-controls="products-datatable" data-dt-idx="1" tabindex="0"
                                                    class="page-link">1</a></li>
                                            <li class="paginate_button page-item "><a href=""
                                                    aria-controls="products-datatable" data-dt-idx="2" tabindex="0"
                                                    class="page-link">2</a></li>
                                            <li class="paginate_button page-item next" id="products-datatable_next"><a
                                                    href="" aria-controls="products-datatable" data-dt-idx="3"
                                                    tabindex="0" class="page-link"><i
                                                        class="mdi mdi-chevron-right"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
