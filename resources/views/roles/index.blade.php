@extends('layouts.app')

@section('content')
<div class="row mb-2">
    <div class="col-md-12">
        <a href="{{ route('roles.create') }}" class="btn btn-primary">Add a role</a>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-12">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th width="100">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                <a href="{{ route('roles.show', $role->id) }}" class="btn btn-primary">View</a>
                                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning">Edit</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
