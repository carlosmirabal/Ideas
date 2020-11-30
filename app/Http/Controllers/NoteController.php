<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NoteController extends Controller
{
    public function mostrar() {
        $notas=DB::table('notes')->get();
        return view('mostrar', compact('notas'));
    }

    public function crear(Request $request) {
        $datosForm = $request->except('_token','Submit');
        DB::table('notes')->insertGetId(['tittle'=>$datosForm['title'],'description'=>$datosForm['description']]);
        return redirect('mostrar');
    } 

    public function eliminar($id){
        $nota=DB::table('notes')->where('id','=',$id)->delete();
        return redirect('mostrar');
    }

    public function actualizar($id, Request $request){
        $notas=$request->except('_token', '_method','Enviar');
        // return $notas;
        DB::table('notes')->where('id' ,'=',$id )->update($notas);
        //redirigir a la BBDD
        return redirect('mostrar');
    }

    public function index()
    {
        // return view('mostrar');
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        //
    }
}
