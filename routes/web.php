<?php

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

    Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('auth.login');
Route::get('login',function (){
    return view('logout', ["title" => "Login"]);
});
Route::get('logout', function(){
    \Illuminate\Support\Facades\Auth::logout();
    return redirect('/login');
});

Route::middleware('auth')->group(function(){
    Route::get('/', function () {
        return view('welcome',["title" => "Welcome"]);
    });
    Route::get('/home', function () {
        return view('home',["title" => "Home"]);
    });
    Route::get('/menu',function(){
        return view('menu',["title" => "Menu"]);
    });
    Route::get('/contact_us',[\App\Http\Controllers\CalculationController::class, 'index']);;

//    Route::get('/home/user',function(){
//        return view('user', ["title" => "User"]);
//    });

    //user
    Route::get('/user',[\App\Http\Controllers\UserController::class, 'index',])->name('user');
    Route::get('/user/register',[\App\Http\Controllers\UserController::class, 'create'])->name('create_user');
    Route::post('/user',[\App\Http\Controllers\UserController::class, 'store',])->name('tambah_user');
    Route::get('/user/delete_user/{user}',[\App\Http\Controllers\UserController::class, 'destroy'])->name('delete_user');
    Route::get('/user/{user}/edit',[\App\Http\Controllers\UserController::class, 'edit'])->name('edit_user');
    Route::post('/update_user/{user}',[\App\Http\Controllers\UserController::class,'update'])->name('update_user');

    //order
    Route::get('/order',[\App\Http\Controllers\OrderController::class,'index'])->name('order');
    Route::get('/order/register',[\App\Http\Controllers\OrderController::class,'create'])->name('create_order');
    Route::post('/order',[\App\Http\Controllers\OrderController::class,'store'])->name('orders');
    Route::get('/order/{order}/edit',[\App\Http\Controllers\OrderController::class,'edit'])->name('edit_order');
    Route::post('/update_order/{order}',[\App\Http\Controllers\OrderController::class,'update'])->name('update_order');
    Route::get('/order/delete_order/{order}', [\App\Http\Controllers\OrderController::class,'destroy'])->name('delete_order');

    //datek
    Route::get('/datek',[\App\Http\Controllers\DatekController::class,'index'])->name('datek');
    Route::get('/datek/register',[\App\Http\Controllers\DatekController::class,'create'])->name('create_datek');
    Route::post('/datek',[\App\Http\Controllers\DatekController::class, 'store'])->name('dateks');
    Route::get('/datek/{datek}/edit', [\App\Http\Controllers\DatekController::class,'edit'])->name('edit_datek');
    Route::post('/update_datek/{datek}',[\App\Http\Controllers\DatekController::class,'update'])->name('update_datek');

    //eksekusi
    Route::get('/eksekusi',[\App\Http\Controllers\EksekusiController::class,'index'])->name('eksekusi');
    Route::get('/eksekusi/register', [\App\Http\Controllers\EksekusiController::class,'create'])->name('create_eksekusi');
    Route::post('/eksekusi',[\App\Http\Controllers\EksekusiController::class,'store'])->name('eksekusis');
    Route::get('/eksekusi/{eksekusi}/edit',[\App\Http\Controllers\EksekusiController::class,'edit'])->name('edit_eksekusi');
    Route::post('/update_eksekusi/{eksekusi}',[\App\Http\Controllers\EksekusiController::class,'update'])->name('update_eksekusi');
    Route::get('/reset', [\App\Http\Controllers\EksekusiController::class,'destroy'])->name('reset');

    //repondence
    Route::get('/respondence',[\App\Http\Controllers\RespondenceController::class, 'index'])->name('respondence');
    Route::get('/respondece/tambah',[\App\Http\Controllers\RespondenceController::class,'create'])->name('create_respondence');
    Route::post('/respondence',[\App\Http\Controllers\RespondenceController::class,'store'])->name('respondences');
    Route::get('/search_respondence',[\App\Http\Controllers\RespondenceController::class,'search'])->name('search_respondence');
    Route::get('/respondence/delete_respondence/{user}',[\App\Http\Controllers\RespondenceController::class, 'destroy'])->name('delete_respondence');
    Route::get('/respondence/{respondence}/edit',[\App\Http\Controllers\RespondenceController::class, 'edit'])->name('edit_respondence');
    Route::post('/update_respondence/{user}',[\App\Http\Controllers\RespondenceController::class,'update'])->name('update_respondence');

    //laporan
    Route::get('/laporan', [\App\Http\Controllers\LaporanController::class,'index'])->name('laporan');
    Route::get('/laporan/print', [\App\Http\Controllers\LaporanController::class,'print'])->name('print_laporan');
});
