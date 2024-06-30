<?php

use App\Models\DosenMatakuliah;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\GrafikController;
use App\Http\Controllers\ThnakdController;
use App\Http\Controllers\DataKbkController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\RepoRpsController;
use App\Http\Controllers\RepoUasController;
use App\Http\Controllers\KurikulumController;
use App\Http\Controllers\MatkulkbkController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\DosenMatkulController;
use App\Http\Controllers\PengurusKBKController;
use App\Http\Controllers\PimpinanprodiController;
use App\Http\Controllers\VerifikasiRpsController;
use App\Http\Controllers\VerifikasiUasController;
use App\Http\Controllers\BeritaAcaraRpsController;
use App\Http\Controllers\BeritaAcaraUasController;
use App\Http\Controllers\DosenMatakuliahController;
use App\Http\Controllers\PimpinanjurusanController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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
})->name('home');


Route::get('/pengurus', function () {
    return view('pengurus');
});


Route::get('/matakuliah', function () {
    return view('matakuliah');
});



Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('/dosen', [DosenController::class, 'index'])->name('dosen.index');
    Route::post('/dosen/submit', [DosenController::class, 'store'])->name('dosen.submit');
    Route::get('/dosen/create', [DosenController::class, 'create'])->name('dosen.create');
    Route::delete('/dosen/{id}', [DosenController::class, 'destroy'])->name('dosen.destroy');
});

Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('/prodi', [ProdiController::class, 'index'])->name('prodi');
    Route::post('/prodi', [ProdiController::class, 'store']);
    Route::get('/prodi/create', [ProdiController::class, 'create'])->name('prodi.create');
    Route::delete('/prodi/{id}', [ProdiController::class, 'destroy'])->name('prodi.destroy');
});

Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('/jurusan', [JurusanController::class, 'index'])->name('jurusan');
    Route::post('/jurusan', [JurusanController::class, 'store']);
    Route::get('/jurusan/create', [JurusanController::class, 'create'])->name('jurusan.create');
    Route::delete('/jurusan/{id}', [JurusanController::class, 'destroy'])->name('jurusan.destroy');
});

Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('/thnakd', [ThnakdController::class, 'index'])->name('thnakd');
    Route::post('/thnakd', [ThnakdController::class, 'store']);
    Route::get('/thnakd/create', [ThnakdController::class, 'create'])->name('thnakd.create');
    Route::delete('/thnakd/{id}', [ThnakdController::class, 'destroy'])->name('thnakd.destroy');
});

Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('/matakuliah', [MatakuliahController::class, 'index'])->name('matakuliah');
    Route::post('/matakuliah', [MatakuliahController::class, 'store']);
    Route::get('/matakuliah/create', [MatakuliahController::class, 'create'])->name('matakuliah.create');
    Route::delete('/matakuliah/{id}', [MatakuliahController::class, 'destroy'])->name('matakuliah.destroy');
});

Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('/kurikulum', [KurikulumController::class, 'index'])->name('kurikulum');
    Route::post('/kurikulum', [KurikulumController::class, 'store']);
    Route::get('/kurikulum/create', [KurikulumController::class, 'create'])->name('kurikulum.create');
    Route::delete('/kurikulum/{id}', [KurikulumController::class, 'destroy'])->name('kurikulum.destroy');
});

Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('/kelas', [KelasController::class, 'index'])->name('kelas');
    Route::post('/kelas', [KelasController::class, 'store']);
    Route::get('/kelas/create', [KelasController::class, 'create'])->name('kelas.create');
    Route::delete('/kelas/{id}', [KelasController::class, 'destroy'])->name('kelas.destroy');
});

Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('/pimpinanjurusan', [PimpinanjurusanController::class, 'index'])->name('pimpinanjurusan');
    Route::post('/pimpinanjurusan', [PimpinanjurusanController::class, 'store']);
    Route::get('/pimpinanjurusan/create', [PimpinanjurusanController::class, 'create'])->name('pimpinanjurusan.create');
    Route::delete('/pimpinanjurusan/{id}', [PimpinanjurusanController::class, 'destroy'])->name('pimpinanjurusan.destroy');
});

Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('/pimpinanprodi', [PimpinanprodiController::class, 'index'])->name('pimpinanprodi');
    Route::post('/pimpinanprodi', [PimpinanprodiController::class, 'store']);
    Route::get('/pimpinanprodi/create', [PimpinanprodiController::class, 'create'])->name('pimpinanprodi.create');
    Route::delete('/pimpinanprodi/{id}', [PimpinanprodiController::class, 'destroy'])->name('pimpinanprodi.destroy');
});

Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('/dosenmatakuliah', [DosenMatkulController::class, 'index'])->name('pimpinanprodi');
    Route::post('/dosenmatakuliah', [DosenMatkulController::class, 'store']);
    Route::get('/dosenmatakuliah/create', [DosenMatkulController::class, 'create'])->name('pimpinanprodi.create');
    Route::delete('/dosenmatakuliah/{id}', [DosenMatkulController::class, 'destroy'])->name('pimpinanprodi.destroy');
});

