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
            @foreach($periode as $prd)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $prd->nama }}</td>
                <td>{{ $prd->kode_pegawai }}</td>
                <td>{{ $prd->skp_realisasi->jml_realisasi }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection