<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    function createOrder(Request $request)
    {

        // DB::beginTransaction();
        // try {
        $order = new Order();
        $order->customer_id = $request->customer_id;
        $order->save();
        $cart = session()->get('cart');
        $total = 0;

        foreach ($cart as $id => $item) {
            DB::table('order_items')->insert([
                'product_id' => $id,
                'quantity' => $item['quantity'],
                'order_id' => $order->id
            ]);
            $total += $item['price'] * $item['quantity'];
        }
        $tax = config('fees.taxes');
        $taxAmount = $total * ($tax / 100);
        $total = ($total + $taxAmount + config('fees.delivery'));
        $order->total = $total;
        $order->save();
        // } catch (\Exception $e) {
        //     DB::rollback();
        // }
        // DB::commit();
        // dd($order->id);
        return redirect()->route('pay', ['order_id' => $order->id]);
    }
}
