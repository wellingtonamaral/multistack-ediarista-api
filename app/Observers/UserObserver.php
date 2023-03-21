<?php

namespace App\Observers;


use App\Mail\UsuarioCadastrado;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class UserObserver
{

    public function creating(User $user){
        if (User::count() === 0) {
            $user->reputacao = 5;
            return;
        }
        $user->reputacao = User::avg('reputacao');

    }
   public function created(User $user): void
   {
    Mail::to($user->email)->send(new UsuarioCadastrado);
   }
}
