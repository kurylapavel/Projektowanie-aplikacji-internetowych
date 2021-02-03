<?php
session_start();
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

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/NewCard', function(){
    return view('NewCard');
});

use App\Http\Controllers\newCard;
Route::post('/newCard',[App\Http\Controllers\newCard::class, 'CreateNewCard']);

Route::get('/transfer/{cardNumber}', function($cardNumber){
    return view('transfer',['cardNumber'=>$cardNumber]);
});

use App\Http\Controllers\preparation;
Route::get('/transfer/preparation/{cardNumber}',[App\Http\Controllers\preparation::class, 'preparation']);

use App\Http\Controllers\sendMoney;
Route::get('transfer/preparation/sendMoney/{value}/{cardNumber}',[App\Http\Controllers\sendMoney::class, 'sendMoney']);

use App\Http\Controllers\Checkhistory;
Route::get('/Checkhistory/{cardNumber}',[App\Http\Controllers\Checkhistory::class, 'Checkhistory']);

use App\Http\Controllers\UsersFromDB;
Route::get('/Users',[App\Http\Controllers\UsersFromDB::class, 'Users']);

use App\Http\Controllers\ActivateCard;
Route::get('ActivateCard',[App\Http\Controllers\ActivateCard::class, 'ActivateCard']);
Route::get('/Users/ActivateCard',[App\Http\Controllers\ActivateCard::class, 'ActivateCard']);

use App\Http\Controllers\CardsFromDB;
Route::get('/Cards',[App\Http\Controllers\CardsFromDB::class, 'Cards']);

use App\Http\Controllers\CardLock;
Route::get('CardLock',[App\Http\Controllers\CardLock::class, 'CardLock']);
Route::get('/Cards/CardLock',[App\Http\Controllers\CardLock::class, 'CardLock']);

use App\Http\Controllers\ChangeBalance;
Route::get('ChangeBalance',[App\Http\Controllers\ChangeBalance::class, 'ChangeBalance']);
Route::get('/Cards/ChangeBalance',[App\Http\Controllers\ChangeBalance::class, 'ChangeBalance']);

use App\Http\Controllers\Block;
Route::get('Block',[App\Http\Controllers\Block::class, 'Block']);

use App\Http\Controllers\UserSort;
Route::get('Users/SortByName',[App\Http\Controllers\UserSort::class, 'SortByName']);
Route::get('Users/SortBySurname',[App\Http\Controllers\UserSort::class, 'SortBySurname']);
Route::get('Users/SortByEmail',[App\Http\Controllers\UserSort::class, 'SortByEmail']);
Route::post('/Users/FindUserBySurname',[App\Http\Controllers\UserSort::class, 'FindUserBySurname']);

use App\Http\Controllers\CardSort;
Route::post('Cards/FindCardBySurname',[App\Http\Controllers\CardSort::class, 'FindCardBySurname']);


Route::get('/Contacts', function(){
    return view('Contact');
});

Route::get('transferSuccess', function(){
    return view('transferSuccess');
});