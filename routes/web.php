<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\main;
use App\Http\Controllers\login;
use App\Http\Controllers\sign;
use App\Http\Controllers\tag;
use App\Http\Controllers\write;
use App\Http\Controllers\calendar;
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

Route::get('/test/layout', function(){
  return view('layout/layout');
});

Route::get('/main', main::class);

Route::get('/login', login::class);
Route::post('/login', [login::class, 'login']);
Route::get('/logout', [login::class, 'logout']);
Route::get('/sign', sign::class);
Route::post('/sign', [sign::class, 'sign']);
Route::get('/tag/update', [tag::class, 'updateTag']);
Route::get('/board/{tag}', tag::class);
// Route::get('/login', login::class);
Route::post('/tag/add/action', [tag::class, 'addTag']);
Route::post('/tag/del', [tag::class, 'delete']);

Route::get('/write', write::class);
Route::post('/write/add', [write::class, 'addBoard']);
Route::post('board/add/comment', [tag::class, 'addComment']);
Route::get('/board/comment/delete/{id}/{user}', [tag::class, 'deleteComment']);

Route::get('/calendar', calendar::class);
Route::get('/calendar/updateCalendar', [calendar::class, 'updateCalendar']);
