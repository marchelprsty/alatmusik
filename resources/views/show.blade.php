<!-- resources/views/alat_musik/show.blade.php -->

@extends('master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <!-- Gambar Alat Musik -->
            <img src="{{ asset('storage/'.$alatMusik->gambar) }}" alt="{{ $alatMusik->nama }}" class="img-fluid">
        </div>
        <div class="col-md-6">
            <!-- Informasi Alat Musik -->
            <h2>{{ $alatMusik->nama }}</h2>
            <br>
            <p><strong>Harga     :</strong> @currency($alatMusik->harga)</p>
            <p><strong>Deskripsi :</strong> {{ $alatMusik->deskripsi }}</p>

    <br>
    <a href="{{ route('index') }}" class="btn btn-primary">Kembali</a> | <a href="https://wa.me/6289684461144" target="_blank">
        <img src="{{ asset('gambar/3.png') }}" alt="WhatsApp Logo" width="38">
    </a>
@endsection
