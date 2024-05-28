<?php

namespace App\Http\Controllers\Dashboard;

use GuzzleHttp\Client;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    function pay(Request $request)
    {
        $id = $request->order_id;
        // dd($id);
        $token = $this->getToken();
        $order_id = $this->createOrder($token, $id);
        $payment_token = $this->paymentRequest($token, $order_id, $id);
        $iframe_id = 830727; //uncomment this line when clone the project

        return view('page.payment')->with(compact('payment_token', 'iframe_id'));
    }
    function callback(Request $request)
    {
        if (request('success') === 'true' && $request->has('merchant_order_id')) {
            // ممكن لو حصل ايرور يبقي بسبب ان القيمه ؤاحعه string ةهي مفروض integer
            $id = $request->merchant_order_id;
            $order = Order::find($id);
            $order->status = 'paid';
            $order->save();
            return redirect()->route('page.home')->with('success', 'the order has been requested successfully');
        } else
            return redirect()->route('page.home')->with('failed', 'the order has not been requested');
    }

    function getToken()
    {
        $client = new Client();
        $request = Http::post(
            'https://accept.paymob.com/api/auth/tokens',
            [
                'api_key' => env('PAYMOB_API_KEY')
            ]
        );
        return $request->object()->token;
    }
    function createOrder($token, $Mid)
    {

        $cart = session()->get('cart');

        $items = [];
        $total = 0;
        foreach ($cart as $id => $item) {

            $items[] = [

                "name" => $item['name'],
                "amount_cents" => $item['price'] * 100,
                "quantity" => $item['quantity']

            ];
            $total += $item['price'] * $item['quantity'];
            $tax = config('fees.taxes');
            $taxAmount = $total * ($tax / 100);
            $total = ($total + $taxAmount + config('fees.delivery'));
        }
        $total = ($total * 100);
        $data =
            [
                'auth_token' => $token,
                "delivery_needed" => "false",
                "amount_cents" => "$total",
                "currency" => "EGP",
                "merchant_order_id" => $Mid,
                "items" => $items,
            ];

        $request = Http::post('https://accept.paymob.com/api/ecommerce/orders', $data);
        // dd($request->object());
        return $request->object()->id;
    }
    function paymentRequest($token, $order_id, $id)
    {
        $order = Order::with('customer')->find($id);
        $customer = $order->customer;
        $billing_data = [
            'apartment' =>   $customer->apartment,
            'email' =>       $customer->email,
            'floor' =>      $customer->floor,
            'first_name' => $customer->first_name,
            'street' =>     $customer->street,
            'last_name' =>  $customer->last_name,
            'building' => 'NA',
            'city' => 'tanta',
            'country' => 'Egypt',
            'phone_number' => $customer->phone
        ];
        $total = $order->total * 100;
        $data = [
            'auth_token' => $token,
            'amount_cents' => $total,
            'expiration' => 3600,
            'currency' => 'EGP',
            'integration_id' => 4535029,
            'order_id' => $order_id,
            'billing_data' => $billing_data
        ];
        $request = Http::post('https://accept.paymob.com/api/acceptance/payment_keys', $data);
        return $request->object()->token;
    }
}
