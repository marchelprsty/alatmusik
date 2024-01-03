<!-- resources/views/alatmusik/index.blade.php -->

@extends('master')

@section('content')

{{-- <form method="GET" action="{{ route('search') }}">
    <input type="text" class="form-control-md inline" name="cari" placeholder="Search...">
    <input class="btn btn-primary ml-3" type="submit" value="cari">
</form> --}}
    <h1 class="text-center">List Alat Musik</h1> 
    <a href="{{ route('create') }}" class="btn btn-success">+</a>
    <br>
    <br>
    <div class="row">
        @foreach ($alatMusiks as $alatMusik)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset ('storage/' .$alatMusik->gambar) }}" class="card-img-top" alt="{{ $alatMusik->nama }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $alatMusik->nama }}</h5>
                        <p class="card-text">Harga: Rp {{ number_format($alatMusik->harga, 0, ',', '.') }}</p>
                        <a href="{{ route('show', $alatMusik->id) }}" class="btn btn-primary">Lihat Detail</a>
                        <a href="{{ route('edit', $alatMusik->id) }}" class="btn btn-warning">Edit</a>
                        <a href="{{ route('destroy', $alatMusik->id) }}" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
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
