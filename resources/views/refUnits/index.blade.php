@extends('layouts.base')

@section('title', 'Ref Units')

@section('content')

    <div class="container mt-3">
        <h2 class="mt-3">Tabel Data Pegawai</h2>
        <div class="row">
            <div class="col-12">

                <a href="/refunits/create"><button type="submit" class="btn btn-primary rounded-pill mt-3 mb-3">Tambah
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
                            <th scope="col">Nama</th>
                            <th scope="col">Level</th>
                            <th scope="col">Is Active</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                            <th scope="col">Id Unit Parent</th>
                            <th scope="col">Created By</th>
                            <th scope="col">Updated By</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($refUnits as $refUnit)
                            <tr>
                                <th scope="row">{{ $refUnit->id }}</th>
                                <td>{{ $refUnit->nama }}</td>
                                <td>{{ $refUnit->level }}</td>
                                <td>{{ $refUnit->getStatus() }}</td>
                                <td>{{ $refUnit->created_at }}</td>
                                <td>{{ $refUnit->updated_at }}</td>
                                <td>
                                    @isset($refUnit -> parentUnit)
                                    {{ $refUnit -> parentUnit -> nama}}
                                    @else
                                    <span class="text-danger">Tidak punya parent</span>
                                    @endisset
                                </td>
                                <td>{{ $refUnit->created_by }}</td>
                                <td>{{ $refUnit->updated_by }}</td>

                                <td><a href="/refunits/{{ $refUnit->id }}" class="btn btn-primary rounded-pill">Details</a></td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>



            </div>
        </div>
    </div>

@endsection
