<x-app-layout>
    <x-slot name="header">
        {{ $header ?? '' }}
    </x-slot>

    <div class="flex">
        <x-admin-sidebar />

        <div class="flex-1 py-12">
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </div>
    </div>
</x-app-layout>