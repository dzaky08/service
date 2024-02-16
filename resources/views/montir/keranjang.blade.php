@extends('template.html')

@section('title', 'keranjang')
@section('body')
    @include('template.sidebar')
    <div id="content">
        <div class="container mt-5">
            @if (Session::has('msg'))
                <div class="alert alert-primary">{{ Session::get('msg') }}</div>
            @endif
            {{-- {{ route('postpesan') }} --}}
            <form action="{{ route('post-pesan') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class=" col-8 mx-auto p-4 mt-5">
                    <h5 class="text-center mb-5">Booking Service</h5>
                    <div class="row">
                        <div class="col-4">
                            <label for="">Nama</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                        <div class="col-4">
                            <label for="">No HP</label>
                            <input type="text" name="no_telp" class="form-control" required>
                        </div>
                        <div class="col-4">
                            <label for="">No Kendaraan</label>
                            <input type="text" name="no_kendaraan" class="form-control" required>
                        </div>
                    </div>
                    <h5 class="mt-3 mb-3">Layanan Service servis yang di pilih :</h5>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Servis</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Jasa</th>
                                <th>Total Harga</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ asset($item->service->foto) }}" alt="" width="100"
                                            height="100">
                                    </td>
                                    <td>{{ $item->service->nama }}</td>
                                    <td>{{ number_format($item->service->harga, 0, ',', '.') }}</td>
                                    <td>{{ $item->qty }}</td>
                                    <td>{{ $item->service->harga_jasa }}</td>
                                    <td>{{ number_format($item->total_harga, 0, ',', '.') }}</td>
                                    <td>
                                        <a href="{{ route('hapus-keranjang', ['id' => $item->id]) }}"
                                            class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <hr>
                    </table>
                    <div class="row">
                        <div class="col-4" style="margin-left: 65%">
                            <h6>Total Transaksi : Rp. {{ number_format($totalsemua, 0, ',', '.') }}</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 mt-3" style="margin-left: 65%">
                            <button type="submit" class="btn text-white form-control"
                                style="background-color: #336B87">Pesan</button>

                        </div>
                    </div>


                </form>
            </div>
        </div>



        <script>
            new DataTable('#example');
        </script>
    @endsection
