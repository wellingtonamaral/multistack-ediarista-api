<?php

namespace App\Http\Controllers\Endereco;

use App\Http\Controllers\Controller;
use App\Http\Requests\CepRequest;
use App\Services\ConsultaCEP\ConsultaCEPInterface;
use Illuminate\Validation\ValidationException;

class BuscaApiExterna extends Controller
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
    public function __invoke(CepRequest $request):array
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
