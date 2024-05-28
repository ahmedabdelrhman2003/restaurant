<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Darryldecode\Cart\Facades\Cart;
use Darryldecode\Cart\Facades\CartFacade;
use Darryldecode\Cart\CartCollection;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    /**
     * Show the form for creating a new resource.
     */
    public function addCart(Request $request, $id)
    {
        $product = Product::find($id);
        $cart = $request->session()->get('cart');
        if (!$cart) {
            $cart = [
                $id => [
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price
                ]
            ];
            $request->session()->put('cart', $cart);
            return redirect()->back();
            // return view('card');
        }
        if (isset($cart[$id])) {
            $cart[$id]["quantity"]++;
            $request->session()->put('cart', $cart);
            // return view('card');
            return redirect()->back();
        }
        $cart = [
            $id => [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price
            ]
        ];
        $request->session()->put('cart', $cart);
        $taxes = config('fees.taxes');
        $delivery = config('fees.delivery') . '%';
        $request->session()->put('taxes', $taxes);
        // return view('card');
        return redirect()->back();
    }
    function increment($id)
    {
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            $cart[$id]["quantity"]++;
            session()->put('cart', $cart);
            return redirect()->back();
        }
    }

    function decrement($id)
    {
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            $cart[$id]["quantity"]--;
            session()->put('cart', $cart);
            return redirect()->back();
        }
    }


    public function destroy($id)
    {
        if ($id) {

            $cart = session()->get('cart');

            if (isset($cart[$id])) {

                unset($cart[$id]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product removed successfully');
            return redirect()->back();
        }
    }
    function delete()
    {
        $cart = session()->get('cart');
        if (isset($cart)) {
            session()->forget('cart');
        }
        return redirect()->back();
    }
    /**
     * Show the form for editing the specified resource.
     */
}