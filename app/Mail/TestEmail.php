<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TestEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $remetente;
    public $nome;
    public $destinatario;
    public $data;

    public function __construct($remetente, $nome, $assunto, $destinatario, $data)
    {
        $this->remetente = $remetente;
        $this->nome = $nome;
        $this->assunto = $assunto;
        $this->destinatario = $destinatario;
        $this->data = $data;
    }

    public function build()
    {
        //$address = 'gabriel.jg04@gmail.com';
        $subject = 'E-mail de Usuário';
        $name = 'Juelito';
        
        return $this->view('emails.test',['texto'=>$this->data])
                    ->from($this->remetente, $this->nome)
                    ->replyTo($this->destinatario, $name)
                    ->subject($this->assunto);           
    }
}