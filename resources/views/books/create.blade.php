@extends('layouts.app')

@section('content')
<div class="my-3">
    <a href="{{ route('books.index') }}">
        <i class="fas fa-arrow-left fa-xl"></i> 
    </a>
    <h1 class="mt-3">Tambah Buku</h1>

    <form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data">
        @csrf
        {{-- field judul --}}
        <div class="mb-3">
            <label for="book_title" class="form-label">Judul Buku <span style="color: red;">*</span>:</label>
            <input type="text" class="form-control" id="book_title" name="title" required>
        </div>
        {{-- dropdown kategori --}}
        <div class="mb-3">
            <label for="book_category" class="form-label">Kategori Buku <span style="color: red;">*</span>:</label>
            <select class="form-select" id="book_category" name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        {{-- field deskripsi --}}
        <div class="mb-3">
            <label for="book_description" class="form-label">Deskripsi <span style="color: red;">*</span>:</label>
            <textarea class="form-control" id="book_description" name="description" required></textarea>
        </div>
        {{-- field jumlah --}}
        <div class="mb-3">
            <label for="book_quantity" class="form-label">Jumlah <span style="color: red;">*</span>:</label>
            <input type="number" class="form-control" id="book_quantity" name="quantity" required>
        </div>
        {{-- field file --}}
        <div class="mb-3">
            <label for="book_file" class="form-label">File Buku (PDF) <span style="color: red;">*</span>:</label>
            <input type="file" name="book_file" class="form-control" accept=".pdf" required>
        </div>
        {{-- field cover --}}
        <div class="mb-3">
            <label for="book_cover" class="form-label">Cover Buku (jpeg/jpg/png) <span style="color: red;">*</span>:</label>
            <input type="file" name="cover_image" class="form-control" accept="image/jpeg, image/jpg, image/png" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Buku</button>
    </form>
</div>
   
@endsection
