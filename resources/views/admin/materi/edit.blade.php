@extends('layouts.main')

@section('title', 'Admin: Edit Materi')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Materi: {{ $materi->judul }}</div>
                <div class="card-body">
                    <form action="{{ route('admin.materi.update', $materi->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" name="judul" id="judul" class="form-control" value="{{ old('judul', $materi->judul) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="5" required>{{ old('deskripsi', $materi->deskripsi) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" name="gambar" id="gambar" class="form-control">
                            @if($materi->gambar)
                                <div class="mt-2">
                                    <small>Gambar saat ini:</small><br>
                                    @if(filter_var($materi->gambar, FILTER_VALIDATE_URL))
                                        <img src="{{ $materi->gambar }}" width="150" alt="Gambar">
                                    @else
                                        <img src="{{ asset('storage/' . $materi->gambar) }}" width="150" alt="Gambar">
                                    @endif
                                </div>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary">Update Materi</button>
                        <a href="{{ route('admin.materi.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 