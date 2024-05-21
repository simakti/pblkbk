@extends('layouts.backend.template')

@section('content')
<div class="container">
    <h1>Edit Pengurus KBK</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('penguruskbk.update', $penguruskbk->id_penguruskbk) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id_dosen">Nama Dosen</label>
            <select name="id_dosen" id="id_dosen" class="form-control">
                @foreach($data_dosen as $dosen)
                    <option value="{{ $dosen->id_dosen }}" {{ $penguruskbk->id_dosen == $dosen->id_dosen ? 'selected' : '' }}>{{ $dosen->nama_dosen }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_jenis_kbk">Jenis KBK</label>
            <select name="id_jenis_kbk" id="id_jenis_kbk" class="form-control">
                @foreach($data_jenis_kbk as $jenis_kbk)
                    <option value="{{ $jenis_kbk->id_jenis_kbk }}" {{ $penguruskbk->id_jenis_kbk == $jenis_kbk->id_jenis_kbk ? 'selected' : '' }}>{{ $jenis_kbk->jenis_kbk }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_jabatan_kbk">Jabatan KBK</label>
            <select name="id_jabatan_kbk" id="id_jabatan_kbk" class="form-control">
                @foreach($data_jabatan_kbk as $jabatan_kbk)
                    <option value="{{ $jabatan_kbk->id_jabatan_kbk }}" {{ $penguruskbk->id_jabatan_kbk == $jabatan_kbk->id_jabatan_kbk ? 'selected' : '' }}>{{ $jabatan_kbk->jabatan }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="1" {{ $penguruskbk->status == 1 ? 'selected' : '' }}>Aktif</option>
                <option value="0" {{ $penguruskbk->status == 0 ? 'selected' : '' }}>Tidak Aktif</option>
            </select>
        </div>
        <button type="submit" class="btn btn-warning btn-sm">Update</button>
    </form>

</div>
@endsection
