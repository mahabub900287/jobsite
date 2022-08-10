<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Backend\Admin\AppearanceController;
use App\Http\Controllers\Backend\Admin\CategoryCotronller;
use App\Http\Controllers\Backend\Admin\PageController;
use App\Http\Controllers\Backend\Admin\SettingController;
use Illuminate\Support\Facades\Route;

// ====================Backend all Route==========================//
Route::group(['prefix'=>'admin','as'=>'admin.','middleware'=>['auth']], function(){
    //------------------ Dashboard ---------------------//
    Route::get('/dashboard',[AdminDashboardController::class, 'dashboard'])
        ->name('dashboard');
    Route::resource('/cetagory',CategoryCotronller::class)->except('show');
    //------------------------ Apperance -----------------------//
    Route::group(['prefix'=>'apperance','as'=>'apperance.'], function(){
        Route::resource('setting',SettingController::class)->except('show','create');
    });

    //==============Theme Setting=================================//
    Route::group(['prefix'=>'appearance','as'=>'appearance.'], function(){
        Route::group(['prefix'=>'themes','as'=>'themes.'], function(){
            Route::get('', [AppearanceController::class, 'theme'])->name('theme.index');

        });
    });

    //==============Pages=================================//
    Route::resource('/pages',PageController::class)->except('show');


});
