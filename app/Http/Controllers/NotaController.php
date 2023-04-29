<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use App\Models\Etiqueta;
use App\Models\Nota_Etiqueta;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
//use PDF;
//use SPDF;
//use Barryvdh\Snappy\Facades\SnappyPdf;
//use SnappyImage;
use Dompdf\Dompdf;
use Dompdf\Options;



use Illuminate\Http\Request;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        $notas['notas']=DB::table('notas')->select('*')->orderByDesc('id')->get();
        $tags['tags']=Etiqueta::all();
        $notas['tags']=Nota::all();
        return view('crud.viewList',$notas,$tags);
        */
    
        $ets_nts=DB::table('etiqueta_nota')->get();
        $et=DB::table('etiquetas')->get();
        $notas = DB::table('notas')->orderByDesc('id')->get();
        //return view('crud.viewList',['notas' => $notas,'et' => $et,'ets_nts' => $ets_nts]);
        return view('crud.viewList',['notas' => $notas,'et' => $et,'ets_nts' => $ets_nts]);
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
       // $nota= request()->all();
        $nota=request()->except('_token','etiqueta_id');
        $etiqueta_id=$request->input('etiqueta_id');

        if($request->hasFile('image')){
            $nota['image']=$request->file('image')->store('uploads','public');
        }

        Nota::insert($nota);
        $nota_id=DB::table('notas')->select('id')->orderByDesc('id')->limit(1)->get();
        $n;
        
        foreach($nota_id as $nID){
            $n=$nID->id;
        }
        $union = Nota::find($n);
        $union->tags()->attach($etiqueta_id);
        //print_r($n);

        return redirect('/Nota');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function show(Nota $nota)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //viewEdit();
        $nota=Nota::findOrFail($id);
        $tags['tags']=Etiqueta::all();
        $et=Etiqueta::findOrFail($id);
        return view('crud.viewEdit',compact('nota','et'),$tags);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $title=$request->input('title');
        $content=$request->input('content');
        $image=$request->input('image');        
      //  $tag = input('etiqueta_id');
      
        if($request->hasFile('image')){
            $image=$request->file('image')->store('uploads','public');
        }
       // $union = Nota::find($id);
        //$union->tags()->attach($etiqueta_id);

        DB::table('notas')->where('id',$id)->update(['title'=>$title,'content'=>$content,'image'=>$image]);
        return redirect('/Nota');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Nota::destroy($id);
        return redirect('/Nota');
    }

    public function viewCreate(){
        $tags['tags']=Etiqueta::all();
        return view('crud.viewCreate',$tags);
    }

    public function viewEdit(){
        return view('crud.viewEdit');
    }
    
    public function viewAddTags($id){
        
        //$notas=Nota::findOrFail($id);
        $nota = DB::table('notas')->where('id','=',$id)->get();
        $nID=$id;
        $tags['tags']=Etiqueta::all();
        return view('crudEtiqueta.viewAddTags',compact('nota'),$tags,$nID);
    }

    public function join(Request $request)
    {
        $nota_id=$request->input('nota_id');
        $etiqueta_id=$request->input('etiqueta_id');
        //print_r($nota_id);
        //print_r($etiqueta_id);      
        $union = Nota::find($nota_id);
        $union->tags()->attach($etiqueta_id);  
        return back()->withInput();
    
    }
    public function deljoin(Request $request)
    {
        $nota_id=$request->input('nota_id');
        $etiqueta_id=$request->input('etiqueta_id');
        // print_r($nota_id);
        //print_r($etiqueta_id);      
        $union = Nota::find($nota_id);
        $union->tags()->detach($etiqueta_id);  
        return back()->withInput();
    
    }

    public function printPDF($id){
        $notas=DB::table('notas')->where('id','=',$id)->get();
        $ets_nts=DB::table('etiqueta_nota')->get();
        $et=DB::table('etiquetas')->get();

        $image=DB::table('notas')->select('image')->where('id','=',$id)->get();
        $img;
        foreach ($image as $i){
            $img =  $i->image;
        }
       // print_r($img);
        
        $path=base_path('public/storage/'.$img);
        $type=pathinfo($path,PATHINFO_EXTENSION);
        $data=file_get_contents($path);
        $pic='data/image/'. $type .';base64,' .base64_encode($data);
        $dompdf=Pdf::loadView('pdf.component_pdf',compact('pic','notas','et','ets_nts'))->setOptions(['defaultFont' => 'sans-serif']);

        //$dompdf->loadHtml('hello world');
        // (Optional) Setup the paper size and orientation
       // $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        //$dompdf->render();
      //  return $dompdf->stream();

        //$options = new Options();
        //$options->set('isRemoteEnabled',TRUE);
        //$pdf = new PDF($options);
        //$pdf = PDF::loadView('pdf.component_pdf', ['notas' => $notas,'et' => $et,'ets_nts' => $ets_nts],compact('pic'));
        return $dompdf->stream('Nota-'.date('Ymd').'.pdf');
        
    }

    public function print($id){
        $notas=DB::table('notas')->where('id','=',$id)->get();
        $ets_nts=DB::table('etiqueta_nota')->get();
        $et=DB::table('etiquetas')->get();

        $image=DB::table('notas')->select('image')->where('id','=',$id)->get();
        $img;
        foreach ($image as $i){
            $img =  $i->image;
        }
       // print_r($img);
        $path=base_path('public/storage/'.$img);
        $type=pathinfo($path,PATHINFO_EXTENSION);
        $data=file_get_contents($path);
        $pic='data/image/'. $type .';base64,' .base64_encode($data);
        $options = new Options();
        $options->set('chroot',realpath(''));
        $dompdf=new Dompdf($options);
        $dompdf->loadHtml('');

            // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        //$options->set('isRemoteEnabled',TRUE);
        //$pdf = new PDF($options);
        //$pdf = SPDF::loadView('pdf.component_pdf',compact('pic','notas','et','ets_nts'));
       // $pdf = App::make('snappy.pdf.wrapper');
      //  $pdf->loadHTML('<h1>Test</h1>');
        //return $pdf->inline();
        return $dompdf->stream('Nota-'.date('Ymd').'.pdf',array('Attachment'=> false));
        
      }
}