Route::middleware(['auth', 'verified', 'role:admin|penguruskbk'])->group(function () {
    Route::get('/penguruskbk', [PengurusKBKController::class, 'index'])->name('penguruskbk.index');
    Route::get('/penguruskbk/create', [PengurusKBKController::class, 'create'])->name('penguruskbk.create');
    Route::post('/penguruskbk', [PengurusKBKController::class, 'store'])->name('penguruskbk.store');
    Route::delete('/penguruskbk/{id}', [PengurusKBKController::class, 'destroy'])->name('penguruskbk.destroy');
    Route::get('/penguruskbk/edit/{id}', [PengurusKBKController::class, 'edit'])->name('penguruskbk.edit');
    Route::put('/penguruskbk/update/{id}', [PengurusKBKController::class, 'update'])->name('penguruskbk.update');
    Route::get('/penguruskbk/export', [PengurusKBKController::class, 'export'])->name('penguruskbk.export');
    Route::post('/penguruskbk/import', [PengurusKBKController::class, 'import'])->name('penguruskbk.import');
});

Route::middleware(['auth', 'verified', 'role:admin|penguruskbk'])->group(function () {
    Route::get('/datakbk', [DataKbkController::class, 'index'])->name('datakbk.index');
    Route::get('/datakbk/create', [DataKbkController::class, 'create'])->name('datakbk.create');
    Route::post('/datakbk', [DataKbkController::class, 'store'])->name('datakbk.store');
    Route::delete('/datakbk/{id}', [DataKbkController::class, 'destroy'])->name('datakbk.destroy');
    Route::get('/datakbk/edit/{id}', [DataKbkController::class, 'edit'])->name('datakbk.edit');
    Route::put('/datakbk/update/{id}', [DataKbkController::class, 'update'])->name('datakbk.update');
    //Route::get('/datakbk/export/excel', [DataKbkController::class, 'export_excel']);
    Route::get('/datakbk/export', [DataKBKController::class, 'export'])->name('datakbk.export');
    Route::post('/datakbk/import', [DataKbkController::class, 'import'])->name('datakbk.import');
});

Route::middleware(['auth', 'verified', 'role:admin|penguruskbk'])->group(function () {
    Route::get('/matkul_kbk', [MatkulkbkController::class, 'index'])->name('matkul_kbk.index');
    Route::get('/matkul_kbk/create', [MatkulKbkController::class, 'create'])->name('matkul_kbk.create');
    Route::post('/matkul_kbk', [MatkulKbkController::class, 'store'])->name('matkul_kbk.store');
    Route::delete('/matkul_kbk/{id}', [MatkulKbkController::class, 'destroy'])->name('matkul_kbk.destroy');
    Route::get('/matkul_kbk/edit/{id}', [MatkulKbkController::class, 'edit'])->name('matkul_kbk.edit');
    Route::put('/matkul_kbk/update/{id}', [MatkulKbkController::class, 'update'])->name('matkul_kbk.update');
    Route::get('/matkul_kbk/export', [MatkulKbkController::class, 'export'])->name('matkul_kbk.export');
    Route::post('/matkul_kbk/import', [MatkulKbkController::class, 'import'])->name('matkul_kbk.import');
});

Route::middleware(['auth', 'verified', 'role:admin|kaprodi'])->group(function () {
    Route::get('/verif_uas', [VerifikasiUasController::class, 'index'])->name('verif_uas.index');
    Route::get('/verif_uas/create', [VerifikasiUasController::class, 'create'])->name('verif_uas.create');
    Route::post('/verif_uas', [VerifikasiUasController::class, 'store'])->name('verif_uas.store');
    Route::delete('/verif_uas/{id}', [VerifikasiUasController::class, 'destroy'])->name('verif_uas.destroy');
    Route::get('/verif_uas/edit/{id}', [VerifikasiUasController::class, 'edit'])->name('verif_uas.edit');
    Route::put('/verif_uas/update/{id}', [VerifikasiUasController::class, 'update'])->name('verif_uas.update');
});

