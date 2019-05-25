<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Postagens;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function index(){
        return view('admin');
    }

    public function publicacoes(){
        $postagens = Postagens::all();
        return view('gerenciarPost', compact('postagens'));
    }

    public function removePost($id)
    {
        $postagens = Postagens::find($id);

        DB::table('comentarios')->where('postagem',$id)->delete();

        if(isset($postagens)){
            $imagem = $postagens->imagem;
            Storage::disk('public')->delete($imagem);
            $postagens->delete();
        }
        return redirect('/admin');
    }

}
