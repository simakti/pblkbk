@extends('layouts.admin.template')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <!-- Page Heading -->
            <h5 class="card-title mb-4">Tambah User</h5>
            <div class="container-fluid">
                <!-- Form Tambah Data -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0">Form Tambah Data</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('users.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="dosen_id">Dosen ID</label>
                                <input type="number" class="form-control" id="dosen_id" name="dosen_id" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('tampiluser.index') }}" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
