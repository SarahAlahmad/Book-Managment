<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function store(Request $request)
    {
        $book = Book::query()->create([
            'title' => $request->title,
            'author' => $request->author,
            'publication_year' => $request->publication_year
        ]);
        return $book;
    }

    public function index()
    {
        $book = Book::query()->get();
        return $book;
    }

    public function show(Book $book)
    {
        return $book;
    }

    public function update(Book $book, Request $request)
    {
        $book->update([
            'title' => $request->title ?? $book->title,
            'author' => $request->author ?? $book->author,
            'publication_year' => $request->publication_year ?? $book->publication_year,
        ]);
        return $book;
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
