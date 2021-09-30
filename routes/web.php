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
        // User => change Password
        Route::get('users/password/{forceChange?}/{user?}', 'UserController@changePassword')->name('users.password.create');
        Route::patch('users/password/{forceChange?}/{user?}', 'UserController@changePassword')->name('users.password.update');

        Route::group([
            'prefix' => 'dashboard',
            'as' => 'dashboard.',
        ], function () {
            Route::get('/', function () {
                return view('dashboard.index');
            })->name('index');

            // Setup
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
            Route::get('/patients/{patient}/assessment/{step}/{assessmentPerformed?}', [AssessmentController::class, 'create'])->name('assessment.create.step');
            Route::post('/patients/{patient}/assessment/{step}', [AssessmentController::class, 'store'])->name('assessment.store.step');

            Route::post('/patients/assessment/{assessment}/{mediaType}', [AssessmentController::class, 'storeMedia'])->name('assessment.store.media');

            Route::get('/patients/assessment/{assessment}/edit/{step}', [AssessmentController::class, 'edit'])->name('assessment.edit.step');
            Route::patch('/patients/assessment/{assessment}/{step}', [AssessmentController::class, 'update'])->name('assessment.update.step');
            Route::get('/patients/assessment/{assessment}/show', [AssessmentController::class, 'show'])->name('assessment.show');

            // Patient Details
            Route::get('patient-details/{patient}/create', [PatientDetailController::class, 'create'])->name('patient-details.create');
            Route::post('patient-details/{patient}', [PatientDetailController::class, 'store'])->name('patient-details.store');

            // Comments
            Route::get('/assessment/{assessment}/comments', [CommentController::class, 'index'])->name('comment.index');
            Route::get('/assessment/{assessment}/comments/create', [CommentController::class, 'create'])->name('comment.create');
            Route::post('/assessment/{assessment}/comments', [CommentController::class, 'store'])->name('comment.store');


        });

    });
});
