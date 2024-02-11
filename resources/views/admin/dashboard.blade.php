@extends('template.html')
@section('title', 'Dashboard')
@section('body')
    @include('template.nav')
    <div class="container mt-5">
        @if (Session::has('msg'))
            <div class="alert alert-primary">{{ Session::get('msg') }}</div>
        @endif
        <a href="{{ route('tambah') }}" class="btn btn-success mb-3 text-light">Tambah</a>
        <table class="table table-bordered table-striped" id="example">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Foto</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Harga Jasa</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($service as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>
                            <img src="{{ asset($item->foto) }}" alt="" width="100" height="100">
                        </td>
                        <td>{{ $item->harga }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>{{ $item->harga_jasa }}</td>
                        <td>
                            <div class="form-group d-flex">
                                <a href="{{route('ubah', $item->id)}}" class="btn btn-outline-success m-2">Edit</a>
                                <form action="{{ route('hapus', $item->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger m-2" onclick="return confirm('yakin dihapus?')">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
