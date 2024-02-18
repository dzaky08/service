@extends('template.html')

@section('title', 'Summary')

@section('body')
    @include('template.sidebar')
    <div id="content">
        <div class="container mt-5">
            @if (Session::has('msg'))
                <div class="alert alert-primary">{{ Session::get('msg') }}</div>
            @endif
            
        </div>
    </div>
@endsection
