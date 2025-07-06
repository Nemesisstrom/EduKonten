<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Materi $materi)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $materi->comments()->create([
            'content' => $request->content,
            'user_id' => auth()->id(),
        ]);

        return back()->with('success', 'Komentar berhasil ditambahkan!');
    }
}
