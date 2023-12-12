<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // Fetch all users
    // $users = DB::select('SELECT * FROM users');

    // Insert users
    // $user = DB::insert('INSERT INTO users (name, email , password) VALUES (?,?,?)',[
    //     'Udin',
    //     'Udin@din.com',
    //     'udindon'
    // ]);

    // Update users
    // $user = DB::update('UPDATE users SET email='a@a.com' WHERE id = 2');

    // Delete users
    // $user = DB::delete('DELETE users WHERE id = 2');

    //dd($users);
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
