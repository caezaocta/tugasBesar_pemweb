@extends('layouts.base')

@section('title', 'SKP | Manajemen Uraian Pekerjaan')

@section('content')
    <div class="container">
        <div class="container d-flex my-4 align-items-center">
            <a class="d-block text-dark" href="{{ route('uraian-pekerjaan.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                </svg>
            </a>

            {{-- Berikan sedikit ruang --}}
            <div style="width: 1rem;"></div>

            <h3 class="m-0">Menambahkan data uraian pekerjaan</h3>
        </div>

        <div class="mt-4 container">
            <form method="POST" action="{{ route('uraian-pekerjaan.store') }}">
                <div class="mb-4">
                    <label for="formInputUraian" class="form-label">Uraian Pekerjaan</label>
                    <textarea class="form-control col-lg-6" id="formInputUraian" rows="2"></textarea>
                </div>

                <div class="mb-4">
                    <label for="formInputKeterangan" class="form-label">Keterangan</label>
                    <textarea class="form-control" id="formInputKeterangan" rows="2"></textarea>
                </div>

                <div class="row">
                    <div class="col col-lg-3">
                        <label for="formInputPoin" class="form-label">Poin</label>
                        <input type="number" class="form-control" id="formInputPoin">
                    </div>

                    <div class="col col-lg-3">
                        <label for="formInputSatuan" class="form-label">Satuan</label>
                        <input class="form-control" id="formInputSatuan">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-5">Simpan</button>
            </form>
        </div>
    </div>
@endsection
