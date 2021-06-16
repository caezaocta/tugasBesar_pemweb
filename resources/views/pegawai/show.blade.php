@extends('layouts.base')
@section('title', 'Detail Pegawai')

@section('content')
<div class="container">
    <div class="card" style="width: 1000px;">
        <div class="card-body">
            <h5 class="card-title">{{ $pegawai->nama }}</h5>
            <br>
            <p class="card-text"><b>Kode Pegawai : </b>{{ $pegawai->kode_pegawai }}</p>
            <p class="card-text"><b>Unit : </b>{{ $pegawai->unit->nama }}</p>
            <p class="card-text"><b>Jabatan : </b>{{ $pegawai->jabatan->nama}}</p>
            <p class="card-text"><b>Alamat : </b>{{ $pegawai->alamat }}</p>
            
            <a  href="{{ $pegawai->id }}/edit" class="btn btn-primary" href="#" role="button">Edit</a>

            <form action="{{ $pegawai->id }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            
            <a href="/pegawai" class="card-link">Back</a>
        </div>
    </div>
</div>
@endsection