@extends('template.html')

@section('title', 'Detail Summary')

@section('body')
    @include('template.sidebar')
    <div id="content">
        <div class="container mt-5">
            <div id="print-container" class="card col-8 mx-auto shadow p-4">
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            Detail Pembayaran
                        </div>
                        <div class="card-body">
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
                                <p class="card-text">Invoice : {{ $data[0]->kode }} </p>
                            </div>
                            <hr>
                            <h5 class="card-title">Service yang dilakukan :</h5>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Jasa</th>
                                        <th>Sub Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->service->nama }}</td>
                                            <td>{{ number_format($item->service->harga, '0',',','.') }}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ number_format($item->service->harga_jasa, '0',',','.') }}</td>
                                            <td>{{ number_format($item->service->harga * $item->qty + $item->service->harga_jasa, '0', ',','.') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <hr>
                            <div class="pb-3">
                                <label for="">Total Harga : </label>
                                <label for="">{{ number_format($data[0]->total_harga, '2', ',', '.') }}</label>
                            </div>
                            <div class="pb-3">
                                <label for="">Uang Bayar : </label>
                                <label for="">{{ number_format($data[0]->uang_bayar, '2', ',', '.') }}</label>
                            </div>
                            <div class="pb-3">
                                <label for="">Kembalian : </label>
                                <label for="">{{ number_format($data[0]->uang_kembali, '2', ',', '.') }}</label>
                            </div>

                            <a href="{{ route('pdf', ['no_kendaraan' => $data[0]->no_kendaraan]) }}"
                                class="btn form-control text-white" style="background-color: #336B87">Print</a>
                        </div>
                    </div>
                    {{-- <button id="no-print" onclick="printInvoice()" class="btn btn-primary">Print</button> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
