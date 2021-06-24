<nav class="navbar navbar-expand-lg navbar-light px-md-2 px-lg-3 bg-light justify-content-between">
    <div class="container-fluid">
        <a class="navbar-brand" href="/home">Sistem SKP</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Menu
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        @if (Auth::user()->is_admin())
                            <li><a class="dropdown-item" href="/pegawai">Manajemen Pegawai</a></li>
                            <li><a class="dropdown-item" href="/refunits">Manajemen Unit</a></li>
                            <li><a class="dropdown-item" href="#">Manajemen Jabatan</a></li>
                            <li><a class="dropdown-item" href="/uraian-pekerjaan">Manajemen Uraian Pekerjaan</a></li>
                            <li><a class="dropdown-item" href="/uraian-pekerjaan-jabatan">Manajemen Uraian Pekerjaan per Jabatan</a></li>
                            <li>
                                <a class="dropdown-item" href="{{ route('perolehan-poin-tiap-unit') }}">
                                    Laporan Poin tiap Unit
                                </a>
                            </li>

                        @else
                            <li><a class="dropdown-item" href="/skptargets">Manajemen Target SKP</a></li>
                            <li><a class="dropdown-item" href="/skp-realisasi">Manajemen Realisasi SKP</a></li>

                        @endif
                    </ul>
                </li>
            </ul>
        </div>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                @if (Auth::check())
                    {{-- Hidden logout form --}}
                    <form id="logout-form" method="POST" action="{{ route('logout') }}">
                        @csrf
                        {{-- biarkan kosong --}}
                    </form>

                    {{-- Versi layar kecil --}}
                    <div class="d-lg-none">
                        <a class="nav-link disabled" href="#">
                            {{ Auth::user()->name }}

                            @if (Auth::user()->is_admin())
                                <span class="badge bg-success">admin</span>
                            @endif
                        </a>
                        <a class="nav-link logout-btn" href="#">Logout</a>
                    </div>

                    {{-- Versi layar besar --}}
                    <div class="dropdown d-none d-lg-block">
                        <p class="dropdown-toggle m-0" id="user-dropdown" data-bs-toggle="dropdown"
                                aria-expanded="false" role="button">
                            {{ Auth::user()->name }}

                            @if (Auth::user()->is_admin())
                                <span class="badge bg-success">admin</span>
                            @endif
                        </p>

                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="user-dropdown">
                            <li><a class="nav-link logout-btn" href="#">Logout</a></li>
                        </ul>
                    </div>

                @else
                    <a class="nav-link" aria-current="page" href="{{ route('login') }}">
                        Login
                    </a>

                @endif
            </div>
        </div>
    </div>
</nav>