@extends('layouts.base')

@section('title', 'Ubah Data Pegawai')



@section('content')

    <div class="container mt-3">
        <h2 class="mt-3">Ubah Data Pegawai</h2>
        <div class="row">
            <div class="col-12">

                <form method="POST" action="/skptargets/{{$skpTarget->id}}">
                    {{-- untuk mengirim data ke router $refUnit->id --}}
                    
                    @csrf
                    @method('PATCH')
                

                    <div class="mb-3">
                        <label for="jml_target" class="form-label">Jumlah Target</label>
                        <input type="text" class="form-control @error('jml_target') is-invalid @enderror" id="jml_target"
                            placeholder="Masukkan jumlah target" name="jml_target" value="{{$skpTarget->jml_target}}">

                        @error('jml_target')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="id_pegawai" class="form-label">Id Pegawai</label>
                        <input type="text" class="form-control @error('id_pegawai') is-invalid @enderror" id="id_pegawai"
                            placeholder="Masukkan ID pegawai" name="id_pegawai" value="{{$skpTarget->id_pegawai}}">

                        @error('id_pegawai')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="id_periode" class="form-label">Id Periode</label>
                        <input type="text" class="form-control @error('id_periode') is-invalid @enderror" id="id_periode"
                            placeholder="Masukkan ID periode" name="id_periode" value="{{$skpTarget->id_periode}}">

                        @error('id_periode')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="id_uraian_pekerjaan_jabatan" class="form-label">Id Uraian Pekerjaan Jabatan</label>
                        <input type="text" class="form-control @error('id_uraian_pekerjaan_jabatan') is-invalid @enderror" id="id_uraian_pekerjaan_jabatan"
                            placeholder="Masukkan ID uraian pekerjaan jabatan" name="id_uraian_pekerjaan_jabatan" value="{{$skpTarget->id_uraian_pekerjaan_jabatan}}">

                        @error('id_uraian_pekerjaan_jabatan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="created_by" class="form-label">Created By</label>
                        <input type="text" class="form-control @error('created_by') is-invalid @enderror" id="created_by"
                            placeholder="Masukkan nama pegawai" name="created_by" value="{{$skpTarget->created_by}}">

                        @error('created_by')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="updated_by" class="form-label">Updated By</label>
                        <input type="text" class="form-control @error('updated_by') is-invalid @enderror" id="updated_by"
                            placeholder="Masukkan nama pegawai" name="created_by" value="{{$skpTarget->updated_by}}">

                        @error('updated_by')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary rounded-pill">Ubah Data</button>

                </form>

            </div>

        </div>
    </div>



@endsection
