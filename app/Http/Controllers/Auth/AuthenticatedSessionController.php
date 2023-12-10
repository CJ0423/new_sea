<?php
// 驗證session
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // 嘗試進行用戶認證，這會檢查用戶輸入的憑證（如郵箱和密碼）
        // 如果認證失敗，則會拋出一個驗證異常（AuthenticationException）
        $request->authenticate();

        // 重新生成會話 ID 以防止會話固定攻擊
        // 這是一個安全措施，當用戶成功登入後應該重新生成他們的會話 ID
        $request->session()->regenerate();

        // 重定向用戶到預期的目的地或默認的主頁
        // RouteServiceProvider::HOME 是在 RouteServiceProvider 中定義的路徑
        // intended 方法嘗試重定向到登入前用戶試圖訪問的頁面，如果無法確定則重定向到默認路徑

        return redirect()->intended(RouteServiceProvider::HOME);
    }


    /**
     * Destroy an authenticated session.
     *其實是登出帳號的意思
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
