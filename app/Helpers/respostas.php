<?php

use Illuminate\Http\JsonResponse;

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

