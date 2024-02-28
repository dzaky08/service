@extends('template.html')

@section('title', 'History Transaksi')

@section('body')
    @include('template.sidebar')
    <div id="content">
        <div class="container mt-5">
            @if (Session::has('msg'))
                <div class="alert alert-primary">{{ Session::get('msg') }}</div>
            @endif
            <div class="card col-12 mx-auto p-4 shadow">
                <div class="card-header" style="background-color: #3D4452">
                    <h5 class="text-center text-white">History Transaksi</h5>

                </div>
                <div class="row justify-content-center p-3">
                    <div class="card mx-3 p-3 col-4">
                        <h5 class="text-center">Filter</h5>
                        <form action="{{ route('transaksi.filter') }}" method="GET">
                            @csrf
                            <input type="date" class="form-control mb-3" name="start_date">
                            <input type="date" class="form-control mb-3" name="end_date">
                            <button class="btn btn-success w-100" type="submit">Filter</button>
                        </form>
                    </div>

                    <div class="card p-3 mx-3 col-4">
                        <h5 class="text-center">Filter</h5>
                        <form action="{{ route('pdf-sum') }}" method="GET">
                            @csrf
                            <input type="date" class="form-control mb-3" name="start_date">
                            <input type="date" class="form-control mb-3" name="end_date">
                            <button class="btn btn-primary w-100" type="submit">Print</button>
                        </form>
                    </div>
                </div>
                <table id="example" class="table table-secondary table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>No Kendaraan</th>
                            <th>Pemasukan</th>
                            <th>Tanggal</th>
                            {{-- <th>Tanggal</th> --}}
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($groupBy as $noKendaraan => $group)
                            @php
                                $first = $group->first(); // Get the first  in the group
                                $count = $first->count();    
                            @endphp
                            <tr> 
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $first->nama }}</td>
                                <td>{{ $first->no_kendaraan }}</td>
                                <td>{{ number_format($first->total_harga, '0',',','.') }}</td>
                                <td>{{ $first->created_at->format('d-m-Y') }}</td>
                                <td>
                                    <a href="{{ route('detail-summary', ['no_kendaraan' => $first->no_kendaraan]) }}"
                                        class="btn text-white form-control" style="background-color: #336B87">detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <h4>Total Pemasukan : Rp.{{ number_format($pemasukan , '2', ',', '.') }} </h4>
            </div>
        </div>
    </div>
@endsection
