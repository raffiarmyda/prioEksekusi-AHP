@extends('layouts.main')
@section('container')
    <div class="container-fluid">
    <h1>Respondence</h1>
        <div class="row">
            <div class="col-9"></div>
        </div>
    <form>
        <h4 class="text-center">Search Data Respondence</h4>
        <div class="d-flex justify-content-end">
            <a href="{{route('create_respondence')}}" class="btn btn-success m-2">Tambah Data</a>
        </div>
        <br>
        <h5 class="text-center">ID RESPONDENCE</h5>
        <br>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @elseif(session('edit'))
            <div class="alert alert-success">
                {{ session('edit') }}
            </div>
        @elseif(session('delete'))
            <div class="alert alert-success">
                {{ session('delete') }}
            </div>
        @endif
        <br>
    </form>
        <div class="d-flex justify-content-center">
            <div class="col-2">
                <form type="get" action="/search_respondence">
                    <input class="form-control" name="search" type="search" placeholder="Search" aria-label="Search">
                    <br>
                    <div class="d-flex justify-content-center">
                        <a href="{{url('/home')}}" class="btn btn-primary m-2">BACK</a>
                        <button class="btn btn-outline-info m-2" type="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>


@endsection
