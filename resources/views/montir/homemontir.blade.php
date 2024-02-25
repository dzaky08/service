@extends('template.html')

@section('title', 'Home Montir')

@section('body')
    @include('template.sidebar')
    <div id="content">
        <div class="container mt-5">
            @if (Session::has('msg'))
                <div class="alert alert-primary">{{ Session::get('msg') }}</div>
            @endif
            <div class="row justify-content-center">
                @foreach ($data as $item)
                    <div class="card d-flex col-md-3 mx-5 mb-5 shadow" style="background-color: #EEEEEE">
                        <a href="{{ route('detailservice', ['id' => $item->id]) }}" class="">
                            <div class="card-header">
                                <img src="{{ asset($item->foto) }}" alt="{{ $item->nama }}" class="card-img-top"
                                    height="150px" width="100px" style="background-color: #EEEEEE;">
                            </div>
                            <div class="card-body">
                                <button class="btn text-white w-100 text-center"
                                    style="background-color: #00ADB5">{{ strtoupper($item->nama) }}</button>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
