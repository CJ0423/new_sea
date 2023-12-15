<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Route::get('/login', function () {
    if (Auth::check()) {
        return redirect('/dashboard'); // 已登录用户重定向到仪表板
    }
    return view('auth.login'); // 未登录用户显示登录页面
})->name('go-to-login');


Route::get('/dashboard', [ProfileController::class, 'Front_page'])->middleware(['auth', 'verified'])->name('dashboard'); //以這個來說就是 {{route('dashboard')}}

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // 這是首頁的區域
    Route::get('seagate/front_page', [ProfileController::class, 'Front_page'])->name('Front_page');
    // banner管理
    Route::get('seagate/banner', [ProfileController::class, 'Banner'])->name('Banner');
    Route::get('seagate/banner_estabilsh', [ProfileController::class, 'Banner_estabilsh'])->name('BannerEstabilsh');
    // 活動管理
    Route::get('seagate/activity', [ProfileController::class, 'Activity'])->name('activity');
    Route::get('seagate/activityEstablish', [ProfileController::class, 'ActivityEstablish'])->name('ActivityEstablish');
    // 通路管理
    Route::get('seagate/recommend', [ProfileController::class, 'Recommend'])->name('Recommend');
});






require __DIR__ . '/auth.php';
