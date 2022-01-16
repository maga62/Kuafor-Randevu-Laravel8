<?php

use App\Http\Controllers\RandevuController;
use App\Http\Controllers\UserController;
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

//Route::get('/', function () {return view('home.index');});
//home routlari
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');//view çagrısı
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home_2');//view çagrısı
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');//view çagrısı
Route::post('/sendmessage', [App\Http\Controllers\HomeController::class, 'sendmessage'])->name('sendmessage');//Route çagrısı bağlı olan sayfada
Route::post('/getproduct', [App\Http\Controllers\HomeController::class, 'getproduct'])->name('getproduct');//Route çagrısı bağlı olan sayfada
Route::get('/productlist/{search}', [App\Http\Controllers\HomeController::class, 'productlist'])->name('productlist');//view çagrısı
Route::get('/aboutus', [App\Http\Controllers\HomeController::class, 'aboutus'])->name('aboutus');//view çagrısı
Route::get('/faq', [App\Http\Controllers\HomeController::class, 'faq'])->name('faq');     //view çagrısı
Route::get('/referance', [App\Http\Controllers\HomeController::class, 'referance'])->name('referance'); //view çagrısı
Route::get('/service/{id}/{slug}', [App\Http\Controllers\HomeController::class, 'service_detail'])->name('service_detail');//view çagrısı
Route::get('/category/{id}/{slug}', [App\Http\Controllers\HomeController::class, 'category_service'])->name('category');//view çagrısı


