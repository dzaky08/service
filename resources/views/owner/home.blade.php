@extends('template.html')
@section('title', 'home owner')
@section('body')
@include('template.nav')

    <div class="container mt-5">
        <div class="mt-3">
            <h4>Total Pemasukan {{ number_format($totalpemasukan, 2, ',','.') }}</h4>
        </div>
        <div class="row">
            <div class="col-8">
                {!! $chart->container() !!}
            </div>
            <div class="col-4">
                <form action="{{ route('filterowner') }}" method="GET" class="form-group">
                    @csrf
                    <div class="d-flex justify-content-between gap-2">
                        <label for="From">From</label>
                        <input type="date" name="start_date" class="form-control w-75" required>
                    </div>
                    <div class="d-flex justify-content-between gap-2 mt-3">
                        <label for="To">To</label>
                        <input type="date" name="end_date" class="form-control w-75" required>
                    </div>
                    <button class="btn btn-primary">Filter</button>
                    @if (Session::has('msg'))
                        <span class="alert alert-danger">{{ Session::get('msg') }}</span>
                    @endif
                </form>
            </div>
        </div>
    </div>
    <script src="{{ $chart->cdn() }}"></script>
    {{ $chart->script() }}
@endsection