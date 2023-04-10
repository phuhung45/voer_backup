<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mt-4">
                <x-label for="first_name" :value="__('Họ')" />

                <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" />
            </div>

            <div class="mt-4">
                <x-label for="last_name" :value="__('Tên')" />

                <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" />
            </div>

            <div class="mt-4">
                <x-label for="username" :value="__('Tên đăng nhập')" />

                <x-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-label for="is_active" :value="__('Trạng thái')" />

                <select name="is_active" class="form-control @error('is_active') is-invalid @enderror" id="is_active">
                    <option value="1">Kích hoạt</option>
                    <option value="0">Chưa kích hoạt</option>
                </select>            </div>

            <div class="mt-4">
                <x-label for="is_staff" :value="__('Nhân viên')" />

                <select name="is_staff" class="form-control @error('is_staff') is-invalid @enderror" id="is_staff">
                    <option value="1">Có</option>
                    <option value="0">Không</option>
                </select>            </div>

            <div class="mt-4">
                <x-label for="is_superuser" :value="__('Quản trị viên')" />

                <select name="is_superuser" class="form-control @error('is_superuser') is-invalid @enderror" id="is_superuser">
                    <option value="1">Có</option>
                    <option value="0">Không</option>
                </select>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Mật khẩu')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Nhập lại mật khẩu')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Đã có tài khoản?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Đăng ký') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
