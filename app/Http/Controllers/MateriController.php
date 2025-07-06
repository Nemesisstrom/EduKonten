<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MateriController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'store']);
    }

    /**
     * Tampilkan semua materi.
     */
    public function index()
    {
        $materis = Materi::all();
        return view('materi.index', compact('materis'));
    }

    /**
     * Tampilkan form untuk tambah materi.
     */
    public function create()
    {
        return view('materi.create');
    }

    /**
     * Simpan materi baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('materi-images', 'public');
        }

        Materi::create($validated);

        return redirect()->route('materi.index')->with('success', 'Materi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Materi $materi)
    {
        return view('materi.show', compact('materi'));
    }

    /**
     * Tampilkan form edit materi.
     */
    public function edit(Materi $materi)
    {
        return view('materi.edit', compact('materi'));
    }

    /**
     * Hapus materi.
     */
    public function destroy(Materi $materi)
    {
        // Hapus gambar jika ada
        if ($materi->gambar) {
            Storage::disk('public')->delete($materi->gambar);
        }

        $materi->delete();

        return redirect()->route('materi.index')->with('success', 'Materi berhasil dihapus!');
    }
}

