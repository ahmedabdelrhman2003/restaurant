<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\traits\media;
use Illuminate\Support\Facades\DB;

class CardController extends Controller
{
    use media;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cards = DB::table('card')->select()->paginate(10);

        return view('dashboard.card.index', compact('cards'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.card.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:22'],
            'description' => ['required', 'min:5', 'max:225'],
            'image' => ['required', 'file', 'mimes:jpg,png,jpeg,svg,webp', 'max:1000']
        ]);
        $photoName = $this->uploadPhoto($request->image, 'cards');
        DB::table('card')->insert([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $photoName,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        return redirect()->route('dashboard.card.index')->with('success', 'stored successfully');
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $card = DB::table('card')->select()->where('id', $id)->first();

        return view('dashboard.card.edit', compact('card'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'max:225'],
            'description' => ['required', 'min:5'],
        ]);
        if ($request->hasFile('image')) {
            $photoDel = DB::table('card')->select('image')->where('id', $id)->get();
            $del = public_path('assets/img/card/' . $photoDel);
            $this->deletePhoto($del);
            $photoName = $this->uploadPhoto($request->image, 'card');
            $affected = DB::table('card')->where('id', $id)->update([
                'name' => $request->name,
                'description' => $request->description,
                'image' => $photoName
            ]);
        } else {
            DB::table('card')->where('id', $id)->update([
                'name' => $request->name,
                'description' => $request->description,
            ]);
        }

        return redirect()->route('card.index')->with('success', 'edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::table('card')->where('id', $id)->delete();

        return redirect()->route('dashboard.card.index')->with('success', 'deleted successfully');
    }
}