//admin rootlari
Route::middleware("admin")->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('adminhome');


        // admin Category
        Route::get('/category', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('admin_category');
        Route::get('/category/create', [App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('admin_category_create');
        Route::post('/category/store', [App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('admin_category_store');
        Route::post('/category/update/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('admin_category_update');
        Route::get('/category/edit/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('admin_category_edit');
        Route::get('/category/show/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'show'])->name('admin_category_show');
        Route::get('/category/destroy/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('admin_category_destroy');

        //admin service routlari
        Route::prefix('service')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\ServiceController::class, 'index'])->name('admin_service');
            Route::get('/create', [App\Http\Controllers\Admin\ServiceController::class, 'create'])->name('admin_service_create');
            Route::post('/store', [App\Http\Controllers\Admin\ServiceController::class, 'store'])->name('admin_service_store');
            Route::post('/update/{id}', [App\Http\Controllers\Admin\ServiceController::class, 'update'])->name('admin_service_update');
            Route::get('/edit/{id}', [App\Http\Controllers\Admin\ServiceController::class, 'edit'])->name('admin_service_edit');
            Route::get('/show/{id}', [App\Http\Controllers\Admin\ServiceController::class, 'show'])->name('admin_service_show');
            Route::get('/destroy/{id}', [App\Http\Controllers\Admin\ServiceController::class, 'destroy'])->name('admin_service_destroy');

        });

        //faq routlari
        Route::prefix('faq')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\FaqController::class, 'index'])->name('admin_faq');
            Route::get('/create', [App\Http\Controllers\Admin\FaqController::class, 'create'])->name('admin_faq_create');
            Route::post('/store', [App\Http\Controllers\Admin\FaqController::class, 'store'])->name('admin_faq_store');
            Route::post('/update/{id}', [App\Http\Controllers\Admin\FaqController::class, 'update'])->name('admin_faq_update');
            Route::get('/edit/{id}', [App\Http\Controllers\Admin\FaqController::class, 'edit'])->name('admin_faq_edit');
            Route::get('/show/{id}', [App\Http\Controllers\Admin\FaqController::class, 'show'])->name('admin_faq_show');
            Route::get('/destroy/{id}', [App\Http\Controllers\Admin\FaqController::class, 'destroy'])->name('admin_faq_destroy');

        });

        //randevu routlari
        Route::prefix('randevu')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\RandevuController::class, 'index'])->name('admin_randevu');
            Route::get('/create', [App\Http\Controllers\Admin\RandevuController::class, 'create'])->name('admin_randevu_create');
            Route::post('/store', [App\Http\Controllers\Admin\RandevuController::class, 'store'])->name('admin_randevu_store');
            Route::post('/update/{id}', [App\Http\Controllers\Admin\RandevuController::class, 'update'])->name('admin_randevu_update');
            Route::get('/edit/{id}', [App\Http\Controllers\Admin\RandevuController::class, 'edit'])->name('admin_randevu_edit');
            Route::get('/show/{id}', [App\Http\Controllers\Admin\RandevuController::class, 'show'])->name('admin_randevu_show');
            Route::get('/destroy/{id}', [App\Http\Controllers\Admin\RandevuController::class, 'destroy'])->name('admin_randevu_destroy');

        });

        //time routlari
        Route::prefix('time')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\TimeController::class, 'index'])->name('admin_time');
            Route::get('/create', [App\Http\Controllers\Admin\TimeController::class, 'create'])->name('admin_time_create');
            Route::post('/store', [App\Http\Controllers\Admin\TimeController::class, 'store'])->name('admin_time_store');
            Route::post('/update/{id}', [App\Http\Controllers\Admin\TimeController::class, 'update'])->name('admin_time_update');
            Route::get('/edit/{id}', [App\Http\Controllers\Admin\TimeController::class, 'edit'])->name('admin_time_edit');
            Route::get('/show/{id}', [App\Http\Controllers\Admin\TimeController::class, 'show'])->name('admin_time_show');
            Route::get('/destroy/{id}', [App\Http\Controllers\Admin\TimeController::class, 'destroy'])->name('admin_time_destroy');

        });

        //admin user routlari
        Route::prefix('user')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin_user');
            Route::get('/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('admin_user_create');
            Route::post('/store', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('admin_user_store');
            Route::post('/update/{id}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin_user_update');
            Route::post('/role_add/{user_id}', [App\Http\Controllers\Admin\UserController::class, 'role_add'])->name('admin_user_role_add');
            Route::get('/role_edit/{user_id}', [App\Http\Controllers\Admin\UserController::class, 'role_edit'])->name('admin_user_role_edit');
            Route::get('/role_delete/{user_id}/{role_id}', [App\Http\Controllers\Admin\UserController::class, 'role_delete'])->name('admin_user_role_delete');
            Route::get('/edit/{id}', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin_user_edit');
            Route::get('/show/{id}', [App\Http\Controllers\Admin\UserController::class, 'show'])->name('admin_user_show');
            Route::get('/destroy/{id}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('admin_user_destroy');

        });

        //admin contact messages routlari
        Route::prefix('message')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\MessageController::class, 'index'])->name('admin_message');
            Route::get('/create', [App\Http\Controllers\Admin\MessageController::class, 'create'])->name('admin_message_create');
            Route::post('/store', [App\Http\Controllers\Admin\MessageController::class, 'store'])->name('admin_message_store');
            Route::post('/update/{id}', [App\Http\Controllers\Admin\MessageController::class, 'update'])->name('admin_message_update');
            Route::get('/edit/{id}', [App\Http\Controllers\Admin\MessageController::class, 'edit'])->name('admin_message_edit');
            Route::get('/show/{id}', [App\Http\Controllers\Admin\MessageController::class, 'show'])->name('admin_message_show');
            Route::get('/destroy/{id}', [App\Http\Controllers\Admin\MessageController::class, 'destroy'])->name('admin_message_destroy');

        });

        //admin review routlari
        Route::prefix('review')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\ReviewController::class, 'index'])->name('admin_review');
            Route::get('/create', [App\Http\Controllers\Admin\ReviewController::class, 'create'])->name('admin_review_create');
            Route::post('/store', [App\Http\Controllers\Admin\ReviewController::class, 'store'])->name('admin_review_store');
            Route::post('/update/{id}', [App\Http\Controllers\Admin\ReviewController::class, 'update'])->name('admin_review_update');
            Route::get('/edit/{id}', [App\Http\Controllers\Admin\ReviewController::class, 'edit'])->name('admin_review_edit');
            Route::get('/show/{id}', [App\Http\Controllers\Admin\ReviewController::class, 'show'])->name('admin_review_show');
            Route::get('/destroy/{id}', [App\Http\Controllers\Admin\ReviewController::class, 'destroy'])->name('admin_review_destroy');

        });
        //Service IMage Galery routlari
        Route::prefix('image')->group(function () {
            Route::get('/{id}', [App\Http\Controllers\Admin\ImageController::class, 'index'])->name('admin_service_image');
            Route::post('/store', [App\Http\Controllers\Admin\ImageController::class, 'store'])->name('admin_service_image_store');
            Route::get('/destroy/{id}', [App\Http\Controllers\Admin\ImageController::class, 'destroy'])->name('admin_service_image_destroy');
        });

        //admin setting routlari
        Route::get('/setting', [App\Http\Controllers\Admin\SettingController::class, 'index'])->name('admin_setting');
        Route::post('/setting/update/{id}', [App\Http\Controllers\Admin\SettingController::class, 'update'])->name('admin_setting_update');
    });


});

//user roulari
Route::middleware("auth")->prefix('user')->namespace("user")->group(function () {
    Route::get('/profile', [UserController::class, 'index'])->name('profile.show');
    Route::get('/randevu_alma', [UserController::class, 'randevu_alma'])->name('randevu_alma');
    Route::get('/saatgetir/{id}', [UserController::class, 'saatgetir'])->name('saatgetir');
    Route::get('/myreview', [UserController::class, 'myreview'])->name('myreview');
    Route::get('/deletereview/{id}', [UserController::class, 'deletereview'])->name('user_review_destroy');

    //user randevu
    Route::prefix('randevu')->group(function () {
        Route::get('/', [RandevuController::class, 'index'])->name('user_randevu');
        Route::post('/store', [RandevuController::class, 'store'])->name('user_randevu_store');
        Route::get('/show/{id}', [RandevuController::class, 'show'])->name('user_randevu_show');
        Route::get('/destroy/{id}', [RandevuController::class, 'destroy'])->name('user_randevu_destroy');
    });

});

//adminlogin
Route::get('/admin/login', [App\Http\Controllers\HomeController::class, 'login'])->name('admin_login');
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('user_logout');
Route::post('/admin/login_check', [App\Http\Controllers\HomeController::class, 'login_check'])->name('login_check');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

