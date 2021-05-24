@extends('layouts.base')

@section('title', 'SKP | Manajemen Uraian Pekerjaan')

@section('content')
    <div class="container">
        <h1 class="my-4 my-lg-5">Daftar Uraian Pekerjaan</h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Uraian</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Poin</th>
                    <th scope="col">Satuan</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($daftar_uraian_pekerjaan as $uraian_pekerjaan)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $uraian_pekerjaan->uraian }}</td>
                        <td>{{ $uraian_pekerjaan->keterangan }}</td>
                        <td>{{ $uraian_pekerjaan->poin }}</td>
                        <td>{{ $uraian_pekerjaan->satuan }}</td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="5" class="text-center"><em>Belum ada entry</em></td>
                    </tr>

                @endforelse
            </tbody>
        </table>
    </div>
@endsection
