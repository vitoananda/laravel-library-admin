@extends('layouts.app')

@section('content')
    <h1 class="mt-3">Daftar Kategori</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Tambah Kategori</a>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        {{-- button edit --}}
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-link p-0">
                            <i class="fas fa-file-pen"></i>
                        </a>
                        {{-- button delete --}}
                        <a href="{{ route('categories.destroy', $category->id) }}" class="btn btn-link p-0" onclick="event.preventDefault(); if(confirm('Apakah Anda yakin ingin menghapus kategori ini?')) document.getElementById('delete-form-{{ $category->id }}').submit();">
                            <i class="fas fa-trash"></i>
                        </a>
                        <form id="delete-form-{{ $category->id }}" action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection