<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class Usuario extends JsonResource
{
    public function __construct(
        $resource,
        private string $token = ''
    )
      {
        parent::__construct($resource);
    }
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $formato = [
           "id" => $this->id,
           "nome_completo" => $this->nome_completo,
           "nascimento" => $this->nascimento,
           "cpf" => $this->cpf,
           "email" => $this->email,
           "telefone" => $this->telefone,
           "reputacao" => $this->reputacao,
           "tipo_usuario" => $this->tipo_usuario,
           "foto_usuario" => $this->foto_usuario,
           

        ];
    
    if ($this->token !== '') {
        return $formato + [
            "token" => [
                "access" => $this->token,
                "refresh" => $this->token,
                "token_type" => "bearer",
                "expires_in" => Auth::factory()->getTTL() * 60
           ]
            ];
        }
        return $formato;
    }
}

