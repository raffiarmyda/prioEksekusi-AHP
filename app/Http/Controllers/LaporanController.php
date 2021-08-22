<?php

namespace App\Http\Controllers;

use App\Models\datek;
use App\Models\Eksekusi;
use App\Models\Order;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Array_;
use Dompdf\Adapter\PDFLib;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $all = Order::sum('billed_bandwidth');
        if($request->has('search')){
            $s = $request->search;
            $orders = Order::where('sidnim', 'LIKE', '%'.$s.'%')->get();
            $eksekusi = Eksekusi::whereHas('order', function($q) use ($s){
                $q->where('sidnim', 'LIKE', '%'.$s.'%');
            })->get();
            $dateks = datek::whereHas('order', function($q) use($s){
                $q->where('sidnim', 'LIKE', '%'.$s.'%');
            })->get();
        }
        else{
            $orders = Order::all();
            $eksekusi = Eksekusi::all();
            $dateks = datek::all();
        }
        $data = [];
        $categories = [];
        foreach ($orders as $or){
            $categories[] = $or->witel;
        }
        $order = Order::all()->groupBy('witel');
        foreach($order as $k=>$v){
            $data[$k] =  count($v);
        }
        return view('laporan',compact('orders','eksekusi','dateks','all','data','categories'),['title' => 'laporan']);
    }

    public function print()
    {
        $all = Order::sum('billed_bandwidth');
        $orders = Order::all();
        $eksekusi = Eksekusi::all();
        $dateks = datek::all();
        $data = [];
        $categories = [];
        foreach ($orders as $or){
            $categories[] = $or->witel;
        }
        $order = Order::all()->groupBy('witel');
        foreach($order as $k=>$v){
            $data[$k] =  count($v);
        }
        return view('cetak_laporan',compact('data','orders','eksekusi','dateks','all'),['title' => 'laporan']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
