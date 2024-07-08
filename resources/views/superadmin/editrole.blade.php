@extends('layouts.admin.template')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title mb-4">Edit User Role</h5>
            <form action="{{ route('role.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Name:</label>
                    <select class="form-control" id="name" name="user_id">
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @foreach($users as $otherUser)
                            <option value="{{ $otherUser->id }}">{{ $otherUser->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="roles">Roles:</label><br>
                    @foreach($roles as $role)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="roles[]" id="role{{ $role->id }}" value="{{ $role->id }}" {{ $user->roles->contains('id', $role->id) ? 'checked' : '' }}>
                            <label class="form-check-label" for="role{{ $role->id }}">{{ $role->name }}</label>
                        </div>
                    @endforeach
                </div>

                <button type="submit" class="btn btn-primary">Update Roles</button>
            </form>
        </div>
    </div>
</div>
@endsection
