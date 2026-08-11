<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            {{ __("You're logged in!") }}

            <div class="mt-4">
                <a href="{{ route('dashboard.skills.index') }}" class="text-purple-600 hover:underline">
                    Kelola Skills →
                </a>
            </div>

            <div class="mt-2">
                <a href="{{ route('dashboard.experiences.index') }}" class="text-purple-600 hover:underline">
                    Kelola Experience →
                </a>
            </div>
        </div>
    </div>
</x-admin-layout>