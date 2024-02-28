<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pdf</title>

    <style>
        #container{
            width: 350px;
            border: 1px solid #ddd;
            padding: 50px;
        }
        .text-right{
            text-align: right;
        }
    </style>
</head>

<body>
    <div>
        <div id="container">
            <div>
                <div class="">
                    <center>
                        <h2>SERVICE PRO 1998</h2>
                        <div class="">
                            @ SERVICE PRO 1998 <br>
                            jln. DILAN no.04,
                            SUKABUMI, JAWA BARAT 34141
                        </div>
                        <div>
                            <p>Kode Transaksi : {{ $data[0]->kode }} </p>
                        </div>
                    </center>
                </div>
                <hr>
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
                <hr>
                <h5>Service yang dilakukan :</h5>
                @foreach ($data as $item)
                    <p>{{ $loop->iteration }} . {{ $item->service->nama }} :
                        {{ number_format($item->service->harga * $item->qty + $item->service->harga_jasa, '2',',','.') }}
                    </p>
                @endforeach
                <hr>
                <div class="text-right">
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
                <center>
                    <h4>TERIMAKASIH</h4>
                </center>
            </div>
        </div>
    </div>
</body>

</html>
