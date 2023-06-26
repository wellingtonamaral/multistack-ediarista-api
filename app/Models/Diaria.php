<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diaria extends Model
{
    use HasFactory;
    /**
     * Campos bloqueados na definição dados em masssa
     */
    protected $guarded = ['motivo_cancelamento', 'created_at', 'updated_at'];
}
