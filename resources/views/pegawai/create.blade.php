@extends('layouts.base')
@section('title', 'Add Pegawai')

@section('content')
<div class="container">
    <h1>Form Add Pegawai</h1>

    <form method="post" action="/pegawai">
        @csrf
        <div class="form-group">
            <label for="InputNama">Nama Lengkap</label>
            <input type="nama" class="form-control" id="idNama" 
            aria-describedby="emailHelp" 
            placeholder="Masukkan Nama Lengkap">
        </div>

        <div class="form-group">
            <label for="InputKodePegawai">Kode Pegawai</label>
            <input type="kodepegawai" class="form-control" id="idKodePegawai" 
            placeholder="Masukkan Kode Pegawai">
        </div>

        <div class="form-group">
            <label for="InputAlamat">Alamat</label>
            <input type="alamat" class="form-control" id="idAlamat"
            placeholder="Masukkan Alamat">
        </div> 

        <div class="form-group">
            <label for="InputUnit">Unit</label>
            <select id="idUnit" class="form-control">
                <option>Development</option>
                <option>Research</option>
            </select>
        </div>


        <div class="form-group">
            <label for="InputJabatan">Jabatan</label>
            <select id="idJabatan" class="form-control">
                <option>Staff</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Add</button>
    </form>

    
</div>
@endsection