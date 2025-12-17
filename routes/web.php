<?php

use App\Http\Controllers\adminDashboardController;
use App\Http\Controllers\AdminDocController;
use App\Http\Controllers\AdminKriController;
use App\Http\Controllers\AdminPenController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dokumenController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KrisanController;
use App\Http\Controllers\PengurusController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('layout');
});

Route::resource('/pengurus', PengurusController::class);

Route::resource('/dokumen', dokumenController::class);

Route::resource('/krisan', KrisanController::class);

Route::resource('/dashhboard', DashboardController::class);

Route::resource('/adminDashhboard', DashboardController::class)->middleware(['auth','admin']);

Route::resource('/adminPengurus', AdminPenController::class)->middleware(['auth','admin']);

Route::resource('/adminDokumen', AdminDocController::class)->middleware(['auth','admin']);

Route::resource('/adminKrisan', AdminKriController::class)->middleware(['auth','admin']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('adminLayout',[HomeController::class,'index'])->middleware(['auth','admin']);
Route::get('/adminPengurus',[AdminPenController::class,'index'])->middleware(['auth','admin']);
Route::get('/adminDokumen',[AdminDocController::class,'index'])->middleware(['auth','admin']);
Route::get('/adminKrisan',[AdminKriController::class,'index'])->middleware(['auth','admin']);
Route::get('/adminDashhboard',[adminDashboardController::class,'index'])->middleware(['auth','admin']);

require __DIR__.'/auth.php';

