@extends('layouts.main')

@section('title', 'Selamat Datang')

@section('content')
<div class="container py-5">
    <div class="p-5 text-center bg-light rounded-3">
        <h1 class="text-body-emphasis">Selamat Datang di Portal Edukasi Konten Digital</h1>
        <p class="col-lg-8 mx-auto fs-5 text-muted">
            Temukan berbagai materi dan tips untuk menjadi pengguna internet yang cerdas dan bertanggung jawab. Mari ciptakan lingkungan digital yang positif dan aman untuk semua.
        </p>
        <div class="d-inline-flex gap-2 mb-5">
            <a href="{{ route('materi.index') }}" class="d-inline-flex align-items-center btn btn-primary btn-lg px-4 rounded-pill" type="button">
                Lihat Materi
            </a>
            <a href="{{ route('tips') }}" class="btn btn-outline-secondary btn-lg px-4 rounded-pill" type="button">
                Lihat Tips
            </a>
        </div>
    </div>
</div>
@endsection
