<?php

use App\Http\Controllers\Diarista\ObtemDiaristasPorCEP;
use App\Http\Controllers\Diarista\VerificaDisponibilidade;
use App\Http\Controllers\Endereco\BuscaApiExterna;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', IndexController::class);

Route::get('/diaristas/localidades',ObtemDiaristasPorCEP::class)->name('diaristas.busca_por_cep');
Route::get('/diaristas/disponibilidade', VerificaDisponibilidade::class)->name('enderecos.disponibilidade');
Route::get('/enderecos', BuscaApiExterna::class)->name('enderecos.cep');

//Route::get('/servicos',ObtermServicos::class)->name('servicos.index');
