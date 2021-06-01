@extends('layouts.base')

@section('title', 'SKP | Manajemen SKP Realisasi')

@section('content')
    <div class="container">
        <h1 class="my-4">Daftar SKP Realisasi</h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#ID SKP</th>
                    <th scope="col">Jumlah Realisasi</th>
                    <th scope="col">Jumlah Target</th>
                    <th scope="col">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($daftar_skp_realisasi as $skp_realisasi)
                    <tr class="table-content" style="cursor: pointer"
                            {{--
                                atribut ini diperlukan agar javascript dapat melakukan
                                redirect ke page yang sesuai dengan entry ketika row
                                diclick.
                            --}}
                            data-show-url="#"
                            title="Klik untuk melihat detail">
                        <th scope="row">{{ $skp_realisasi->skp_target->id }}</th>
                        <td>{{ $skp_realisasi->jml_realisasi }}</td>
                        <td>{{ $skp_realisasi->skp_target->jml_target }}</td>
                        <td>{{ $skp_realisasi->keterangan }}</td>
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
            // Pada elemen HTML tiap row membutuhkan atribut data-show-url
            // yang merupakan url yang menjadi tujuan redirect.
            $(el).click(() => {
                const showUrl = $(el).data('show-url')
                window.location.href = showUrl
            })
        })
    </script>
@endsection
