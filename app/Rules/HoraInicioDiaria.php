<?php

namespace App\Rules;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class HoraInicioDiaria implements Rule
{
   
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $hora = Carbon::parse($value)->hour;
        
        return $hora >= 6;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'A hora de inicio deve ser maior ou igual a 06:00';
    }
}
