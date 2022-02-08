<?php

use App\Models\Admin\Activity;
use App\Models\Admin\CanclePolicy;
use App\Models\Admin\City;
use App\Models\Admin\DayActivity;
use App\Models\Admin\PackageExclusions;
use App\Models\Admin\PackageInclusions;
use App\Models\Admin\PaymentPolicy;
use App\Models\Admin\State;
use App\Models\Admin\Place;
use App\Models\Admin\RefoundPolicy;
use Illuminate\Http\Request;
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
    Route::post('/lead-store-route-map', [App\Http\Controllers\Admin\LeadController::class, 'storeRouteMap'])->name('lead-store-route-map');
    Route::get('/lead-edit/{id}', [App\Http\Controllers\Admin\LeadController::class, 'edit'])->name('lead-edit');

    Route::get('/data-center/{type}', [App\Http\Controllers\Admin\DataCenterController::class, 'index'])->name('data-center');
    Route::post('/data-center/{type}', [App\Http\Controllers\Admin\DataCenterController::class, 'store'])->name('data.itinerary');
    Route::get('/data-center-delete/{id}/{type}', [App\Http\Controllers\Admin\DataCenterController::class, 'destroy'])->name('activity-delete');
    Route::post('/data-center-update/{id}/{type}', [App\Http\Controllers\Admin\DataCenterController::class, 'update'])->name('data.itinerary.update');

    Route::get('/get-states', function(){
        return State::get();
    });
    Route::get('/get-cities-by-state-id', function(Request $request){
        return City::where('state_id', $request->id)->get();
    });

    Route::get('/get-places-by-city-id', function(Request $request){
        return Place::where('city_id', $request->id)->get();
    });

    Route::get('/get-day-activities-by-place-id', function(Request $request){
        return DayActivity::where('place_id', $request->id)->get();
    });

    Route::get('/get-activities-by-place-id', function(Request $request){
        return Activity::where('place_id', $request->id)->get();
    });

    Route::get('/get-package-exclusion', function(Request $request){
        return PackageExclusions::get();
    });

    Route::get('/get-package-inclusion', function(Request $request){
        return PackageInclusions::get();
    });

    Route::get('/get-refund-policy', function(Request $request){
        return RefoundPolicy::get();
    });

    Route::get('/get-payment-policy', function(Request $request){
        return PaymentPolicy::get();
    });

    Route::get('/get-cancellation-policy', function(Request $request){
        return CanclePolicy::get();
    });

    Route::get('/get-day-activity', function(Request $request){
        return DayActivity::get();
    });

});