@extends('template.html')

@section('title', 'Detail Kasir')

@section('body')
    @include('template.sidebar')
    <div id="content">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-6 pb-2 mb-5">
                    <div class="card">
                        <div class="card-header" style="background-color: #3D4452">
                            <h5 class="text-center text-white">
                                Identitas
                            </h5>
                        </div>
                        <div class="card-body">
                            <h6 class="mb-3">Nama : {{ $data[0]->nama }} </h6>
                            <hr>
                            <h6 class="mb-3">No Hp : {{ $data[0]->no_telp }}</h6>
                            <hr>
                            <h6 class="mb-3">No Kendaraan : {{ $data[0]->no_kendaraan }} </h6>
                        </div>
                    </div>
                    <div class="card mt-2">
                        <div class="card-header" style="background-color: #3D4452">
                            <h5 class="text-center text-white">Service yang dipilih</h5>

                        </div>
                        <div class="card-body">
                            @foreach ($data as $item)
                                <p class="card-text">{{ $loop->iteration }} . {{ $item->service->nama }} :
                                    {{ number_format($item->service->harga * $item->qty + $item->service->harga_jasa, '0', ',', '.') }}
                                </p>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-header" style="background-color: #3D4452">
                            <h5 class="text-center text-white">pembayaran</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('lunas', ['no_kendaraan' => $data[0]->no_kendaraan]) }}" method="post">
                                @csrf
                                <label for="" class="pt-4">Total Harga : </label>
                                <input type="text" name="total_harga" id="total_harga"
                                    placeholder="Masukkan Uang Tunai.." class="form-control bg-gray d-flex" required
                                    readonly value="{{ $totalharga }}" required>
                                <label for="" class="pt-4">Uang Bayar : </label>
                                <input type="number" name="uang_bayar" placeholder="Masukkan Uang Tunai.."
                                    oninput="pengurangan()" class="form-control bg-gray d-flex" id="uang_bayar" required>
                                <label for="" class="pt-4">Kembalian : </label>
                                <input type="text" name="uang_kembali" class="form-control mb-3 bg-gray d-flex"
                                    id="uang_kembali" required readonly>
                                <center>
                                    <button type="submit" id="btnlunas" class="btn btn-success w-50">Bayar</button>
                                </center>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        function pengurangan() {
            var total_harga = parseFloat(document.getElementById('total_harga').value);
            var uang_bayar = parseFloat(document.getElementById('uang_bayar').value);
            var btnlunas = document.getElementById('btnlunas');

            var uang_kembali = uang_bayar - total_harga;

            if (uang_bayar < total_harga) {
                var uang_tidak = uang_kembali.textContent = 'uang tidak cukup';
                document.getElementById('uang_kembali').value = uang_tidak;
                btnlunas.disabled = true;
            } else {
                document.getElementById('uang_kembali').value = uang_kembali;
                btnlunas.disabled = false;
            }
        }
    </script>
@endsection
