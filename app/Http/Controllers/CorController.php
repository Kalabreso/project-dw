<?php

namespace App\Http\Controllers;

use App\Models\Cor;
use Illuminate\Http\Request;
use Dompdf\Dompdf;


class CorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Cor::all();
        return view('cor.index', compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cor = new Cor();
        return view('cor.create', compact(['cor']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $cor = new Cor;
        $cor->name = $request->name;
        $cor->save();

        return redirect()->route('cor.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cor = Cor::find($id);
        return view('cor.show', compact(['cor']));

        if(isset($cor)){
            return view('cor.show', compact('cor'));
        }

        return "<h1>Cor não encontrada</h1>";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cor = Cor::find($id);
        if(isset($cor)){
            return view('cor.edit', compact('cor'));
        }
        
        return "<h1>Cor não encontrada</h1>";

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
        $cor = Cor::find($id);
        if(isset($cor)){
        
            $cor->name = $request->name;
            $cor->save();
            return redirect()->route('cor.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cor = Cor::find($id);
        
        if(isset($cor)){
            $cor->delete();
            return redirect()->route('cor.index');
        }
        
        return "<h1>Cor não encontrada</h1>";
    }
}
