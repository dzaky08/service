@extends('template.html')

@section('title', 'Login')

@section('body')

    <div class="container mt-2">
        <div class="row">
            <div class="card col-md-4 mx-auto shadow p-4">
                <div class="text-center">
                    <img src="img/montir5.jpg" class="img-fluid d-block mx-auto" alt="" style="width: 100%;">
                    <h5 for="" class="form-h5">Bengkel Abdul Kasim</label>
                </div>
                <form action="{{ route('post-login') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Username</label>
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
                        <button class="btn form-control text-white" style="background-color: #336B87">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
