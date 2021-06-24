@extends('layouts.base')
@section('title', 'Add Pegawai')

@section('content')
<div class="container">
    <h1>Form Add Pegawai</h1>

    <form method="post" action="/pegawai">
        @csrf
        <div class="form-group col-lg-6">
            <label for="InputNama">Nama Lengkap</label>
            <input type="text=" class="form-control col-lg-6 @error('nama') is-invalid @enderror" id="idNama" name="nama" value="{{ old('nama') }}"
            placeholder="Masukkan Nama Lengkap">
            @error('nama')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group mt-2 col-lg-6">
            <label for="InputKodePegawai">Kode Pegawai</label>
            <input type="text" class="form-control @error('kode_pegawai') is-invalid @enderror" id="idKodePegawai" name="kode_pegawai" value="{{ old('kode_pegawai') }}" placeholder="Masukkan Kode Pegawai">
            @error('kode_pegawai')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group mt-2 col-lg-6">
            <label for="InputAlamat">Alamat</label>
            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="idAlamat" name="alamat" value="{{ old('alamat') }}" placeholder="Masukkan Alamat">
            @error('alamat')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group mt-2 col-lg-6">
            <label for="InputUser">User</label>
            <select id="idUser" class="form-select @error('user') is-invalid @enderror" name="user">
                <option value="">Silahkan Pilih User yang Sesuai</option>
                @foreach ($users as $usr)
                    <option value="{{$usr->id}}">{{$usr->name}}</option>
                @endforeach
            </select>
            @error('user')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group mt-2 col-lg-6">
            <label for="InputUnit">Unit</label>
            <select id="idUnit" class="form-select @error('unit') is-invalid @enderror" name="unit">
                <option value="">Silahkan Pilih Unit yang Sesuai</option>
                @foreach ($ref_unit as $ru)
                    <option value="{{$ru->id}}">{{$ru->nama}}</option>
                @endforeach
            </select>
            @error('unit')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group mt-2 col-lg-6">
            <label for="InputJabatan">Jabatan</label>
            <select id="idJabatan" class="form-select @error('jabatan') is-invalid @enderror" name="jabatan">
                <option value="" disabled selected>Silahkan Pilih Jabatan yang Sesuai</option>
                @foreach ($ref_jabatan as $rj)
                    <option value="{{$rj->id}}">{{$rj->nama}}</option>
                @endforeach
            </select>
            @error('unit')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        <button type="submit" class="mt-4 btn btn-primary">Add</button>
    </form>
</div>
@endsection