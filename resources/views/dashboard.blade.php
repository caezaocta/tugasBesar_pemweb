<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl">Selamat datang, {{ Auth::user()->name }}!</h1>

                    <div class="mt-3 p-5">
                        @php
                            $menus = [];

                            if (Auth::user()->is_admin()) {
                                $menus = [
                                    ['nama' => 'Manajemen Pegawai', 'url' => '/pegawai'],
                                    ['nama' => 'Manajemen Unit', 'url' => '/refunits'],
                                    ['nama' => 'Manajemen Jabatan', 'url' => '/ref-jabatan'],
                                    ['nama' => 'Manajemen Uraian Pekerjaan', 'url' => '/uraian-pekerjaan'],
                                    ['nama' => 'Manajemen Uraian Pekerjaan per Jabatan', 'url' => '/uraian-pekerjaan-jabatan'],
                                    ['nama' => 'Laporan Poin tiap Unit', 'url' => route('perolehan-poin-tiap-unit')],
                                    ['nama' => 'Laporan Poin Pegawai', 'url' => '/laporanPoinPegawai'],
                                ];
                            } else {
                                $menus = [
                                    ['nama' => 'Manajemen Target SKP', 'url' => '/skptargets'],
                                    ['nama' => 'Manajemen Realisasi SKP', 'url' => '/skp-realisasi'],
                                ];
                            }
                        @endphp

                        <p>Kamu ingin kemana?</p>
                        <ul class="mt-2">
                        @foreach ($menus as $menu)
                            <li class="text-blue-500 hover:text-blue-700 text-underline">
                                <a href="{{ $menu['url'] }}">{{ $menu['nama'] }}</a>
                            </li>
                        @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
