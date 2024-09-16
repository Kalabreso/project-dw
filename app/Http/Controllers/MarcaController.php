<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use App\Models\Modelo;
use Dompdf\Dompdf;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Marca::all();
        return view('marca.index', compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marca = new Marca();
        return view('marca.create', compact(['marca']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $marca = new Marca;
        $marca->name = $request->name;
        $marca->save();

        return redirect()->route('marca.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $marca = Marca::find($id);
        return view('marca.show', compact(['marca']));

        if(isset($marca)){
            return view('marca.show', compact('marca'));
        }

        return "<h1>Marca não encontrada</h1>";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $marca = Marca::find($id);
        if(isset($marca)){
            return view('marca.edit', compact('marca'));
        }
        
        return "<h1>Marca não encontrada</h1>";
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
        $marca = Marca::find($id);
        if(isset($marca)){
        
            $marca->name = $request->name;
            $marca->save();
            return redirect()->route('marca.index');
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
        {
            $marca = Marca::find($id);
            
            if(isset($marca)){
                $marca->delete();
                return redirect()->route('marca.index');
            }
            
            return "<h1>Marca não encontrada</h1>";
        }
    }
}
