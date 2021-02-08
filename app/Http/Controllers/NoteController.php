<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NoteController extends Controller
{
    public function inicio() {
        return view("mostrar");
    }
    public function mostrar(Request $request) {
        $filtro = $request->input('filtro');
        if ($filtro == "") {
            $notas=DB::select('SELECT * FROM notes');
        }else {
            $notas=DB::select('SELECT * FROM notes WHERE tittle LIKE ?', ["%".$filtro."%"]);
        }
        return response()->json($notas, 200);
    }

    public function crear(Request $request) {
        try {
            DB::insert('INSERT INTO notes(tittle,`description`) VALUES(?,?)', [$request->input('title'), $request->input('desc')]);
            return response()->json(array('resultado'=>'OK'), 200);
        } catch (\Throwable $th) {
            return response()->json(array('resultado'=>'NOK'.$th->getMessage()), 200);
        }
    } 

    public function eliminar($id){
        $nota=DB::table('notes')->where('id','=',$id)->delete();
        return redirect('mostrar');
    }

    public function notasContent(Request $request){
        try {
            $qry=DB::select('SELECT * FROM notes WHERE id=?', [$request->input('id')]);
            return response()->json($qry, 200);
        } catch (\Throwable $th) {
            return response()->json(array('resultado'=>'NOK'.$th->getMessage()), 200);
        }
    }

    public function updateNotas(Request $request){
        try {
            DB::update('UPDATE notes set tittle=?, `description`=? WHERE id=?', [$request->input('title'),$request->input('desc'),$request->input('id')]);
            //redirigir a la BBDD
            return response()->json(array('resultado'=>'OK'), 200);
        } catch (\Throwable $th) {
            return response()->json(array('resultado'=>'NOK'.$th->getMessage()), 200);
            //throw $th;
        }
    }
    public function notasDelete(Request $request){
        try {
            DB::delete('DELETE FROM notes WHERE id=?', [$request->input('id'),$request->input('id')]);
            //redirigir a la BBDD
            return response()->json(array('resultado'=>'OK'), 200);
        } catch (\Throwable $th) {
            return response()->json(array('resultado'=>'NOK'.$th->getMessage()), 200);
            //throw $th;
        }
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
