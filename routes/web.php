<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ActivityController;

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

    Route::get('seagate/front_page/createmenu', [ProfileController::class, 'FrontPageCreateMenu'])->name('CreateMenu');

    Route::get('seagate/front_page/editmenu', [ProfileController::class, 'FrontPageEditMenu'])->name('EditMenu');
    // banner管理
    Route::get('seagate/banner', [ProfileController::class, 'Banner'])->name('Banner');
    Route::get('seagate/banner_estabilsh', [ProfileController::class, 'Banner_estabilsh'])->name('BannerEstabilsh');
    Route::get('seagate/banner_revise', [ProfileController::class, 'Banner_revise'])->name('BannerRevise');
    // 活動管理
    Route::get('seagate/activity', [ProfileController::class, 'Activity'])->name('activity');
    // 建立新的活動

    Route::post('seagate/Create_Activity', [ActivityController::class, 'store']); //訪問新建立的controller


    // 活動編輯
    Route::get('seagate/activity/revise', [ProfileController::class, 'ActivityRevise'])->name('ActivityRevise');

    Route::get('seagate/activityEstablish', [ProfileController::class, 'ActivityEstablish'])->name('ActivityEstablish');

    // 版型設定修改
    Route::get('seagate/activityPatternSetting', [ProfileController::class, 'ActivityPatternSetting'])->name('ActivityPatternSetting');

    // 活動管理的選版型
    Route::get('seagate/ActivityEstablishChosePattern', [ProfileController::class, 'ActivityEstablishChosePattern'])->name('ChosePattern');

    // Route::get('seagate/ActivityEstablishChosePattern2', [ProfileController::class, 'ActivityEstablishChosePattern'])->name('ChosePattern');

    // 通路管理
    Route::get('seagate/recommend', [ProfileController::class, 'Recommend'])->name('Recommend');


    Route::get('seagate/recommend/recommendEstablish', [ProfileController::class, 'RecommendEstablish'])->name('RecommendEstablish');

    Route::get('seagate/recommend/recommendRevise', [ProfileController::class, 'RecommendRevise'])->name('RecommendRevise');
});






require __DIR__ . '/auth.php';
