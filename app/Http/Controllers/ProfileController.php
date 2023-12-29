<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;


class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    // 首頁管理
    public function front_page()
    {
        $menus = DB::table('menu')->get();
        // ->leftJoin('childmenu', 'menu.id', '=', 'childmenu.menu_id') // 使用 leftJoin 而不是 join
        // ->select('menu.id as menuId', 'menu.menu_name', 'menu.menu_link', 'childmenu.id as childMenuId', 'childmenu.menu_name as childMenuName', 'childmenu.menu_link as childMenuLink')

        $icons = DB::table('icon')->get();

        return view('seageat.FrontPage', compact('menus', 'icons'));
    }
    public function FrontPageCreateMenu()
    {
        return view('seageat.FrontPageCreateMenu');
    }
    public function FrontPageEditMenu($id)
    {
        $child = DB::table('childmenu')->where('menu_id', $id)->get();
        $menu = DB::table('menu')->where('id', $id)->get();

        // 威斯利支援
        if ($child->count() < 10) {
            $add_child_row = 10 - $child->count();
            for ($i = 0; $i < $add_child_row; $i++) {
                DB::table('childmenu')->insert([
                    'menu_name'  => null,
                    'menu_link'  => null,
                    'menu_id'    => $id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            }

            $child = DB::table('childmenu')->where('menu_id', $id)->get();
        }
        //到此


        return view('seageat.FrontPageEditMenu', compact('child', 'menu'));
    }
    // Banner管理
    public function Banner()
    {
        $banner = DB::table('banner_table')->get();

        return view('seageat.Banner', compact('banner'));
    }
    public function Banner_estabilsh()
    {

        return view('seageat.BannerEstabilsh');
    }
    public function Banner_revise($id)
    {
        $banner = DB::table('banner_table')->where("id", $id)->get();

        return view('seageat.BannerRevise', compact("banner"));
    }
    // 活動管理
    public function Activity()
    {
        $now = Carbon::now()->timezone('Asia/Taipei'); // 读取现在时间

        $activities = DB::table('activity')->get();
        // 版型编号和状态，是跟着选择版型走的
        $chose_patterns = DB::table('pattern_table')
            ->join('chose_pattern', 'pattern_table.chose_pattern_id', '=', 'chose_pattern.id')
            ->select(
                'pattern_table.*',
                'chose_pattern.whitch_pattern',
                'chose_pattern.start_time',
                'chose_pattern.end_time'
            )
            ->get();

        // 处理 uniquePatterns 集合
        foreach ($chose_patterns as $pattern) {
            $start_time = Carbon::parse($pattern->start_time);
            $end_time = Carbon::parse($pattern->end_time);

            if ($now->isBetween($start_time, $end_time)) {
                $pattern->status = '已上架';
            } elseif ($now->gt($end_time)) {
                $pattern->status = '已下架';
            } else {
                $pattern->status = '排程上架';
            }
        }

        $uniquePatterns = $chose_patterns;

        // $uniquePatterns 现在包含了每组唯一的记录和它们的状态
        return view('seageat.Activity', compact('activities', 'uniquePatterns', 'now'));
    }
    // 活動編輯
    // 用於顯示活動編輯表單的方法
    public function showActivityRevise($id)
    {
        $activity = DB::table('activity')->where('id', $id)->first();

        if (!$activity) {
            // 處理找不到活動的情況，例如重定向回上一頁或顯示錯誤訊息
            return redirect()->back()->with('error', 'Activity not found.');
        }
        return view('seageat.ActivityRevise', compact('activity'));
    }

    // 用於處理編輯表單提交的方法
    public function updateActivityRevise(Request $request, $id)
    {
        // dd($id);

        $validatedData = $request->validate([
            // 验证规则
        ]);

        // 檢查活動是否存在
        $activity = DB::table('activity')->where('id', $id)->first();
        if (!$activity) {
            return redirect()->back()->with('error', 'Activity not found.');
        }

        // 處理 'computer' 文件上傳
        if ($request->hasFile('computer')) {
            $computerFile = $request->file('computer');
            $computerFilePath = $computerFile->store('public/img/activity');
            $validatedData['img_pc_url'] = substr($computerFilePath, 7);
        }

        // 處理 'phone' 文件上傳
        if ($request->hasFile('phone')) {
            $phoneFile = $request->file('phone');
            $phoneFilePath = $phoneFile->store('public/img/activity');
            $validatedData['img_pad_url'] = substr($phoneFilePath, 7);
        }

        // 更新資料庫
        DB::table('activity')->where('id', $id)->update([
            'img_pc_url' => $validatedData['img_pc_url'] ?? $activity->img_pc_url,
            'img_pad_url' => $validatedData['img_pad_url'] ?? $activity->img_pad_url,
            'img_size_pc' => $request->input('img_size_pc'),
            'img_size_pad' => $request->input('img_size_pad'),
            'button_name' => $request->input('button_name'),
            'button_link' => $request->input('button_link'),
            'subtitle' => $request->input('subtitle'),
            'title' => $request->input('title'),
            'updated_at' => Carbon::now()
        ]);

        return redirect(route('activity'));
    }



    //活動建立
    public function ActivityEstablish()
    {

        return view('seageat.ActivityEstablish');
    }
    //創建新版型時
    public function  ActivityPatternCreate(Request $request)
    {
        $selectedPattern = $request->query('pattern'); //拿到需要的class
        $allActivity = DB::table('activity')->get();
        // dd($selectedPattern);

        return view('seageat.ActivityPatternCreate', compact('selectedPattern', 'allActivity'));
    }
    //更新新版型正在進行中時
    public function  ActivityPatternShow(Request $request, $id)
    {
        $selectedPattern = $request->query('pattern'); //拿到需要的class

        $allActivity = DB::table('activity')->get();

        // dd($allActivity);

        $pattern_table = DB::table('pattern_table')->where('id', $id)->get();

        $chose_pattern = DB::table('chose_pattern')->where('id', $pattern_table[0]->chose_pattern_id)->get();

        // dd($pattern_table[0]->chose_pattern_id);

        // dd($pattern_table[0]->chose_pattern_id);
        //一層一層最後把所需要的圖片全部抓出來
        $textData = DB::table('pattern_table')
            ->join('activity', 'pattern_table.activity_id', '=', 'activity.id')
            ->select(
                'pattern_table.*',
                'activity.title',
                'activity.subtitle',
                'activity.button_name',
                'activity.button_link',
                'activity.img_pc_url',
                'activity.img_pad_url',
                'activity.img_size_pc',
                'activity.img_size_pad'
            )
            ->where('pattern_table.chose_pattern_id', $pattern_table[0]->chose_pattern_id)
            ->get();

        //為了獲得時間
        $now = Carbon::now()->timezone('Asia/Taipei'); // 读取现在时间

        $activities = DB::table('activity')->get();
        // 版型编号和状态，是跟着选择版型走的
        $chose_patterns = DB::table('pattern_table')
            ->join('chose_pattern', 'pattern_table.chose_pattern_id', '=', 'chose_pattern.id')
            ->select(
                'pattern_table.*',
                'chose_pattern.whitch_pattern',
                'chose_pattern.start_time',
                'chose_pattern.end_time'
            )->where('chose_pattern_id', $chose_pattern[0]->id)
            ->get();

        // 处理 uniquePatterns 集合
        foreach ($chose_patterns as $pattern) {
            $start_time = Carbon::parse($pattern->start_time);
            $end_time = Carbon::parse($pattern->end_time);

            if ($now->isBetween($start_time, $end_time)) {
                $pattern->status = '下架';
            } elseif ($now->gt($end_time)) {
                $pattern->status = '刪除版型';
            } else {
                $pattern->status = '刪除版型';
            }
        }

        $uniquePatterns = $chose_patterns;


        // dd($uniquePatterns);
        // dd($chose_pattern[0]->id);


        return view('seageat.ActivityPatternShow', compact('selectedPattern', 'allActivity', 'pattern_table', 'textData', 'chose_pattern', 'uniquePatterns'));
    }
    //更新新版型完成時
    // public function  ActivityPatternUpdate(Request $request)
    // {
    //     $selectedPattern = $request->query('pattern'); //拿到需要的class
    //     $allActivity = DB::table('activity')->get();
    //     // dd($selectedPattern);

    //     return view('seageat.ActivityPatternCreate', compact('selectedPattern', 'allActivity'));
    // }
    public function ActivityEstablishChosePattern()
    {
        return view('seageat.ActivityEstablishChosePattern');
    }
    public function ActivityEstablishChosePattern2()
    {
        return view('seageat.ActivityEstablishChosePattern2');
    }
    // 通路管理
    public function Recommend()
    {
        $recommendData = DB::table('recommend')->get();

        return view('seageat.Recommend', compact('recommendData'));
    }
    public function RecommendEstablish()
    {
        return view('seageat.RecommendEstablish');
    }
    public function RecommendRevise($id)
    {
        $recommendData = DB::table('recommend')->where("id", $id)->first();

        return view('seageat.RecommendRevise', compact('recommendData'));
    }
}
