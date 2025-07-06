<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materis = Materi::latest()->get();
        return view('admin.materi.index', compact('materis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Materi $materi)
    {
        return view('admin.materi.edit', compact('materi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Materi $materi)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            if ($materi->gambar) {
                Storage::disk('public')->delete($materi->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('materi-images', 'public');
        }

        $materi->update($validated);

        return redirect()->route('admin.materi.index')->with('success', 'Materi berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Materi $materi)
    {
        if ($materi->gambar) {
            Storage::disk('public')->delete($materi->gambar);
        }

        $materi->delete();

        return redirect()->route('admin.materi.index')->with('success', 'Materi berhasil dihapus!');
    }
}
