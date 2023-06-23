<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Requests\ContactRequest;
use Illuminate\Foundation\Http\Middleware\HandlePrecognitiveRequests;


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

//------------------------------------------------------------------------ 
//  TOPページ表示
Route::get('/', [ContactController::class, 'index']);

//------------------------------------------------------------------------
// 　問い合わせフォーム表示
Route::get('/contact', [ContactController::class, 'contact']);

//  問合せフォームで確認ボタンを押すと確認画面へ
Route::post('/contacts/confirm', [ContactController::class, 'confirm']);

//　確認画面表示
Route::get('/contacts/confirm', [ContactController::class, 'confirm']);

// 　問合せフォームで確認ボタンを押すと完了画面へ
Route::post('/contacts/thanks', [ContactController::class, 'thanks']);

//------------------------------------------------------------------------
//  管理画面フォーム表示
Route::get('/manage', [ContactController::class, 'manage']);

//  管理画面フォームで検索を押すと検索結果を表示
Route::get('/manage/search', [ContactController::class, 'search']);

//  管理画面フォームで削除ボタンを押すと該当idのデータを削除
Route::delete('/manage/delete', [ContactController::class, 'delete']);

