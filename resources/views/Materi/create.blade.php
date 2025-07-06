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

    <!-- Input lainnya -->
    <label for="media">Upload Foto:</label><br>
    <input type="file" name="media" accept="image/*"><br>

    <label for="youtube_video">Atau Masukkan Link Video YouTube:</label><br>
    <input type="url" name="youtube_video" placeholder="https://www.youtube.com/watch?v=xxxxxx" value="{{ old('youtube_video') }}"><br>
    <small>Jika ingin menambahkan video, upload ke YouTube terlebih dahulu lalu masukkan link di sini.</small><br>
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
