@extends('template.html')

@section('title', 'Home Kasir')

@section('body')
    @include('template.sidebar')
    <div id="content">
        <div class="container mt-5">
            @if (Session::has('msg'))
                <div class="alert alert-primary">{{ Session::get('msg') }}</div>
            @endif
            <div class="card col-8 mx-auto p-4"style="background-color: #EEEEEE">
                <div class="card-header" style="background-color: #3D4452">
                    <h5 class="text-center text-light">Transaksi</h5>
                </div>
                <table id="example" class="table table-bordered" style="background-color: #EEEEEE">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Kendaraan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $no_kendaraan => $group)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $no_kendaraan }}</td>
                                <td><a href="{{route('detail-kasir', ['no_kendaraan' => $no_kendaraan])}}"
                                        class="btn text-white form-control" style="background-color: #336B87">detail</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
