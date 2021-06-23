@extends('layouts.base')

@section('title', 'Laporan Unit')

@section('content')
    <div class="container">
        <h1 class="my-4">
            Daftar Perolehan Poin
        </h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Unit</th>
                    <th scope="col">Perolehan Poin</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($daftar_unit_poin as $unit_poin)
                    <tr class="table-content">
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $unit_poin->nama }}</td>
                        <td>{{ $unit_poin->jumlah_poin }}</td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="5" class="text-center"><em>Tidak ada entry</em></td>
                    </tr>

                @endforelse
            </tbody>
        </table>
    </div>
@endsection
