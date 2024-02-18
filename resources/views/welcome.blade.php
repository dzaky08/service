@extends('template.html')

@section('title', 'Login')

@section('body')
    <div class="container mt-5">
        <div class="card col-md-8 mx-auto shadow" style="background-color: #393E46">
            <div class="row justify-content-center">
                <div class="card-header col-6 text-center bg-light p-5">
                    <img src="img/logoservis.png" class="card-img-top d-block mx-auto" alt="" style="width: 100%;">
                </div>
                <div class="card-body col-4 p-5">
                    <h3 for="" class="card-title text-white text-center">SERVICE PRO 1998</h3>
                    <form action="{{ route('post-login') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label text-white">Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Masukan email anda">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label text-white">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Masukan password anda">
                            @if (Session::has('msg'))
                                <div class="alert alert-primary mt-3">{{ Session::get('msg') }}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <button class="btn form-control text-white" style="background-color: #00ADB5">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
