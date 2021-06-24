@extends('layouts.base')
@section('title', 'Laporan Poin Pegawai')

@section('content')
<div class="container">
    <h1>Laporan Poin Pegawai</h1>
    
    <br>
    <table class="table">
        <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Pegawai</th>
                    <th scope="col">Kode Pegawai</th>
                    <th scope="col">Poin</th>
                </tr>
        </thead>

        <tbody>
            @foreach($skprealisasi as $real)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $real->nama }}</td>
                <td>{{ $real->kode_pegawai }}</td>
                <td>{{ $real->jml_realisasi }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection