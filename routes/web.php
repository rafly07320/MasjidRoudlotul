<?php

use App\Http\Controllers\Admin\ArtikelController;
use App\Http\Controllers\Admin\KegiatanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/artikel', [HomeController::class, 'getArtikel'])->name('home.artikel');
Route::get('/kegiatan', [HomeController::class, 'getKegiatan'])->name('home.kegiatan');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//artikel
Route::get('/admin-artikel', [ArtikelController::class, 'index'])->name('artikel.index');
Route::post('/admin-artikel', [ArtikelController::class, 'store'])->name('artikel.store');
Route::put('/admin-artikel/{id}', [ArtikelController::class, 'update'])->name('artikel.update');
Route::delete('/admin-artikel/{id}', [ArtikelController::class, 'destroy'])->name('artikel.destroy');
Route::get('/artikel/{judul_artikel}', [ArtikelController::class, 'show'])->name('artikel.show');
//kegiatan
Route::get('/kegiatan/{judul_kegiatan}', [KegiatanController::class, 'show'])->name('kegiatan.show');
Route::get('/admin-kegiatan', [KegiatanController::class, 'index'])->name('kegiatan.index');
Route::post('/admin-kegiatan', [KegiatanController::class, 'store'])->name('kegiatan.store');
Route::put('/admin-kegiatan/{id}', [KegiatanController::class, 'update'])->name('kegiatan.update');
Route::delete('/admin-kegiatan/{id}', [KegiatanController::class, 'destroy'])->name('kegiatan.destroy');

require __DIR__ . '/auth.php';
