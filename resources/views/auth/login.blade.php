<x-guest-layout>
    <h1 class="text-xl font-semibold text-white mb-1">Masuk</h1>
    <p class="text-sm text-gray-400 mb-6">Login untuk mengelola konten portofolio</p>

    <x-auth-session-status class="mb-4 text-sm text-green-400" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        {{-- Email --}}
        <div>
            <label for="email" class="block text-sm font-medium text-gray-300 mb-1.5">Email</label>
            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                autofocus
                autocomplete="username"
                placeholder="nama@email.com"
                class="w-full rounded-lg bg-white/5 border border-white/10 text-white placeholder-gray-500 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
            >
            <x-input-error :messages="$errors->get('email')" class="mt-1.5 text-red-400 text-xs" />
        </div>

        {{-- Password --}}
        <div>
            <label for="password" class="block text-sm font-medium text-gray-300 mb-1.5">Password</label>
            <input
                id="password"
                type="password"
                name="password"
                required
                autocomplete="current-password"
                placeholder="••••••••"
                class="w-full rounded-lg bg-white/5 border border-white/10 text-white placeholder-gray-500 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
            >
            <x-input-error :messages="$errors->get('password')" class="mt-1.5 text-red-400 text-xs" />
        </div>

        {{-- Remember me --}}
        <div class="flex items-center justify-between text-sm">
            <label class="flex items-center gap-2 text-gray-400 cursor-pointer">
                <input type="checkbox" name="remember" class="rounded border-white/20 bg-white/5 text-purple-600 focus:ring-purple-500 focus:ring-offset-0">
                Ingat saya
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-purple-400 hover:text-purple-300 transition">
                    Lupa password?
                </a>
            @endif
        </div>

        <button type="submit" class="w-full py-2.5 rounded-lg bg-purple-600 hover:bg-purple-700 transition text-sm font-medium">
            Masuk
        </button>
    </form>
</x-guest-layout>