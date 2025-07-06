@extends('layouts.main')
@section('title', 'Admin: Kelola Materi')

@section('content')
<div class="container">
    <h2>Kelola Materi</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Judul</th>
                        <th>Dibuat pada</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($materis as $materi)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $materi->judul }}</td>
                        <td>{{ $materi->created_at->format('d M Y') }}</td>
                        <td>
                            <a href="{{ route('admin.materi.edit', $materi->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('admin.materi.destroy', $materi->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus materi ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection 