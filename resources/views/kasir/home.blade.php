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
                    <a href="{{ route('dipesan') }}" class="card" heig style="background-color: #EEEEEE; text-decoration: none;">
                        <div class="card-body">
                            <h5 class="card-title">Transaksi Dipesan</h5>
                            <p style="color: red;">
                                Transaksi dipesan : {{$countdipesan}}
                                {{-- @if ($totaldipesan > 0)
                                    Ada Pesanan!
                                @else
                                    Tidak Ada Pesanan!
                                @endif --}}

                            </p>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="{{ route('summary') }}" class="card" style="background-color: #00ADB5; text-decoration: none;">
                        <div class="card-body">
                            <h5 class="card-title">Transaksi Lunas</h5>
                            <p>Transaksi Lunas : {{$countlunas}}</p>

                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
