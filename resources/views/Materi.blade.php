@extends('layouts.main')

@section('title', 'Materi')

@section('content')
    <h2>Materi Edukasi</h2>
    <ul>
        @foreach ($materi as $item)
            <li>{{ $item }}</li>
        @endforeach
    </ul>
@endsection
