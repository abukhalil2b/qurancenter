<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- idcard  -->
        <div>
            <x-input-label for="idcard" :value=" 'الرقم المدني' " />
            <x-text-input id="idcard" class="block mt-1 w-full" type="number" name="idcard" :value="old('idcard')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('idcard')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value=" 'كلمة المرور' " />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="mr-2 text-sm text-gray-600">
                    تذكرني
                </span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
           
            <x-primary-button class="mr-3">
               تسجيل الدخول
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
