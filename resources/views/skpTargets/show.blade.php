@extends('layouts.base')

@section('title', 'Show')

@section('content')

    <div class="container mt-3">
        <h2 class="mt-3">Detail Data Pegawai</h2>
        <div class="row">
            <div class="col-12">
                <div class="card" style="width: 20rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $skpTarget->nama }}</h5>
                        <ul>
                            <li>
                                <p class="card-text">Jumlah Target {{ $skpTarget->jml_target }}</p>
                            </li>
                            <li>
                                <p class="card-text">Id Pegawai {{ $skpTarget->id_pegawai }}</p>
                            </li>
                            <li>
                                <p class="card-text">ID Periode {{ $skpTarget->id_periode }}</p>
                            </li>
                            <li>
                                <p class="card-text">ID Uraian Pekerjaan Jabatan{{ $skpTarget->id_uraian_pekerjaan_jabatan  }}</p>
                            </li>
                            <li>
                                <p class="card-text">Created By {{ $skpTarget->created_by }}</p>
                            </li>
                            <li>
                                <p class="card-text">Updated By {{ $skpTarget->updated_by }}</p>
                            </li>
                        </ul>

                        {{-- fungsi edit --}}
                        <a href="{{ $skpTarget->id }}/edit" class="btn btn-primary  rounded-pill">Edit</a>

                        {{-- fungsi delete --}}
                        <form action="{{ $skpTarget->id }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger rounded-pill">Hapus</button>

                        </form>

                        <a href="/skptargets"><button type="submit" class="btn btn-primary rounded-pill">Kembali</button></a>

                    </div>
                </div>

            </div>

        </div>
    </div>



@endsection
