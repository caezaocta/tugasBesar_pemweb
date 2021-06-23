@extends('layouts.base')

@section('title', 'SKP | Manajemen Uraian Pekerjaan')

@section('content')
    <div class="container">
        <div class="container d-flex my-4 align-items-center">
            <a class="d-block text-dark" href="{{ route('uraian-pekerjaan-jabatan.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                </svg>
            </a>

            {{-- Berikan sedikit ruang --}}
            <div style="width: 1rem;"></div>

            <h3 class="m-0">Menambahkan data uraian pekerjaan</h3>
        </div>

        <div class="mt-4 container">
            <form method="POST" action="{{ route('uraian-pekerjaan-jabatan.store') }}">
                @csrf

                <div class="mb-4">
                    <div class="mb-4">
                        <label for="formInputUraian" class="form-label">Jabatan</label>
                        <div class="input-group mb-3">
                            </div>
                            <select name="id_jabatan" class="font-control" id="inputGroupSelect01">
                            @foreach ($ref_jabatan as $jabatan)
                            <option value="{{ $jabatan->id }}">
                                {{ $jabatan->nama }}
                           </option>
                            @endforeach
                            </select>
                          </div>

                        <label for="formInputUraian" class="form-label">Pekerjaan</label>
                        <div class="input-group mb-3">
                             </div>
                             <select name="id_uraian_pekerjaan" class="font-control" id="inputGroupSelect01">
                             @foreach ($uraian_pekerjaan as $up)
                             <option value="{{ $up->id }}">
                              {{ $up->uraian }}
                          </option>
                            @endforeach
                          </select>
                        </div>
                </div>

                <div class="row">
                



            </form>
        </div>
    </div>
@endsection
