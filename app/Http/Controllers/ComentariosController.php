<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Support\Facades\DB;
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
        if($request->file('imagem')==null){
            $caminho = "";
        }else{
            $caminho = $request->file('imagem')->store('imagens','public');
        }

        $comentarios = new Comentarios();
        $val = $request->input('postagem');
        $postagens = Postagens::find($val);

        $nomeuser = Postagens::select('users.name as nome', 'postagens.nomePost', 'postagens.descricao', 'postagens.created_at', 'postagens.id')
        ->join('users','users.id' , '=', 'postagens.usuario' )
        ->where('postagens.id', '=', $val)
        ->first();

        $comentarios->texto_comentario = $request->input('comentario');
        $comentarios->nome_usuario=Auth::user()->name;
        $comentarios->imagem = $caminho;
        $comentarios->postagem = $request->input('postagem');
        $comentarios->save();

        $comentarios = DB::table('postagens')
        ->join('comentarios','postagens.id','=','comentarios.postagem')
        ->select('comentarios.*')
        ->where('postagens.id','=',$val)
        ->orderBy('comentarios.created_at','desc')
        ->get();

        $quantidadecoment = DB::table('comentarios')
        ->where('comentarios.postagem','=',$val)
        ->count();


        return view('paginaPost')
        ->with('postagens', $postagens)
        ->with('comentarios', $comentarios)
        ->with('nomeuser', $nomeuser)
        ->with('quantidadecoment', $quantidadecoment);
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
        $caminho = $request->file('imagem')->store('imagens','public');

        $comentarios = Comentarios::find($id);
        $val = $request->input('postagem');
        $postagens = Postagens::find($val);
        

        if(isset($comentarios)){
        $comentarios->nome_usuario= $request->input('nome_usuario');
        $comentarios->postagem= $request->input('postagem');
        $comentarios->imagem = $caminho;
        $comentarios->texto_comentario = $request->input('comentario');
        $comentarios->save();
        }
        
        $nomeuser = Postagens::select('users.name as nome', 'postagens.nomePost', 'postagens.descricao', 'postagens.created_at', 'postagens.id')
        ->join('users','users.id' , '=', 'postagens.usuario' )
        ->where('postagens.id', '=', $val)
        ->first();

        $comentarios = DB::table('postagens')
        ->join('comentarios','postagens.id','=','comentarios.postagem')
        ->select('comentarios.*')
        ->where('postagens.id','=',$val)
        ->orderBy('comentarios.created_at','desc')
        ->get();

        $quantidadecoment = DB::table('comentarios')
        ->where('comentarios.postagem','=',$val)
        ->count();


        return view('paginaPost')
        ->with('postagens', $postagens)
        ->with('comentarios', $comentarios)
        ->with('nomeuser', $nomeuser)
        ->with('quantidadecoment', $quantidadecoment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $comentarios = Comentarios::find($id);
        $comentarios->delete();
        return redirect('/');
    }
}
