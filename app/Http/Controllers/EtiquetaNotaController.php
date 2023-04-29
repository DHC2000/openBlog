<?php

namespace App\Http\Controllers;

use App\Models\EtiquetaNota;
use Illuminate\Http\Request;

class EtiquetaNotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
            
        $ets_nts=DB::table('etiqueta_nota')->get();
        $et=DB::table('etiquetas')->get();
        $notas = DB::table('notas')->orderByDesc('id')->get();
        return view('crudEtiqueta.viewList',['notas' => $notas,'et' => $et,'ets_nts' => $ets_nts]);
   
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
        $etiqueta=request()->except('_token','');
        Etiqueta::insert($etiqueta);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EtiquetaNota  $etiquetaNota
     * @return \Illuminate\Http\Response
     */
    public function show(EtiquetaNota $etiquetaNota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EtiquetaNota  $etiquetaNota
     * @return \Illuminate\Http\Response
     */
    public function edit(EtiquetaNota $etiquetaNota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EtiquetaNota  $etiquetaNota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EtiquetaNota $etiquetaNota)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EtiquetaNota  $etiquetaNota
     * @return \Illuminate\Http\Response
     */
    public function destroy(EtiquetaNota $etiquetaNota)
    {
        //
    }
}
