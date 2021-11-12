<?php

use App\Http\Controllers\CountryController;
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

Route::get('/', [CountryController::class, 'index'])->name('homepage');
Route::get('countries/export', [CountryController::class, 'export'])->name('countries.export');

Route::group(['middleware' => ['verified']], function () {
    Route::get('countries/create', [CountryController::class, 'create'])->name('countries.create');
    Route::get('countries/{country}', [CountryController::class, 'show'])->name('countries.show');
    Route::post('countries', [CountryController::class, 'store'])->name('countries.store');

    Route::get('profiles', [UserController::class, 'index'])->name('profiles');
    Route::get('profiles/{user}', [UserController::class, 'profile'])->name('profiles.show');
    Route::post('profiles/{user}/set-countries', [UserController::class, 'setCountries'])->name('profiles.setCountries');
});

require __DIR__ . '/auth.php';
