<?php

namespace App\Http\Controllers;

use App\Models\Datek;
use App\Models\Order;
use Illuminate\Http\Request;

class DatekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->search != null){
            $datek = Array(datek::all()->toArray()[$request->search-1]);
        }
        else{
            $datek = Datek::all()->toArray();
        }
        return view('datek', compact('datek'),['title' => 'datek']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orders = Order::all();
        return view('create_datek',compact('orders'),['title'=>'datek']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'sidnim' => 'required',
            'metro' => 'required',
            'metro_port' => 'required',
            'hostname_gpon' => 'required',
            'olt_port' => 'required',
            'mac_ne' => 'required',
            'ip_address_ont' => 'required',
            'ont_port' => 'required',
            'activity' => 'required',
            'priority' => 'required',
            'progress' => 'required',
            'datek_evidence' => 'required',
            'comment' => 'required'
        ]);

        Datek::create($request->all());
        return redirect('/datek')->with('status', 'Data Datek Berhasil Ditambahkan!');
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
        $orders = Order::all();
        $dateks = Datek::find($id);
        return view('edit_datek',compact('dateks','orders'),['title'=>'datek']);
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
        $dateks = Datek::find($id);
        $dateks->update($request->all());
        return redirect('/datek')->with('edit', 'Data Datek Berhasil Diubah!');
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
