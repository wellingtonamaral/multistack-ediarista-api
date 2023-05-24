<?php

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

if(!function_exists('resposta_padrao')){
    function resposta_padrao(
        string $message,
        string $code,
        int $statuscode,
        array $adicionais = []

        ):JsonResponse
        {
        return response()->json([
            "status" => $statuscode,
            "code" => $code,
            "message" => $message
        ] + $adicionais, $statuscode);
    }

}
if(!function_exists('resposta_token'))
{
    function resposta_token(string $token): JsonResponse
{
    return response()->json([
        'access' => $token,
        'refresh' => $token,
        'token_type' => 'bearer',
        'expires_in' => Auth::factory()->getTTL() * 60
    ]);
}
}

