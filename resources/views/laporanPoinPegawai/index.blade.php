@extends('layouts.base')
@section('title', 'Laporan Poin Pegawai')

@section('content')
<div class="container">
    <h1>Laporan Poin Pegawai</h1>
    <br>
    <h3>Periode</h3>
    <br>
    <table class="table">
        <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Periode</th>
                    <th scope="col">Tanggal Awal</th>
                    <th scope="col">Tanggl Akhir</th>
                    <th scope="col">Laporan</th>
                </tr>
        </thead>

        <tbody>
            @foreach($periode as $prd)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $prd->nama }}</td>
                <td>{{ $prd->tanggal_awal }}</td>
                <td>{{ $prd->tanggal_akhir }}</td>
                <td><a class="btn btn-primary" href="laporanPoinPegawai/{{ $prd->id }}" role="button">Lihat Laporan</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection