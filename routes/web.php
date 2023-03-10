<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\Information\PatientsController;
use App\Http\Controllers\Admin\Information\DoctorsController;
use App\Http\Controllers\Admin\Information\NewsController;
use App\Http\Controllers\Admin\Information\ServicesController;
use App\Http\Controllers\Admin\Information\CalendarsController;
use App\Http\Controllers\Admin\Information\BookingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\CkeditorController;

use App\Http\Controllers\Website\WhomeController;
use App\Http\Controllers\Website\WbookingController;
use App\Http\Controllers\Website\WdoctorsController;
use App\Http\Controllers\Website\WnewsController;
use App\Http\Controllers\Website\WpatientsController;
use App\Http\Controllers\Website\WservicesController;
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

Route::name('website.')->group(function(){
    Route::get('/', [WhomeController::class, 'index'])->name('index');

    //dịch vụ
    Route::get('/services', [WservicesController::class, 'services'])->name('services');
    Route::get('/services/{id}', [WservicesController::class, 'detail'])->name('detail');

    // Tin tức
    Route::get('/news', [WnewsController::class, 'news'])->name('news');
    Route::get('/news/{id}', [WnewsController::class, 'newsdetail'])->name('newsdetail');

    //
    Route::get('/patients', [WpatientsController::class, 'patients'])->name('patients');

    // Bác sĩ
    Route::get('/doctors', [WdoctorsController::class, 'doctors'])->name('doctors');
    Route::get('/doctors/{id}', [WdoctorsController::class, 'member'])->name('member');

    //  
    Route::get('/booking', [WbookingController::class, 'booking'])->name('booking');
    Route::post('/booking', [WbookingController::class, 'postbooking'])->name('postbooking');

    
    //->middleware('check_login_patient')
    //Kemel
    Route::prefix('login')->name('login.')->middleware('check_login_patient')->group(function (){
        Route::post('/fetchDoctor',[WbookingController::class, 'fetchDoctor'])->name('fetchDoctor');
        Route::post('/fetchWorktime',[WbookingController::class, 'fetchWorktime'])->name('fetchWorktime');
        Route::get('/appointment/{uuid}', [WbookingController::class, 'getappointment'])->name('getappointment');
        Route::post('/appointment/{uuid}', [WbookingController::class, 'postappointment'])->name('postappointment');

        Route::get('/wpatient/{uuid}', [WpatientsController::class, 'getwpatient'])->name('getwpatient');
        Route::post('/wpatient/{uuid}', [WpatientsController::class, 'postwpatient'])->name('postwpatient');
    });

});


Route::get('login', [LoginController::class, 'getlogin'])->name('getlogin');
Route::post('login', [LoginController::class, 'postlogin'])->name('postlogin');

Route::get('loginregister', [LoginController::class, 'getregister'])->name('getregister');
Route::post('loginregister', [LoginController::class, 'postregister'])->name('postregister');

Route::get('verify/{uuid}',[LoginController::class,'verify'])->name('verify');
Route::get('verify_advise/{uuid}',[WbookingController::class,'verify_advise'])->name('verify_advise');

Route::get('loginpatients', [LoginController::class, 'getloginpatients'])->name('getloginpatients');
Route::post('loginpatients', [LoginController::class, 'postloginpatients'])->name('postloginpatients');

Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('logoutpatient', [LoginController::class, 'logoutpatient'])->name('logoutpatient');

//->middleware('check_login')
Route::prefix('admin')->name('admin.')->middleware('check_login')->group(function (){
    Route::post('ckeditor/image_upload', [CkeditorController::class, 'upload'])->name('upload');

    Route::controller(UsersController::class)->prefix('users')->name('users.')->group(function () {
        Route::get('/', 'index')->name('index');

        Route::get('/create', 'create')->name('create');
        Route::post('/create', 'store')->name('store');

        Route::get('/edit/{uuid}', 'edit')->name('edit');
        Route::post('/edit/{uuid}', 'update')->name('update');

        Route::get('/delete/{uuid}', 'destroy')->name('destroy');
    });
    
    Route::prefix('information')->name('information.')->group(function (){
        Route::controller(PatientsController::class)->prefix('patients')->name('patients.')->group(function () {
            Route::get('/', 'index')->name('index');
            
            Route::get('/create', 'create')->name('create');
            Route::post('/create', 'store')->name('store');
    
            Route::get('/edit/{uuid}', 'edit')->name('edit');
            Route::post('/edit/{uuid}', 'update')->name('update');
            
            Route::get('/show/{uuid}', 'show')->name('show');

            Route::get('/addpatient/{uuid}', 'addpatient')->name('addpatient');
            Route::post('/addpatient/{uuid}', 'addpostpatient')->name('addpostpatient');

            Route::get('/delete/{uuid}', 'destroy')->name('destroy');

            Route::post('/fetch-doctor','fetchDoctor')->name('fetchDoctor');
        });
        
        Route::controller(DoctorsController::class)->prefix('doctors')->name('doctors.')->group(function () {
            Route::get('/', 'index')->name('index');
    
            Route::get('/create', 'create')->name('create');
            Route::post('/create', 'store')->name('store');
    
            Route::get('/edit/{uuid}', 'edit')->name('edit');
            Route::post('/edit/{uuid}', 'update')->name('update');
    
            Route::get('/delete/{uuid}', 'destroy')->name('destroy');
        });

        Route::controller(NewsController::class)->prefix('news')->name('news.')->group(function () {
            Route::get('/', 'index')->name('index');
    
            Route::get('/create', 'create')->name('create');
            Route::post('/create', 'store')->name('store');
    
            Route::get('/edit/{uuid}', 'edit')->name('edit');
            Route::post('/edit/{uuid}', 'update')->name('update');
    
            Route::get('/delete/{uuid}', 'destroy')->name('destroy');
        });

        Route::controller(ServicesController::class)->prefix('services')->name('services.')->group(function () {
            Route::get('/', 'index')->name('index');
    
            Route::get('/create', 'create')->name('create');
            Route::post('/create', 'store')->name('store');
    
            Route::get('/edit/{uuid}', 'edit')->name('edit');
            Route::post('/edit/{uuid}', 'update')->name('update');
    
            Route::get('/delete/{uuid}', 'destroy')->name('destroy');
        });

        Route::controller(CalendarsController::class)->prefix('calendars')->name('calendars.')->group(function () {
            Route::get('/', 'index')->name('index');
    
            Route::get('/create', 'create')->name('create');
            Route::post('/create', 'store')->name('store');
    
            Route::get('/edit/{uuid}', 'edit')->name('edit');
            Route::post('/edit/{uuid}', 'update')->name('update');
    
            Route::get('/delete/{uuid}', 'destroy')->name('destroy');
        });

        Route::controller(BookingController::class)->prefix('booking')->name('booking.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/appointment', 'appointment')->name('appointment');
            Route::get('/history_booking', 'history_booking')->name('history_booking');
            Route::get('/history_appointment', 'history_appointment')->name('history_appointment');
    
            Route::get('/create', 'create')->name('create');
            Route::post('/create', 'store')->name('store');
    
            Route::get('/edit/{uuid}', 'edit')->name('edit');
            Route::post('/edit/{uuid}', 'update')->name('update');
    
            Route::get('/success_appointment/{uuid}', 'success_appointment')->name('success_appointment');
            Route::get('/destroy_history_appointment/{uuid}', 'destroy_history_appointment')->name('destroy_history_appointment');
            Route::get('/not_success_appointment/{uuid}', 'not_success_appointment')->name('not_success_appointment');
            
            Route::get('/destroy_patient/{uuid}', 'destroy_patient')->name('destroy_patient');
            Route::get('/destroy_history/{uuid}', 'destroy_history')->name('destroy_history');
            Route::get('/delete/{uuid}', 'destroy')->name('destroy');
        });
    });
});

