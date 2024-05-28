<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function kitchen()
    {
        $orders = Order::where('status', 'paid')->with('order_items.product')->get();
        return view('dashboard.kitchen', compact('orders'));
    }
    function prepared($id)
    {
        $order = Order::find($id);
        $order->status = 'prepared';
        $order->save();
        return redirect()->back();
    }
    function delivery()
    {
        $orders = Order::where('status', 'prepared')->with('order_items.product', 'customer')->get();
        return view('dashboard.delivery', compact('orders'));
    }
    function finished($id)
    {
        $order = Order::find($id);
        $order->status = 'finished';
        $order->save();
        return redirect()->back();
    }
}