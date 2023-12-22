<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\PatternController;
use App\Http\Controllers\Banner;
use App\Http\Controllers\Recommend;
use App\Http\Controllers\Front_page_menu;



use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

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
    //取得版型開始
    $now = Carbon::now();
    // $now = 2022;

    $results = DB::table('chose_pattern')
        ->where(function ($query) use ($now) {
            // 當前時間在start_time和end_time之間
            $query->where('start_time', '<=', $now)
                ->where('end_time', '>=', $now);
        })->orderBY('end_time', 'asc')
        ->first();
    // ->get();
    // dd("正確", $results);
    if (empty($results)) {
        $results = DB::table('chose_pattern')
            ->whereNull('end_time')
            ->where('start_time', '<=', $now)
            ->orderBy('start_time', 'desc') // 確保最接近現在的記錄在最前面
            ->first(); // 只選擇一筆記錄
        dd('錯誤');
    }

    $target = $results->whitch_pattern;
    $target = str_replace('-', '', $results->whitch_pattern);
    //取得版型結束

    //取得menu
    // 首先，獲取所有 menu 項目
    $menus = DB::table('menu')->get();


    // 現在，對每個 menu 項目進行迭代，獲取其對應的 child_menu 項目
    foreach ($menus as $menu) {
        $childMenus = DB::table('childmenu')
            ->where('menu_id', '=', $menu->id) // 確定外鍵和 menu 的 id 匹配
            ->get();

        // 將 childMenus 附加到 menu 物件
        $menu->childMenus = $childMenus;
    }

    // 現在 $menus 包含所有 menu 項目，以及其對應的 child_menu 項目

    // 取得swiper
    $swiper = DB::table('banner_table')
        ->where(function ($query) use ($now) {
            // 當前時間在start_time和end_time之間
            $query->where('start_time', '<=', $now)
                ->where('end_time', '>=', $now)->orderBy('Rank', 'desc');
        })
        ->get();
    // if (isEmpty($swiper)) {
    //     dd($swiper);

    //     $swiper = DB::table('banner_table')
    //         ->whereNull('end_time')
    //         ->where('start_time', '<=', $now)
    //         ->orderBy('start_time', 'desc') // 確保最接近現在的記錄在最前面
    //         ->first(); // 只選擇一筆記錄
    // }

    $icon = DB::table('icon')->get();

    $recommend = DB::table('recommend')->get();


    // dd($results->id);
    $activity = DB::table('pattern_table')->where('chose_pattern_id', $results->id)->get();

    $activityIds = $activity->pluck('activity_id'); // 從集合中提取所有的 activity_id

    $activities = DB::table('activity')
        ->join('pattern_table', 'activity.id', '=', 'pattern_table.activity_id')
        ->whereIn('activity.id', $activityIds)
        ->select('activity.title', 'activity.subtitle', 'activity.button_name', 'activity.button_link', 'activity.img_pc_url', 'activity.img_pad_url', 'activity.img_size_pc', 'activity.img_size_pad')->where('chose_pattern_id', $results->id)
        ->get();



    return view("front.$target", compact('menus', 'swiper', 'icon', 'recommend', 'activities'));
});

// Route::get('/a1', function () {
//     return view('front.A1');
// });
// Route::get('/a2', function () {
//     return view('front.A2');
// });
// Route::get('/a3', function () {
//     return view('front.A3');
// });

// Route::get('/b1', function () {
//     return view('front.B1');
// });
// Route::get('/b2', function () {
//     return view('front.B2');
// });
// Route::get('/b3', function () {
//     return view('front.B3');
// });

// Route::get('/c1', function () {
//     return view('front.C1');
// });
// Route::get('/c2', function () {
//     return view('front.C2');
// });

// Route::get('/d1', function () {
//     return view('front.D1');
// });
// Route::get('/d2', function () {
//     return view('front.D2');
// });
// //前端區域




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
    // icon
    Route::put('seagate/front_page/Updateicon/{id}',  [Front_page_menu::class, 'iconupdate'])->name("icon.update"); //訪問更新用的controller



    // banner管理
    Route::get('seagate/banner', [ProfileController::class, 'Banner'])->name('Banner');

    Route::get('seagate/banner_estabilsh', [ProfileController::class, 'Banner_estabilsh'])->name('BannerEstabilsh');

    Route::get('seagate/banner_revise/{id}', [ProfileController::class, 'Banner_revise'])->name('BannerRevise');



    //創建
    Route::post('seagate/banner_estabilsh/Store', [Banner::class, 'store'])->name("Storebanner"); //訪問新建立的controller
    //update
    // 更新
    Route::put('seagate/banner_estabilsh/Update/{id}', [Banner::class, 'update'])->name("Updatebanner"); //訪問新建立的controller
    Route::put('seagate/banner_estabilsh/Update2/{id}', [Banner::class, 'update_down'])->name("Updatebanner_down"); //訪問新建立的controller
    // 刪除

    Route::delete('seagate/banner_estabilsh/Destory/{id}', [Banner::class, 'destory'])->name("destorybanner");



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

    // 可能在這
    Route::post('seagate/store_PatternCreate', [PatternController::class, 'store'])->name('store_pattern');

    Route::get('seagate/store_PatternCreate/{id}', [ProfileController::class, 'ActivityPatternShow'])->name('store_patternShow');

    // 可能在這


    // 版型設定 更新版型之後的事情
    Route::put('seagate/store_PatternCreate/{id}', [PatternController::class, 'update'])->name('store_patternUpdate');

    Route::put('seagate/destory/{id}', [PatternController::class, 'destory'])->name('destoryPattern');


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
