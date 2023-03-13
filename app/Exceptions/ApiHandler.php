<?php

namespace App\Exceptions;

use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

trait ApiHandler
{
    protected function getJsonException(\Throwable $e): JsonResponse
    {
        if ($e instanceof ValidationException) {
            return $this->validationException($e);
        }
        return $this->genericException($e);
    }
    protected function validationException(validationException $e): JsonResponse
    {
        return resposta_padrao("Erro de validação dos dados enviados","validation_erro",400, $e->errors());

    }
    protected function genericException(\Throwable $e): JsonResponse
    {
        return resposta_padrao("erro interno no servidor","internal_erro", 500);

    }
}
