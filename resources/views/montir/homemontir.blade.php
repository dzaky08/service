@extends('template.html')

@section('title', 'Home Montir')

@section('body')
@include('template.sidebar')
    <div id="content">
        <div class="container mt-5">
            @if (Session::has('msg'))
                <div class="alert alert-primary">{{ Session::get('msg') }}</div>
            @endif
            <div class="card col-10 mx-auto p-4">
                <h5 class="text-center">Booking Service</h5>
                <table class="table table-bordered" id="example">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Servis</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($servis as $item)
                            <tr>
                                <form action="{{ route('detail', $item->id) }}" method="post">
                                    @csrf
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ asset($item->foto) }}" alt="" width="100" height="100">
                                    </td>
                                    <td>{{ $item->nama }}</td>
                                    <td>
                                        <p>{{ $item->harga }}</p>
                                        <p>stock : {{ $item->qty }}</p>
                                        <div class="row">
                                            <div class="col-2">
                                                <p>Qty : </p>
                                            </div>
                                            <div class="col-10">
                                                <input type="number" name="qty" required min="1"
                                                    class=" mt-3 w-25 d-flex form-control">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <button class="btn text-white form-control"
                                            style="background-color: #336B87">Pilih</button>
                                    </td>
                                </form>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

@endsection
