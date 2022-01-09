<?php

use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::group([
    'middleware' => 'auth',
], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    //Users Route
    Route::resource('users', UserController::class);

    // Roles Routes
    Route::resource('roles', RoleController::class);
    Route::post('roles/permission/update', [RoleController::class, 'updatePermission'])->name('roles.permissions.update');
});


require __DIR__ . '/auth.php';
