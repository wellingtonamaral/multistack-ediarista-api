<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;

trait ApiHandler
{
    protected function getJsonException(\Throwable $e): JsonResponse
    {
       
        if ($e instanceof ValidationException) {
            return $this->validationException($e);
        }
        if ($e instanceof AuthenticationException) {
            return $this->authenticationException($e);
        }
        if ($e instanceof TokenBlacklistedException) {
            return $this->authenticationException($e);
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
    
    protected function authenticationException(AuthenticationException|TokenBlacklistedException $e): JsonResponse
    {
        return resposta_padrao($e->getMessage(), 'token_not_valid','401');
    }
}