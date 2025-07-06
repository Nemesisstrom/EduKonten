@extends('layouts.main')

@section('title', 'Tips')

@section('content')
    <h2>Tips Membuat Konten Digital</h2>
    <ol>
        @foreach ($tips as $tip)
            <li>{{ $tip }}</li>
        @endforeach
    </ol>
@endsection
