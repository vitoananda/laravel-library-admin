@extends('layouts.app')

@section('content')
    <h1>Tambah Kategori</h1>

    <form method="POST" action="{{ route('categories.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Nama Kategori:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection