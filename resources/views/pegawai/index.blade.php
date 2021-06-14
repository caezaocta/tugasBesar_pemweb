@extends('layouts.base')
@section('title', 'Manajemen Pegawai')

@section('content')
<div class="container">
    <h1>Daftar Pegawai</h1>

    <a class="btn btn-success" href="pegawai/create" role="button">Add Data</a>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Kode Pegawai</th>
                <th scope="col">Alamat</th>
                <th scope="col">Unit</th>
                <th scope="col">Jabatan</th>
                <th scope="col">Edit</th>

            </tr>
        </thead>
        <tbody>
            @foreach($pegawai as $pgw)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $pgw->nama }}</td>
                <td>{{ $pgw->kode_pegawai }}</td>
                <td>{{ $pgw->alamat }}</td>
                <td>{{ $pgw->unit->nama }}</td>
                <td>{{ $pgw->jabatan->nama }}</td>
                <td><a class="btn btn-success" href="pegawai/{{ $pgw->id }}" role="button">Detail</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    
    
@endsection