<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modelo;
use App\Models\Marca;


class ModeloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Modelo::with('marca')->get();
        return view('modelo.index', compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marcas = Marca::orderby('name')->get();
        return view('modelo.create', compact(['marcas']));
    }   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $modelo = new Modelo();

        if(isset($modelo)){
            $modelo = new Modelo();
            $modelo->name = mb_strtoupper($request->name, 'UTF-8');
            $modelo->marca_id = $request->marca_id;
            $modelo->save();
        
            return redirect()->route('modelo.index');
        }

        return "<h1>Modelo não encontrado!!</h1>";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $modelo = Modelo::with('marca')->find($id);

        if(isset($modelo)){
            return view('modelo.show', compact('modelo'));
        }
        return "<h1>Curso não encontrado!!</h1>";

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modelo = Modelo::find($id);
        $marcas = Marca::orderBy('name')->get();

        if(isset($marca)){
            return view('modelo.edit', compact(['modelo', 'marcas']));
         }
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
        $modelo = Modelo::find($id);
        $marca = Marca::find($request->marca);

        if(isset($marca) && isset($modelo)){
            $modelo->name = mb_strtoupper($request->name, 'UTF-8');
            $modelo->marca()->associate($marca);
            $modelo->save();
        
            return redirect()->route('modelo.index');
        }

        return "<h1>Eixo não encontrado!!</h1>";        
    }   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Modelo::destroy($id)){
            return redirect()->route('modelo.index');
        }
        
       
    }
}
