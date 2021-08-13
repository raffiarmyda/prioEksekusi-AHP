@extends('layouts.main')
@section('container')
    <h1>Tambah Order</h1>
    <div class="card-header">
        <h4>Menambahkan Order</h4>
    </div>
    <div class="card-body">
        <form method="post" action="/order">
            @csrf
            <div class="from-group">
                <label for="sidnim">SIDNIM</label>
                <input type="text" name="sidnim" class="form-control @error('sidnim') is-invalid @enderror" id="sidnim" placeholder="Masukkan SIDNIM" value="{{old('sidnim')}}">
                @error('sidnim')<div class="invalid-feedback">{{$messages='SIDNIM Tidak Boleh Kosong'}}</div>
                @enderror
            </div>
            <br>
            <div class="from-group">
                <label for="longitude">Longitude</label>
                <input type="text" name="longitude" class="form-control @error('longitude') is-invalid @enderror" id="longitude" placeholder="Masukkan Longitude" value="{{old('longitude')}}">
                @error('longitude')<div class="invalid-feedback">{{$messages='Longitude Tidak Boleh Kosong'}}</div>
                @enderror
            </div>
            <br>
            <div class="from-group">
                <label for="latitude">Latitude</label>
                <input type="text" name="latitude" class="form-control @error('latitude') is-invalid @enderror" id="latitude" placeholder="Masukkan Latitude" value="{{old('latitude')}}">
                @error('latitude')<div class="invalid-feedback">{{$messages='Latitude Tidak Boleh Kosong'}}</div>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="witel">Witel</label>
                <select name="witel" class="form-select" id="witel">
                    <option selected>- Pilih Witel -</option>
                    <option value="Cirebon">Cirebon</option>
                    <option value="Tasikmalaya">Tasikmalaya</option>
                    <option value="Bandung">Bandung</option>
                    <option value="Bandung Barat">Bandung Barat</option>
                    <option value="Sukabumi">Sukabumi</option>
                    <option value="Karawang">Karawang</option>
                </select>
            </div>

            <br>
            <div class="form-group">
                <label for="sto">STO</label>
                <select name="sto" class="form-select" id="sto">
                    <option selected>- Pilih STO -</option>
                    <option value="CCD (STO CICADAS)">CCD (STO CICADAS)</option>
                    <option value="CCL (STO CILILIN)">CCL (STO CILILIN)</option>
                    <option value="CJA (STO CIJARUA)">CJA (STO CIJARUA)</option>
                    <option value="CTR (STO CENTRUM)">CTR (STO CENTRUM)</option>
                    <option value="DGO (STO DAGO)">DGO (STO DAGO)</option>
                    <option value="GGK (STO GEGERKALONG)">GGK (STO GEGERKALONG)</option>
                    <option value="HGM (STO HEGERMANAH)">HGM (STO HEGERMANAH)</option>
                    <option value="JCG (STO JALAN CAGAK)">JCG (STO JALAN CAGAK)</option>
                    <option value="KPO (STO KOPO)">KPO (STO KOPO)</option>
                    <option value="LEM (STO LEMBONG)">LEM (STO LEMBONG)</option>
                    <option value="NJG (STO NANJUNG)">NJG (STO NANJUNG)</option>
                    <option value="SMD (STO SUMEDANG)">SMD (STO SUMEDANG)</option>
                    <option value="SNT (STO SENTRUM)">SNT (STO SENTRUM)</option>
                    <option value="SUB (STO SUBANG)">SUB (STO SUBANG)</option>
                    <option value="TAS (STO TANJUNGSARI)">TAS (STO TANJUNGSARI)</option>
                    <option value="TGA (STO TEGALLEGA)">TGA (STO TEGALLEGA)</option>
                    <option value="TGG (STO TURANGGA)">TGG (STO TURANGGA)</option>
                    <option value="UBR (STO UJUNG BERUNG)">UBR (STO UJUNG BERUNG)</option>
                </select>
            </div>
            <br>
            <div class="form-group">
                <label for="bts_status">BTS STATUS</label>
                <select name="bts_status" class="form-select" id="bts_status">
                    <option selected>- Pilih BTS STATUS -</option>
                    <option value="NOT YET INSTALLED">NOT YET INSTALLED</option>
                    <option value="INSTALLED">INSTALLED</option>
                    <option value="ON AIR">ON AIR</option>
                    <option value="INACTIVE">INACTIVE</option>
                </select>
            </div>
            <br>
            <div class="from-group">
                <label for="billed_bandwidth">BILLED BANDWIDTH</label>
                <input type="text" name="billed_bandwidth" class="form-control @error('billed_bandwidth') is-invalid @enderror" id="billed_bandwidth" placeholder="Masukkan BILLED BANDWIDTH" value="{{old('billed_bandwidth')}}">
                @error('billed_bandwidth')<div class="invalid-feedback">{{$messages='BILLED BANDWIDTH Tidak Boleh Kosong'}}</div>
                @enderror
            </div>
            <br>
            <div class="from-group">
                <label for="request_metroport">REQUEST METRO PORT</label>
                <input type="text" name="request_metroport" class="form-control @error('request_metroport') is-invalid @enderror" id="request_metroport" placeholder="Masukkan METRO PORT" value="{{old('request_metroport')}}">
                @error('request_metroport')<div class="invalid-feedback">{{$messages='METRO PORT Tidak Boleh Kosong'}}</div>
                @enderror
            </div>
            <br>
            <div class="from-group">
                <label for="request_oltport">REQUEST OLT PORT</label>
                <input type="text" name="request_oltport" class="form-control @error('request_oltport') is-invalid @enderror" id="request_oltport" placeholder="Masukkan OLT PORT" value="{{old('request_oltport')}}">
                @error('request_oltport')<div class="invalid-feedback">{{$messages='OLT PORT Tidak Boleh Kosong'}}</div>
                @enderror
            </div>
            <br>
            <div class="from-group">
                <label for="request_ontport">REQUEST ONT PORT</label>
                <input type="text" name="request_ontport" class="form-control @error('request_ontport') is-invalid @enderror" id="request_ontport" placeholder="Masukkan ONT PORT" value="{{old('request_ontport')}}">
                @error('request_ontport')<div class="invalid-feedback">{{$messages='ONT PORT Tidak Boleh Kosong'}}</div>
                @enderror
            </div>
            <br>
            <div class="from-group">
                <label for="request_switch">REQUEST SWITCH PORT</label>
                <input type="text" name="request_switch" class="form-control @error('request_switch') is-invalid @enderror" id="request_switch" placeholder="Masukkan SWITCH PORT" value="{{old('request_switch')}}">
                @error('request_switch')<div class="invalid-feedback">{{$messages='SWITCH Tidak Boleh Kosong'}}</div>
                @enderror
            </div>
            <br>
            <div class="from-group">
                <label for="request_distance">REQUEST DISTANCE</label>
                <input type="text" name="request_distance" class="form-control @error('request_distance') is-invalid @enderror" id="request_distance" placeholder="Masukkan DISTANCE" value="{{old('request_distance')}}">
                @error('request_distance')<div class="invalid-feedback">{{$messages='DISTANCE Tidak Boleh Kosong'}}</div>
                @enderror
            </div>
            <br>
            <div class="from-group">
                <label for="input_by">INPUT BY</label>
                <input type="text" name="input_by" class="form-control @error('input_by') is-invalid @enderror" id="input_by" placeholder="Masukkan Nama Yang Memasukkan Data" value="{{old('input_by')}}">
                @error('input_by')<div class="invalid-feedback">{{$messages='Data Yang Menginputkan Tidak Boleh Kosong'}}</div>
                @enderror
            </div>
            <br>
            <div class="from-group">
                    <label>INPUT AT</label>
                    <input type="date" name="input_at" class="form-control @error('input_at') is-invalid @enderror" id="input_at" placeholder="Diinput Pada Tanggal" value="{{old('input_at')}}">
                    @error('input_at')<div class="invalid-feedback">{{$messages='Tanggal Input Tidak Boleh Kosong'}}</div>
                    @enderror
            </div>
            <br>
            <label for="comment">Comment</label>
            <div class="form-floating">
                <textarea name="comment" class="form-control @error('comment') is-invalid @enderror" placeholder="comment" id="datek_evidence" value="{{old('comment')}}" style="height: 100px"></textarea>
                <label for="floatingTextarea2">Comment</label>
                @error('comment')<div class="invalid-feedback">{{$messages='Datek Evidence Tidak Boleh Kosong'}}</div>
                @enderror
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Tambah Data</button>
            {{--                <a class="btn btn-success">Tambah User <i class="fas fa-plus-square"></i> </a>--}}

        </form>

    </div>
@endsection
