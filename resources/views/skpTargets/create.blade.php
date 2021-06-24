@extends('layouts.base')

@section('title', 'Tambah Data Pegawai')

@section('content')

    <div class="container mt-3">
        <h2 class="mt-3">Tambah Data SKP Target</h2>
        <div class="row">
            <div class="col-12">

                <form method="post" action="/skptargets">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="id_periode">ID Periode</label>
                        <select class="form-select" aria-label="Default select example"
                                id="id_periode" name="id_periode">
                            @foreach ($daftarPeriode as $namaPeriode)
                                <option value="{{ $namaPeriode->id }}">{{ $namaPeriode->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="id_uraian_pekerjaan_jabatan">Uraian Pekerjaan</label>
                        <select class="form-select" aria-label="Default select example"
                                id="id_uraian_pekerjaan_jabatan" name="id_uraian_pekerjaan_jabatan">
                            @foreach ($daftarUraianPekerjaan as $namaPekerjaan)
                                <option value="{{ $namaPekerjaan->id }}">{{ $namaPekerjaan->uraian }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="mt-3 btn btn-primary rounded-pill">Tambah</button>

                </form>

            </div>

        </div>
    </div>



@endsection
