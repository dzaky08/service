<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pdf</title>
</head>

<body>
    <div>
        <div id="print-container">
            <div>
                <div>
                    <p>Tanggal : {{ $data[0]->created_at->format('d-m-Y') }} </p>
                </div>
                <div>
                    <p>Nama : {{ $data[0]->nama }} </p>
                </div>
                <div>
                    <p>No Hp : {{ $data[0]->no_telp }}</p>
                </div>
                <div>
                    <p>No Kendaraan : {{ $data[0]->no_kendaraan }} </p>
                </div>
                <div>
                    <p>Invoice : {{ $data[0]->kode }} </p>
                </div>
                <hr>
                <h5>Service yang dilakukan :</h5>
                @foreach ($data as $item)
                    <p>{{ $loop->iteration }} . {{ $item->service->nama }} :
                        {{ $item->service->harga * $item->qty + $item->service->harga_jasa }}
                    </p>
                @endforeach
                <hr>
                <div>
                    <p for="">Total Harga : {{ number_format($data[0]->total_harga, '2', ',', '.') }}</p>
                </div>
                <div class="">
                    <p for="">Uang Bayar : {{ number_format($data[0]->uang_bayar, '2', ',', '.') }}</p>
                </div>
                <div>
                    <p for="">Kembalian : {{ number_format($data[0]->uang_kembali, '2', ',', '.') }}</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
