<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Eservice\EserviceBackendController;
use App\Http\Controllers\Eservice\EserviceDataController;


Route::get('/', function () {
    return view('home');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit')->middleware('throttle:5,1');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['auth'])->group(function () {
    Route::get('backend', [DashboardController::class, 'backend'])->name('backend');

    Route::get('backend/eserviceform/id/{id}', [EserviceBackendController::class, 'listeserviceOne'])->name('eserviceform.id');
    Route::post('backend/eservice/menu/{menu}/id/{id}', [EserviceBackendController::class, 'eservicedetailupdate'])->name('eservicedetail.update');
    Route::post('backend/eservice/reply', [EserviceBackendController::class, 'reply'])->name('eservice.reply');
   
});


Route::get('/Requestforms', [EserviceDataController::class, 'SelectForm'])->name('listform');

Route::get('listformeservicepdf/id/{id}', [EserviceDataController::class, 'listformpdf'])->name('formeservicepdf');
Route::get('formeservicepdf/export/form/{form}/id/{id}', [EserviceDataController::class, 'GeneralRequestsExportPDF'])->name('GeneralRequestsAdminExportPDF');


Route::get('FormeService/id/{id}', [EserviceDataController::class, 'ShowForm'])->name('showform');
Route::post('formeservice/id/{id}', [EserviceDataController::class, 'SaveForm'])->name('showform.save');
Auth::routes();

