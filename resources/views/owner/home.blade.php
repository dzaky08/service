@extends('template.html')
@section('title', 'home owner')
@section('body')
    {{-- @include('template.nav') --}}
    @include('template.sidebar')
    <div id="content">
        <div class="container mt-5">
            <div class="row">
                <div class="card mx-3 col-7">
                    {!! $chart->container() !!}
                </div>
                <div class="card mx-3 col-4" style="height: 300px">
                    <div class="card-header mb-3">
                        <div class="mt-3 mb-3">
                            <h4>Total Pemasukan {{ number_format($totalpemasukan, 2, ',', '.') }}</h4>
                        </div>
                    </div>
                    <form action="{{ route('filterowner') }}" method="GET" class="form-group">
                        @csrf
                        <div class="d-flex justify-content-between gap-2">
                            <label for="From">From</label>
                            <input type="date" name="start_date" class="form-control w-75" required>
                        </div>
                        <div class="d-flex justify-content-between gap-2 mt-3">
                            <label for="To">To</label>
                            <input type="date" name="end_date" class="form-control w-75" required>
                        </div>
                        <button class="btn mt-3 text-white form-control" style="background-color: #336B87">Filter</button>
                        {{-- @if (Session::has('msg'))
                            <span class="alert alert-danger">{{ Session::get('msg') }}</span>
                        @endif --}}
                    </form>
                </div>
            </div>
            <hr>
            <div class="card col-12 mx-auto p-4 shadow">
                <div class="card-header" style="background-color: #3D4452">
                    <h5 class="text-center text-white">Transaksi</h5>

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
                                $firstTransaction = $group->first(); // Get the first transaction in the group
                            @endphp
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $firstTransaction->nama }}</td>
                                <td>{{ $firstTransaction->no_kendaraan }}</td>
                                <td>{{ $firstTransaction->total_harga }}</td>
                                <td>{{ $firstTransaction->created_at->format('Y-m-d') }}</td>
                                <td>
                                    <a href="{{ route('detail-summary', ['no_kendaraan' => $firstTransaction->no_kendaraan]) }}"
                                        class="btn text-white form-control" style="background-color: #336B87">detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <h4>Total Pemasukan : Rp.{{ number_format($totalpemasukan, '2', ',', '.') }} </h4>
            </div>
        </div>

        <script src="{{ $chart->cdn() }}"></script>
        {{ $chart->script() }}
    </div>
@endsection
