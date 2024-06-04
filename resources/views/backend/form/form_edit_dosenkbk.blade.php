@extends('layouts.backend.template')

@section('content')
<div class="container">
    <h1>Edit Dosen KBK</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dosenkbk.update', $dosenkbk->id_dosen_kbk) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id_dosen">Nama Dosen</label>
            <select name="id_dosen" id="id_dosen" class="form-control">
                <option selected> --Pilih Dosen-- </option>
                @foreach($data_dosen as $dosen)
                    <option value="{{ $dosen->id_dosen }}" {{ $dosenkbk->id_dosen == $dosen->id_dosen ? 'selected' : '' }}>{{ $dosen->nama_dosen }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_jenis_kbk">Jenis KBK</label>
            <select name="id_jenis_kbk" id="id_jenis_kbk" class="form-control">
                <option selected> --Pilih Dosen-- </option>
                @foreach($data_jenis_kbk as $jenis_kbk)
                    <option value="{{ $jenis_kbk->id_jenis_kbk }}" {{ $dosenkbk->id_jenis_kbk == $jenis_kbk->id_jenis_kbk ? 'selected' : '' }}>{{ $jenis_kbk->jenis_kbk }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-warning btn-sm">Update</button>
    </form>

</div>
@endsection
