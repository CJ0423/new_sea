<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\PatternController;
use App\Http\Controllers\Recommend;
use App\Http\Controllers\Front_page_menu;


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
//前端區域
Route::get('/', function () {
    return view('front.index');
});

Route::get('/a1', function () {
    return view('A1');
});
Route::get('/a2', function () {
    return view('A2');
});
Route::get('/a3', function () {
    return view('A3');
});

Route::get('/b1', function () {
    return view('B1');
});
Route::get('/b2', function () {
    return view('B2');
});
Route::get('/b3', function () {
    return view('B3');
});

Route::get('/c1', function () {
    return view('C1');
});
Route::get('/c2', function () {
    return view('C2');
});

Route::get('/d1', function () {
    return view('D1');
});
Route::get('/d2', function () {
    return view('D2');
});
//前端區域




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

    Route::get('seagate/front_page/editmenu/{id}', [ProfileController::class, 'FrontPageEditMenu'])->name('EditMenu');

    Route::post('seagate/front_page/Storemenu', [Front_page_menu::class, 'store'])->name("Storemenu"); //訪問新建立的controller

    Route::put('seagate/front_page/Updatemenu/{id}',  [Front_page_menu::class, 'update'])->name("updateMenu"); //訪問更新用的controller



    // banner管理
    Route::get('seagate/banner', [ProfileController::class, 'Banner'])->name('Banner');
    Route::get('seagate/banner_estabilsh', [ProfileController::class, 'Banner_estabilsh'])->name('BannerEstabilsh');
    Route::get('seagate/banner_revise', [ProfileController::class, 'Banner_revise'])->name('BannerRevise');
    // 活動管理
    Route::get('seagate/activity', [ProfileController::class, 'Activity'])->name('activity');
    // 建立新的活動

    Route::post('seagate/Create_Activity', [ActivityController::class, 'store']); //訪問新建立的controller


    // 活動編輯
    // 顯示活動編輯表單（GET 請求）
    Route::get('seagate/activity/revise/{id}', [ProfileController::class, 'showActivityRevise'])->name('ActivityRevise');

    // 處理活動編輯表單提交（PUT 請求）
    Route::put('seagate/activity/revise/{id}', [ProfileController::class, 'updateActivityRevise'])->name('ActivityRevise.update');


    Route::get('seagate/activityEstablish', [ProfileController::class, 'ActivityEstablish'])->name('ActivityEstablish');

    // 版型設定 確定版型之後的事情
    Route::get('seagate/activityPatternCreate', [ProfileController::class, 'ActivityPatternCreate'])->name('PatternSetting-create');

    Route::post('seagate/store_PatternCreate', [PatternController::class, 'store'])->name('store_pattern');

    Route::get('seagate/store_PatternCreate/{id}', [ProfileController::class, 'ActivityPatternShow'])->name('store_patternShow');

    // 版型設定 更新版型之後的事情
    Route::put('seagate/store_PatternCreate/{id}', [PatternController::class, 'update'])->name('store_patternUpdate');


    // 建立新的版型 選擇好之後要上傳的時候才是這邊
    // Route::post('seagate/ActivityPatternCreate', [PatternController::class, 'PatternSetting'])->name('PatternSetting-create');


    // 活動管理的選版型
    Route::get('seagate/ActivityEstablishChosePattern', [ProfileController::class, 'ActivityEstablishChosePattern'])->name('ChosePattern');

    // Route::get('seagate/ActivityEstablishChosePattern2', [ProfileController::class, 'ActivityEstablishChosePattern'])->name('ChosePattern');




    // 通路管理
    Route::get('seagate/recommend', [ProfileController::class, 'Recommend'])->name('Recommend');


    Route::get('seagate/recommend/recommendEstablish', [ProfileController::class, 'RecommendEstablish'])->name('RecommendEstablish');

    Route::post('seagate/recommend/recommendStore', [Recommend::class, 'store'])->name("newRecommend"); //訪問新建立的controller

    Route::put('seagate/recommend/recommendUpdate/{id}', [Recommend::class, 'update'])->name("updateRecommend"); //訪問更新用的controller

    Route::delete('seagate/recommend/recommendDestory/{id}', [Recommend::class, 'destory'])->name("destoryRecommend"); //訪問更新用的controller

    Route::get('seagate/recommend/recommendRevise/{id}', [ProfileController::class, 'RecommendRevise'])->name('RecommendRevise');
});






require __DIR__ . '/auth.php';
