<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $orders = Order::where('sidnim','LIKE','%'.$request->search.'%')->get();
        }
        else{
            $orders = Order::all();
        }
        return view('order',compact('orders'),['title'=>'order']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_order',['title'=>'order']);
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
            'longitude' => 'required',
            'latitude' => 'required',
            'witel' => 'required',
            'sto' => 'required',
            'bts_status' => 'required',
            'billed_bandwidth' => 'required',
            'request_metroport' => 'required',
            'request_oltport' => 'required',
            'request_ontport' => 'required',
            'request_switch' => 'required',
            'input_by' => 'required',
            'comment' => 'required'

        ]);

        Order::create($request->all());
        return redirect('/order')->with('status', 'Data Order Berhasil Ditambahkan!');

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
        $orders = Order::findorfail($id);
        return view('edit_order',compact('orders'),['title'=>'order']);
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
        $orders = Order::find($id);
        $orders->update([
            'sidnim' => $request->sidnim,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'witel' => $request->witel,
            'sto' => $request->sto,
            'bts_status' => $request->bts_status,
            'billed_bandwidth' => $request->billed_bandwidth,
            'request_metroport' => $request->request_metroport,
            'request_oltport' => $request->request_oltport,
            'request_ontport' => $request->request_ontport,
            'request_switch' => $request->request_switch,
            'input_by' => $request->input_by,
            'comment' => $request->comment
        ]);
        return redirect('/order')->with('edit', 'Data Order Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $orders = Order::findorfail($id);
        $orders->delete();
        return redirect('/order')->with('delete', 'Data Order Behasil Dihapus');
    }
}
