<?php

use App\Models\Pimpinanjurusan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\ThnakdController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TahunAkdController;
use App\Http\Controllers\KurikulumController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\PimpinanprodiController;
use App\Http\Controllers\PimpinanjurusanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/pengurus', function () {
    return view('pengurus');
});


Route::get('/matakuliah', function () {
    return view('matakuliah');
});



Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dosen', [DosenController::class, 'index'])->name('dosen.index');
    Route::post('/dosen', [DosenController::class, 'store']);
    Route::get('/dosen/create', [DosenController::class, 'create'])->name('dosen.create');
    Route::delete('/dosen/{id}', [DosenController::class, 'destroy'])->name('dosen.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/prodi', [ProdiController::class, 'index'])->name('prodi');
    Route::post('/prodi', [ProdiController::class, 'store']);
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/jurusan', [JurusanController::class, 'index'])->name('jurusan');
    Route::post('/jurusan', [JurusanController::class, 'store']);
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/thnakd', [ThnakdController::class, 'index'])->name('thnakd');
    Route::post('/thnakd', [ThnakdController::class, 'store']);
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/matakuliah', [MatakuliahController::class, 'index'])->name('matakuliah');
    Route::post('/matakuliah', [MatakuliahController::class, 'store']);
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/kurikulum', [KurikulumController::class, 'index'])->name('kurikulum');
    Route::post('/kurikulum', [KurikulumController::class, 'store']);
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/kelas', [KelasController::class, 'index'])->name('kelas');
    Route::post('/kelas', [KelasController::class, 'store']);
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/pimpinanjurusan', [PimpinanjurusanController::class, 'index'])->name('pimpinanjurusan');
    Route::post('/pimpinanjurusan', [PimpinanjurusanController::class, 'store']);
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/pimpinanprodi', [PimpinanprodiController::class, 'index'])->name('pimpinanprodi');
    Route::post('/pimpinanprodi', [PimpinanprodiController::class, 'store']);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });




require __DIR__.'/auth.php';

