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
        return view('seageat.FrontPage');
    }
    public function FrontPageCreateMenu()
    {
        return view('seageat.FrontPageCreateMenu');
    }
    public function FrontPageEditMenu()
    {
        return view('seageat.FrontPageEditMenu');
    }
    // Banner管理
    public function Banner()
    {
        return view('seageat.Banner');
    }
    public function Banner_estabilsh()
    {
        return view('seageat.BannerEstabilsh');
    }
    public function Banner_revise()
    {
        return view('seageat.BannerRevise');
    }
    // 活動管理
    public function Activity()
    {
        $activities = DB::table('activity')->get();
        //版型編號和裝態，是跟著選擇版型走的

        return view('seageat.Activity', compact('activities'));
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

        return redirect('/success-page');
    }



    //活動建立
    public function ActivityEstablish()
    {
        return view('seageat.ActivityEstablish');
    }

    public function ActivityPatternSetting()
    {
        return view('seageat.ActivityPatternSetting');
    }
    public function ActivityEstablishChosePattern()
    {
        return view('seageat.activityEstablishChosePattern');
    }
    public function ActivityEstablishChosePattern2()
    {
        return view('seageat.ActivityEstablishChosePattern2');
    }
    // 通路管理
    public function Recommend()
    {
        return view('seageat.Recommend');
    }
    public function RecommendEstablish()
    {
        return view('seageat.RecommendEstablish');
    }
    public function RecommendRevise()
    {
        return view('seageat.RecommendRevise');
    }
}
