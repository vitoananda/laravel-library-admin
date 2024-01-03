<!-- resources/views/books/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="my-3">
    <a href="{{ route('books.index') }}">
        <i class="fas fa-arrow-left fa-xl"></i> 
    </a>
        <h3 class="mt-3 mb-3">{{ $title }}</h3>
    
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{ asset('storage/covers/' . $book->cover_image) }}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Judul : {{ $book->title }}</h5>
              <p class="card-text">{{ $book->description }}</p>
              <p class="card-text">Jumlah : {{ $book->quantity }}</p>
              <a href="{{ asset('storage/books/' . $book->book_file) }}" class="btn btn-primary">File Buku</a>
            </div>
          </div>
</div>


    
@endsection