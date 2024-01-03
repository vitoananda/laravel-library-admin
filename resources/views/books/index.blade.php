<!-- resources/views/books/index.blade.php -->

@extends('layouts.app')

@section('content')

<div>
    <a href="{{ route('books.export') }}" class="btn btn-success">
        <i class="fas fa-file-excel"></i> Export to Excel
    </a>
</div>
    <h1 class="mt-3">Daftar Buku</h1>
    <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Tambah Buku</a>

     <div class="d-flex ml-auto mb-3">
        <!-- input text untuk search -->
        <input type="text" id="search-input" placeholder="Search buku" class="form-control mr-5">

        <!-- filter untuk kategori buku -->
        
        <select id="category-select" class="form-control">
            <option value="all">Semua kategori</option>
            @foreach($categories as $category)
                <option value="{{ strtolower($category->name) }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>



    <!-- table buku -->
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>No.</th>
                <th>Judul Buku</th>
                <th>Kategori</th>
                <th>Deskripsi</th>
                <th>Jumlah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr class="book-row">
                    <td>{{ $loop->iteration }}</td>
                    <td class="book-title">{{ $book->title }}</td>
                    <td class="book-category">{{ $book->category->name }}</td>
                    <td>{{ $book->description }}</td>
                    <td>{{ $book->quantity }}</td>
                    <td>
                    @can('update', $book)
                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-link p-0">
                        <i class="fas fa-file-pen"></i>
                    </a>
                    @endcan
                    @can('delete', $book)
                    <form id="delete-form-{{ $book->id }}" action="{{ route('books.destroy', $book->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-link  p-0" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?');">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                    @endcan
                        <!-- tombol edit -->
                        
                        
                        <!-- tombol view -->
                        <a href="{{ route('books.show', $book->id) }}" class="btn btn-link p-0">
                            <i class="fas fa-eye"></i>
                        </a>

                        <!-- tombol delete -->
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- script untuk filter dinamis -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const categorySelect = document.getElementById('category-select');
            const searchInput = document.getElementById('search-input');
            const books = document.querySelectorAll('.book-row');

            categorySelect.addEventListener('change', updateFilter);
            searchInput.addEventListener('input', updateFilter);

            function updateFilter() {
                const selectedCategory = categorySelect.value.toLowerCase();
                const searchTerm = searchInput.value.toLowerCase();

                books.forEach(function (book) {
                    const title = book.querySelector('.book-title').textContent.toLowerCase();
                    const category = book.querySelector('.book-category').textContent.toLowerCase();

                    const categoryMatches = (selectedCategory === 'all' || category.includes(selectedCategory));
                    const searchTermMatches = (title.includes(searchTerm) || category.includes(searchTerm));

                    if (categoryMatches && searchTermMatches) {
                        book.style.display = '';
                    } else {
                        book.style.display = 'none';
                    }
                });
            }
        });
    </script>
@endsection
