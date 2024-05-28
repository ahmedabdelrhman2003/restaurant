<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = DB::table('about')->select()->paginate(10);
        return view('dashboard.about.index', compact('about'));
    }


    public function show($id)
    {

        $about = DB::table('about')->select()->where('id', $id)->first();


        return view('dashboard.about.show', compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $about = DB::table('about')->select()->where('id', $id)->first();

        return view('dashboard.about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'description' => ['required', 'min:5', 'max:255'],
        ]);
        DB::table('about')->where('id', $id)->update([
            'description' => $request->description,
        ]);
        return redirect()->route('dashboard.about.index')->with('success', 'updated successfully');
    }
    function dashboard()
    {
        return view('dashboard.layout');
    }
}
