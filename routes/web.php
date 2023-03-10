<?php

use Illuminate\Support\Facades\Auth;
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
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('user', [App\Http\Controllers\usercontroller::class, 'index'])->middleware(['CheckLevel:administrator'])->name('user.index');
Route::get('user/create', [App\Http\Controllers\usercontroller::class, 'create'])->middleware(['CheckLevel:administrator'])->name('user.create');
Route::post('user/store', [App\Http\Controllers\usercontroller::class, 'store'])->middleware(['CheckLevel:administrator'])->name('user.store');
Route::get('user/edit/{id}', [App\Http\Controllers\usercontroller::class, 'edit'])->middleware(['CheckLevel:administrator'])->name('user.edit');
Route::put('user/update/{id}', [App\Http\Controllers\usercontroller::class, 'update'])->middleware(['CheckLevel:administrator'])->name('user.update');
Route::get('user/show/{id}', [App\Http\Controllers\usercontroller::class, 'show'])->middleware(['CheckLevel:administrator'])->name('user.show');
Route::delete('user/delete/{id}', [App\Http\Controllers\usercontroller::class, 'destroy'])->middleware(['CheckLevel:administrator'])->name('user.delete');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('Masyarakat', [App\Http\Controllers\Masyarakatcontroller::class, 'index'])->middleware(['CheckLevel:administrator'])->name('Masyarakat.index');
Route::get('Masyarakat/create', [App\Http\Controllers\Masyarakatcontroller::class, 'create'])->middleware(['CheckLevel:administrator'])->name('Masyarakat.create');
Route::post('Masyarakat/store', [App\Http\Controllers\Masyarakatcontroller::class, 'store'])->middleware(['CheckLevel:administrator'])->name('Masyarakat.store');
Route::get('Masyarakat/edit/{id}', [App\Http\Controllers\Masyarakatcontroller::class, 'edit'])->middleware(['CheckLevel:administrator'])->name('Masyarakat.edit');
Route::put('Masyarakat/update/{id}', [App\Http\Controllers\Masyarakatcontroller::class, 'update'])->middleware(['CheckLevel:administrator'])->name('Masyarakat.update');
Route::get('Masyarakat/show/{id}', [App\Http\Controllers\Masyarakatcontroller::class, 'show'])->middleware(['CheckLevel:administrator'])->name('Masyarakat.show');
Route::delete('Masyarakat/delete/{id}', [App\Http\Controllers\Masyarakatcontroller::class, 'destroy'])->middleware(['CheckLevel:administrator'])->name('Masyarakat.delete');


Route::get('pengaduan', [App\Http\Controllers\PengaduanController::class, 'index'])->middleware(['auth'])->name('pengaduan.index');
Route::get('pengaduan/create', [App\Http\Controllers\PengaduanController::class, 'create'])->middleware(['auth'])->name('pengaduan.create');
Route::post('pengaduan/store', [App\Http\Controllers\PengaduanController::class, 'store'])->middleware(['auth'])->name('pengaduan.store');
Route::get('pengaduan/edit/{id}', [App\Http\Controllers\PengaduanController::class, 'edit'])->middleware(['CheckLevel:admin'])->name('user.edit');
Route::put('pengaduan/update/{id}', [App\Http\Controllers\PengaduanController::class, 'update'])->middleware(['CheckLevel:admin'])->name('user.update');
Route::get('pengaduan/show/{id}', [App\Http\Controllers\PengaduanController::class, 'show'])->middleware(['CheckLevel:admin'])->name('user.show');
Route::delete('pengaduan/delete/{id}', [App\Http\Controllers\PengaduanController::class, 'destroy'])->middleware(['CheckLevel:admin'])->name('pengaduan.delete');