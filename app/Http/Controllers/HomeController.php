<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $ets_nts=DB::table('etiqueta_nota')->get();
        $et=DB::table('etiquetas')->get();
        $notas= DB::table('notas')->orderByDesc('id')->get();
        return view('home',compact('notas','et','ets_nts'));
        //return view('home',['notas' => $notas,'et' => $et,'ets_nts' => $ets_nts]);
   
    }
}
