<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // ریدایرکت به صفحه ورود گوگل
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // مدیریت callback و ورود/ثبت‌نام کاربر
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            // در صورت بروز خطا، به صفحه لاگین برگردان
            return redirect('/login');
        }

        // جستجوی کاربر با google_id یا ایمیل
        $user = User::where('google_id','=', $googleUser->id)
                    ->orWhere('email','=', $googleUser->email)
                    ->first();

        if($user) {
            // اگر کاربر وجود داشت، وارد سیستم کن
            Auth::login($user);
        } else {
            // در غیر این صورت، کاربر جدیدی بساز و وارد کن
            $user = User::create([
                'name'      => $googleUser->name,
                'email'     => $googleUser->email,
                'google_id' => $googleUser->id,
                // به عنوان پسورد از bcrypt استفاده می‌کنیم؛ این مقدار می‌تونه دلخواه باشه چون کاربر از طریق گوگل وارد می‌شود.
                'password'  => bcrypt('secret')
            ]);
            Auth::login($user);
        }

        // پس از ورود، کاربر به صفحه داشبورد هدایت می‌شود
        return redirect()->intended('/');
}

}
