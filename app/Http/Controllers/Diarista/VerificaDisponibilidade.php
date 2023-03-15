<?php

namespace App\Http\Controllers\Diarista;

use App\Http\Controllers\Controller;
use App\Services\ConsultaCEP\ConsultaCEPInterface;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class VerificaDisponibilidade extends Controller
{
    public function __construct(
        private ConsultaCEPInterface $consultaCep
    )

    {}
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'cep' => ['required','numeric']
        ]);
        $dadosEndereco = $this->consultaCep->buscar($request->cep);
        if($dadosEndereco === false){
            throw ValidationException::withMessages(['cep' => 'Cep não encontrado']);
        }
            return (array) $dadosEndereco;
    }
}
