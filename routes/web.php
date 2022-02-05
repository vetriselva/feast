<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $data = DB::table('users')->get();
    return view('welcome', compact('data', $data));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin',  'middleware' => 'is_admin'], function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('AdminDashboard');
    Route::get('/lead', [App\Http\Controllers\Admin\LeadController::class, 'index'])->name('lead');
    Route::get('/lead/{id}', [App\Http\Controllers\Admin\LeadController::class, 'show'])->name('lead-view');
    Route::get('/lead/edit/{id}', [App\Http\Controllers\Admin\LeadController::class, 'edit'])->name('lead-edit');
    Route::get('/lead-delete/{id}', [App\Http\Controllers\Admin\LeadController::class, 'destroy'])->name('lead-delete');

    
    Route::get('/lead-new', [App\Http\Controllers\Admin\LeadController::class, 'create'])->name('lead-new');
    Route::post('/lead', [App\Http\Controllers\Admin\LeadController::class, 'store'])->name('lead');

    Route::get('/data-center/{type}', [App\Http\Controllers\Admin\DataCenterController::class, 'index'])->name('data-center');
    Route::post('/data-center/{type}', [App\Http\Controllers\Admin\DataCenterController::class, 'store'])->name('data.itinerary');
    Route::get('/data-center-delete/{id}/{type}', [App\Http\Controllers\Admin\DataCenterController::class, 'destroy'])->name('activity-delete');
    Route::post('/data-center-update/{id}/{type}', [App\Http\Controllers\Admin\DataCenterController::class, 'update'])->name('data.itinerary.update');
});