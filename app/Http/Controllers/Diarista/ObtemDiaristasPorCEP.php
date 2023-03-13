<?php

namespace App\Http\Controllers\Diarista;

use App\Http\Controllers\Controller;
use App\Http\Resources\DiaristaPublicoCollection;
use App\Models\User;
use App\Services\ConsultaCEP\ConsultaCEPInterface;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class ObtemDiaristasPorCEP extends Controller
{

    public function __invoke(Request $request, ConsultaCEPInterface $servicoCEP): DiaristaPublicoCollection|JsonResponse
    {

        $request->validate([
            'cep' => ['required','numeric']
        ]);
        $dados = $servicoCEP->buscar($request->cep);

        if ($dados === false) {
            throw ValidationException::withMessages(['cep'=> 'Cep não encontrado']);
        }

        return  new DiaristaPublicoCollection(
            User::diaristaDisponivelCidade($dados->ibge),
            User::diaristaDisponivelCidadeTotal($dados->ibge)

        );
    }
}
