<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
class BookController extends Controller
{
 
  public function index()
{
    $books = Book::all();
    return view('index', compact('books'));
}
public function create()
{
    
    return view('create');
}

public function store(Request $request)
{
   
    $validatedData = $request->validate([
        'title' => 'required',
        'author' => 'required',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
    ]);

    $book = new Book($validatedData);
    $book->save();

    return redirect('/books')->with('success', 'Book created successfully');
}

public function edit($id)
{
 
    $book = Book::find($id);
    return view('edit', compact('book'));
}

public function update(Request $request, $id)
{
   
    $validatedData = $request->validate([
        'title' => 'required',
        'author' => 'required',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
    ]);

    $book = Book::find($id);
    $book->update($validatedData);

    return redirect('/books')->with('success', 'Book updated successfully');
}

public function delete($id)
{

    $book = Book::find($id);
    $book->delete();

    return redirect('/books')->with('success', 'Book deleted successfully');
}

public function issue($id)
{
    
    $book = Book::find($id);

    if ($book->stock > 0) {
        $book->stock--;
        $book->save();
        
        return redirect('/books')->with('success', 'Book issued successfully');
    } else {
        return redirect('/books')->with('error', 'Book is out of stock');
    }
}

public function return($id)
{
    
    $book = Book::find($id);
    $book->stock++;
    $book->save();
   
    return redirect('/books')->with('success', 'Book returned successfully');
}
}



