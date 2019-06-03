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
        @can('update', [auth()->user(), App\Book::class])
            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Edit</a>
        @endcan
    </div>
</div>

@can('update', [auth()->user(), App\Book::class])
    @if ($book->inStock)
    <hr>
    <div class="row justify-content-center"></div>
        <div class="col-md-6">
            <form action="{{ route('books.borrow', $book->id) }}" method="post">
                @csrf
                @method('PUT')
                <fieldset>
                    <legend>Borrow this book</legend>
                    <div class="input-group">
                        <select name="user" id="user" class="custom-select{{ $errors->has('user') ? ' is-invalid' : '' }}" required>
                            <option value="" disabled {{ (!old('user')) ? 'selected' : ''}}>Choose a user...</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}"
                                    @if ($user->id == old('user'))
                                        selected
                                    @endif>{{ $user->name }}</option>
                            @endforeach
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Borrow</button>
                        </div>

                        @if ($errors->has('user'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('user') }}</strong>
                            </span>
                        @endif
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
    @endif
@endif
@if (!$book->users->isEmpty())
<div class="row justify-content-center">
    <div class="col-md-6">
        <table class="table">
            <thead>
                <tr>
                    <th>Borrowed by</th>
                    <th>Date out</th>
                    <th>Date in</th>
                    @can('update', [auth()->user(), App\Book::class])
                        <th>Action</th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                @foreach ($book->users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->borrow->date_out }}</td>
                        <td>{{ $user->borrow->date_in }}</td>
                        @can('update', [auth()->user(), App\Book::class])
                            <td>
                                @if ($user->borrow->date_in == null)
                                    <form action="{{ route('books.return', [$book->id, $user->id]) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-primary" type="submit">Return</button>
                                    </form>
                                @endif
                            </td>
                        @endcan
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
@endsection
