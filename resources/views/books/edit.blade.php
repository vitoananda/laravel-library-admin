<!-- resources/views/books/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="my-3">
        <a href="{{ route('books.index') }}">
            <i class="fas fa-arrow-left fa-xl"></i>
        </a>
        <h1 class="mt-3">Edit Buku</h1>

        <form method="POST" action="{{ route('books.update', $book->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- field judul --}}
            <div class="mb-3">
                <label for="book_title" class="form-label">Judul Buku:</label>
                <input type="text" class="form-control" id="book_title" name="title"
                    value="{{ old('title', $book->title) }}" required>
            </div>

            {{-- dropdown kategori --}}
            <div class="mb-3">
                <label for="book_category" class="form-label">Kategori Buku:</label>
                <select class="form-select" id="book_category" name="category_id" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ $category->id == old('category_id', $book->category_id) ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- field deskripsi --}}
            <div class="mb-3">
                <label for="book_description" class="form-label">Deskripsi:</label>
                <textarea class="form-control" id="book_description" name="description" required>{{ old('description', $book->description) }}</textarea>
            </div>

            {{-- field jumlah --}}
            <div class="mb-3">
                <label for="book_quantity" class="form-label">Jumlah:</label>
                <input type="number" class="form-control" id="book_quantity" name="quantity"
                    value="{{ old('quantity', $book->quantity) }}" required>
            </div>

            {{-- field file --}}
            <div class="mb-3">
                <label for="book_file" class="form-label">File Buku (PDF) <span style="color: red;">*</span>:</label>
                <input type="file" name="book_file" class="form-control">
            
                @if($book->book_file)
                    <p class="mt-2">
                        <a href="{{ asset('storage/books/' . $book->book_file) }}" target="_blank">Lihat File</a>
                    </p>
                @endif
            </div>
            
            {{-- field cover --}}
            <div class="mb-3">
                <label for="cover_image" class="form-label">Cover Buku (jpeg/jpg/png) <span style="color: red;">*</span>:</label>
                <input type="file" name="cover_image" class="form-control">
            
                @if($book->cover_image)
                    <p class="mt-2">
                        <img src="{{ asset('storage/covers/' . $book->cover_image) }}" alt="Cover Buku" style="max-width: 200px;">
                    </p>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>

            @error('title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </form>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection
