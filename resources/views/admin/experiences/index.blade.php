<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Kelola Experience</h2>
    </x-slot>

    <div class="max-w-4xl mx-auto">

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-4 flex justify-end">
            <a href="{{ route('dashboard.experiences.create') }}" class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 text-sm">
                + Tambah Experience
            </a>
        </div>

        <div class="space-y-4">
            @forelse($experiences as $exp)
                <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-5 flex justify-between items-start gap-4">
                    <div>
                        <div class="flex items-center gap-2 mb-1">
                            <h3 class="font-semibold text-gray-800 dark:text-gray-200">{{ $exp->title }}</h3>
                            <span class="text-xs px-2 py-0.5 rounded-full bg-purple-100 text-purple-700 capitalize">{{ $exp->type }}</span>
                        </div>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mb-1">{{ $exp->place }}</p>
                        <p class="text-xs text-gray-400">
                            {{ $exp->start_date?->format('M Y') }} -
                            {{ $exp->end_date ? $exp->end_date->format('M Y') : 'Sekarang' }}
                        </p>
                    </div>
                    <div class="flex gap-3 text-sm shrink-0">
                        <a href="{{ route('dashboard.experiences.edit', $exp) }}" class="text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('dashboard.experiences.destroy', $exp) }}" method="POST" onsubmit="return confirm('Yakin hapus experience ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6 text-center text-gray-400">
                    Belum ada experience ditambahkan.
                </div>
            @endforelse
        </div>

    </div>
</x-admin-layout>