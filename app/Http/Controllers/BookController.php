<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class BookController extends Controller
{
    public function index()
    {
        // Coba ambil data dari cache
        $books = Cache::remember('books_cache', now()->addMinutes(10), function () {

            return Book::select('id', 'title', 'author', 'description')->get()->toArray();
        });
        return Inertia::render('Books/Index', ['books' => $books]);
        // return Inertia::render('Books/Index', [
        //     'books' => Book::all() // Kirimkan langsung array data
        // ]);

    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Book::create($request->all());
        Cache::forget('books_cache');

        return redirect()->back()->with('message', 'Book added successfully!');
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $book->update($request->all());
        Cache::forget('books_cache');

        return redirect()->back()->with('message', 'Book updated successfully!');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        Cache::forget('books_cache');

        return redirect()->back()->with('message', 'Book deleted successfully!');
    }
}
