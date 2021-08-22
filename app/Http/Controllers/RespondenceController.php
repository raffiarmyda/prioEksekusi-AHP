<?php

namespace App\Http\Controllers;

use App\Models\Respondence;
use Illuminate\Http\Request;

class RespondenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $respondences = Respondence::all();
        return view('/respondence',compact('respondences'),['title' => 'respondence']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_respondence',['title' => 'respondence']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $request->validate([
            'metroport' => 'required',
            'oltport' => 'required',
            'ontport' => 'required',
            'switch' => 'required',
            'distance' => 'required'
        ]);

        Respondence::create($request->all());
        return redirect('/respondence')->with('status', 'Data Respondence Berhasil Ditambahkan!');
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
        $respondence = Respondence::findorfail($id);
        return view('edit_respondence',compact('respondence'),['title'=>'respondence']);
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
        $respondence = Respondence::findorfail($id);
        $respondence->update($request->all());
        return redirect('/respondence')->with('edit', 'Data Respondence Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        if($request->has('search')){
            $respondence = Respondence::where('id','LIKE','%'.$request->search.'%')->get();
        }
        else{
            $respondence = Respondence::all();
        }
        return view('/search_respondence',compact('respondence'),['title' => 'respondence']);
    }

    public function destroy($id)
    {
        $respondence = Respondence::findorfail($id);
        $respondence->delete();
        return back()->with('delete', 'Data Respondence Berhasil Dihapus!');

    }
}
