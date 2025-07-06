@extends('layouts.main')

@section('title', 'Edit Materi')

@section('content')
<h2>Edit Materi</h2>

<form action="{{ route('materi.update', $materi->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label>Judul:</label><br>
    <input type="text" name="judul" value="{{ old('judul', $materi->judul) }}" required><br>

    <label>Deskripsi:</label><br>
    <textarea name="deskripsi" required>{{ old('deskripsi', $materi->deskripsi) }}</textarea><br>

    @if($materi->gambar)
        <p>Gambar Saat Ini:</p>
        <img src="{{ asset('storage/' . $materi->gambar) }}" width="150"><br>
    @endif

    <label>Gambar Baru (opsional):</label><br>
    <input type="file" name="gambar"><br><br>

    <button type="submit">Update</button>
</form>

@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection
