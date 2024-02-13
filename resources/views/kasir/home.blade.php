@extends('template.html')

@section('title', 'Home Kasir')

@section('body')
    @include('template.nav')
    <div class="container mt-5">
        @if (Session::has('msg'))
            <div class="alert alert-primary">{{ Session::get('msg') }}</div>
        @endif
        <div class="card col-8 mx-auto p-4">
            <h5 class="text-center">Booking Service</h5>
            <table id="example" class="table table-bordered">
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
@endsection
