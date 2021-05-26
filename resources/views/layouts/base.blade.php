{{--
    Template dasar untuk semua page.

    Sudah menggunakan bootstrap dan jquery.

    Nanti extends dari template ini saja untuk page yang akan
    dibuat (kecuali auth, karena sudah template bawaan).
--}}


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>@yield('title')</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>    
    </head>

    <body>
        @include('components.units.navbar')

        <main>
            @yield('content')
        </main>

        @yield('scripts')
    </body>
</html>


{{--
    contoh penggunaan (berikan tanda @ sekali saja, tidak perlu dua kali):


    @extends('layouts.base')

    @section('title', 'Manajemen Pegawai')

    @section('content')
        <div>
            ...blabla...
        </div>
    @endsection
--}}
