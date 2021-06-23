@extends('layouts.base')

@section('title', 'Laporan Unit')

@section('content')
    <div class="container">
        <h1 class="my-4">
            Daftar Perolehan Poin
        </h1>

        <div class="position-relative">
            <button id="data-filter-toggler" class="btn btn-secondary">Filter Data</button>

            <form id="data-filter" method="GET" action="{{ route('perolehan-poin-tiap-unit') }}"
                    class="d-none position-absolute card shadow col-10 col-lg-6 col-xl-5 mt-2">
                <div class="card-header d-flex justify-content-between align-items-middle pb-1">
                    <h5>Filter hasil pencarian</h5>
                    <div id="data-filter-closer" style="cursor: pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                        </svg>
                    </div>
                </div>

                <div class="card-body">
                    <div class="col-9 mb-2">
                        <label class="form-label" for="data-filter-unit">
                            Perolehan poin untuk unit:
                        </label>
                        <select id="data-filter-unit" name="unit" class="form-select">
                            @foreach ($daftar_unit as $unit)
                                <option value="{{ $unit->nama }}">{{ $unit->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-9 mb-3">
                        <label class="form-label" for="data-filter-date">Pada tanggal:</label>
                        <input id="data-filter-date" name="date" type="date"
                                class="form-control" placeholder="Tanggal">
                    </div>
                    <input type="submit" value="Filter" class="btn btn-primary">
                </div>
            </form>
        </div>

        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Unit</th>
                    <th scope="col">Perolehan Poin</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($daftar_unit_poin as $unit_poin)
                    <tr class="table-content">
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $unit_poin->nama }}</td>
                        <td>{{ $unit_poin->jumlah_poin }}</td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="5" class="text-center"><em>Tidak ada entry</em></td>
                    </tr>

                @endforelse
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
    <script>
        $('#data-filter-toggler').click(() => {
            $('#data-filter').toggleClass('d-none')
        })

        $('#data-filter-closer').click(() => {
            $('#data-filter').addClass('d-none')
        })
    </script>
@endsection