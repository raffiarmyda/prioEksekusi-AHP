<?php

namespace App\Http\Controllers;

use App\Models\Eksekusi;
use App\Models\Datek;
use App\Models\Order;
use App\Models\Respondence;
use Illuminate\Http\Request;

class EksekusiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $eksekusi = Eksekusi::where('prioritas_eksekusi_ub','LIKE','%'.$request->search.'%')->get();
        }
        else{
            $eksekusi = Eksekusi::all();
        }
        return view('/eksekusi',compact('eksekusi'),['title' => 'eksekusi']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orders = Order::all();
        $dateks = Datek::all();
        $respondence = Respondence::all();
        $size = $respondence->count();
        $matrix = [];
        $divider = [3,5,6,7,9];
        foreach($respondence as $data){
            $p = [];
            $p[0][0] = 1;
            $p[0][1] = $data->metroport;
            $p[0][2] = $data->oltport;
            $p[0][3] = $data->ontport;
            $p[0][4] = $data->switch;
            $p[0][5] = $data->distance;
            $idx = 1;

            for($i=1; $i<6; $i++){
                for($j=0; $j<6; $j++){
                    if($idx == $j){
                        $p[$i][$j] = 1;
                        continue;
                    }
                    if($j == 0){
                        $p[$i][$j] = number_format(1/$p[0][$i], 4);
                        continue;
                    }
                    $p[$i][$j] = number_format($p[0][$j]/$p[0][$i], 4);
                }
                $idx++;
            }
            array_push($matrix, $p);
        }
        $z = [];
        for($i = 0; $i<6; $i++){
            for($j=0; $j<6; $j++){
                $arr = array();
                for($k=0; $k<$size; $k++){
                    array_push($arr, $matrix[$k][$i][$j]);
                }
                $z[$i][$j] = number_format(pow(array_product($arr), 0.2), 4);
            }
        }
        $eigen = [];
        $priority = [];
        for($i = 0; $i<6; $i++){
            $arr = array();
            for($j=0; $j<6; $j++){
                array_push($arr, $z[$i][$j]);
            }
            array_push($eigen, number_format(pow(array_product($arr), (1/6)), 4));
        }
        $idx = 0;
        foreach($eigen as $data){
            $priority[$idx++] = number_format($data/array_sum($eigen), 4);
        }

        $order = Order::all()->toArray();
        $sidnim_divider = number_format(1/count($order), 9);
        $idx = 0;
        for($i = 0; $i<count($order); $i++){
            for($j = 0; $j<count($order); $j++){
                if($j == $idx){
                    $billed[$i][$j] = 1;
                    continue;
                }else{
                    $billed[$i][$j] = number_format($order[$i]['billed_bandwidth']/$order[$j]['billed_bandwidth'], 4);
                }
            }
            $idx ++;
            $eigen_billed[$i] = number_format(pow(array_product($billed[$i]), $sidnim_divider), 4);
        }
        for($i=0; $i<count($eigen_billed); $i++){
            $bobot_billed[$i] = number_format($eigen_billed[$i]/array_sum($eigen_billed), 4);
        }

        $idx = 0;
        for($i = 0; $i<count($order); $i++){
            for($j = 0; $j<count($order); $j++){
                if($j == $idx){
                    $metroport[$i][$j] = 1;
                    continue;
                }else{
                    $metroport[$i][$j] = number_format($order[$i]['request_metroport']/$order[$j]['request_metroport'], 4);
                }
            }
            $idx ++;
            $eigen_metroport[$i] = number_format(pow(array_product($metroport[$i]), $sidnim_divider), 4);
        }
        for($i=0; $i<count($eigen_metroport); $i++){
            $bobot_metroport[$i] = number_format($eigen_metroport[$i]/array_sum($eigen_metroport), 4);
        }

        $idx = 0;
        for($i = 0; $i<count($order); $i++){
            for($j = 0; $j<count($order); $j++){
                if($j == $idx){
                    $oltport[$i][$j] = 1;
                    continue;
                }else{
                    $oltport[$i][$j] = number_format($order[$i]['request_oltport']/$order[$j]['request_oltport'], 4);
                }
            }
            $idx ++;
            $eigen_oltport[$i] = number_format(pow(array_product($oltport[$i]), $sidnim_divider), 4);
        }
        for($i=0; $i<count($eigen_oltport); $i++){
            $bobot_oltport[$i] = number_format($eigen_oltport[$i]/array_sum($eigen_oltport), 4);
        }

        $idx = 0;
        for($i = 0; $i<count($order); $i++){
            for($j = 0; $j<count($order); $j++){
                if($j == $idx){
                    $ontport[$i][$j] = 1;
                    continue;
                }else{
                    $ontport[$i][$j] = number_format($order[$i]['request_ontport']/$order[$j]['request_ontport'], 4);
                }
            }
            $idx ++;
            $eigen_ontport[$i] = number_format(pow(array_product($ontport[$i]), $sidnim_divider), 4);
        }
        for($i=0; $i<count($eigen_ontport); $i++){
            $bobot_ontport[$i] = number_format($eigen_ontport[$i]/array_sum($eigen_ontport), 4);
        }


        $idx = 0;
        for($i = 0; $i<count($order); $i++){
            for($j = 0; $j<count($order); $j++){
                if($j == $idx){
                    $switch[$i][$j] = 1;
                    continue;
                }else{
                    $switch[$i][$j] = number_format($order[$i]['request_switch']/$order[$j]['request_switch'], 4);
                }
            }
            $idx ++;
            $eigen_switch[$i] = number_format(pow(array_product($switch[$i]), $sidnim_divider), 4);
        }
        for($i=0; $i<count($eigen_switch); $i++){
            $bobot_switch[$i] = number_format($eigen_switch[$i]/array_sum($eigen_switch), 4);
        }


        $idx = 0;
        for($i = 0; $i<count($order); $i++){
            for($j = 0; $j<count($order); $j++){
                if($j == $idx){
                    $distance[$i][$j] = 1;
                    continue;
                }else{
                    $distance[$i][$j] = number_format($order[$i]['request_distance']/$order[$j]['request_distance'], 4);
                }
            }
            $idx ++;
            $eigen_distance[$i] = number_format(pow(array_product($distance[$i]), $sidnim_divider), 4);
        }
        for($i=0; $i<count($eigen_distance); $i++){
            $bobot_distance[$i] = number_format($eigen_distance[$i]/array_sum($eigen_distance), 4);
        }

        for($i = 0; $i<count($order); $i++){
            $result[$i] = number_format(($bobot_billed[$i] * $priority[0]) + ($bobot_metroport[$i] * $priority[1]) + ($bobot_oltport[$i] * $priority[2]) + ($bobot_ontport[$i] * $priority[3]) + ($bobot_switch[$i] * $priority[4]) + ($bobot_distance[$i] * $priority[5]), 4);
        }
        arsort($result);
        return view('create_eksekusi',compact('orders','dateks', 'order', 'result'),['title'=>'eksekusi']);
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
            'oa_date' => 'required',
            'created_by' => 'required',
            'prioritas_eksekusi_ub' => 'required|array',
            'prioritas_eksekusi_ub.*' => 'required',
            'tanggal_eksekusi' => 'required',
            'comment' => 'required'
        ]);
        $z = "";
        $priority = 1;
        foreach($request->prioritas_eksekusi_ub as $data){
            Eksekusi::create([
                'id_sidnim' => $data,
                'id_datek' => Datek::where('sidnim', $data)->first()->id,
                'oa_date' => $request->oa_date,
                'update_by' => $request->created_by,
                'prioritas_eksekusi_ub' => $priority++,
                'tanggal_eksekusi' => $request->tanggal_eksekusi[$priority-2],
                'comment' => $request->comment,
            ]);
        }
        return redirect('/eksekusi')->with('status', 'Data Datek Berhasil Ditambahkan!');
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
        $dateks = Datek::all();
        $eksekusi = Eksekusi::find($id);
        return view('edit_eksekusi',compact('dateks','orders','eksekusi'),['title'=>'eksekusi']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){

        $eksekusi = Eksekusi::find($id);
        $eksekusi->update($request->all());
        return redirect('/eksekusi')->with('edit', 'Data Datek Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
         $eksekusi = Eksekusi::all();
         foreach($eksekusi as $data){
             $data->delete();
         }
        return redirect('/eksekusi');
    }
}
