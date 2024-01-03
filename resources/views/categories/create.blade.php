@extends('layouts.app')

@section('content')
<div class="my-3">
        <a href="{{ route('books.index') }}">
        <i class="fas fa-arrow-left fa-xl"></i> 
        <h3>Tambah Kategori</h3>

        <form method="POST" action="{{ route('categories.store') }}">
            @csrf
            <div class="form-group mb-3">
                <div class="mb-3">
                    <label for="name">Nama Kategori<span style="color: red;">*</span>:</label>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </a>
</div>
   
@endsection