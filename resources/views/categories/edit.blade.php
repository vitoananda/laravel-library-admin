@extends('layouts.app')

@section('content')
<div class="my-3">
    <a href="{{ route('books.index') }}">
        <i class="fas fa-arrow-left fa-xl"></i> 
        <h3>Edit Kategori</h3>

        <form method="POST" action="{{ route('categories.update', $category->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nama Kategori:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
</div>
   
@endsection