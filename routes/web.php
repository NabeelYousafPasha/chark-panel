<?php

use App\Http\Controllers\{
    HomeController,
    PatientInformationController
};
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('/');

Auth::routes(['verify' => true]);

Route::group([
    'middleware' => ['auth',],
], function () {

    Route::get('/retry/{auth}', function ($auth) {
        $cookie = strtolower(str_replace(' ', '_', config('app.name'))).'_session';
        auth()->logout();
        Cookie::queue(Cookie::forget($cookie));
        return redirect($auth);
    })->name('retry.auth');

    Route::group([
        'middleware' => ['verified',],
    ], function () {

        // Front End
        Route::get('/home', [HomeController::class, 'index'])->name('home');
        Route::post('/sleep-test', [HomeController::class, 'storeSleepTest'])->name('sleep-test.store');

        // Back End
        // user => change Password
        Route::get('users/password/{forceChange?}/{user?}', 'UserController@changePassword')->name('users.password.create');
        Route::patch('users/password/{forceChange?}/{user?}', 'UserController@changePassword')->name('users.password.update');

        Route::group([
            'prefix' => 'dashboard',
            'as' => 'dashboard.',
        ], function () {
            Route::get('/', function () {
                return view('dashboard.index');
            })->name('index');

            Route::get('/patients/{patient}/report', [PatientInformationController::class, 'generateReport'])->name('patients.report');
            Route::resource('/patients', 'PatientInformationController');
        });

    });
});
