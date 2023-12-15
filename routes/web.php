<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    return view('seageat.FrontPage'); //到時候要改成真正的畫面
})->middleware(['auth', 'verified'])->name('go-to-login');

// Route::get('/dashboard', function () {
//     return view('auth/login');
//     //auth就是在判斷有沒有登入verified是用來去做信箱驗證的我們現在不需要
// })->middleware(['auth', 'verified'])->name('dashboard'); //以這個來說就是 {{route('dashboard')}}

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // 這是首頁的區域

    Route::get('seagate/front_page', [ProfileController::class, 'Front_page'])->name('Front_page');
});






require __DIR__ . '/auth.php';
