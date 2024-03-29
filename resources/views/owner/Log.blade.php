@extends('template.html')

@section('title', 'Log')

@section('body')
    {{-- @include('template.nav') --}}
    @include('template.sidebar')

    <div id="content">
        <div class="container mt-5">
            @if (Session::has('msg'))
                <div class="alert alert-primary">{{ Session::get('msg') }}</div>
            @endif
            <div class="card col-8 mx-auto shadow">
                <div class="card-header" style="background-color: #3D4452">
                    <h5 class="text-center text-white">Log</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('filter-log') }}" method="GET">
                        @csrf
                        <div class="row">
                            <input type="date" class="form-control w-25 m-2" name="start_date">
                            <input type="date" class="form-control w-25 m-2" name="end_date">
                            <button class="btn text-white w-25 m-2" type="submit"
                                style="background-color: #336B87">Filter</button>
                        </div>
                    </form>
                    <table id="example" class="table table-secondary table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama User</th>
                                <th>Aktivitas</th>
                                <th>Tanggal</th>
                                {{-- <th>Tanggal</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($logs as $log)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $log->user->nama }}</td>
                                    <td>{{ $log->aktivitas }}</td>
                                    <td>{{ $log->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
