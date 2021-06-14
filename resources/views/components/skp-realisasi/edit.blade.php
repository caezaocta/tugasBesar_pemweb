@extends('layouts.base')

@section('title', 'SKP | Manajemen Uraian Pekerjaan')

@section('content')
    <div class="container">
        <div class="container d-flex my-4 align-items-center">
            <a class="d-block text-dark" href="{{ route('skp-realisasi.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                </svg>
            </a>

            {{-- Berikan sedikit ruang --}}
            <div style="width: 1rem;"></div>

            <h3 class="m-0">Mengedit data SKP Realisasi</h3>
        </div>

        <div class="mt-4 container">
            <form id="update-form" method="POST" enctype="multipart/form-data"
                    action="{{
                        route('skp-realisasi.update', [
                            'skp_realisasi' => $skp_realisasi->id])
                    }}">
                @method('PATCH')
                @csrf

                <fieldset @if ($skp_realisasi->is_done()) disabled @endif>

                {{-- ID SKP --}}
                    <div class="row">
                        <p class="col-4 col-md-3 col-lg-2">ID SKP</p>
                        <p class="col-4">{{ $skp_realisasi->skp_target->id }}</p>
                    </div>

                {{-- Status --}}
                    <div class="row">
                        <p class="col-4 col-md-3 col-lg-2">Status</p>

                        <p class="col-4">
                        @if ($skp_realisasi->is_done())
                            <span class="badge bg-success">Selesai</span>
                        @else
                            <span class="badge bg-danger">Belum selesai</span>
                        @endif
                        </p>
                    </div>

                {{-- Tanggal Mulai --}}
                    <div class="row">
                        <p class="col-4 col-md-3 col-lg-2">Tanggal mulai</p>
                        <p class="col-4">{{ $skp_realisasi->tanggal_awal }}</p>
                    </div>

                {{-- Tanggal Akhir --}}
                    <div class="row">
                        <p class="col-4 col-md-3 col-lg-2">Tanggal selesai</p>
                        @if ($skp_realisasi->tanggal_akhir)
                            <p class="col-4">{{ $skp_realisasi->tanggal_akhir }}</p>
                        @else
                            <p class="col-4 text-danger"><em>Belum selesai</em></p>
                        @endif
                    </div>

                {{-- Lokasi --}}
                    <div class="mb-3 row align-items-baseline">
                        <label for="formInputLokasi" class="form-label col-4 col-md-3 col-lg-2">
                            Lokasi
                        </label>
                        <div class="col-6 col-lg-4">
                            <input name="lokasi" id="formInputLokasi" class="form-control"
                                    value="{{ $skp_realisasi->lokasi }}" placeholder="Berikan lokasi"/>

                            @error('lokasi')
                                <small class="text-danger">{{ $errors->first('lokasi') }}</small>
                            @enderror
                        </div>
                    </div>

                {{-- Jumlah Realisasi --}}
                    <div class="mb-3 row align-items-baseline">
                        <label for="formInputJumlahRealisasi" class="form-label col-4
                                col-md-3 col-lg-2">
                            Jumlah realisasi
                        </label>
                        <div class="col-6 col-lg-4">
                            <div class="d-flex align-items-baseline">
                                <div class="col-6">
                                    <input name="jml_realisasi" type="number" class="form-control"
                                            id="formInputJumlahRealisasi"
                                            value="{{ $skp_realisasi->jml_realisasi }}"
                                            {{-- Jumlah realisasi tidak boleh berkurang --}}
                                            min="{{ $skp_realisasi->jml_realisasi }}"
                                            {{-- Jumlah realisasi tidak boleh melebihi target --}}
                                            max="{{ $skp_realisasi->skp_target->jml_target}}" />
                                </div>
                                <p class="ms-2 mb-0">/ {{ $skp_realisasi->skp_target->jml_target }}</p>
                            </div>

                            @error('jml_realisasi')
                                <small class="text-danger">{{ $errors->first('jml_realisasi') }}</small>
                            @enderror
                        </div>
                    </div>

                {{-- Keterangan --}}
                    <div class="mb-3 row align-items-baseline">
                        <label for="formInputKeterangan" class="form-label col-4 col-md-3 col-lg-2">
                            Keterangan
                        </label>
                        <div class="col-6 col-lg-4">
                            <textarea name="keterangan" class="form-control" id="formInputKeterangan"
                                    rows="2" placeholder="Berikan keterangan">{{ $skp_realisasi->keterangan }}</textarea>

                            @error('keterangan')
                                <small class="text-danger">{{ $errors->first('keterangan') }}</small>
                            @enderror
                        </div>
                    </div>

                {{-- Bukti Realisasi --}}
                    <div class="mb-4 row align-items-baseline">
                        <label for="formInputJumlahRealisasi" class="form-label col-4
                                col-md-3 col-lg-2">
                            Bukti realisasi
                        </label>
                        <div class="col-6 col-lg-4">
                            @if ($skp_realisasi->path_bukti)
                                <p>
                                    <a href="{{ route('download-bukti-skp-realisasi', [
                                                'id_skp_realisasi' => $skp_realisasi->id
                                            ])}}">
                                        Bukti sudah diupload
                                    </a>
                                </p>
                            @else
                                <p class="text-danger"><em>Belum ada bukti realisasi</em></p>
                                <input type="file" name="bukti" accept="image/*,.pdf,.docx,.doc,.zip" />

                                @error('bukti')
                                    <small class="text-danger">{{ $errors->first('bukti') }}</small>
                                @enderror
                            @endif
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary me-3" form="update-form">
                        Simpan Perubahan
                    </button>
                </fieldset>
            </form>
        </div>
    </div>
@endsection
