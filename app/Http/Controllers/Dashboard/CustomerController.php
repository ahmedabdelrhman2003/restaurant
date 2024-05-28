<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Page\StoreCustomerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{

    function store(StoreCustomerRequest $request)
    {

        if (request()->has('message')) {
            $customerId = DB::table('customers')->insertGetId([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'street' => $request->street,
                'phone' => $request->phone,
                'floor' => $request->floor,
                'apartment' => $request->apartment,
                'email' => $request->email,
                'message' => $request->message
            ]);
        } else {
            $customerId = DB::table('customers')->insertGetId([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'street' => $request->street,
                'phone' => $request->phone,
                'floor' => $request->floor,
                'apartment' => $request->apartment,
                'email' => $request->email,
            ]);
        }

        return redirect()->route('order.create', ['customer_id' => $customerId]);
    }

    function index()
    {

        return view('page.customer');
    }
}