@extends('layouts.app')

@section('content')
<div class="row mb-2">
    <div class="col-md-12">
        <a href="{{ route('roles.index') }}" class="btn btn-primary"><- Roles list</a>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-12">
        <dl>
            <dt>ID</dt>
            <dd>{{ $role->id }}</dd>
            <dt>Name</dt>
            <dd>{{ $role->name }}</dd>
        </dl>
        @can('update', [auth()->user(), $role])
            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning">Edit</a>
        @endcan
    </div>
</div>
@endsection
