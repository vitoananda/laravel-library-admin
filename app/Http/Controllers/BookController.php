<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

use Gate; 

class BookController extends Controller
{

    public function index()
    {
        $books = Book::all();
        $categories = Category::all();
        return view('books.index', compact('books', 'categories'));
    }


    public function show($id)
    {
        $book = Book::findOrFail($id);
        $title = 'Detail Buku: ' . $book->title;
        return view('books.show', compact('book', 'title'));
    }

    public function create()
    {
        if (Gate::allows('create-book')) {
            $categories = Category::all();
            return view('books.create', compact('categories'));
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    public function store(BookRequest $request)
    {
        $user = $request->user(); 
        try {
            $bookData = $request->all();
            $bookData['user_id'] = $user->id; 

           

            $book = $user->books()->create($bookData);

            $bookFile = $request->file('book_file');
            $book->book_file = time() . '_' . $bookFile->getClientOriginalName();
            $bookFile->storeAs('public/books', $book->book_file);

            $coverImage = $request->file('cover_image');
            $book->cover_image = time() . '_' . $coverImage->getClientOriginalName();
            $coverImage->storeAs('public/covers', $book->cover_image);
            
            $book->save();
            return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan');
        } catch (\Exception $e) {
            dd('Exception caught: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function edit(Book $book)
    {
        // dd('Sebelum edit'); // Tambahkan ini
        if (Gate::allows('update-book', $book)) {
            $categories = Category::all();
            // dd('Sebelum edit');
            try{
                
            return view('books.edit', compact('book', 'categories'));
            }
            catch (\Illuminate\Database\QueryException $e) {
                dd('Query Exception caught: ' . $e->getMessage());
            }
            catch (\Illuminate\Validation\ValidationException $e) {
                dd('Validation Exception caught: ' . $e->getMessage());
            }
            //  dd('setelah edit');
        } else {
            dd('error');
            abort(403, 'Unauthorized action.');
        }
    }

    public function update(BookRequest $request, Book $book)
    {
        try {
            $book->update($request->all());
            return redirect()->route('books.index')->with('success', 'Buku berhasil diperbarui');
        } catch (\Exception $e) {
            // Jika terjadi kesalahan, tampilkan pesan kesalahan dan abort
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    
    public function destroy(Book $book)
    {
        if (Gate::allows('delete-book', $book)) {
            $book->delete();
            return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus');
        } else {
            abort(403, 'Unauthorized action.');
        }
    }
}
