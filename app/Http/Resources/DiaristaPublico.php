<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DiaristaPublico extends JsonResource
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
            'nome_completo' => $this->nome_completo,
            'reputucao' => $this->reputacao,
            'foto_usuario'=> $this->foto_usuario,
            'Disponibilidade' => "Disponível"
        ];
    }
}
