@extends('layouts.main')
@section('container')
    <h1>Tambah Respondence</h1>
    <div class="card-header">
        <h4>Menambahkan Respondence</h4>
    </div>
    <div class="card-body">
        <form method="post" action="/respondence">
            @csrf
            <div class="from-group">
                <label for="metroport">REQUEST METRO PORT</label>
                <input type="text" name="metroport" class="form-control @error('metroport') is-invalid @enderror" id="metroport" placeholder="Masukkan METRO PORT" value="{{old('metroport')}}">
                @error('metroport')<div class="invalid-feedback">{{$messages='METRO PORT Tidak Boleh Kosong'}}</div>
                @enderror
            </div>
            <br>
            <div class="from-group">
                <label for="request_oltport">REQUEST OLT PORT</label>
                <input type="text" name="oltport" class="form-control @error('oltport') is-invalid @enderror" id="oltport" placeholder="Masukkan OLT PORT" value="{{old('oltport')}}">
                @error('oltport')<div class="invalid-feedback">{{$messages='OLT PORT Tidak Boleh Kosong'}}</div>
                @enderror
            </div>
            <br>
            <div class="from-group">
                <label for="ontport">REQUEST ONT PORT</label>
                <input type="text" name="ontport" class="form-control @error('ontport') is-invalid @enderror" id="ontport" placeholder="Masukkan ONT PORT" value="{{old('ontport')}}">
                @error('ontport')<div class="invalid-feedback">{{$messages='ONT PORT Tidak Boleh Kosong'}}</div>
                @enderror
            </div>
            <br>
            <div class="from-group">
                <label for="switch">REQUEST SWITCH PORT</label>
                <input type="text" name="switch" class="form-control @error('switch') is-invalid @enderror" id="switch" placeholder="Masukkan SWITCH PORT" value="{{old('switch')}}">
                @error('switch')<div class="invalid-feedback">{{$messages='SWITCH Tidak Boleh Kosong'}}</div>
                @enderror
            </div>
            <br>
            <div class="from-group">
                <label for="distance">DISTANCE</label>
                <input type="text" name="distance" class="form-control @error('distance') is-invalid @enderror" id="distance" placeholder="Masukkan Nama Yang Memasukkan Data" value="{{old('distance')}}">
                @error('distance')<div class="invalid-feedback">{{$messages='Distance Yang Menginputkan Tidak Boleh Kosong'}}</div>
                @enderror
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
    </div>
@endsection
