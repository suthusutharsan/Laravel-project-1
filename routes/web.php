<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

// Display a list of all books
Route::get('/books', [BookController::class, 'index'])->name('books.index');


// Show the book creation form
Route::get('/books/create', [BookController::class, 'create'])->name('books.create');

// Store a new book in the database
Route::post('/books', [BookController::class, 'store'])->name('books.store');

// Show the book edit form
Route::get('books/{id}/edit', [BookController::class, 'edit'])->name('books.edit');

// Update the book details in the database
Route::put('/books/{id}', [BookController::class, 'update'])->name('books.update');

// Delete a book
Route::delete('/books/{id}', [BookController::class, 'delete'])->name('books.delete');




// Record the issuance of a book
Route::post('/books/{id}/issue', [BookController::class, 'issue'])->name('books.issue');

// Record the return of a book
Route::post('/books/{id}/return', [BookController::class, 'return'])->name('books.return');
 
// direct "/" to "/books"
Route::get('/', function () {
    return redirect('/books');
});