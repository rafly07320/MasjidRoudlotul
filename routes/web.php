<?php

use App\Http\Controllers\Admin\ArtikelController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KasMasjidController;
use App\Http\Controllers\Admin\KegiatanController;
use App\Http\Controllers\Admin\PetugasJumatController;
use App\Http\Controllers\Admin\ShodaqohController;
use App\Http\Controllers\Admin\ZakatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\SitemapGenerator;


use function Pest\Laravel\post;

Route::middleware('web')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home.index');
    Route::get('/artikel', [HomeController::class, 'getArtikel'])->name('home.artikel');
    Route::get('/kegiatan', [HomeController::class, 'getKegiatan'])->name('home.kegiatan');
    Route::get('/shodaqoh', [HomeController::class, 'getShodaqoh'])->name('home.shodaqoh');
    Route::post('/shodaqoh', [HomeController::class, 'storeShodaqoh'])->name('home.shodaqoh.store');
    Route::get('/kontak', [HomeController::class, 'getKontak'])->name('home.kontak');
});

Route::get('/generate-sitemap', function () {
    SitemapGenerator::create(config('app.url'))->writeToFile(public_path('sitemap.xml'));
    return 'Sitemap berhasil dibuat!';
});



Route::get('/admin-dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/admin-artikel', [ArtikelController::class, 'index'])->name('artikel.index');
    //artikel
    Route::post('/admin-artikel', [ArtikelController::class, 'store'])->name('artikel.store');
    Route::put('/admin-artikel/{id}', [ArtikelController::class, 'update'])->name('artikel.update');
    Route::delete('/admin-artikel/{id}', [ArtikelController::class, 'destroy'])->name('artikel.destroy');
    //kegiatan
    Route::get('/admin-kegiatan', [KegiatanController::class, 'index'])->name('kegiatan.index');
    Route::post('/admin-kegiatan', [KegiatanController::class, 'store'])->name('kegiatan.store');
    Route::put('/admin-kegiatan/{id}', [KegiatanController::class, 'update'])->name('kegiatan.update');
    Route::delete('/admin-kegiatan/{id}', [KegiatanController::class, 'destroy'])->name('kegiatan.destroy');
    //PetugasJumat
    Route::get('/admin-petugas-jumat', [PetugasJumatController::class, 'index'])->name('jumat.index');
    Route::post('/admin-petugas-jumat', [PetugasJumatController::class, 'store'])->name('jumat.store');
    Route::put('/admin-petugas-jumat/{id}', [PetugasJumatController::class, 'update'])->name('jumat.update');
    Route::delete('/admin-petugas-jumat/{id}', [PetugasJumatController::class, 'destroy'])->name('jumat.destroy');
    //kas_masjid
    Route::get('/admin-kas-masjid', [KasMasjidController::class, 'index'])->name('kas.index');
    Route::post('/admin-kas-masjid', [KasMasjidController::class, 'store'])->name('kas.store');
    Route::put('/admin-kas-masjid/{id}', [KasMasjidController::class, 'update'])->name('kas.update');
    Route::delete('/admin-kas-masjid/{id}', [KasMasjidController::class, 'destroy'])->name('kas.destroy');
    //shodaqoh
    Route::get('/admin-shodaqoh', [ShodaqohController::class, 'index'])->name('shodaqoh.index');
    Route::post('/admin-shodaqoh', [ShodaqohController::class, 'store'])->name('shodaqoh.store');
    //zakat
    Route::get('/admin-zakat', [ZakatController::class, 'index'])->name('zakat.index');
    Route::post('/admin-zakat', [ZakatController::class, 'store'])->name('zakat.store');
    Route::put('/admin-zakat/{id}', [ZakatController::class, 'update'])->name('zakat.update');
    Route::delete('/admin-zakat/{id}', [ZakatController::class, 'destroy'])->name('zakat.destroy');
});

//artikel
Route::get('/artikel/{judul_artikel}', [ArtikelController::class, 'show'])->name('artikel.show');
//kegiatan
Route::get('/kegiatan/{judul_kegiatan}', [KegiatanController::class, 'show'])->name('kegiatan.show');


require __DIR__ . '/auth.php';
