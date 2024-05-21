<?php

use App\Models\DataKbk;
use App\Models\Pimpinanjurusan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\ThnakdController;
use App\Http\Controllers\DataKbkController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TahunAkdController;
use App\Http\Controllers\KurikulumController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\MatkulkbkController;
use App\Http\Controllers\PenguruskbkController;
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
    Route::post('/dosen/submit', [DosenController::class, 'store'])->name('dosen.submit');
    Route::get('/dosen/create', [DosenController::class, 'create'])->name('dosen.create');
    Route::delete('/dosen/{id}', [DosenController::class, 'destroy'])->name('dosen.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/prodi', [ProdiController::class, 'index'])->name('prodi');
    Route::post('/prodi', [ProdiController::class, 'store']);
    Route::get('/prodi/create', [ProdiController::class, 'create'])->name('prodi.create');
    Route::delete('/prodi/{id}', [ProdiController::class, 'destroy'])->name('prodi.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/jurusan', [JurusanController::class, 'index'])->name('jurusan');
    Route::post('/jurusan', [JurusanController::class, 'store']);
    Route::get('/jurusan/create', [JurusanController::class, 'create'])->name('jurusan.create');
    Route::delete('/jurusan/{id}', [JurusanController::class, 'destroy'])->name('jurusan.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/thnakd', [ThnakdController::class, 'index'])->name('thnakd');
    Route::post('/thnakd', [ThnakdController::class, 'store']);
    Route::get('/thnakd/create', [ThnakdController::class, 'create'])->name('thnakd.create');
    Route::delete('/thnakd/{id}', [ThnakdController::class, 'destroy'])->name('thnakd.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/matakuliah', [MatakuliahController::class, 'index'])->name('matakuliah');
    Route::post('/matakuliah', [MatakuliahController::class, 'store']);
    Route::get('/matakuliah/create', [MatakuliahController::class, 'create'])->name('matakuliah.create');
    Route::delete('/matakuliah/{id}', [MatakuliahController::class, 'destroy'])->name('matakuliah.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/kurikulum', [KurikulumController::class, 'index'])->name('kurikulum');
    Route::post('/kurikulum', [KurikulumController::class, 'store']);
    Route::get('/kurikulum/create', [KurikulumController::class, 'create'])->name('kurikulum.create');
    Route::delete('/kurikulum/{id}', [KurikulumController::class, 'destroy'])->name('kurikulum.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/kelas', [KelasController::class, 'index'])->name('kelas');
    Route::post('/kelas', [KelasController::class, 'store']);
    Route::get('/kelas/create', [KelasController::class, 'create'])->name('kelas.create');
    Route::delete('/kelas/{id}', [KelasController::class, 'destroy'])->name('kelas.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/pimpinanjurusan', [PimpinanjurusanController::class, 'index'])->name('pimpinanjurusan');
    Route::post('/pimpinanjurusan', [PimpinanjurusanController::class, 'store']);
    Route::get('/pimpinanjurusan/create', [PimpinanjurusanController::class, 'create'])->name('pimpinanjurusan.create');
    Route::delete('/pimpinanjurusan/{id}', [PimpinanjurusanController::class, 'destroy'])->name('pimpinanjurusan.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/pimpinanprodi', [PimpinanprodiController::class, 'index'])->name('pimpinanprodi');
    Route::post('/pimpinanprodi', [PimpinanprodiController::class, 'store']);
    Route::get('/pimpinanprodi/create', [PimpinanprodiController::class, 'create'])->name('pimpinanprodi.create');
    Route::delete('/pimpinanprodi/{id}', [PimpinanprodiController::class, 'destroy'])->name('pimpinanprodi.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/penguruskbk', [PengurusKBKController::class, 'index'])->name('penguruskbk.index');
    Route::get('/penguruskbk/create', [PengurusKBKController::class, 'create'])->name('penguruskbk.create');
    Route::post('/penguruskbk', [PengurusKBKController::class, 'store'])->name('penguruskbk.store');
    Route::delete('/penguruskbk/{id}', [PenguruskbkController::class, 'destroy'])->name('penguruskbk.destroy');
    Route::get('/penguruskbk/edit/{id}', [PengurusKBKController::class, 'edit'])->name('penguruskbk.edit');
    Route::put('/penguruskbk/update/{id}', [PengurusKBKController::class, 'update'])->name('penguruskbk.update');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/datakbk', [DataKbkController::class, 'index'])->name('datakbk.index');
    Route::get('/datakbk/create', [DataKbkController::class, 'create'])->name('datakbk.create');
    Route::post('/datakbk', [DataKbkController::class, 'store'])->name('datakbk.store');
    Route::delete('/datakbk/{id}', [DataKbkController::class, 'destroy'])->name('datakbk.destroy');
    Route::get('/datakbk/edit/{id}', [DataKbkController::class, 'edit'])->name('datakbk.edit');
    Route::put('/datakbk/update/{id}', [DataKbkController::class, 'update'])->name('datakbk.update');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/matkul_kbk', [MatkulkbkController::class, 'index'])->name('matkul_kbk.index');
    Route::get('/matkul_kbk/create', [MatkulKbkController::class,'create'])->name('matkul_kbk.create');
    Route::post('/matkul_kbk', [MatkulKbkController::class, 'store'])->name('matkul_kbk.store');
    Route::delete('/matkul_kbk/{id}', [MatkulKbkController::class, 'destroy'])->name('matkul_kbk.destroy');
    Route::get('/matkul_kbk/edit/{id}', [MatkulKbkController::class, 'edit'])->name('matkul_kbk.edit');
    Route::put('/matkul_kbk/update/{id}', [MatkulKbkController::class, 'update'])->name('matkul_kbk.update');
});

Route::get('/dashboard', function () {
    return view('backend.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });




require __DIR__.'/auth.php';
