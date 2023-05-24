<?php

use App\Http\Controllers\Diarista\ObtemDiaristasPorCEP;
use App\Http\Controllers\Diarista\VerificaDisponibilidade;
use App\Http\Controllers\Endereco\BuscaApiExterna;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Servico\ObtemServicos;
use App\Http\Controllers\Usuario\CadastroController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usuario\AutenticacaoController;

Route::get('/', IndexController::class);



Route::get('/diaristas/localidades',ObtemDiaristasPorCEP::class)->name('diaristas.busca_por_cep');
Route::get('/diaristas/disponibilidade', VerificaDisponibilidade::class)->name('enderecos.disponibilidade');
Route::get('/enderecos', BuscaApiExterna::class)->name('enderecos.cep');

Route::get('/servicos',ObtemServicos::class)->name('servicos.index');

Route::post('/usuarios',[CadastroController::class,'store'])->name('usuarios.create');


Route::get('/me', [AutenticacaoController::class, 'me'])
->middleware('auth:api')
->name('usuarios.show');


