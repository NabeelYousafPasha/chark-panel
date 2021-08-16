<?php

use App\Http\Controllers\{
    AssessmentController,
    HomeController,
    PatientDetailController,
    CommentController
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
        Route::post('/sleep-test', function () {
            dd('Route');
        })->name('sleep-test.store');

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

            // setup
            Route::group([
                'prefix' => 'setup',
                'as' => 'setup.',
            ], function () {
                Route::resource('permissions_roles', 'PermissionRoleController');
            });

            // Clinic
            Route::resource('/clinics', 'ClinicController');

            // Patient
            Route::resource('/patients', 'PatientController');

            // Assessment
            Route::get('/patients/{patient}/assessment', [AssessmentController::class, 'index'])->name('assessment.index');
            Route::get('/patients/{patient}/assessment/{step}', [AssessmentController::class, 'create'])->name('assessment.create.step');
            Route::post('/patients/{patient}/assessment/{step}', [AssessmentController::class, 'store'])->name('assessment.store.step');
            
            Route::get('/patients/assessment/{assessment}/edit/{step}', [AssessmentController::class, 'edit'])->name('assessment.edit.step');
            Route::post('/patients/{patient}/assessment', [AssessmentController::class, 'update'])->name('assessment.update.step');

            // Patient Details
            Route::get('patient-details/{patient}/create', [PatientDetailController::class, 'create'])->name('patient-details.create');
            Route::post('patient-details/{patient}', [PatientDetailController::class, 'store'])->name('patient-details.store');

            // Comments
            Route::get('/patients/{patient}/assessment/{assessment}/comments', [CommentController::class, 'index'])->name('comment.index');
            Route::get('/patients/{patient}/assessment/{assessment}/comments/create', [CommentController::class, 'create'])->name('comment.create');
            Route::post('/patients/{patient}/assessment/{assessment}/comments/create', [CommentController::class, 'store'])->name('comment.store');

        });

    });
});
