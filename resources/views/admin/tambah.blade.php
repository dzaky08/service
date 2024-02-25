@extends('template.html')
@section('title', 'Tambah Service')
@section('body')
    @include('template.sidebar')
    <div id="content">
        <div class="container col-md-6 mt-5">
            <div class="card shadow p-2" style="background-color: #EEEEEE;">
                <div class="card-head text-center">
                    <h2>Tambah Service</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('post-tambah')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="">Foto</label>
                            <input type="file" name="foto" id="nama" class="form-control d-flex" accept="img/*" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control d-flex" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Stock</label>
                            <input type="number" name="qty" id="nama" class="form-control d-flex" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Harga</label>
                            <input type="number" name="harga" id="nama" class="form-control d-flex" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Status</label>
                            <select name="status" class="form-control" id="">
                                <option value="">Pilih Status</option>
                                <option value="ada">Ada</option>
                                <option value="habis">Habis</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Kategori</label>
                            <select name="kategori_id" class="form-control" required id="">
                                <option value="">Pilih Kategori</option>
                                @foreach ($kategori as $item)
                                <option value="{{$item->id}}">{{$item->nama}}</option>
                                    
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Harga Jasa</label>
                            <input type="number" name="harga_jasa" id="nama" class="form-control d-flex" required>
                        </div>
                        <div class="row justify-content-center">
                            <button class="btn btn-primary w-50">Tambah</button>
    
                        </div>
                    </form>
                </div>
            </div>
        </div>
    
    </div>
@endsection
