<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Municipio;
use App\Departamento;

class MunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $municipios = DB::table('tb_municipio as m')
                    ->join('tb_departamento as d','m.depa_codi','=','d.depa_codi')
                    ->select('m.muni_codi','m.muni_nomb','m.depa_codi','d.depa_nomb')
                    ->paginate(10);
        return view('municipio.index', compact('municipios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departamentos = Departamento::orderBy('depa_nomb')->get();
        return view('municipio.create',compact('departamentos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $municipios = new Municipio;
        $municipios->muni_nomb = $request->muni_nomb;
        $municipios->depa_codi = $request->depa_codi;
        $municipios->save();
        return redirect()->route('municipio.index')->with('status','guardado');
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
        $municipio = Municipio::findOrFail($id);
        $departamentos = Departamento::orderBy('depa_nomb')->get();
        return view('municipio.edit', compact('municipio','departamentos'));
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
        $municipios = Municipio::findOrFail($id);
        $municipios->fill($request->all());
        $municipios->save();
        return redirect()->route('municipio.index')->with('status','actualizado');
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
