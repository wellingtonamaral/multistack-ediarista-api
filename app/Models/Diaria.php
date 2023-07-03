<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Diaria extends Model
{
    use HasFactory;
    /**
     * Campos bloqueados na definição dados em masssa
     */
    protected $guarded = ['motivo_cancelamento', 'created_at', 'updated_at'];


    /**
     * Define a relação com serviço
     */
    public function servico(): BelongsTo{
        return $this->belongsTo(Servico::class);
    }
    /**
     *Define a relação com cliente 
     *
    */
    public function cliente(): BelongsTo{
        return $this->belongsTo(User::class,'cliente_id');
    }
}
