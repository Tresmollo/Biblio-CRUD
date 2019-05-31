@extends('layouts.app')

@section('content')
<div class="row mb-2">
        <div class="col-md-12">
            <a href="{{ route('roles.index') }}" class="btn btn-primary"><- Role list</a>
        </div>
    </div>
<div class="row justify-content-center">
    <div class="col-md-12">
        <form action="{{ route('roles.store') }}" method="post" novalidate>
            @csrf

            <div class="form-group row">
                <label for="name" class="col-md-1 col-form-label text-md-right">Name*</label>

                <div class="col-md-11">
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>

                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
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
