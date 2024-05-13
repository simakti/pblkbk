@extends('layouts.backend.template')
@section('form')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <!-- Page Heading -->
            <h5 class="card-title  mb-4">Form Dosen</h5>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('dosen') }}" method="post">
                            <div class="mb-3">
                                <label class="form-label">ID</label>
                                <input type="id" class="form-control" name="id" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="nama_dosen" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama_dosen" name="nama_dosen">
                            </div>
                            <div class="mb-3">
                                <label for="nidn" class="form-label">NIDN</label>
                                <input type="text" class="form-control" id="nidn" name="nidn">
                            </div>
                            <div class="mb-3">
                                <label for="nip" class="form-label">NIP</label>
                                <input type="text" class="form-control" id="nip" name="nip">
                            </div>
                            <div class="mb-1">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            </div>
                            <div class="mb-3">
                                <input type="radio" class="form-check-input" id="jenis_kelamin" name="jenis_kelamin" value="L" checked> Laki-laki
                                <input type="radio" class="form-check-input" id="jenis_kelamin" name="jenis_kelamin" value="P"> Perempuan
                            </div>
                            <div class="mb-3">
                                <label for="jurusan" class="form-label">Jurusan</label>
                                <input type="text" class="form-control" id="jurusan" name="jurusan">
                            </div>
                            <div class="mb-3">
                                <label for="prodi" class="form-label">Prodi</label>
                                <input type="text" class="form-control" id="prodi" name="prodi">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <input type="text" class="form-control" id="status" name="status">
                            </div>
                            <div class="mb-3">
                                <input class="btn btn-primary" type="submit" name="submit" value="Submit">
                                <input class="btn btn-warning" type="reset" name="reset" value="Reset">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
