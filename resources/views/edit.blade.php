<!-- resources/views/alat_musik/edit.blade.php -->

@extends('master')

@section('content')
    <h2>Edit Alat Musik</h2>
    <form action="{{ route('update', $alatMusik->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $alatMusik->nama }}" required>
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
                <input type="text" class="form-control" id="harga" name="harga" value="{{ number_format($alatMusik->harga, 0, ',', '.') }}" required>
            </div>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" required>{{ $alatMusik->deskripsi }}</textarea>
        </div>
        <div class="form-group">
            <label for="stok">Stok</label>
            <input type="number" class="form-control" id="stok" name="stok" value="{{ $alatMusik->stok }}" required>
        </div>
        <div class="form-group">
            <label for="gambar">Gambar</label>
            <input type="file" class="form-control-file" id="gambar" name="gambar" value="{{ $alatMusik->gambar }}" accept="image/*" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Alat Musik</button>
        <a href="{{ route('index') }}" class="btn btn-secondary">Kembali</a>
    </form>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <!-- ... -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <!-- ... Item Navigasi Lainnya ... -->
                @auth
                    <li class="nav-item">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i>Logout
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </nav>
@endsection
<i class="fas fa-sign-out-alt"></i>