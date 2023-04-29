<?php

namespace App\Http\Controllers;

use App\Models\Etiqueta;
use App\Models\Nota;
use App\Models\Nota_Etiqueta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class EtiquetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags['tags']=Etiqueta::all();
        return view('crudEtiqueta.viewList',$tags);
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
        $tag= request()->except('_token');
        Etiqueta::insert($tag);

        return back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etiqueta  $etiqueta
     * @return \Illuminate\Http\Response
     */
    public function show(Etiqueta $etiqueta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etiqueta  $etiqueta
     * @return \Illuminate\Http\Response
     */
    public function edit(Etiqueta $etiqueta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Etiqueta  $etiqueta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $etiqueta)
    {
        $tags= request()->except(['_token','_method']);
        Etiqueta::where('id','=',$id)->update($tags);

        return redirect('/Tags');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etiqueta  $etiqueta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etiqueta $id)
    {
        Etiqueta::destroy($id);
        return redirect('/Tags');
    }

    public function viewCreate(){
        return view('crudEtiqueta.viewCreate');
    }

    public function viewEdit(){
        return view('crudEtiqueta.viewEdit');
    }

    public function viewTags($id){

        //$notas=DB::table('notas')->orderByDesc('id')->where('etiqueta_id',$id)->get();
        $ets_nts=DB::table('etiqueta_nota')->get();
        $et=DB::table('etiquetas')->get();

        $notas = DB::table('etiqueta_nota')
            ->join('notas', 'notas.id', '=', 'etiqueta_nota.nota_id')
            ->where('etiqueta_nota.etiqueta_id','=',$id)
            ->select('notas.*')
            ->get();
        
        return view('crudEtiqueta.viewNE',['notas' => $notas,'et' => $et,'ets_nts' => $ets_nts]);
    }
    
}
