<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Book;

class BookPolicy
{
    
    public function update(User $user, Book $book)
    {
        return $user->id === $book->user_id && $user->id !== 1; // Hanya izinkan pemilik buku (bukan admin) untuk mengedit
    }
    
    public function delete(User $user, Book $book)
    {
        return $user->id === $book->user_id && $user->id !== 1; // Hanya izinkan pemilik buku (bukan admin) untuk menghapus
    }
}
