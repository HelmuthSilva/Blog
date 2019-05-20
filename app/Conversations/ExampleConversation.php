<?php

namespace App\Conversations;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class ExampleConversation extends Conversation
{
    /**
     * First question
     */
    public function askReason()
    {
        $question = Question::create("Em que posso lhe ajudar?")
            ->fallback('Unable to ask question')
            ->callbackId('ask_reason')
            ->addButtons([
                Button::create('Login')->value('login'),
                Button::create('Cadastro')->value('cadastro'),
                Button::create('Sobre o Blog')->value('sobre'),
                Button::create('Contato')->value('contato'),
            ]);

        return $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                if ($answer->getValue() === 'login') {
                    $this->say("Basta clicar no botao Entrar e inserir suas credencias!");
                } if($answer->getValue() === 'cadastro'){
                    $this->say("Basta clicar no botão Cadastrar e inserir Nome, E-mail e Senha(No mínimo 8 caracteres");
                } if($answer->getValue() === 'sobre'){
                    $this->say("Blog feito por Helmuth Ossinaga e João Gabriel");
                }if($answer->getValue() === 'contato'){
                    $this->say("---@gmail.com");
                }
            }
        });
    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->askReason();
    }
}
