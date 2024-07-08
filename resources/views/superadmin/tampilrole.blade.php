@extends('layouts.admin.template')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title mb-4">Data Role</h5>
            <div class="container-fluid">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" width="100%" cellspacing="0" id="example">
                                <thead>
                                    <tr class="table-dark">
                                        <th>NO</th>
                                        <th>Nama Pengguna</th>
                                        <th>Role</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $index => $user)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>
                                            @foreach($user->roles as $role)
                                                {{ $role->name }}@if(!$loop->last), @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            <form action="{{ route('role.edit', $user->id) }}" method="GET" style="display:inline;">
                                                <button type="submit" class="btn btn-warning btn-sm">Edit</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
