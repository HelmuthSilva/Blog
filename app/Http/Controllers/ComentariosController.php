<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comentarios;
use App\Postagens;
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
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $postagens = Postagens::find($id);
        return view('comentar', compact('postagens'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comentarios = new Comentarios();
        $postagens = Postagens::all();

        $comentarios->texto_comentario = $request->input('comentario');
        $comentarios->nome_usuario=Auth::user()->name;
        $comentarios->postagem = $request->input('postagem');
        $comentarios->save();

        return view('index', compact('postagens'));
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
        $comentario = Comentarios::find($id);
        return view('editarComentario', compact('comentario'));
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
        $postagens = Postagens::all();

        if(isset($comentarios)){
        $comentarios->nome_usuario= $request->input('nome_usuario');
        $comentarios->postagem= $request->input('postagem');
        $comentarios->texto_comentario = $request->input('comentario');
        $comentarios->save();
        }
        return view('/', compact('postagens'))->with('message','Post atualizado com sucesso!');
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
        return redirect('/');
    }
}
