<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KKHController;
use App\Http\Controllers\KLKHFuelStationController;
use App\Http\Controllers\MappingVerifierController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\VerifiedController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login/post', [AuthController::class, 'loginPost'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/verified/{encodedNik}', [VerifiedController::class, 'index'])->name('verified.index');

//Middleware
Route::group(['middleware' => ['auth']], function(){

    Route::get('/dashboards', [DashboardController::class, 'index'])->name('dashboard.index');

    //KLKH Fuel Station
    Route::get('/klkh/fuelStation', [KLKHFuelStationController::class, 'index'])->name('klkh.fuelStation.index');
    Route::get('/klkh/fuelStation/insert', [KLKHFuelStationController::class, 'insert'])->name('klkh.fuelStation.insert');
    Route::post('/klkh/fuelStation/post', [KLKHFuelStationController::class, 'post'])->name('klkh.fuelStation.post');
    Route::post('/klkh/fuelStation/verified/all/{UUID}', [KLKHFuelStationController::class, 'verifiedAll'])->name('klkh.fuelStation.verifiedAll');
    Route::post('/klkh/fuelStation/verified/pengawas/{UUID}', [KLKHFuelStationController::class, 'verifiedPengawas'])->name('klkh.fuelStation.verifiedPengawas');
    Route::post('/klkh/fuelStation/verified/diketahui/{UUID}', [KLKHFuelStationController::class, 'verifiedDiketahui'])->name('klkh.fuelStation.verifiedDiketahui');
    Route::get('/klkh/fuelStation/edit/{UUID}', [KLKHFuelStationController::class, 'edit'])->name('klkh.fuelStation.edit');
    Route::post('/klkh/fuelStation/update/{UUID}', [KLKHFuelStationController::class, 'update'])->name('klkh.fuelStation.update');
    Route::get('/klkh/fuelStation/preview/{UUID}', [KLKHFuelStationController::class, 'preview'])->name('klkh.fuelStation.preview');
    Route::get('/klkh/fuelStation/cetak/{UUID}', [KLKHFuelStationController::class, 'cetak'])->name('klkh.fuelStation.cetak');
    Route::get('/klkh/fuelStation/download/{UUID}', [KLKHFuelStationController::class, 'download'])->name('klkh.fuelStation.download');
    Route::get('/klkh/fuelStation/delete/{UUID}', [KLKHFuelStationController::class, 'delete'])->name('klkh.fuelStation.delete');
    Route::get('/klkh/fuelStation/report', [KLKHFuelStationController::class, 'report'])->name('klkh.fuelStation.report');


    Route::get('/kkh', [KKHController::class, 'index'])->name('kkh.index');
    Route::get('/kkh/api', [KKHController::class, 'all_api'])->name('kkh.all_api');
    Route::get('/kkh/downloadPDF', [KKHController::class, 'downloadPDF'])->name('kkh.downloadPDF');
    Route::post('/kkh/verifikasi', [KKHController::class, 'verifikasi'])->name('kkh.verifikasi');

    //Users
    Route::get('/users', [UsersController::class, 'index'])->name('users.index');
    Route::post('/users/changeRole/{id}', [UsersController::class, 'changeRole'])->name('users.changeRole');
    Route::get('/users/statusEnabled/{id}', [UsersController::class, 'statusEnabled'])->name('users.statusEnabled');

    Route::get('/mappingVerifier', [MappingVerifierController::class, 'index'])->name('mappingVerifier.index');
    Route::post('/mappingVerifier/insert', [MappingVerifierController::class, 'insert'])->name('mappingVerifier.insert');
    Route::post('/mappingVerifier/update/{id}', [MappingVerifierController::class, 'update'])->name('mappingVerifier.update');
    Route::get('/mappingVerifier/statusEnabled/{id}', [MappingVerifierController::class, 'statusEnabled'])->name('mappingVerifier.statusEnabled');



});
