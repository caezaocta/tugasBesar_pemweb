@extends('layouts.base')

@section('title', 'Skp Targets')

@section('content')

    <style>
        .table-fit {
            width: auto;
            table-layout: auto
        }
    </style>

    <div class="container mt-3">
        <h2 class="mt-3 mb-3">Tabel SKP Target</h2>
        <div class="row">
            <div class="col-12">

                <a href="/skptargets/create"><button type="submit" class="btn btn-primary rounded-pill mt-3 mb-3">Tambah
                        data</button></a>

                @if (session('status'))
                    <div class="alert alert-success mt-3">
                        {{ session('status') }}
                    </div>
                @endif

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Jumlah Target</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                            <th scope="col">ID Pegawai</th>
                            <th scope="col">ID Periode</th>
                            <th scope="col">Id Uraian Pekerjaan Jabatan</th>
                        </tr>
                    </thead>

                    <tbody class="table-striped">
                        @foreach ($skpTargets as $skpTarget)
                            <tr>
                                <th scope="row">{{ $skpTarget->id }}</th>
                                <td>{{ $skpTarget->jml_target }}</td>
                                <td>{{ $skpTarget->created_at }}</td>
                                <td>{{ $skpTarget->updated_at }}</td>
                                <td>{{ $skpTarget->id_pegawai }}</td>
                                <td>{{ $skpTarget->id_periode }}</td>
                                <td>{{ $skpTarget->id_uraian_pekerjaan_jabatan }}</td>

                                <td>
                                    <form action="{{ $skpTarget->id }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger rounded-pill">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>



            </div>
        </div>
    </div>

@endsection
