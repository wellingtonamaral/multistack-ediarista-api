<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Cidade extends Model
{
    use HasFactory;
    /**
     * Define a relação com os diaristas
     */
    public function diaristas()
    {
        return $this->belongsToMany(User::class, 'cidade_diarista');
    }
}
