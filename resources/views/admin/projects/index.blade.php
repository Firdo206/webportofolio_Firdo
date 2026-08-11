<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Kelola Projects</h2>
    </x-slot>

    <div class="max-w-5xl mx-auto">

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-4 flex justify-end">
            <a href="{{ route('dashboard.projects.create') }}" class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 text-sm">
                + Tambah Project
            </a>
        </div>

        <div class="grid md:grid-cols-2 gap-4">
            @forelse($projects as $project)
                <div class="bg-white dark:bg-gray-800 shadow rounded-lg overflow-hidden">
                    <div class="h-40 bg-gray-100 dark:bg-gray-700 flex items-center justify-center">
                        @if($project->image)
                            <img src="{{ asset('storage/'.$project->image) }}" class="w-full h-full object-cover">
                        @else
                            <span class="text-gray-400 text-xs">Belum ada gambar</span>
                        @endif
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-gray-800 dark:text-gray-200 mb-1">{{ $project->title }}</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mb-2 line-clamp-2">{{ $project->description }}</p>
                        <p class="text-xs text-purple-500 mb-3">{{ $project->tech_stack }}</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xs text-gray-400">Urutan: {{ $project->order }}</span>
                            <div class="flex gap-3 text-sm">
                                <a href="{{ route('dashboard.projects.edit', $project) }}" class="text-blue-600 hover:underline">Edit</a>
                                <form action="{{ route('dashboard.projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Yakin hapus project ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-2 bg-white dark:bg-gray-800 shadow rounded-lg p-6 text-center text-gray-400">
                    Belum ada project ditambahkan.
                </div>
            @endforelse
        </div>

    </div>
</x-admin-layout>