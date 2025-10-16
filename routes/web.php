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




Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes();
//login
Route::get('/Login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/Login', [AuthController::class, 'login'])->name('login.submit')->middleware('throttle:5,1');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//หน้าบ้าน
Route::get('/Requestforms', [EserviceDataController::class, 'SelectForm'])->name('listform');
Route::get('/Profile', [EserviceDataController::class, 'SelectForm'])->name('history');
Route::get('listformeservicepdf/id/{id}', [EserviceDataController::class, 'listformpdf'])->name('formeservicepdf');
Route::get('FormeService/id/{id}', [EserviceDataController::class, 'ShowForm'])->name('showform');
Route::post('formeservice/id/{id}', [EserviceDataController::class, 'SaveForm'])->name('showform.save');

//หน้าบ้านและหลังบ้าน
Route::get('formeservicepdf/export/form/{form}/id/{id}', [EserviceDataController::class, 'GeneralRequestsExportPDF'])->name('GeneralRequestsAdminExportPDF');


// Route::middleware(['auth'])->group(function () {
Route::middleware('auth', 'permission:2')->group(function () {
    Route::get('backend', [DashboardController::class, 'backend'])->name('backend');
    Route::get('backend/eserviceform/id/{id}', [EserviceBackendController::class, 'listeserviceOne'])->name('eserviceform.id');
    Route::post('backend/eservice/menu/{menu}/id/{id}', [EserviceBackendController::class, 'eservicedetailupdate'])->name('eservicedetail.update');
    Route::post('backend/eservice/reply', [EserviceBackendController::class, 'reply'])->name('eservice.reply');
    Route::post('backend/eservice/replynouser', [EserviceBackendController::class, 'replyNoUser'])->name('eservice.replynouser');
    Route::get('/eservice/chat/{id}', [EserviceBackendController::class, 'chatMessages']);
});

Route::middleware('auth', 'permission:3')->group(function () {
    Route::get('ServiceCenterOnline', [DashboardController::class, 'backendUser'])->name('backenduser');
    Route::get('/FormSubmissionHistory', [EserviceDataController::class, 'SelectFormUser'])->name('history');
    Route::get('/eservice/chatuser/{id}', [EserviceBackendController::class, 'chatMessagesUser']);
    Route::post('/eservice/reply', [EserviceBackendController::class, 'replyUser'])->name('eservice.reply.user');
    Route::post('/eservice/uploadfile', [EserviceDataController::class, 'uploadFile'])->name('upload.file.user');
});
