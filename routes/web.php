<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/buy-cookie', function () {
        return view('buy-cookie');
    })->name('cookie');
    Route::get('buy/{cookies}', function ($cookies) {
        $wallet = Auth::user()->wallet;
        $user = Auth::user();
        User::where('id', $user->id)->update(['wallet' => $wallet - $cookies * 1]);
        Log:info('User ' . $user->email . ' have bought ' . $cookies . ' cookies'); // we need to log who ordered and how much
        return 'Success, you have bought ' . $cookies . ' cookies!';
    });
});