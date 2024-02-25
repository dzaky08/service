@extends('template.html')

@section('title', 'keranjang')
@section('body')
    @include('template.sidebar')
    <div id="content">
        <div class="container mt-5">
            @if (Session::has('msg'))
                <div class="alert alert-primary">{{ Session::get('msg') }}</div>
            @endif
            <form action="{{ route('post-pesan') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-8">
                        <div class="card" style="background-color: #EEEEEE">
                            <div class="card-header" style="background-color: #222831">
                                <h5 class="text-center text-white">Layanan Service </h5>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered" id="example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Foto</th>
                                            <th>Servis</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                            <th>Jasa</th>
                                            <th>Subtotal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <img src="{{ asset($item->service->foto) }}" alt=""
                                                        width="100" height="100">
                                                </td>
                                                <td>{{ $item->service->nama }}</td>
                                                <td>{{ number_format($item->service->harga, 0, ',', '.') }}</td>
                                                <td>{{ $item->qty }}</td>
                                                <td>{{  number_format($item->service->harga_jasa, 0, ',', '.') }}</td>
                                                <td>{{ number_format($item->total_harga, 0, ',', '.') }}</td>
                                                <td>
                                                    <a href="{{ route('hapus-keranjang', ['id' => $item->id]) }}"
                                                        class="btn btn-danger d-flex" onclick="return confirm('Yakin')">Hapus</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <h4>Total : {{number_format($totalsemua, '0',',','.')}}</h4>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card" style="background-color: #EEEEEE">
                            <div class="card-header" style="background-color: #222831">
                                <h5 class="text-center text-white">Identitas Pelanggan</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <label for="">Nama</label>
                                    <input type="text" name="nama" class="form-control" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">No HP</label>
                                    <input type="text" name="no_telp" class="form-control" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">No Kendaraan</label>
                                    <input type="text" name="no_kendaraan" class="form-control" required>
                                </div>
                                <button type="submit" class="btn text-white form-control"
                                    style="background-color: #00ADB5">Pesan</button>
                            </div>

                        </div>
                    </div>
                </div>
        </div>
    </div>
    <script>
        new DataTable('#example');
    </script>
@endsection
