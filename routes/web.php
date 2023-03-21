<?php

use App\Http\Controllers\Controller;
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

App\Jobs\SendWarnToUser::dispatch();
Route::get('/', [Controller::class, 'index'])->name('index');
Route::get('/tambah', [Controller::class, 'create'])->name('tambah_file');
Route::get('/tambah/edit/{id}', [Controller::class, 'edit'])->name('edit_file');
Route::post('/tambah/kirim', [Controller::class, 'store'])->name('kirim_file');
Route::put('/tambah/update/{id}', [Controller::class, 'update'])->name('update_file');
Route::delete('/tambah/delete/{id}', [Controller::class, 'destroy'])->name('delete_file');
Route::get('/cari', [Controller::class, 'cari'])->name('cari_data');
Route::get('/filter', [Controller::class, 'filter'])->name('filter_data');
