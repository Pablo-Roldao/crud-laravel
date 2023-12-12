<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/funcionarios', \App\Http\Livewire\Employee\EmployeeIndex::class)->name('employee.index');
    Route::get('/funicionarios/criar', \App\Http\Livewire\Employee\EmployeeCreate::class)->name('employee.create');
    Route::get('/funicionarios/{id}', \App\Http\Livewire\Employee\EmployeeShow::class)->name('employee.show');
    Route::get('/funicionario/{id}/atualizar', \App\Http\Livewire\Employee\EmployeeEdit::class)->name('employee.edit');
});
