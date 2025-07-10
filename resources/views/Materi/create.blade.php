@extends('layouts.main')

@section('title', 'Tambah Materi')

@section('content')
<h2>Tambah Materi</h2>

<form action="{{ route('materi.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label>Judul:</label><br>
    <input type="text" name="judul" value="{{ old('judul') }}" required><br>

    <label>Deskripsi:</label><br>
    <textarea name="deskripsi" required>{{ old('deskripsi') }}</textarea><br>

    <label>Gambar (opsional):</label><br>
    <input type="file" name="gambar" accept="image/*"><br><br>

    <button type="submit">Simpan</button>

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
