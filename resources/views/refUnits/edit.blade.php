@extends('layouts.base')

@section('title', 'Ubah Data Pegawai')



@section('content')

    <div class="container mt-3">
        <h2 class="mt-3 mb-3">Ubah Data Pegawai</gith2>
        <div class="row">
            <div class="col-12">

                <form method="POST" action="/refunits/{{$refUnit->id}}">
                    {{-- untuk mengirim data ke router $refUnit->id --}}
                    
                    @csrf
                    @method('PATCH')
                

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                            placeholder="Masukkan nama pegawai" name="nama" value="{{$refUnit->nama}}">

                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="level" class="form-label">Level</label>
                        <input type="text" class="form-control @error('level') is-invalid @enderror" id="level"
                            placeholder="Masukkan level pegawai" name="level" value="{{$refUnit->level}}">

                        @error('level')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="idunitparent" class="form-label">Id Unit Parent</label>
                        <input type="text" class="form-control @error('id_unit_parent') is-invalid @enderror "
                            id="idunitparent" placeholder="Masukkan id unit parent pegawai" name="id_unit_parent" value="{{$refUnit->id_unit_parent}}">

                        @error('id_unit_parent')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary rounded-pill">Ubah Data</button>

                </form>

            </div>

        </div>
    </div>



@endsection
