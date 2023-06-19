<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Integrador\{
    MainController,
    TenantController,
    CampaignController,
    SaleController,
    ProfileController,
    PermissionController,
    DatasysController,
    Admin\ACL\PermissionProfileController,
    Admin\ACL\TenantProfileController,
};

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

Route::middleware('auth')->group(function () {
    Route::get('/', [MainController::class, 'index']);

    Route::get('/test-job',function (){
       \App\Jobs\WhatsSend::dispatch(['exemplo'=>'Mensagem']);

       return 'ok';
    });

    Route::get('/test-whats',function (){

    });

    Route::get('/test-mail',function (){
        \Illuminate\Support\Facades\Mail::to('pedrodeloy@gmail.com')->send(new \App\Mail\TestMail);

        return 'ok - mail sended';
    });

    Route::resource('/tenants', TenantController::class);
    Route::resource('/campanhas', CampaignController::class);
    Route::resource('/mensagens', SaleController::class);


    Route::resource('/profiles', ProfileController::class);

    /**
     * Profile x Tenant
     */
    Route::post('tenants/{id}/profiles',[TenantProfileController::class,'attachProfileTenant'])
        ->name('tenants.profiles.attach');
    Route::get('tenants/{id}/profiles/create',[TenantProfileController::class,'profilesAvailable'])
        ->name('tenants.profiles.available');
    Route::get('tenants/{id}/profiles',[TenantProfileController::class,'profiles'])
        ->name('tenants.profiles');



    /**
     * Permissions x Profiles
     */
    Route::post('profiles/{id}/permissions',[PermissionProfileController::class,'attachPermissionsProfile'])
        ->name('profiles.permissions.attach');
    Route::get('profiles/{id}/permissions/create',[PermissionProfileController::class,'permissionsAvailable'])
        ->name('profiles.permissions.available');
    Route::get('profiles/{id}/permissions',[PermissionProfileController::class,'permissions'])
    ->name('profiles.permissions');

    Route::resource('/permissions', PermissionController::class);

    Route::prefix('/datasys')->group(function () {
        Route::get('', [DatasysController::class, 'index']);
    });
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
