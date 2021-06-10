@extends('layouts.base')

@section('title', 'SKP | Manajemen SKP Realisasi')

@section('content')
    <div class="container">
        <h1 class="my-4">
            Daftar SKP Realisasi

            {{--
                Menampilkan penjelasan mengenai penambahan data SKP Realisasi
            --}}
            <button type="button" class="btn" data-bs-toggle="tooltip"
                    data-bs-placement="right"
                    title="Data SKP Realisasi otomatis ditambahkan oleh sistem
                            ketika data SKP Target baru dibuat">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-question-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                </svg>
            </button>
        </h1>

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
         * Enabling tooltip bootstrap
         */

        let tooltipTriggerList =
                [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))

        let tooltipList =
                tooltipTriggerList.map(function (tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl)
                })
    </script>

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
