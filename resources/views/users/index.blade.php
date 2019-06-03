@extends('layouts.app')

@section('content')
<div class="row mb-2">
    <div class="col-md-12">
        <a href="{{ route('users.create') }}" class="btn btn-primary">Add a user</a>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-12">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @foreach ($user->roles as $role)
                                {{ $role->name }}
                            @endforeach
                        </td>
                        <td>
                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                {{-- <a href="{{ route('users.show', $user->id) }}" class="btn btn-primary">View</a> --}}
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
