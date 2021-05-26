@extends('layouts.base')

@section('title', 'SKP | Manajemen Uraian Pekerjaan')

@section('content')
    <div class="container">
        <h1 class="my-4">Daftar Uraian Pekerjaan</h1>

        <div class="my-4">
            <a class="btn btn-primary" href="{{ route('uraian-pekerjaan.create') }}" role="button">+ Tambah Entry</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Uraian</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Poin</th>
                    <th scope="col">Satuan</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($daftar_uraian_pekerjaan as $uraian_pekerjaan)
                    <tr class="table-content" style="cursor: pointer"
                            {{--
                                atribut ini diperlukan agar javascript dapat melakukan
                                redirect ke page yang sesuai dengan entry ketika row
                                diclick.
                            --}}
                            data-edit-url="{{
                                route('uraian-pekerjaan.edit', [
                                    'uraian_pekerjaan' => $uraian_pekerjaan->id
                                ])
                            }}"
                            title="Klik untuk mengedit atau menghapus entry ini">
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $uraian_pekerjaan->uraian }}</td>
                        <td>{{ $uraian_pekerjaan->keterangan }}</td>
                        <td>{{ $uraian_pekerjaan->poin }}</td>
                        <td>{{ $uraian_pekerjaan->satuan }}</td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="5" class="text-center"><em>Belum ada entry</em></td>
                    </tr>

                @endforelse
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
    <script>
        /**
         * Untuk menimbulkan efek agar row dapat berubah warna ketika
         * hover, serta redirect ketika diklik.
         */
        $('.table-content').each((i, el) => {
            // Memberikan efek warna ketika hover
            $(el).hover(
                () => {
                    $(el).toggleClass('table-secondary')
                }
            )

            // Redirect ketika click row.
            //
            // Pada elemen HTML tiap row membutuhkan atribut data-edit-url
            // yang merupakan url yang menjadi tujuan redirect.
            $(el).click(() => {
                const editUrl = $(el).data('edit-url')
                window.location.href = editUrl
            })
        })
    </script>
@endsection
