<?php

use App\Http\Controllers\BookController;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//  ---- CRUD Task - Book Managment ----
//       without using model

// Route::prefix('books')->group(function () {
// // create a new Book record
//     Route::post('create', function (Request $request) {
//         $books = DB::table('books')->insert(
//             $request->books
//         );
//     });
// // Get a list of all books
//     Route::get('read', function () {
//         $books = DB::table('books')->get();
//         return $books;
//     });
// // Get a single book by its ID
//     Route::get('read/{book}', function ($book) {
//         return  DB::table('books')->where('id', $book)->get();
//     });
// });

// ---------------------------------------------------------------------

//  ---- CRUD Task - Book Managment ----
//             with model 

// Route::prefix('books')->group(function () {
//     // create a new Book record
//     Route::post('store', function (Request $request) {
//         $book = Book::query()->create([
//             'title' => $request->title,
//             'author' => $request->author,
//             'publication_year' => $request->publication_year
//         ]);
//         return $book;
//     });
//     // Get a list of all books
//     Route::get('index', function () {
//         $book = Book::query()->get();
//         return $book;
//     });
//     // Get a single book by its ID
//     Route::get('/show/{id}', function ($id) {
//         $book = Book::query()->find($id);
//         if (!$book) {
//             return response()->json(['message' => 'Book not found'], 404);
//         }
//         return $book;
//     });
//     // Update an existing book by its ID
//     Route::put('update/{id}', function (Request $request, $id) {
//         $book = Book::query()->find($id);
//         if (!$book) {
//             return response()->json(['message' => 'Book not found'], 404);
//         }
//         $book->update([
//             'title' => $request->title ?? $book->title,
//             'author' => $request->author ?? $book->author,
//             'publication_year' => $request->publication_year ?? $book->publication_year,
//         ]);
//         return $book;
//     });
//     // Delete a book by its ID
//     Route::delete('/destroy/{id}', function ($id) {

//         $book = Book::query()->find($id);

//         if (!$book) {
//             return response()->json(['message' => 'Book not found'], 404);
//         }

//         $book->delete();
//         return response()->json(['message' => 'Deleted successfully']);
//     });
// });

//  ---- CRUD Task - Book Managment ----
//             with Controller

Route::prefix('books')->group(function () {
    Route::post('/store', [BookController::class, 'store']);
    Route::get('/index', [BookController::class, 'index']);
    Route::get('/show/{book}', [BookController::class, 'show']);
    Route::put('update/{book}', [BookController::class, 'update']);
    Route::delete('/destroy/{book}', [BookController::class, 'destroy']);
});
