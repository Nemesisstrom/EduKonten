@extends('layouts.main')
@section('title', $materi->judul)

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <article>
                <header class="mb-4">
                    <h1 class="fw-bolder mb-1">{{ $materi->judul }}</h1>
                    <div class="text-muted fst-italic mb-2">Diposting pada {{ $materi->created_at->format('d M Y') }}</div>
                </header>

                @if($materi->gambar)
                    <figure class="mb-4">
                        @if(filter_var($materi->gambar, FILTER_VALIDATE_URL))
                            <img src="{{ $materi->gambar }}" class="img-fluid rounded" alt="{{ $materi->judul }}">
                        @else
                            <img src="{{ asset('storage/' . $materi->gambar) }}" class="img-fluid rounded" alt="{{ $materi->judul }}">
                        @endif
                    </figure>
                @endif

                <section class="mb-5">
                    <p class="fs-5">{!! nl2br(e($materi->deskripsi)) !!}</p>
                </section>
            </article>

            <!-- Comments section-->
            <section class="mb-5">
                <div class="card bg-light">
                    <div class="card-body">
                        <!-- Comment form-->
                        @auth
                            <form class="mb-4" action="{{ route('comments.store', $materi) }}" method="POST">
                                @csrf
                                <textarea name="content" class="form-control" rows="3" placeholder="Tulis komentarmu di sini..."></textarea>
                                <button class="btn btn-primary mt-2" type="submit">Kirim</button>
                            </form>
                        @else
                            <p><a href="{{ route('login') }}">Login</a> untuk meninggalkan komentar.</p>
                        @endauth

                        <!-- Comments list-->
                        @forelse ($materi->comments as $comment)
                            <div class="d-flex mb-4">
                                <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                <div class="ms-3">
                                    <div class="fw-bold">{{ $comment->user->name }}</div>
                                    {{ $comment->content }}
                                    <div class="text-muted small mt-1">{{ $comment->created_at->diffForHumans() }}</div>
                                </div>
                            </div>
                        @empty
                            <p>Belum ada komentar.</p>
                        @endforelse
                    </div>
                </div>
            </section>

            <a href="{{ route('materi.index') }}" class="btn btn-outline-secondary">&larr; Kembali ke Daftar Materi</a>
        </div>
    </div>
</div>
@endsection
