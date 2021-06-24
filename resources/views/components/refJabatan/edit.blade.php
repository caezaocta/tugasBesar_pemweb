@extends('layouts.base')

@section('title', 'SKP | Ubah Data Pegawai')

@section('content')
    <div class="container">
        <div class="container d-flex my-4 align-items-center">
            <a class="d-block text-dark" href="{{ route('ref-jabatan.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                </svg>
            </a>

            {{-- Berikan sedikit ruang --}}
            <div style="width: 1rem;"></div>

            <h3 class="m-0">Mengedit data jabatan</h3>
        </div>

        <div class="mt-4 container">
            <form id="update-form" method="POST" action="{{
                        route('ref-jabatan.update', [
                            'ref_jabatan' => $ref_jabatan->id
                        ])
                    }}">
                @method('PATCH')
                @csrf

                <div class="mb-4">
                    <label for="formInputNama" class="form-label">Nama</label>
                    <textarea name="nama" class="form-control col-lg-6" id="formInputNama"
                            rows="1">{{ $ref_jabatan->nama }}</textarea>

                    @if ($errors->has('nama'))
                        <small class="text-danger">{{ $errors->first('nama') }}</small>
                    @endif
                </div>

                <div class="mb-4">
                    <label for="formInputKeterangan" class="form-label">Keterangan</label>
                    <textarea name="keterangan" class="form-control" id="formInputKeterangan"
                            rows="1">{{ $ref_jabatan->keterangan }}</textarea>

                    @if ($errors->has('keterangan'))
                        <small class="text-danger">{{ $errors->first('keterangan') }}</small>
                    @endif
                </div>

                {{--
                    Tombol simpan diletakkan diluar form ini agar posisinya
                    dapat sejajar dengan tombol hapus
                --}}
            </form>

            <form id="delete-form" method="POST" action="{{
                        route('ref-jabatan.destroy', [
                            'ref_jabatan' => $ref_jabatan->id
                        ])
                    }}">
                @method('DELETE')
                @csrf

                {{--
                    Tombol hapus diletakkan diluar form ini agar posisinya
                    dapat sejajar dengan tombol simpan
                --}}
            </form>

            <div class="mt-5">
                {{--
                    Tombol simpan dan tombol hapus kedua form di atas
                --}}

                <button type="submit" class="btn btn-primary me-3" form="update-form">
                    Simpan Perubahan
                </button>

                <button type="submit" class="btn btn-danger" form="delete-form">
                    Hapus Data
                </button>
            </div>
        </div>
    </div>
@endsection
