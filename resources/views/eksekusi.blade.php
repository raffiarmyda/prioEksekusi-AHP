@extends('layouts.main')
@section('container')
    <div class="container-fluid">
    <h1>Halaman Eksekusi</h1>
        <div class="row">
            <div class="col-9"></div>
            <div class="col-3">
                <form class="d-flex" type="get" action="{{url('/eksekusi')}}">
                    <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-info my-3 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </div>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">No.</th>
            <th scope="col">ID DATEK</th>
            <th scope="col">PRIORITAS EKSEKUSI UB</th>
            <th scope="col">OA DATE</th>
            <th scope="col">UPDATED BY</th>
            <th scope="col">UPDATED AT</th>
            <th scope="col">TANGGAL EKSEKUSI</th>
            <th scope="col">COMMENT</th>
        </tr>
        </thead>
        @foreach($eksekusi as $e)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$e->id_datek}}</td>
                <td>{!! $loop->iteration.". Sidnim : ". $e->order->sidnim ."<br/>Longitude : ". $e->order->longitude ."<br/> Latitude : ". $e->order->Latitude ."<br/> Witel : ". $e->order->witel ."<br/> Sto : ". $e->order->sto. "<br/> Bts Status : ". $e->order->bts_status. "<br/> Billed Bandwidth : ". $e->order->billed_bandwidth. "<br/> Request Metroport : ". $e->order->request_metroport. "<br/> Request Oltport : ". $e->order->request_oltport. "<br/> Request Ontport : ". $e->order->request_ontport. "<br/> Request Switch : ". $e->order->request_switch. "<br/> Request Distance : ". $e->order->request_distance. "<br/> Input By : ". $e->order->input_by. "<br/> Comment : ". $e->order->comment !!}</td>
                <td>{{$e->oa_date}}</td>
                <td>{{$e->update_by}}</td>
                <td>{{\Carbon\Carbon::parse($e->updated_at)->isoFormat('LLLL')}}</td>
                <td>{{$e->tanggal_eksekusi}}</td>
                <td>{{$e->comment}}</td>
                <td>
                    <a href="{{url('/eksekusi', $e->id)}}/edit" class="btn btn-primary m-2">Edit Eksekusi</a>
                </td>
            </tr>
        @endforeach
    </table>
    <a href="{{route('create_eksekusi')}}" class="btn btn-success">Tambah Eksekusi <i class="fas fa-plus-square"></i> </a>
    <a href="{{route('reset')}}" class="btn btn-primary">Reset <i class="fas fa-plus-square"></i> </a>


    <div>

        {{--            <button type="submit" href="/register" class="btn btn-success">Tambah User</button>--}}
    </div>
@endsection
