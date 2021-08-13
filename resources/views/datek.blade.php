@extends('layouts.main')
@section('container')
    <div class="container-fluid">
    <h1>Halaman Datek</h1>
        <div class="row">
            <div class="col-9"></div>
            <div class="col-3">
                <form class="d-flex" type="get" action="{{url('/datek')}}">
                    <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-info my-3 my-sm-0" type="submit">Search</button>
                </form>
            </div>
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
            <th scope="col">No.</th>
            <th scope="col">SIDNIM</th>
            <th scope="col">METRO</th>
            <th scope="col">METRO PORT</th>
            <th scope="col">HOSTNAME GPON</th>
            <th scope="col">OLT PORT</th>
            <th scope="col">MAC NE</th>
            <th scope="col">IP ADDRESS ONT</th>
            <th scope="col">ONT PORT</th>
            <th scope="col">ACTIVITY</th>
            <th scope="col">PRIORITY</th>
            <th scope="col">PROGRESS</th>
            <th scope="col">DATEK EVIDENCE</th>
            <th scope="col">COMMENT</th>
            <th>Action</th>
        </tr>
        </thead>
        @foreach($datek as $d)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{\App\Models\Order::find($d['sidnim'])->sidnim}}</td>
                <td>{{$d['metro']}}</td>
                <td>{{$d['metro_port']}}</td>
                <td>{{$d['hostname_gpon']}}</td>
                <td>{{$d['olt_port']}}</td>
                <td>{{$d['mac_ne']}}</td>
                <td>{{$d['ip_address_ont']}}</td>
                <td>{{$d['ont_port']}}</td>
                <td>{{$d['activity']}}</td>
                <td>{{$d['priority']}}</td>
                <td>{{$d['progress']}}</td>
                <td>{{$d['datek_evidence']}}</td>
                <td>{{$d['comment']}}</td>
                <td>
                    <div class="d-flex d-inline">
                    <a href="{{url('/datek', $d['id'])}}/edit" class="btn btn-success m-2">Edit</a>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
    <div>
        <a href="{{route('create_datek')}}" class="btn btn-success">Tambah Datek<i class="fas fa-plus-square"></i> </a>
    </div>
@endsection
