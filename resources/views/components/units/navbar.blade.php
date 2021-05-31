<nav class="navbar navbar-expand-lg navbar-light px-md-2 px-lg-3 bg-light justify-content-between">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Sistem SKP</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

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
                        <a class="nav-link disabled" href="#">{{ Auth::user()->name }}</a>
                        <a class="nav-link logout-btn" href="#">Logout</a>
                    </div>

                    {{-- Versi layar besar --}}
                    <div class="dropdown d-none d-lg-block">
                        <p class="dropdown-toggle m-0" id="user-dropdown" data-bs-toggle="dropdown"
                                aria-expanded="false" role="button">
                            {{ Auth::user()->name }}
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
