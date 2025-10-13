<?php

use App\Http\Controllers\LaporanController;
use App\Http\Controllers\UploadImageController;
use App\Http\Middleware\MultiAuth;
use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\Landing::class)->name('landing');

Route::get('/login', \App\Livewire\Login::class)->name('login')->middleware('guest');

Route::get('/logout', App\Http\Controllers\LogoutController::class)->name('logout');
Route::get('/registrasi', \App\Livewire\RegistrasiPage::class)->name('registrasi')->middleware('guest');

Route::get('/dashboard', \App\Livewire\Dashboard\Index::class)
    ->name('dashboard')
    ->middleware(MultiAuth::class.':Admin,Penyuluh,Kepala Dinas,Petani');

Route::get('/pengguna', \App\Livewire\Table\PenggunaTable::class)->name('pengguna')->middleware(MultiAuth::class.':Admin');

Route::get('/tanaman', \App\Livewire\Table\TanamanTable::class)->name('tanaman-table')->middleware(MultiAuth::class.':Admin,Penyuluh');

Route::get('/wilayah', \App\Livewire\Table\WilayahTable::class)->name('wilayah-table')->middleware(MultiAuth::class.':Admin,Penyuluh');

Route::get('/penyebab-serangan', \App\Livewire\Table\PenyebabSeranganTable::class)->name('penyebab-serangan-table')->middleware(MultiAuth::class.':Admin,Penyuluh');

Route::get('/laporan-serangan', \App\Livewire\Table\LaporanSeranganTable::class)->name('laporan-serangan-table')->middleware(MultiAuth::class.':Kepala Dinas');

Route::get('/profile', \App\Livewire\Profile\Index::class)->name('profile')->middleware(MultiAuth::class.':Admin,Kepala Dinas,Penyuluh,Petani');

Route::get('/laporan/petani', \App\Livewire\Laporan\LaporanDataPetani::class)->name('laporan.petani')->middleware(MultiAuth::class . ':kepala_dinas,admin');

Route::get('/laporan/petugas', \App\Livewire\Laporan\LaporanDataPetugas::class)->name('laporan.petugas')->middleware(MultiAuth::class . ':kepala_dinas,admin');

Route::get('/cetak-laporan/petani', [LaporanController::class, 'laporanPetani'])->name('print-laporan.petani')->middleware(MultiAuth::class . ':kepala_dinas,admin');

Route::get('/cetak-laporan/petugas', [LaporanController::class, 'laporanPetugas'])->name('print-laporan.petugas')->middleware(MultiAuth::class . ':kepala_dinas,admin');

// Route::post('/upload-image', UploadImageController::class)->name('upload.image')->middleware(MultiAuth::class . ':admin');
