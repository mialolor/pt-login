<x-guest-layout>
    <!-- Custom Styles -->
    <style>
        
        

        .wide-border {
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 5px;
            background-color: darkgoldenrod;
            padding-left: 45%;
            padding-right: 44%;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s;
        }
        .google-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid gray;
            border-radius: 5px;
            padding: 0.5rem;
            color: black;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s;
        }
        .google-btn:hover {
            background-color: #f5f5f5;
        }
        .google-btn img {
            width: 20px;
            height: 20px;
            margin-right: 0.5rem;
        }
        .register-link {
            text-emphasis-color: yellow;
            text-align: center;
            margin-top: 1rem;
            font-size: 0.9rem;
        }
        .register-link a {
            color: darkgoldenrod;
            text-decoration: underline;
            font-weight: bold;
        }
    </style>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="text-center">
            <b>LOG IN</b>
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        
        <!-- Login Buttons -->
        <div class="flex items-center justify-between mt-4">
            <x-primary-button class="wide-border">
                {{ __('Log in') }}
            </x-primary-button>
        </div>

        <!-- Register Link -->
        <div class="register-link">
            Don't have an account? <a href="{{ route('register') }}">Click here to Register</a>
        </div>

        <!-- Login with Google -->
        <div class="mt-4">
            <a href="{{ route('auth.google') }}" class="google-btn">
                <img src="https://th.bing.com/th/id/R.0fa3fe04edf6c0202970f2088edea9e7?rik=joOK76LOMJlBPw&riu=http%3a%2f%2fpluspng.com%2fimg-png%2fgoogle-logo-png-open-2000.png&ehk=0PJJlqaIxYmJ9eOIp9mYVPA4KwkGo5Zob552JPltDMw%3d&risl=&pid=ImgRaw&r=0" alt="Google Logo">
                Log in with Google
            </a>
        </div>
    </form>
</x-guest-layout>
