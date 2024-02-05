@extends('template.html')

@section('title', 'Detail Kasir')

@section('body')
    @include('template.nav')
    <div class="container mt-5">
        <div class="card col-10 mx-auto shadow p-4">
            <div class="row">
                <div class="col-3 pb-2">
                    <h5 class="">Nama : {{ $data[0]->nama }} </h5>
                </div>
                <div class="col-4 pb-2">
                    <h5 class="">No Hp : {{ $data[0]->no_telp }}</h5>
                </div>
                <div class="pl-3 col-4 pb-2">
                    <h5 class="">No Kendaraan : {{ $data[0]->no_kendaraan }} </h5>
                </div>
                <hr>
                <h5 class="card-title">Service yang dipilih :</h5>
                @foreach ($data as $item)
                    <p class="card-text">{{ $loop->iteration }} . {{ $item->service->nama }} : {{ $item->service->harga * $item->qty + $item->service->harga_jasa }}
                    </p>
                @endforeach
                <hr>
                <form action="{{ route('lunas', ['no_kendaraan' => $data[0]->no_kendaraan]) }}" method="post">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-4 mx-auto">
                            <label for="" class="pt-4">Total Harga : </label>
                            <input type="text" name="total_harga" id="total_harga" placeholder="Masukkan Uang Tunai.."
                                class="form-control bg-gray d-flex" required readonly
                                value="{{$totalharga}}" required>
                        </div>
                        <div class="col-4 mx-auto">
                            <label for="" class="pt-4">Uang Bayar : </label>
                            <input type="number" name="uang_bayar" placeholder="Masukkan Uang Tunai.." oninput="pengurangan()"
                                class="form-control bg-gray d-flex" id="uang_bayar" required>
                        </div>
                        <div class="col-4 mx-auto">
                            <label for="" class="pt-4">Kembalian : </label>
                            <input type="text" name="uang_kembali" class="form-control bg-gray d-flex" id="uang_kembali"
                                required readonly>
                        </div>
                    </div>
                    <center>
                        <button type="submit" id="btnlunas" class="btn btn-success w-50">Bayar</button>
                    </center>
                </form>
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
            }else{
                document.getElementById('uang_kembali').value = uang_kembali;
                btnlunas.disabled = false;
            }
        }
    </script>
@endsection
