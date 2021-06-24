@extends('layouts.base')

@section('title', 'SKP | Manajemen Jabatan')

@section('content')
    <div class="container">
    <h1 class="my-4">Daftar Jabatan</h1>
    
    <div class="my-4">
            <a class="btn btn-primary" href="{{ route('ref-jabatan.create') }}" role="button">+ Tambah Entry</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($daftar_ref_jabatan as $ref_jabatan)
                    <tr class="table-content" style="cursor: pointer"
                            {{--
                                atribut ini diperlukan agar javascript dapat melakukan
                                redirect ke page yang sesuai dengan entry ketika row
                                diclick.
                            --}}
                            data-edit-url="{{
                                route('ref-jabatan.edit', [
                                    'ref_jabatan' => $ref_jabatan->id
                                ])
                            }}"
                            title="Klik untuk mengedit atau menghapus entry ini">
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $ref_jabatan->nama }}</td>
                        <td>{{ $ref_jabatan->keterangan }}</td>
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
