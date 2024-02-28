@extends('template.html')
@section('title', 'Dashboard')
@section('body')
    @include('template.sidebar')
    <div id="content">
        <div class="container mt-5">
            @if (Session::has('msg'))
                <div class="alert alert-primary">{{ Session::get('msg') }}</div>
            @endif
            <div class="card p-3" style="background-color: #EEEEEE">
                <a href="{{ route('tambah') }}" class="btn btn-success w-25 mb-3">Tambah</a>
                <table class="table table-bordered table-striped" id="example" >
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Foto</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Harga Jasa</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($service as $item)
                            <tr>
                                <td>{{ $loop->iteration}}</td>
                                <td>{{ $item->nama }}</td>
                                <td>
                                    <img src="{{ asset($item->foto) }}" alt="" width="100" height="100">
                                </td>
                                <td>{{ number_format($item->harga, '0',',','.') }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>{{ number_format($item->harga_jasa, '0',',','.') }}</td>
                                <td>{{ $item->kategori->nama}}</td>
                                <td>
                                    <div class="form-group d-flex">
                                        <a href="{{ route('ubah', $item->id) }}"
                                            class="btn btn-warning m-2">Ubah</a>
                                        <form action="{{ route('hapus-admin', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger m-2"
                                                onclick="return confirm('yakin dihapus?')">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
