<?php

namespace App\Services\ConsultaCEP;
use Illuminate\Support\Facades\Http;

class ViaCEP
{

    public function buscar(string $cep)
    {
        /**
         * Buscar o endereço utilizando a api do viaCEP
         */
         $resposta = Http::get("https://viacep.com.br/ws/$cep/json/");

        if ($resposta->failed()) {
            return false;
        }
         $dados =  $resposta->json();
         
         if (isset($dados['erro'])&& $dados['erro'] === true) {
            return false;
         }
         return $dados;
    }
}
