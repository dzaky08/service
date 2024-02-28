@extends('template.html')

@section('title', 'Detail Service')

@section('body')
    @include('template.sidebar')
    <div id="content">
        <div class="container mt-5">
            @if (Session::has('msg'))
                <div class="alert alert-primary">{{ Session::get('msg') }}</div>
            @endif
            <div class="card-header" style="background-color: #222831">
                <h2 class="text-center text-white">{{ strtoupper($data[0]->kategori->nama) }}</h2>
            </div>
            <div class="row p-3">
                @foreach ($data as $item)
                    <div class="card mx-3 mb-3 col-8">
                        <div class="row">
                            <div class="card-body borderxampp col-2">
                                <img src="{{ asset($item->foto) }}" alt="{{ $item->nama }}" class="card-img-top"
                                    height="180px">
                            </div>
                            <div class="card-body border col-4">
                                <h6 class="card-title text-center">{{ $item->nama }}</h6>
                                <hr>
                                <h6 class="card-title">Harga: Rp.{{ number_format($item->harga, '0', ',', '.') }}</h6>
                                <h6 class="card-title">Stok: {{ $item->qty }}</h6>
                                <h6 class="card-title">Jasa: Rp.{{ number_format($item->harga_jasa, '0', ',', '.') }}
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="card col-3 mb-3">
                        <div class="card-header text-center">
                            <h4>Pemesanan</h4>
                        </div>
                        <form action="{{ route('pilih', $item->id) }}" method="post">
                            @csrf
                            <div class="form-group mb-2 mt-3">
                                <label for="">Jumlah :</label>
                                <input type="number" class="form-control" style="border: 1px solid #000000;" name="qty" id="" required
                                    min="1">
                            </div>
                            <button class="btn text-white w-100" style="background-color: #00ADB5">Pilih</button>
                        </form>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
@endsection
