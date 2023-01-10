<?php

namespace App\Http\Controllers\Diarista;

use App\Http\Controllers\Controller;
use App\Http\Resources\DiaristaPublico;
use App\Http\Resources\DiaristaPublicoCollection;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ObtemDiaristasPorCEP extends Controller
{

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        $cep =  $request->cep;
        //transformar o cep no código do IBGE
        $resposta = Http::get("https://viacep.com.br/ws/$cep/json/");

        $dados = $resposta->json();

            return  new DiaristaPublicoCollection(
        User::diaristaDisponivelCidade($dados['ibge']),
        User::diaristaDisponivelCidadeTotal($dados['ibge'])

    );
    }
}
