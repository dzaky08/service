<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <style>
        body {
                background-repeat: no-repeat;
                background-size: cover;
                font-size: 14px;
                /* background-image: url('{{ asset('img/bgdark.jpg') }}'); */
                background-color: #7D8792;
        }
    </style>
</head>

<body>
    @yield('body')

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/js/jquery-3.7.0.js') }}"></script>
    <script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.5.1.slim.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>

    <script>
        // JavaScript untuk menutup sidebar saat tautan di dalamnya diklik
        document.querySelectorAll('.sidebar a').forEach(link => {
            link.addEventListener('click', function() {
                document.querySelector('.sidebar').classList.remove('active');
            });
        });
    </script>

    <script>
        new DataTable('#example');
    </script>

</body>

</html>
