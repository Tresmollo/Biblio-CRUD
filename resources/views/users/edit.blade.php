@extends('layouts.app')

@section('content')
<div class="row mb-2">
        <div class="col-md-12">
            <a href="{{ route('users.index') }}" class="btn btn-primary"><- Users list</a>
        </div>
    </div>
<div class="row justify-content-center">
    <div class="col-md-12">
        <form action="{{ route('users.update', $user->id) }}" method="post" novalidate>
            @csrf
            @method('PUT')

            <div class="form-group row">
                <label for="name" class="col-md-1 col-form-label text-md-right">Name*</label>

                <div class="col-md-11">
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $user->name) }}" required>

                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-1 col-form-label text-md-right">E-mail*</label>

                <div class="col-md-11">
                    <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email', $user->email) }}" required>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="role" class="col-md-1 col-form-label text-md-right">Role*</label>

                <div class="col-md-11">
                    <select name="role" id="role" class="form-control{{ $errors->has('role') ? ' is-invalid' : '' }}" required>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}"
                                @foreach ($user->roles as $user_role)
                                    @if ($role->id == old('role', $user_role->id))
                                        selected="selected"
                                    @endif
                                @endforeach
                            >{{ $role->name }}</option>
                        @endforeach
                    </select>

                    @if ($errors->has('role'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('role') }}</strong>
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
