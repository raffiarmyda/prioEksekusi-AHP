@extends('layouts.main')
@section('container')
    <h1>EDIT EKSEKUSI</h1>
    <div class="card-body">
        <form method="post" action="{{url('eksekusi')}}">
            @csrf
            <div class="from-group">
                <label for="oa_date">OA DATE</label>
                <input type="date" name="oa_date" class="form-control @error('oa_date') is-invalid @enderror" id="oa_date" placeholder="Masukkan OA DATE" value="{{old('oa_date')}}">
                @error('oa_date')<div class="invalid-feedback">{{$messages='OA DATE Tidak Boleh Kosong'}}</div>
                @enderror
            </div>
            <br>
            <div class="from-group">
                <label for="update_by">UPDATED BY</label>
                <input type="text" name="created_by" class="form-control @error('update_by') is-invalid @enderror" id="update_by" placeholder="Masukkan UPDATED BY" value="{{old('update_by')}}">
                @error('update_by')<div class="invalid-feedback">{{$messages='CREATED BY Tidak Boleh Kosong'}}</div>
                @enderror
            </div>
            <br>
{{--            <div class="from-group">--}}
{{--                <label for="updated_at">UPDATED AT</label>--}}
{{--                <input type="date" name="updated_at" class="form-control @error('updated_at') is-invalid @enderror" id="updated_at" placeholder="Masukkan UPDATED AT" value="{{old('updated_at')}}">--}}
{{--                @error('updated_at')<div class="invalid-feedback">{{$messages='UPDATED AT Tidak Boleh Kosong'}}</div>--}}
{{--                @enderror--}}
{{--            </div>--}}
{{--            <br>--}}
            <div class="form-group">
                    @foreach($result as $k=>$v)
                    <label>PRIORITAS EKSEKUSI UB {{$loop->iteration}}</label>
                    <select name="prioritas_eksekusi_ub[]" class="form-select @error('prioritas_eksekusi_ub') is-invalid @enderror">
                        @foreach($orders as $item)
                            <option value="{{$item->id}}" {{$loop->iteration-1 == $k ? 'selected' : ''}}>{{$item->sidnim}}</option>
                        @endforeach
                </select>
                    <br>
                    @error('prioritas_eksekusi_ub')<div class="invalid-feedback">{{$messages='PRIORITAS EKSEKUSI UB Harus Dipilih'}}</div>
                    @enderror
                @endforeach
            </div>
            <br>
            <div class="from-group">
                @foreach($orders as $item)
                <label>Tanggal Eksekusi {{$loop->iteration}}</label>
                <input type="date" name="tanggal_eksekusi[]" class="form-control @error('tanggal_eksekusi') is-invalid @enderror" id="tanggal_eksekusi" placeholder="Masukkan Tanggal Eksekusi" value="{{old('tanggal_eksekusi')}}">
                @error('tanggal_eksekusi')<div class="invalid-feedback">{{$messages='Tanggal Eksekusi Tidak Boleh Kosong'}}</div>
                @enderror
                @endforeach
            </div>
            <br>
            <label for="comment">Comment</label>
            <div class="form-floating">
                <textarea name="comment" class="form-control @error('comment') is-invalid @enderror" placeholder="comment" id="comment"  style="height: 100px">{{old('comment')}}</textarea>
                <label for="floatingTextarea2">Comment</label>
                @error('comment')<div class="invalid-feedback">{{$messages='Comment Tidak Boleh Kosong'}}</div>
                @enderror
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Tambah Data</button>
            {{--                <a class="btn btn-success">Tambah User <i class="fas fa-plus-square"></i> </a>--}}

        </form>
@endsection
