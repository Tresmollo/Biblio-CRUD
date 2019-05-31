@extends('layouts.app')

@section('content')
<div class="row mb-2">
    <div class="col-md-12">
        <a href="{{ route('books.create') }}" class="btn btn-primary">Add a book</a>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-12">
        <table class="table table-striped">
            <thead class="thead-light">
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th width="320">Synopsys</th>
                    <th>Publisher</th>
                    <th width="130">Publishing Date</th>
                    <th>ISBN</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->synopsys }}</td>
                        <td>{{ $book->publisher }}</td>
                        <td>{{ $book->date_published }}</td>
                        <td>{{ $book->isbn13 }}</td>
                        <td>
                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                <a href="{{ route('books.show', $book->id) }}" class="btn btn-primary">View</a>
                                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Edit</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {{ $books->links() }}
    </div>
</div>
@endsection
