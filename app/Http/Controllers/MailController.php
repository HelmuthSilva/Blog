<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestEmail;
use Illuminate\Support\Facades\DB;
use Auth;
use App\User;

class MailController extends Controller
{
    public function enviarEmail(Request $request){
        $destinatario = $request->input('destinatario');
        $assunto = $request->input('assunto');
        $mensagem = $request->input('mensagem');
        $remetente = Auth::user()->email;
        $nome = Auth::user()->name;

        Mail::to($destinatario)->send(new TestEmail($remetente, $nome, $assunto, $destinatario, $mensagem));
        return back()->with('sucesso', 'Mensagem enviada com sucesso!');       
    }
}
