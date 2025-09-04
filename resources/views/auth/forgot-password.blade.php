<x-guest-layout>
    <div class="flex items-center justify-center px-4 py-8">
        <div class="w-full max-w-md rounded-xl shadow-lg p-8 space-y-6">

            <h2 class="text-2xl font-bold text-gray-800 text-center mb-4">Reset Password</h2>

            <p class="text-sm text-gray-600 mb-4 text-center">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </p>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
                @csrf

                <!-- Email Address -->
                <div class="relative">
                    <i class="fa-solid fa-envelope absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    <x-text-input
                        id="email"
                        class="block w-full pl-10 pr-3 py-2 rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        placeholder="Email Address"
                        autofocus
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
                </div>

                <!-- Submit -->
                <div class="flex justify-end">
                    <x-primary-button class="bg-indigo-600 hover:bg-indigo-700 w-full px-6 py-2 rounded-xl font-semibold shadow-md transition transform hover:scale-105">
                        {{ __('Email Password Reset Link') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
