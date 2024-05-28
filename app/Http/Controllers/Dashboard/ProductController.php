<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\traits\media;

class ProductController extends Controller
{
    use media;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('dashboard.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('dashboard.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $photoName = $this->uploadPhoto($request->image, 'products');
        DB::table('products')->insert([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $photoName,
            'price' => $request->price,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),

        ]);
        return redirect(route('dashboard.product.index'))->with('success', 'the new product stored successfully');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $product = DB::table('products')->select()->where('id', $id)->first();
        return view('dashboard.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => ['required', 'max:225'],
            'description' => ['required', 'min:5', 'max:225'],
            'image' => ['required', 'file', 'mimes:jpg,png,jpeg,svg,webp', 'max:1000'],
            'price' => ['required']
        ]);

        if ($request->hasFile('image')) {
            $photoDel = DB::table('products')->select('image')->where('id', $id)->get();
            $del = public_path('assets/img/products/' . $photoDel);
            $this->deletePhoto($del);
            $photoName = $this->uploadPhoto($request->image, 'products');
            $affected = DB::table('products')->where('id', $id)->update([
                'name' => $request->name,
                'description' => $request->description,
                'image' => $photoName
            ]);
        } else {
            DB::table('products')->where('id', $id)->update([
                'name' => $request->name,
                'description' => $request->description,
            ]);
        }

        return redirect()->route('dashboard.product.index')->with('success', 'edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::table('products')->where('id', $id)->delete();

        return redirect()->route('dashboard.product.index')->with('success', 'deleted successfully');
    }
}
