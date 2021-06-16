@extends('layouts.base')

@section('title', 'Show')

@section('content')

    <div class="container mt-3">
        <h2 class="mt-3 mb-3">Detail Data Pegawai</h2>
        <div class="row">
            <div class="col-12">
                <div class="card" style="width: 20rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $refUnit->nama }}</h5>
                        <ul>
                            <li>
                                <p class="card-text">Level : {{ $refUnit->level }}</p>
                            </li>
                            <li>
                                <p class="card-text">Is Active : {{ $refUnit->is_active }}</p>
                            </li>
                            <li>
                                <p class="card-text">Created At : {{ $refUnit->created_at }}</p>
                            </li>
                            <li>
                                <p class="card-text">Updated At : {{ $refUnit->updated_at }}</p>
                            </li>
                            <li>
                                <p class="card-text">Id Unit Parent : {{ $refUnit->id_unit_parent }}</p>
                            </li>
                            <li>
                                <p class="card-text">Created By : {{ $refUnit->created_by }}</p>
                            </li>
                            <li>
                                <p class="card-text">Updated By : {{ $refUnit->updated_by }}</p>
                            </li>
                        </ul>

                        {{-- fungsi edit --}}
                        <a href="{{ $refUnit->id }}/edit" class="btn btn-primary  rounded-pill">Edit</a>

                        {{-- fungsi delete --}}
                        <form action="{{ $refUnit->id }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger rounded-pill">Hapus</button>

                        </form>

                        <a href="/refunits"><button type="submit" class="btn btn-primary rounded-pill">Kembali</button></a>

                    </div>
                </div>

            </div>

        </div>
    </div>



@endsection
