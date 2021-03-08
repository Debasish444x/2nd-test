<?php

use App\Http\Controllers\Crud_controller;
use App\Http\Controllers\Db_test;
use App\Http\Controllers\Fetch_data;
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

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/about', function () {
//     if (!session()->has('email')) {
//         session()->flash('error','you have to login first');
//         return redirect('login');    
//     }else{
//         return redirect ('about');
//     }
// })->name('about');
Route::group(['middleware'=>['Userauth']],function(){
    Route::get('/about',[Crud_controller::class,'about'])->name('about');
    Route::get('/s_set',[Crud_controller::class,'session_set']);

});

Route::get('/logout',[Crud_controller::class,'logout'])->name('logout');
// Route::get('/about',[Crud_controller::class, 'about'])->name('about');
Route::get('/reg',[Crud_controller::class, 'reg'])->name('register');
Route::post('/reg',[Crud_controller::class, 'store']);
// Route::get('/s_set','Crud_controller@session_set');
// Route::get('s_get','Crud_controller@session_get');
// Route::get('/s_set',[Crud_controller::class,'session_set']);
Route::get('/s_get',[Crud_controller::class,'session_get']);
Route::get('/s_remove',[Crud_controller::class,'session_remove']);
Route::get('/login',[Crud_controller::class,'login'])->name('login');
Route::post('/login',[Crud_controller::class,'login_check']);
Route::get('/select',[Db_test::class,'select'])->name('select');
Route::get('/insert',[Db_test::class,'insert'])->name('insert');
Route::get('/update',[Db_test::class,'update'])->name('update');
Route::get('/delete',[Db_test::class,'delete'])->name('delete');

//fetch

Route::get('/fetch_data',[Fetch_data::class,'fetch_all'])->name('fetch_data');
