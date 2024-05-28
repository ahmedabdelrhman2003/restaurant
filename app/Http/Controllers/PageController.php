<?php

namespace App\Http\Controllers;


use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    function home()
    {
        $products = Product::all();
        $about = DB::table('about')->select('description')->first();
        $cards = DB::table('card')->get();

        return view('page.home', compact('products', 'about', 'cards'));
    }
    function about()
    {
        $about = DB::table('about')->select('description')->first();
        return view('page.about', compact('about'));
    }
    function services()
    {
        $cards = DB::table('card')->get();
        return view('page.services', compact('cards'));
    }
    function menu()
    {
        $products = DB::table('products')->get();
        return view('page.menu', compact('products'));
    }
    function cart()
    {
        return view('page.cart');
    }
    function customer()
    {
        return view('page.customer');
    }
    function feedback()
    {
        return view('page.feedback');
    }
}
