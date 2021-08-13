@extends('layouts.main')

    @section('container')
        <div class="container-fluid">
        <h1>Halaman Home</h1>
            <div class="row">
                <div class="col-9"></div>
            </div>
            <br>
        <h5 class="text-center">Selamat Datang di Sistem Informasi Untuk Menentukan Prioritas Eksekusi Upgrade Bandwidth Di Jawa Barat </h5>
        <h5 class="text-center">Anda Login Sebagai, {{Auth::user()->role}}</h5>
    @endsection
