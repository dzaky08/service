@extends('template.html')

@section('title', 'Login')

@section('body')

<div class="container mt-5">
        <div class="card col-4 mx-auto shadow p-4">
            <h5 class="text-center">Login</h5>
            <form action="{{ route('post-login') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="mb-3">
                    <label for=""   class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Masukan email anda">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Masukan password anda">
                    @if (Session::has('msg'))
                        <div class="alert alert-primary mt-3">{{ Session::get('msg') }}</div>
                    @endif
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary form-control">Login</button>
                </div>
            </form>
        </div>
    </div>
@endsection