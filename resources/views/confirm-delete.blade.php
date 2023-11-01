@extends('layout.app')

@section('content')
    <div class="container">
        <h1>Confirm Deletion</h1>
        <p>Are you sure you want to delete the following book?</p>

        <table class="table table-striped">
            <tr>
                <th>Title</th>
                <td>{{ $book->title }}</td>
            </tr>
            <tr>
                <th>Author</th>
                <td>{{ $book->author }}</td>
            </tr>
            <tr>
                <th>Price</th>
                <td>${{ $book->price }}</td>
            </tr>
            <tr>
                <th>Stock</th>
                <td>{{ $book->stock }}</td>
            </tr>
        </table>

        <form action="{{ route('books.destroy', $book->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Confirm Deletion</button>
        </form>

        <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancel</a>
    </div>
@endsection
