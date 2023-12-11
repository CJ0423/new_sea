<x-guest-layout>
    <!-- Session Status -->

    <h2 class="text-color-green-500"><b>Welcome Back !<b></h2>
    <h3>繼續登入SEAGATE</h3>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->

        <div class="mt-4">
            <x-input-label for="email" :value="__('帳號')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder='請輸入帳號' required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>


        <!-- Password -->
        <div class="mt-4">
        <div class="flex justify-between ">
             <x-input-label for="password" :value="__('密碼')" />

             @if (Route::has('password.request'))
                  <a  class="underline text-sm text-gray-400 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 forget-password" href="{{ route('password.request') }}">
                {{ __('忘記密碼?') }}
                 </a>
              @endif
        </div>

            <x-text-input id="password" class="block mt-1 w-full mt-4"
                            type="password"
                            name="password"
                            placeholder='請輸入密碼'
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->

        <div class="flex items-center justify-center items-center mt-4 pt-2.5 pb-2.5 mistake-btn">
            帳號密碼錯誤
        </div>
        <div class=" mt-4 flex justify-between items-center">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-3  text-sm text-gray-400">{{ __('記住我') }}</span>
            </label>



            <div class="flex items-center justify-end ">
                <x-primary-button  class="ms-2 login-btn flex items-center justify-center">
                    {{ __('登入') }}
                </x-primary-button>
            </div>
        </div>


    </form>
</x-guest-layout>
