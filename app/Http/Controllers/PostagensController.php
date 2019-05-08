<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Postagens;
use App\User;

class PostagensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $id = Auth::user()->email;
        $postagens = DB::table('postagens')->where('usuario', '$id')->get();
        return view ('postUsuario',['postagem'=> $postagens]);
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

        $postagens->nomePost = $request->input('nome_postagem');
        $postagens->texto = $request->input('texto_post');
        $postagens->descricao = $request->input('descricao_post');
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
    public function show(Postagens $postagens)
    {
        return view('',compact('postagens',$postagens));
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
        return view('editarPost', ['postagem'=> $postagens]);
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
