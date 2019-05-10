<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Postagens;
use App\Comentarios;
use App\User;

class PostagensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function exibirTodas(){
        $postagens = Postagens::all();
        return view('index', compact('postagens'));
    }

    public function index()
    {
        //$id = Auth::id();
        //$postagens = DB::table('postagens')->where('usuario','=', '$id')->get();
        $postagens = Postagens::all();
        return view ('postUsuario',compact('postagens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $postagens = new Postagens();

        $postagens->nomePost = $request->input('titulo');
        $postagens->texto = $request->input('texto');
        $postagens->descricao = $request->input('descricao');
        $postagens->usuario = Auth::id();
        $postagens->imagem = Storage::putFile('iPostagens', $request->file('imagem'));
        $postagens->save();

        return redirect('/')->with('message', 'Post criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Postagens $postagem
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $postagens = Postagens::find($id);
        $comentarios = DB::table('postagens')
        ->join('comentarios','postagens.id','=','comentarios.postagem')
        ->select('comentarios.*')
        ->where('postagens.id','=',$id)
        ->get();
        return view('paginaPost',compact('postagens','comentarios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $postagens = Postagens::find($id);
        return view('editarPublicacao', ['postagem'=> $postagens]);
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
        $postagens = Postagens::find($id);

        if(isset($postagens)){
        $postagens->nomePost = $request->input('nome_postagem');
        $postagens->texto = $request->input('texto_post');
        $postagens->descricao = $request->input('descricao_post');
        $postagens->imagem = Storage::putFile('iPostagens', $request->file('imagem'));
        $postagens->save();
        }
        return view('postUsuario')->with('message','Post atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $postagens = Postagens::find($id);

        DB::table('comentarios')->where('postagem',$id)->delete();

        if(isset($postagens)){
            $postagens->delete();
        }
        return redirect('/');
    }
}
