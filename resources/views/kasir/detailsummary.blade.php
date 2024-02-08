@extends('template.html')

@section('title', 'Detail Summary')

@section('body')
    @include('template.nav')
    <div class="container mt-5">
        <div id="print-container" class="card col-6 mx-auto shadow p-4">
            <div class="row">
                <div class="mx-auto pb-2">
                    <p class="card-text">Tanggal : {{ $data[0]->created_at->format('Y-m-d') }} </p>
                </div>
                <div class="mx-auto pb-2">
                    <p class="card-text">Nama : {{ $data[0]->nama }} </p>
                </div>
                <div class="mx-auto pb-2">
                    <p class="card-text">No Hp : {{ $data[0]->no_telp }}</p>
                </div>
                <div class="pl-4 pb-2">
                    <p class="card-text">No Kendaraan : {{ $data[0]->no_kendaraan }} </p>
                </div>
                <div class="pl-4 pb-2">
                    <p class="card-text">Invoice : {{$data[0]->kode}} </p>
                </div>
                <hr>
                <h5 class="card-title">Service yang dilakukan :</h5>
                @foreach ($data as $item)
                    <p class="card-text">{{ $loop->iteration }} . {{ $item->service->nama }} : {{ $item->service->harga * $item->qty + $item->service->harga_jasa}}
                    </p>
                @endforeach
                <hr>
                <div class="pb-3">
                    <label for="" >Total Harga : </label>
                    <label for="">{{ number_format($data[0]->total_harga, '2',',','.') }}</label>
                </div>
                <div class="pb-3">
                    <label for="" >Uang Bayar : </label>
                    <label for="">{{ number_format($data[0]->uang_bayar, '2',',','.') }}</label>
                </div>
                <div class="pb-3">
                    <label for="" >Kembalian : </label>
                    <label for="">{{ number_format($data[0]->uang_kembali, '2',',','.') }}</label>
                </div>

                <button id="no-print" onclick="printInvoice()" class="btn btn-primary">Print</button>
            </div>
        </div>
    </div>
    <script>
        function printInvoice() {
            window.print();
        }
    </script>
@endsection
