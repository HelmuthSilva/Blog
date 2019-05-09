<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comentarios;
use Auth;

class ComentariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('comentar', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $comentarios = new Comentarios();
        $comentarios->texto_comentario = $request->input('comentario');
        $comentarios->nome_usuario=Auth::user()->name;
        $comentarios->postagem = $id;
        $comentarios->save();

        return view('index')->with('message','Comentário feito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comentarios = Comentarios::find($id);
        return view('', ['comentario => $comentarios']);
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
        $comentarios = Comentarios::find($id);

        if(isset($comentarios)){
        $comentarios->nome_usuario= $request->input('nome_usuario');
        $comentarios->postagem= $request->input('postagem');
        $comentarios->texto_comentario = $request->input('comentario');
        $comentarios->save();
        }
        return view('')->with('message','Post atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comentarios = Comentarios::find($id);
        $comentarios->delete();
        return redirect('');
    }
}
