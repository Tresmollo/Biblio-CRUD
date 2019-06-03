@extends('layouts.app')

@section('content')
<div class="row mb-2">
    @can('create', App\Book::class)
        <div class="col-md-12">
            <a href="{{ route('books.create') }}" class="btn btn-primary">Add a book</a>
        </div>
    @endcan
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
                    <th>In store</th>
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
                        <td>{!! ($book->inStock) ? '<span class="badge badge-success">yes</span>' : '<span class="badge badge-danger">no</span>' !!}</td>
                        <td>
                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                @can('view', [auth()->user(), App\Book::class])
                                    <a href="{{ route('books.show', $book->id) }}" class="btn btn-primary">View</a>
                                @endcan
                                @can('update', [auth()->user(), App\Book::class])
                                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Edit</a>
                                @endcan
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
