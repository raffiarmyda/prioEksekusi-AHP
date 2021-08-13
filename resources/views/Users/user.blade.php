@extends('layouts.main')

    @section('container')
        <div class="container-fluid">
            <h1>Kelola User</h1>
            <div class="row">
                <div class="col-9"></div>
                <div class="col-3">
                    <form class="d-flex" type="get" action="{{url('/user')}}">
                        <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-info my-3 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-9"></div>
                <div class="col-3"></div>
            </div>
        <table class="table">
            <thead class="thead-dark">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @elseif(session('edit'))
                <div class="alert alert-success">
                    {{ session('edit') }}
                </div>
            @elseif(session('delete'))
                <div class="alert alert-danger">
                    {{ session('delete') }}
                </div>
            @endif
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Nama</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Password</th>
            <th scope="col">Role</th>
            <th scope="col">Aksi</th>
            </tr>
            </thead>
            @foreach($users as $u)
            <tr>
                <th scope="row">{{$u->id}}</th>
                <td>{{$u->name}}</td>
                <td>{{$u->username}}</td>
                <td>{{$u->email}}</td>
                <td>{{$u->password}}</td>
                <td>{{$u->role}}</td>
                <td>
                    <div class="d-flex d-inline ">
                    <a href="{{url('/user',$u->id)}}/edit" class="btn btn-success m-2">Edit</a>
                    <a href="{{url('/user/delete_user',$u->id)}}" class="btn btn-danger m-2" >Delete</a>
                    </div>
                </td>
            </tr>
            @endforeach
        </table>
        <div>
            <a href="{{route('create_user')}}" class="btn btn-success">Tambah User <i class="fas fa-plus-square"></i> </a>
        </div>


    @endsection

