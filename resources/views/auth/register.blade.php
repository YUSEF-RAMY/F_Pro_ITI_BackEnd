<x-guest-layout>
    <div class="flex items-center justify-center px-4">
        <!-- Card -->
        <div class="w-full max-w-md rounded-xl p-8">

            <h2 class="text-2xl font-bold text-gray-800 text-center mb-6">Create Account</h2>

            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <!-- Name -->
                <div class="relative">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                        <i class="fa-solid fa-user"></i>
                    </span>
                    <x-text-input id="name" class="block w-full pl-10 pr-4 py-2 rounded-md border border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="name" :value="old('name')" required autofocus placeholder="Full Name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-1 text-sm text-red-600" />
                </div>

                <!-- Email -->
                <div class="relative">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                        <i class="fa-solid fa-envelope"></i>
                    </span>
                    <x-text-input id="email" class="block w-full pl-10 pr-4 py-2 rounded-md border border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="email" name="email" :value="old('email')" required placeholder="Email Address" />
                    <x-input-error :messages="$errors->get('email')" class="mt-1 text-sm text-red-600" />
                </div>

                <!-- Password -->
                <div class="relative">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                        <i class="fa-solid fa-lock"></i>
                    </span>
                    <x-text-input id="password" class="block w-full pl-10 pr-4 py-2 rounded-md border border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="password" name="password" required placeholder="Password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-1 text-sm text-red-600" />
                </div>

                <!-- Confirm Password -->
                <div class="relative">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                        <i class="fa-solid fa-lock"></i>
                    </span>
                    <x-text-input id="password_confirmation" class="block w-full pl-10 pr-4 py-2 rounded-md border border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="password" name="password_confirmation" required placeholder="Confirm Password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-sm text-red-600" />
                </div>

                <!-- Submit -->
                <div class="flex flex-col sm:flex-row items-center justify-between mt-4">
                    <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:text-indigo-600 transition mb-2 sm:mb-0">Already registered?</a>
                    <x-primary-button class="w-full sm:w-auto bg-indigo-600 hover:bg-indigo-700 px-6 py-2 rounded-md font-semibold transition">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
