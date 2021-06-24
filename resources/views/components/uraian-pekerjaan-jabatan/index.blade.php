@extends('layouts.base')

@section('title', 'SKP | Manajemen Uraian Pekerjaan Jabatan')

@section('content')
    <div class="container">
        <h1 class="my-4">Daftar Uraian Pekerjaan Jabatan</h1>

    <div class="my-4">
            <a class="btn btn-primary" href="{{ route('uraian-pekerjaan-jabatan.create') }}" role="button">+ Tambah Entry</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Jabatan</th>
                    <th scope="col">Nama Pekerjaan</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                @forelse ($daftar_uraian_pekerjaan_jabatan as $uraian_pekerjaan_jabatan)
                    <tr class="table-content align-middle"> 
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $uraian_pekerjaan_jabatan->nama }}</td>
                        <td>{{ $uraian_pekerjaan_jabatan->uraian }}</td>
                        <td>
                            <form id="delete-form" method="POST" action="{{
                                route('uraian-pekerjaan-jabatan.destroy', [
                                    'uraian_pekerjaan_jabatan' => $uraian_pekerjaan_jabatan->id
                                ])
                            }}">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger" form="delete-form">
                                    Delete
                                </button>
                            </form>
                        </td>
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