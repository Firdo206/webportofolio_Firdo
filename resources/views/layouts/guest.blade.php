<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Portfolio') }} — Admin Login</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#0a0a0f] text-white antialiased min-h-screen flex items-center justify-center relative overflow-hidden">

    {{-- background glow, senada dengan landing page --}}
    <div class="absolute inset-0 bg-gradient-to-br from-[#1a1030] via-[#0a0a0f] to-[#0a0a0f]"></div>
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_20%_20%,rgba(139,92,246,0.25),transparent_50%)]"></div>
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_80%_80%,rgba(217,119,224,0.15),transparent_50%)]"></div>

    <div class="relative z-10 w-full max-w-sm px-6">

        <div class="text-center mb-8">
            <a href="{{ route('landing') }}" class="inline-block text-2xl font-bold tracking-wide text-white hover:text-purple-300 transition">
                FAF
            </a>
            <p class="text-xs text-gray-500 mt-1 uppercase tracking-widest">Admin Access</p>
        </div>

        <div class="bg-white/5 backdrop-blur-md border border-white/10 rounded-2xl p-8 shadow-2xl">
            {{ $slot }}
        </div>

        <p class="text-center text-xs text-gray-600 mt-6">
            <a href="{{ route('landing') }}" class="hover:text-gray-400 transition">← Kembali ke portofolio</a>
        </p>
    </div>

</body>
</html>