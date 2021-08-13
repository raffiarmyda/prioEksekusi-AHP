@extends('layouts.main')
    @section('container')
        <div class="container-fluid">
        <h1>Tambah User</h1>
            <div class="row">
                <div class="col-9"></div>
                <div class="col-3"></div>
            </div>
        <div class="card-header">
            <h4>Menambahkan User</h4>
        </div>
        <div class="card-body">
            <form method="post" action="{{route('user')}}">
                @csrf
                <div class="from-group">
                    <label for="name">Nama</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Masukkan Nama" value="{{old('name')}}">
                    @error('name')<div class="invalid-feedback">{{$messages='Nama Tidak Boleh Kosong'}}</div>
                    @enderror
                </div>
                <br>
                <div class="from-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Masukkan Username" value="{{old('username')}}">
                    @error('username')<div class="invalid-feedback">{{$messages='Username Tidak Boleh Kosong'}}</div>
                    @enderror
                </div>
                <br>
                <div class="from-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Masukkan Email" value="{{old('email')}}">
                    @error('email')<div class="invalid-feedback">{{$messages='Email Tidak Boleh Kosong'}}</div>
                    @enderror
                </div>
                <br>
                <div class="form-group">
                    <label for="role">Role</label>
                    <select name="role" class="form-select" id="role">
                        <option selected>- Pilih Role -</option>
                        <option value="Paket Admin Support IT & Service">Paket Admin Support IT & Service</option>
                        <option value="Paket Staff Support IT & Service">Paket Staff Support IT & Service</option>
                        <option value="Paket Manager">Paket Manager</option>
                        <option value="Expertise">Expertise</option>
                    </select>
                </div>
                <br>
                <div class="from-group">
                    <label for="password">Password</label>
                    <input type="text" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Masukkan Password" value="{{old('password')}}">
                    @error('password')<div class="invalid-feedback">{{$messages='Password Tidak Boleh Kosong'}}</div>
                    @enderror
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </form>
        </div>
    @endsection
