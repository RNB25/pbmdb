<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'nullable|email|max:100',
            'subject' => 'nullable|string|max:200',
            'message' => 'required|string|max:1000',
        ]);

        Message::create($validated);

        return back()->with('success', 'Pesan berhasil dikirim!');
    }

    public function index()
    {
        $massanges = Message::latest()->paginate(10);
        return view('Module.Dashboard.massange.index', compact('massanges'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'balasan' => 'required|string|max:1000',
        ]);

        $message = Message::findOrFail($id);
        $message->balasan = $request->balasan;
        $message->reply = true;
        $message->save();

        return back()->with('success', 'Pesan berhasil dibalas!');
    }

}
