@extends('layouts.main')
@section('container')
    <h1>EDIT EKSEKUSI</h1>
    <div class="card-body">
        <form method="post" action="{{url('update_eksekusi',$eksekusi->id)}}">
            @csrf
            <div class="from-group">
                <label for="oa_date">OA DATE</label>
                <input type="date" name="oa_date" class="form-control @error('oa_date') is-invalid @enderror" id="oa_date" placeholder="Masukkan OA DATE" value="{{old('oa_date', $eksekusi->oa_date)}}">
                @error('oa_date')<div class="invalid-feedback">{{$messages='OA DATE Tidak Boleh Kosong'}}</div>
                @enderror
            </div>
            <br>
            <div class="from-group">
                <label for="update_by">UPDATED BY</label>
                <input type="text" name="update_by" class="form-control @error('update_by') is-invalid @enderror" id="update_by" placeholder="Masukkan UPDATED BY" value="{{old('created_by', $eksekusi->update_by)}}">
                @error('update_by')<div class="invalid-feedback">{{$messages='UPDATED BY Tidak Boleh Kosong'}}</div>
                @enderror
            </div>
            <br>

            <div class="from-group">
                <label>Tanggal Eksekusi</label>
                <input type="date" name="tanggal_eksekusi" class="form-control @error('tanggal_eksekusi') is-invalid @enderror" id="tanggal_eksekusi" placeholder="Masukkan Tanggal Eksekusi" value="{{old('tanggal_eksekusi',$eksekusi->tanggal_eksekusi)}}">
                @error('tanggal_eksekusi')<div class="invalid-feedback">{{$messages='Tanggal Eksekusi Tidak Boleh Kosong'}}</div>
                @enderror
            </div>
            <br>
            <label for="comment">Comment</label>
            <div class="form-floating">
                <textarea name="comment" class="form-control @error('comment') is-invalid @enderror" placeholder="comment" id="comment"  style="height: 100px">{{old('comment',$eksekusi->comment)}}</textarea>
                <label for="floatingTextarea2">Comment</label>
                @error('comment')<div class="invalid-feedback">{{$messages='Comment Tidak Boleh Kosong'}}</div>
                @enderror
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Update Data</button>
        </form>
@endsection
