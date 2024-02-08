@extends('template.html')
@section('title', 'Dashboard')
@section('body')
    @include('template.nav')
    <div class="container mt-5">
        @if (Session::has('msg'))
        <div class="alert alert-primary">{{ Session::get('msg')}}</div>
        @endif
            <a href="" class="btn btn-success mb-3 text-light">Tambah</a>
            <table class="table table-bordered" id="example">
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
                            <a href="" class="btn btn-outline-success mt-3">Edit</a>
                            <a href="" class="btn btn-outline-danger mt-3">Hapus</a>
                        </td>
                    </tr> 
                    @endforeach
                </tbody>
            </table>
    </div>

@endsection
