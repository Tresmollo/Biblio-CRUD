@extends('layouts.app')

@section('content')
<div class="row mb-2">
    <div class="col-md-12">
        <a href="{{ route('books.index') }}" class="btn btn-primary"><- Books list</a>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-12">
        <dl>
            <dt>Title</dt>
            <dd>{{ $book->title }}</dd>
            <dt>Author</dt>
            <dd>{{ $book->author }}</dd>
            <dt>Synopsys</dt>
            <dd>{{ $book->synopsys }}</dd>
            <dt>Publisher</dt>
            <dd>{{ $book->publisher }}</dd>
            <dt>Publishing Date</dt>
            <dd>{{ $book->date_published }}</dd>
            <dt>ISBN13</dt>
            <dd>{{ $book->isbn13 }}</dd>
        </dl>
        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Edit</a>
    </div>
</div>
@endsection
