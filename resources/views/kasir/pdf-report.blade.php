@extends('template.html')
@section('title', 'report')
@section('body')
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
                @php
                    $pemasukan = 0;
                @endphp
                @foreach ($data as $noKendaraan => $group)
                    @php
                        $item = $group->first(); // Get the first transaction in the group
                        $subtotal = $item->service->harga * $item->qty +$item->service->harga_jasa;
                        $pemasukan += $subtotal;
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
@endsection