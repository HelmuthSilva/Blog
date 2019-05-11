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

        $caminho = $request->file('imagem')->store('imagens','public');

        $postagens->nomePost = $request->input('titulo');
        $postagens->texto = $request->input('texto');
        $postagens->descricao = $request->input('descricao');
        $postagens->usuario = Auth::id();
        $postagens->imagem = $caminho;
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

        $nomeuser = Postagens::select('users.name as nome', 'postagens.nomePost', 'postagens.descricao', 'postagens.created_at', 'postagens.id')
        ->join('users','users.id' , '=', 'postagens.usuario' )
        ->where('postagens.id', '=', $id)
        ->first();
        return view('paginaPost',compact('postagens','comentarios', 'nomeuser'));
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
        $comentarios = DB::table('postagens')
        ->join('comentarios','postagens.id','=','comentarios.postagem')
        ->select('comentarios.*')
        ->where('postagens.id','=',$id)
        ->get();

        $caminho = $request->file('imagem')->store('imagens','public');

        if(isset($postagens)){
        $postagens->nomePost = $request->input('titulo');
        $postagens->usuario = Auth::id();
        $postagens->texto = $request->input('texto');
        $postagens->descricao = $request->input('descricao');
        $postagens->imagem = $caminho;
        $postagens->save();
        }
        return view('paginaPost',compact('postagens','comentarios'));
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
            $imagem = $postagens->imagem;
            Storage::disk('public')->delete($imagem);
            $postagens->delete();
        }
        return redirect('/');
    }
}
