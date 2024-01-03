<?php

namespace App\Policies;

use App\Models\User;

class BookPolicy
{
    public function create(User $user)
    {
        return $user->id !== 1; // Hanya izinkan user bukan admin untuk membuat buku
    }
    
    public function update(User $user, Book $book)
    {
        return $user->id === $book->user_id && $user->id !== 1; // Hanya izinkan pemilik buku (bukan admin) untuk mengedit
    }
    
    public function delete(User $user, Book $book)
    {
        return $user->id === $book->user_id && $user->id !== 1; // Hanya izinkan pemilik buku (bukan admin) untuk menghapus
    }
}
