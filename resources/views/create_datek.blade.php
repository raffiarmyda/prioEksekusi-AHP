@extends('layouts.main')
@section('container')
    <h1>Tambah Datek</h1>
    <div class="card-header">
        <h4>Menambahkan Datek</h4>
    </div>
    <div class="card-body">
        <form method="post" action="{{url('datek')}}">
            @csrf
            <div class="form-group">
                <label>SIDNIM</label>
                <select name="sidnim" class="form-select @error('sidnim') is-invalid @enderror">
                    <option selected value="">- Pilih SIDNIM -</option>
                    @foreach($orders as $item)
                        <option value="{{$item->id}}"{{old('sidnim') == $item->id ? 'seleceted' : null}}>{{$item->sidnim}}</option>
                    @endforeach
                </select>
                @error('sidnim')<div class="invalid-feedback">{{$messages='SIDNIM Harus Dipilih'}}</div>
                @enderror
            </div>
            <br>
            <div class="from-group">
                <label for="metro">METRO</label>
                <input type="text" name="metro" class="form-control @error('metro') is-invalid @enderror" id="metro" placeholder="Masukkan METRO" value="{{old('metro')}}">
                @error('metro')<div class="invalid-feedback">{{$messages='METRO Tidak Boleh Kosong'}}</div>
                @enderror
            </div>
            <br>
            <div class="from-group">
                <label for="metro_port">METRO PORT</label>
                <input type="text" name="metro_port" class="form-control @error('metro_port') is-invalid @enderror" id="metro_port" placeholder="Masukkan METRO PORT" value="{{old('metro_port')}}">
                @error('metro_port')<div class="invalid-feedback">{{$messages='METRO PORT Tidak Boleh Kosong'}}</div>
                @enderror
            </div>
            <br>
            <div class="from-group">
                <label for="hostname_gpon">HOSTNAME GPON</label>
                <input type="text" name="hostname_gpon" class="form-control @error('hostname_gpon') is-invalid @enderror" id="hostname_gpon" placeholder="Masukkan HOSTNAME GPON" value="{{old('hostname_gpon')}}">
                @error('hostname_gpon')<div class="invalid-feedback">{{$messages='HOSTNAME GPON Tidak Boleh Kosong'}}</div>
                @enderror
            </div>
            <br>
            <div class="from-group">
                <label for="olt_port">OLT PORT</label>
                <input type="text" name="olt_port" class="form-control @error('olt_port') is-invalid @enderror" id="olt_port" placeholder="Masukkan OLT PORT" value="{{old('olt_port')}}">
                @error('olt_port')<div class="invalid-feedback">{{$messages='OLT PORT Tidak Boleh Kosong'}}</div>
                @enderror
            </div>
            <br>
            <div class="from-group">
                <label for="mac_ne">MAC NE</label>
                <input type="text" name="mac_ne" class="form-control @error('mac_ne') is-invalid @enderror" id="mac_ne" placeholder="Masukkan MAC NE" value="{{old('mac_ne')}}">
                @error('mac_ne')<div class="invalid-feedback">{{$messages='MAC NE Tidak Boleh Kosong'}}</div>
                @enderror
            </div>
            <br>
            <div class="from-group">
                <label for="ip_address_ont">IP ADDRESS</label>
                <input type="text" name="ip_address_ont" class="form-control @error('ip_address_ont') is-invalid @enderror" id="ip_address_ont" placeholder="Masukkan IP ADDRESS" value="{{old('ip_address_ont')}}">
                @error('ip_address_ont')<div class="invalid-feedback">{{$messages='IP ADDRESS Tidak Boleh Kosong'}}</div>
                @enderror
            </div>
            <br>
            <div class="from-group">
                <label for="ont_port">ONT PORT</label>
                <input type="text" name="ont_port" class="form-control @error('ont_port') is-invalid @enderror" id="ont_port" placeholder="Masukkan ONT PORT" value="{{old('ont_port')}}">
                @error('ont_port')<div class="invalid-feedback">{{$messages='ONT PORT Tidak Boleh Kosong'}}</div>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="activity">ACTIVITY</label>
                <br>
                <input class="form-check-input" type="radio" name="activity" id="flexCheckDefault" value="Upgrade BW VLAN Existing GPON" {{ old('activity') == 'Upgrade BW VLAN Existing GPON'  ? 'checked="checked"' : '' }}>
                <label class="form-check-label" for="activity">
                    Upgrade BW VLAN Existing GPON
                </label>
                <br>
                <input class="form-check-input" type="radio" name="activity" value="Upgrade BW VLAN Existing Direct Metro" id="flexCheckChecked" {{ old('activity') == 'Upgrade BW VLAN Existing Direct Metro'  ? 'checked="checked"' : '' }}>
                <label class="form-check-label" for="activity">
                    Upgrade BW VLAN Existing Direct Metro
                </label>
            </div>
            <br>
            <div class="form-group">
                <label for="priority">PRIORITY</label>
                <select name="priority" class="form-select" id="priority">
                    <option selected>- Pilih Prioritas -</option>
                    <option value="HIGH">HIGH</option>
                    <option value="MEDIUM">MEDIUM</option>
                    <option value="LOW">LOW</option>
                </select>
            </div>
            <br>
            <div class="form-group">
                <label for="PROGRESS">PROGRESS</label>
                <select name="progress" class="form-select" id="progress">
                    <option selected>- Pilih PROGRESS -</option>
                    <option value="NOT YET INSTALLED">NOT YET INSTALLED</option>
                    <option value="INSTALLED">INSTALLED</option>
                    <option value="ON AIR">ON AIR</option>
                    <option value="INACTIVE">INACTIVE</option>
                </select>
            </div>
            <br>
            <label for="datek_evidence">DATEK EVIDENCE</label>
            <div class="form-floating">
                <textarea name="datek_evidence" class="form-control @error('datek_evidence') is-invalid @enderror" placeholder="Datek Evidence" id="datek_evidence"  style="height: 100px">{{old('datek_evidence')}}</textarea>
                <label for="floatingTextarea2">Masukkan Datek Evidence</label>
                @error('datek_evidence')<div class="invalid-feedback">{{$messages='Datek Evidence Tidak Boleh Kosong'}}</div>
                @enderror
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


    </div>
@endsection
