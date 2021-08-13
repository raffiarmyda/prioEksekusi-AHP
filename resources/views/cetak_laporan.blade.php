@extends('layouts.main')
@section('container')
    <div class="container-fluid">
        <div class="row">
            <div class="col-9"></div>
            <div class="col-3">
            </div>
        </div>
        <div id='myChart'></div>
        <h1>LAPORAN</h1>
        <div class="panel d-flex justify-content-center" style="width: auto !important;">
            <div id="chart"></div>
        </div>
        <br>
        <br>
        <label>Data Order</label>
        <table class="table table-bordered">
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
                <th scope="col">INPUT BY</th>
                <th scope="col">COMMENT</th>
            </tr>
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
                    <td>{{$o->input_by}}</td>
                    <td>{{$o->comment}}</td>
                </tr>
            @endforeach
        </table>
        <table class="table table-bordered">
            <label>Data Datek</label>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">SIDNIM</th>
                <th scope="col">METRO</th>
                <th scope="col">METRO PORT</th>
                <th scope="col">HOTNAME GPON</th>
                <th scope="col">OLT PORT</th>
                <th scope="col">MAC NE</th>
                <th scope="col">IP ADDRESS ONT</th>
                <th scope="col">ONT PORT</th>
                <th scope="col">ACTIVITY</th>
                <th scope="col">PRIORITY</th>
                <th scope="col">PROGRESS</th>
                <th scope="col">DATEK EVIDENCE</th>
                <th scope="col">COMMENT</th>
            </tr>
            @foreach($dateks as $d)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$d->order->sidnim}}</td>
                    <td>{{$d->metro}}</td>
                    <td>{{$d->metro_port}}</td>
                    <td>{{$d->hostname_gpon}}</td>
                    <td>{{$d->olt_port}}</td>
                    <td>{{$d->mac_ne}}</td>
                    <td>{{$d->ip_address_ont}}</td>
                    <td>{{$d->ont_port}}</td>
                    <td>{{$d->activity}}</td>
                    <td>{{$d->priority}}</td>
                    <td>{{$d->progress}}</td>
                    <td>{{$d->datek_evidence}}</td>
                    <td>{{$d->comment}}</td>
                </tr>
            @endforeach
        </table>
        <table class="table table-bordered">
            <thead class="thead-dark">
            <label>Data Eksekusi</label>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">ID DATEK</th>
                <th scope="col">PRIORITAS EKSEKUSI UB</th>
                <th scope="col">OA DATE</th>
                <th scope="col">UPDATED BY</th>
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
                    <td>{{$e->tanggal_eksekusi}}</td>
                    <td>{{$e->comment}}</td>
                    </td>
                </tr>
            @endforeach
        </table>
        @push('css')
            <style>
                #chart {
                    width: fit-content !important;
                }
            </style>
            @endpush
        @section('footer')
            <script src="https://code.highcharts.com/highcharts.js"></script>
            <script>
                Highcharts.chart('chart', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: "<strong>WITEL'S ORDER PERFORMANCE</strong>"
                    },
                    // subtitle: {
                    //     text: 'Berdasarkan Data'
                    // },
                    xAxis: {
                        categories: {!!json_encode(array_keys($data))!!},
                        crosshair: true
                    },
                    yAxis: {
                        min: 0,
                        max: {{count($orders)}},
                        title: {
                            text: '<strong>JUMLAH ORDER<strong>'
                        }
                    },
                    tooltip: {
                        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                            '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
                        footerFormat: '</table>',
                        shared: true,
                        useHTML: true
                    },
                    plotOptions: {
                        column: {
                            pointPadding: 0.2,
                            borderWidth: 0
                        }
                    },
                    series: [{
                        name: '<strong>WITEL</strong>',
                        data: {!! json_encode(array_values($data)) !!}

                    }]
                });
                setTimeout(function() {
                    window.print()
                }, 500);
            </script>
@endsection

@endsection


