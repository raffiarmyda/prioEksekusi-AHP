@extends('layouts.main')
    @section('container')
        <div class="container-fluid">
        <h1>Ubah User</h1>
            <div class="row">
                <div class="col-9"></div>
                <div class="col-3"></div>
            </div>
        <div class="card-header">
            <h4>Mengubah User</h4>
        </div>
        <div class="card-body">
            <form method="post" action="{{ url('update_user',$users->id) }}">
                @csrf
                <div class="from-group">
                    <label for="name">Nama</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Masukkan Nama" value="{{ $users->name }}">
                    @error('name')<div class="invalid-feedback">{{$messages='Nama Tidak Boleh Kosong'}}</div>
                    @enderror
                </div>
                <br>
                <div class="from-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Masukkan Username" value="{{($users->username)}}">
                    @error('username')<div class="invalid-feedback">{{$messages='Username Tidak Boleh Kosong'}}</div>
                    @enderror
                </div>
                <br>
                <div class="from-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Masukkan Email" value="{{ $users->email }}">
                    @error('email')<div class="invalid-feedback">{{$messages='Email Tidak Boleh Kosong'}}</div>
                    @enderror
                </div>
                <br>
                <div class="form-group">
                    <label for="role">Role</label>
                    <select name="role" class="form-select" id="role">
                        <option selected>{{$users->role}}</option>
                        <option value="Paket Admin Support IT & Service">Paket Admin Support IT & Service</option>
                        <option value="Paket Staff Support IT & Service">Paket Staff Support IT & Service</option>
                        <option value="Paket Manager">Paket Manager</option>
                        <option value="Expertise">Expertise</option>
                    </select>
                </div>
                <br>
                <div class="from-group">
                    <label for="password">Password</label>
                    <input type="text" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Masukkan Password">
                    @error('password')<div class="invalid-feedback">{{$messages='Password Tidak Boleh Kosong'}}</div>
                    @enderror
                    <small class="text-danger">* Isi Jika Ada Perubahan Password</small>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Ubah Data</button>
            </form>

        </div>
    @endsection
