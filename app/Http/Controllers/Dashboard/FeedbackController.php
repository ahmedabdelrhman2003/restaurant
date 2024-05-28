<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Mail\FeedbackMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedback = DB::table('feedback')->paginate(10);

        return view('dashboard.feedback.index', compact('feedback'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function reply($id)
    {
        $feedback = DB::table('feedback')->where('id', $id)->first();
        return view('dashboard.feedback.reply', compact('feedback'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function send(Request $request, $id)
    {
        $request->validate([
            'reply' => ['required', 'max:255']
        ]);
        DB::table('feedback')->where('id', $id)->update([
            'reply' => $request->reply,
        ]);
        $feedback = DB::table('feedback')->select('reply', 'email')->where('id', $id)->first();
        Mail::to($feedback->email)->send(new FeedbackMail($feedback));
        DB::table('feedback')->where('id', $id)->update([
            'status' => 'replied',
        ]);

        return redirect()->route('feedback.index')->with('success', 'sent successfully');
    }
    function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'phone' => ['required', 'numeric'],
            'email' => ['required', 'email'],
            'message' => ['required', 'max:255'],
            'address' => ['required', 'max:255'],
        ]);
        DB::table('feedback')->insert([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'message' => $request->message,
            'address' => $request->address,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);

        return redirect()->back();
    }
}