Route::middleware(['auth', 'verified', 'role:admin|dosenpengampu'])->group(function () {
    Route::get('/repo_uas', [RepoUasController::class, 'index'])->name('repo_uas.index');
    Route::get('/repo_uas/create', [RepoUasController::class, 'create'])->name('repo_uas.create');
    Route::post('/repo_uas', [RepoUasController::class, 'store'])->name('repo_uas.store');
    Route::delete('/repo_uas/{id}', [RepoUasController::class, 'destroy'])->name('repo_uas.destroy');
    Route::get('/repo_uas/edit/{id}', [RepoUasController::class, 'edit'])->name('repo_uas.edit');
    Route::put('/repo_uas/update/{id}', [RepoUasController::class, 'update'])->name('repo_uas.update');
});
Route::middleware(['auth', 'verified', 'role:admin|kaprodi'])->group(function () {
    Route::get('/verif_rps', [VerifikasiRpsController::class, 'index'])->name('verif_rps.index');
    Route::get('/verif_rps/create', [VerifikasiRpsController::class, 'create'])->name('verif_rps.create');
    Route::post('/verif_rps', [VerifikasiRpsController::class, 'store'])->name('verif_rps.store');
    Route::delete('/verif_rps/{id}', [VerifikasiRpsController::class, 'destroy'])->name('verif_rps.destroy');
    Route::get('/verif_rps/edit/{id}', [VerifikasiRpsController::class, 'edit'])->name('verif_rps.edit');
    Route::put('/verif_rps/update/{id}', [VerifikasiRpsController::class, 'update'])->name('verif_rps.update');
    Route::get('/grafik/verifikasi-rps', [GrafikController::class, 'grafik_verifikasi_rps'])->name('grafik.verifikasi_rps');

});

Route::middleware(['auth', 'verified', 'role:admin|dosenpengampu'])->group(function () {
    Route::get('/repo_rps', [RepoRpsController::class, 'index'])->name('repo_rps.index');
    Route::get('/repo_rps/create', [RepoRpsController::class, 'create'])->name('repo_rps.create');
    Route::post('/repo_rps', [RepoRpsController::class, 'store'])->name('repo_rps.store');
    Route::delete('/repo_rps/{id}', [RepoRpsController::class, 'destroy'])->name('repo_rps.destroy');
    Route::get('/repo_rps/edit/{id}', [RepoRpsController::class, 'edit'])->name('repo_rps.edit');
    Route::put('/repo_rps/update/{id}', [RepoRpsController::class, 'update'])->name('repo_rps.update');
    Route::get('/grafik-repo-rps', [GrafikController::class, 'grafik_rps'])->name('grafik.repo_rps');
    Route::get('/grafik/repo-rps-verif', [GrafikController::class, 'grafik_rps_rps_verif'])->name('grafik.repo_rps_verif');


});

Route::middleware(['auth', 'verified', 'role:admin|penguruskbk'])->group(function () {
    Route::get('/berita_acara_rps', [BeritaAcaraRpsController::class, 'index'])->name('berita_acara_rps.index');
    Route::get('/berita_acara_rps/create', [BeritaAcaraRpsController::class, 'create'])->name('berita_acara_rps.create');
    Route::post('/berita_acara_rps', [BeritaAcaraRpsController::class, 'store'])->name('berita_acara_rps.store');
    Route::delete('/berita_acara_rps/{id}', [BeritaAcaraRpsController::class, 'destroy'])->name('berita_acara_rps.destroy');
    Route::get('/berita_acara_rps/edit/{id}', [BeritaAcaraRpsController::class, 'edit'])->name('berita_acara_rps.edit');
    Route::put('/berita_acara_rps/update/{id}', [BeritaAcaraRpsController::class, 'update'])->name('berita_acara_rps.update');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/berita_acara_uas', [BeritaAcaraUasController::class, 'index'])->name('berita_acara_uas.index');
    Route::get('/berita_acara_uas/create', [BeritaAcaraUasController::class,'create'])->name('berita_acara_uas.create');
    Route::post('/berita_acara_uas', [BeritaAcaraUasController::class, 'store'])->name('berita_acara_uas.store');
    Route::delete('/berita_acara_uas/{id}', [BeritaAcaraUasController::class, 'destroy'])->name('berita_acara_uas.destroy');
    Route::get('/berita_acara_uas/edit/{id}', [BeritaAcaraUasController::class, 'edit'])->name('berita_acara_uas.edit');
    Route::put('/berita_acara_uas/update/{id}', [BeritaAcaraUasController::class, 'update'])->name('berita_acara_uas.update');

});


Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register/post', [AuthController::class, 'signUp'])->name('register.post');
    // Route::post('/register', [AuthController::class, 'register'])->name('register.post');
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot.password');
});

Route::get('/signup', 'AuthController@showSignupForm')->name('auth.signup');

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__ . '/auth.php';
