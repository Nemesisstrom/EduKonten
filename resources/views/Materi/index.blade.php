@extends('layouts.main')
@section('title', 'Artikel Terbaru - EduKonten')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="h3 mb-0">Artikel Terbaru</h2>
    @auth
        <a href="{{ route('materi.create') }}" class="btn btn-primary">+ Tambah Materi</a>
    @endauth
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
    @forelse ($materis as $materi)
        <div class="col">
            <div class="card h-100 shadow-sm">
                @if($materi->gambar)
                    @if(filter_var($materi->gambar, FILTER_VALIDATE_URL))
                        <img src="{{ $materi->gambar }}" class="card-img-top" alt="{{ $materi->judul }}" style="height: 200px; object-fit: cover;">
                    @else
                        <img src="{{ asset('storage/' . $materi->gambar) }}" class="card-img-top" alt="{{ $materi->judul }}" style="height: 200px; object-fit: cover;">
                    @endif
                @endif
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="{{ route('materi.show', $materi->id) }}" class="text-decoration-none">{{ $materi->judul }}</a>
                    </h5>
                    <p class="card-text">{{ Str::limit($materi->deskripsi, 100) }}</p>
                </div>
                @auth
                <div class="card-footer bg-white border-0 d-flex justify-content-between">
                    <a href="{{ route('materi.edit', $materi->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('materi.destroy', $materi->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus materi ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </div>
                @endauth
            </div>
        </div>
    @empty
        <div class="col">
            <p class="text-center text-muted">Belum ada materi yang tersedia.</p>
        </div>
    @endforelse
</div>
@endsection
