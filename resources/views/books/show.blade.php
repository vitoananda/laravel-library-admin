<!-- resources/views/books/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1 class="mt-3">{{ $title }}</h1>

    <div>
        <h2>{{ $book->title }}</h2>
        <p><strong>Kategori:</strong> {{ $book->category->name }}</p>
        <p><strong>Deskripsi:</strong> {{ $book->description }}</p>
        <p><strong>Jumlah:</strong> {{ $book->quantity }}</p>
        <!-- Tambahkan informasi buku lainnya sesuai kebutuhan -->
    </div>
@endsection