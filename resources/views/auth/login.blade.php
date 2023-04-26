<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                {{-- <x-application-logo class="w-20 h-20 fill-current text-gray-500" /> --}}
                <img src="/dist/img/voer-logo-2x6.png">
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="username" :value="__('Tên đăng nhập')" />

                <x-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Mật khẩu')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Nhớ tài khoản') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                {{-- @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif --}}

                <x-button class="ml-3" style="background-color: red">
                    {{ __('Đăng nhập') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>

{{-- <style>
    .w-full.sm\:max-w-md.mt-6.px-6.py-4.bg-white.shadow-md.overflow-hidden.sm\:rounded-lg {
    width: 70%;
    margin-right: 5%;
    margin-left: 4%;
}
img {
    margin-top: -220px;
    margin-left: 420%;
}
.min-h-screen.flex.flex-col.sm\:justify-center.items-center.pt-6.sm\:pt-0.bg-gray-100 {
    margin-top: -50px;
}
button.inline-flex.items-center.px-4.py-2.bg-gray-800.border.border-transparent.rounded-md.font-semibold.text-xs.text-white.uppercase.tracking-widest.hover\:bg-gray-700.active\:bg-gray-900.focus\:outline-none.focus\:border-gray-900.focus\:ring.ring-gray-300.disabled\:opacity-25.transition.ease-in-out.duration-150.ml-3 {
    margin-right: 5%;
}
form {
    margin-left: 5%;
    margin-right: 5%;
}
@media (max-width: 360px){
img {
    margin-top: -220px;
    margin-left: 120%;
}
.w-full.sm\:max-w-md.mt-6.px-6.py-4.bg-white.shadow-md.overflow-hidden.sm\:rounded-lg {
    width: 100%;
    margin-right: 5%;
    margin-left: -20%;
}
}
@media (min-width: 361px) and (max-width: 500px){
    img {
    margin-top: -220px;
    margin-left: 125%;
}
.w-full.sm\:max-w-md.mt-6.px-6.py-4.bg-white.shadow-md.overflow-hidden.sm\:rounded-lg {
    width: 100%;
    margin-right: 5%;
    margin-left: -20%;
}
}
@media (min-width: 501px) and (max-width: 763px){
    img {
    margin-top: -220px;
    margin-left: 150%;
}
.w-full.sm\:max-w-md.mt-6.px-6.py-4.bg-white.shadow-md.overflow-hidden.sm\:rounded-lg {
    width: 100%;
    margin-right: 5%;
    margin-left: -20%;
}
}
@media (min-width: 764px) and (max-width: 1024px){
    img {
    margin-top: -220px;
    margin-left: 300%;
}
.w-full.sm\:max-w-md.mt-6.px-6.py-4.bg-white.shadow-md.overflow-hidden.sm\:rounded-lg {
    width: 100%;
    margin-right: 5%;
    margin-left: -5%;
}
}
</style> --}}
