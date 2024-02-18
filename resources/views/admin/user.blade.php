@extends('template.html')
@section('title', 'User')
@section('body')
    @include('template.sidebar')
    <div id="content">
        <div class="container mt-5">
            @if (Session::has('msg'))
                <div class="alert alert-primary">{{ Session::get('msg') }}</div>
            @endif
            <div class="card p-3">
                <a href="{{ route('tambah-user') }}" class="btn btn-success w-25 text-white mb-3 text-light">Tambah</a>
            <table class="table table-bordered table-striped" id="example">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>
                                {{$item->username}}
                            </td>
                            <td>{{ $item->password }}</td>
                            <td>{{ $item->role }}</td>
                            <td>
                                <div class="form-group d-flex">
                                    <a href="{{route('edit', $item->id)}}" class="btn btn-success m-2">Edit</a>
                                    <form action="{{ route('hapus-user', $item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger m-2" onclick="return confirm('yakin dihapus?')">Hapus</button>
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
