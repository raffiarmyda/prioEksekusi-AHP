@extends('layouts.main')

    @section('container')
        <div class="container-fluid">
        <h1>Halaman Kelola Order</h1>
            <div class="row">
                <div class="col-9"></div>
                <div class="col-3">
                    <form class="d-flex" type="get" action="/order">
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
                <th scope="col">LONGITUDE</th>
                <th scope="col">LATITUDE</th>
                <th scope="col">WITEL</th>
                <th scope="col">STO</th>
                <th scope="col">BTS STATUS</th>
                <th scope="col">BILLED BANDWIDTH</th>
                <th scope="col">REQUEST METRO PORT</th>
                <th scope="col">REQUEST OLT PORT</th>
                <th scope="col">REQUEST ONT PORT</th>
                <th scope="col">REQUEST SWITCH</th>
                <th scope="col">REQUEST DISTANCE</th>
                <th scope="col">INPUT BY</th>
                <th scope="col">INPUT AT</th>
                <th scope="col">COMMENT</th>
                <th>Action</th>
            </tr>
            </thead>
            @foreach($orders as $o)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$o->sidnim}}</td>
                    <td>{{$o->longitude}}</td>
                    <td>{{$o->latitude}}</td>
                    <td>{{$o->witel}}</td>
                    <td>{{$o->sto}}</td>
                    <td>{{$o->bts_status}}</td>
                    <td>{{$o->billed_bandwidth}}</td>
                    <td>{{$o->request_metroport}}</td>
                    <td>{{$o->request_oltport}}</td>
                    <td>{{$o->request_ontport}}</td>
                    <td>{{$o->request_switch}}</td>
                    <td>{{$o->request_distance}}</td>
                    <td>{{$o->input_by}}</td>
                    <td>{{$o->input_at}}</td>
                    <td>{{$o->comment}}</td>
                    <td>
                        <div class="d-flex d-inline">
                        <a href="{{url('/order', $o->id)}}/edit" class="btn btn-success m-2">Edit</a>
                        <a href="{{url('/order/delete_order',$o->id)}}" class="btn btn-danger m-2">Delete</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
        <div>
            <a href="{{route('create_order')}}" class="btn btn-success">Tambah Order <i class="fas fa-plus-square"></i> </a>
            {{--            <button type="submit" href="/register" class="btn btn-success">Tambah User</button>--}}
        </div>
        </div>
    @endsection
