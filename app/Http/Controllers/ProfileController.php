<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

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
        return view('seageat.Activity');
    }
    // 活動編輯
    public function ActivityRevise()
    {
        return view('seageat.ActivityRevise');
    }
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
