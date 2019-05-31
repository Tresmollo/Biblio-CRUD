@extends('layouts.app')

@section('content')
<div class="row mb-2">
        <div class="col-md-12">
            <a href="{{ route('books.show', $book->id) }}" class="btn btn-primary"><- Books detail</a>
        </div>
    </div>
<div class="row justify-content-center">
    <div class="col-md-12">
        <form action="{{ route('books.update', $book->id) }}" method="post" novalidate>
            @csrf
            @method('PUT')

            <div class="form-group row">
                <label for="title" class="col-md-1 col-form-label text-md-right">Title*</label>

                <div class="col-md-11">
                    <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title', $book->title) }}" required>

                    @if ($errors->has('title'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="author" class="col-md-1 col-form-label text-md-right">Author*</label>

                <div class="col-md-5">
                    <input id="author" type="text" class="form-control{{ $errors->has('author') ? ' is-invalid' : '' }}" name="author" value="{{ old('author', $book->author) }}" required>

                    @if ($errors->has('author'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('author') }}</strong>
                        </span>
                    @endif
                </div>

                <label for="publisher" class="col-md-1 col-form-label text-md-right">Publisher*</label>

                <div class="col-md-5">
                    <input id="publisher" type="text" class="form-control{{ $errors->has('publisher') ? ' is-invalid' : '' }}" name="publisher" value="{{ old('publisher', $book->publisher) }}" required>

                    @if ($errors->has('publisher'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('publisher') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="synopsys" class="col-md-1 col-form-label text-md-right">Synopsys*</label>

                <div class="col-md-11">
                    <textarea name="synopsys" id="synopsys" class="form-control{{ $errors->has('synopsys') ? ' is-invalid' : '' }}" rows="10" required>{{ old('sysopsys', $book->synopsys) }}</textarea>

                    @if ($errors->has('synopsys'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('synopsys') }}</strong>
                        </span>
                    @endif
                </div>


            </div>

            <div class="form-group row">
                <label for="date_published" class="col-md-1 col-form-label text-md-right">Published*</label>

                <div class="col-md-5">
                    <input id="date_published" type="text" class="form-control{{ $errors->has('date_published') ? ' is-invalid' : '' }}" name="date_published" value="{{ old('date_published', $book->date_published) }}" required>

                    @if ($errors->has('date_published'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('date_published') }}</strong>
                        </span>
                    @endif
                </div>

                <label for="isbn13" class="col-md-1 col-form-label text-md-right">ISBN13*</label>

                <div class="col-md-5">
                    <input id="isbn13" type="text" class="form-control{{ $errors->has('isbn13') ? ' is-invalid' : '' }}" name="isbn13" value="{{ old('isbn13', $book->isbn13) }}" required>

                    @if ($errors->has('isbn13'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('isbn13') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-2 offset-md-10 text-md-right">
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
