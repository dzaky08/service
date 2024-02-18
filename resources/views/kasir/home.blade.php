@extends('template.html')

@section('title', 'Home Kasir')

@section('body')
    @include('template.sidebar')
    <div id="content">
        <div class="container mt-5">
            @if (Session::has('msg'))
                <div class="alert alert-primary">{{ Session::get('msg') }}</div>
            @endif
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <a href="{{ route('dipesan') }}" class="card text-white bg-warning" style="text-decoration: none;">
                        <div class="card-body">
                            <h5 class="card-title">Transaksi Dipesan</h5>
                            @if ($jmlhdipesan->isEmpty())
                            <p>Jumlah Transaksi Dipesan: 0</p>
                        @else
                            @foreach ($jmlhdipesan as $transaksi)
                                <p>Jumlah Transaksi Dipesan: {{ $transaksi->jumlah }}</p>
                            @endforeach
                        @endif
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="{{ route('summary') }}" class="card text-white bg-success" style="text-decoration: none;">
                        <div class="card-body">
                            <h5 class="card-title">Transaksi lunas</h5>
                            @if ($jmlhlunas->isEmpty())
                                <p>Jumlah Transaksi Lunas: 0</p>
                            @else
                                @foreach ($jmlhlunas as $transaksi)
                                    <p>Jumlah Transaksi Lunas: {{ $transaksi->jumlah }}</p>
                                @endforeach
                            @endif
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
