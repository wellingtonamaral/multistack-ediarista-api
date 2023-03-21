<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Usuario extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
           "id" => $this->id,
           "nome_completo" => $this->nome_completo,
           "nascimento" => $this->nascimento,
           "cpf" => $this->cpf,
           "email" => $this->email,
           "telefone" => $this->telefone,
           "reputacao" => $this->reputacao,
           "tipo_usuario" => $this->tipo_usuario,
           "foto_usuario" => $this->foto_usuario

        ];
    }
}
