@extends('layouts.base')
@section('title', 'Edit Pegawai')

@section('content')
<div class="container">
    <h1>Form Edit Pegawai</h1>

    <form method="post" action="/pegawai/{{ $pegawai->id }}">
        @method('patch')
        @csrf
        <div class="form-group">
            <label for="InputNama">Nama Lengkap</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="idNama" name="nama" value="{{ $pegawai->nama }}"
            placeholder="Masukkan Nama Lengkap">
            @error('nama')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="InputKodePegawai">Kode Pegawai</label>
            <input type="text" class="form-control @error('kode_pegawai') is-invalid @enderror" id="idKodePegawai" name="kode_pegawai" value="{{ $pegawai->kode_pegawai }}" placeholder="Masukkan Kode Pegawai">
            @error('kode_pegawai')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="InputAlamat">Alamat</label>
            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="idAlamat" name="alamat" value="{{ $pegawai->alamat }}" placeholder="Masukkan Alamat">
            @error('alamat')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="InputUser">User</label>
            <select id="idUser" class="form-control" name="user">
                @foreach ($users as $usr)
                <option value="{{$usr->id}}" @if($pegawai->id_user == $usr->id) selected @endif>{{$usr->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="InputUnit">Unit</label>
            <select id="idUnit" class="form-control" name="unit">
                @foreach ($ref_unit as $ru)
                <option value="{{$ru->id}}" @if($pegawai->id_unit == $ru->id) selected @endif>{{$ru->nama}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="InputJabatan">Jabatan</label>
            <select id="idJabatan" class="form-control" name="jabatan">
                @foreach ($ref_jabatan as $rj)
                <option value="{{$rj->id}}" @if($pegawai->id_unit == $rj->id) selected @endif>{{$rj->nama}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Edit</button>
    </form>

    
</div>
@endsection