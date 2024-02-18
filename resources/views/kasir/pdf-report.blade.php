<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report</title>
    <style>
        table {
            width: 95%;
            border-collapse: collapse;
            margin: 50px auto;
        }


        th {
            background: #00ADB5;
            color: white;
            font-weight: bold;
        }

        td,
        th {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
            font-size: 18px;
        }
    </style>
</head>
<body>
    
<div>
    <div >
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>No Kendaraan</th>
                    <th>Pemasukan</th>
                    <th>Tanggal</th>
                    {{-- <th>Tanggal</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $noKendaraan => $group)
                    @php
                        $item = $group->first(); // Get the first transaction in the group
                    @endphp
                    <tr> 
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->no_kendaraan }}</td>
                        <td>{{ $item->total_harga }}</td>
                        <td>{{ $item->created_at->format('d-m-Y') }}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="4">Total Pemasukan :</td>
                        <td >{{$pemasukan}}</td>
                    </tr>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>