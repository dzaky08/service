<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
    <style>
        /* Default styles for the document */
        body {
            font-size: 14px;
            /* background-color: #535659; */
        }

        /* Styles specific for printing */
        @media print {
            /* Hide elements you don't want to print */
            #no-print {
                display: none;
            }

            /* Additional print styles for specific containers or elements */
            #print-container {
                /* Define styles for the container you want to print */
            }
        }
    </style>
</head>

<body>
    @yield('body')

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/js/jquery-3.7.0.js') }}"></script>
    <script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/js/dataTables.bootstrap5.min.js') }}"></script>

    <script>
        new DataTable('#example');
    </script>

</body>
</html>