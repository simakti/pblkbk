@extends('layouts.admin.template')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h1>Tambah Pengurus KBK</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('penguruskbk.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_dosen" class="form-label">Nama Dosen</label>
            <select name="id_dosen" id="id_dosen" class="form-control">
                @foreach($data_dosen as $dosen)
                    <option value="{{ $dosen->id_dosen }}">{{ $dosen->nama_dosen }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_jenis_kbk" class="form-label">Jenis KBK</label>
            <select name="id_jenis_kbk" id="id_jenis_kbk" class="form-control">
                @foreach($data_jenis_kbk as $jenis_kbk)
                    <option value="{{ $jenis_kbk->id_jenis_kbk }}">{{ $jenis_kbk->jenis_kbk }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_jabatan_kbk" class="form-label">Jabatan KBK</label>
            <select name="id_jabatan_kbk" id="id_jabatan_kbk" class="form-control">
                @foreach($data_jabatan_kbk as $jabatan_kbk)
                    <option value="{{ $jabatan_kbk->id_jabatan_kbk }}">{{ $jabatan_kbk->jabatan }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="1">Aktif</option>
                <option value="0">Tidak Aktif</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
