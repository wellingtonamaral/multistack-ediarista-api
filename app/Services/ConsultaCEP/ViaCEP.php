<?php

namespace App\Services\ConsultaCEP;
use Illuminate\Support\Facades\Http;

class ViaCEP
{

    public function buscar(string $cep): false | EnderecoResponse
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
       return $this->populaEnderecoResponse($dados);
    }
    /**
     * Formata a saída para endereço response
     */
    private function populaEnderecoResponse(array $dados): EnderecoResponse
    {
        return new EnderecoResponse(
            cep: $dados['cep'],
            logradouro: $dados['logradouro'],
            complemento: $dados['complemento'],
            bairro: $dados['bairro'],
            localidade: $dados['localidade'],
            uf: $dados['uf'],
            ibge: $dados['ibge'],
         );
    }
}
