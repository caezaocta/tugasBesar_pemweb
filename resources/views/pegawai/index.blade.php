@extends('layouts.base')
@section('title', 'Manajemen Pegawai')

@section('content')
<div class="container">
    <h1>Daftar Pegawai</h1>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Kode Pegawai</th>
                <th scope="col">Alamat</th>

            </tr>
        </thead>
        <tbody>
            @foreach($pegawai as $pgw)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $pgw->nama }}</td>
                <td>{{ $pgw->kode_pegawai }}</td>
                <td>{{ $pgw->alamat }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    
    
@endsection