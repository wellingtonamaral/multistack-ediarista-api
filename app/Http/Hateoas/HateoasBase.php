<?php

namespace App\Http\Hateoas;

class HateoasBase
{
    protected array $links = [];

    protected function adicionaLink(
    string $metodo,
    string $descricao,
    string $nomeRota,
    array $parametrosRota = [])
    {
        $this->links[] = [
            "type" => $metodo,
            "rel" => $descricao,
            "uri" => route($nomeRota, $parametrosRota)
        ];
    }
}
