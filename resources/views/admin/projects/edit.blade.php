<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Edit Project</h2>
    </x-slot>

    <div class="max-w-2xl mx-auto">
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">

            @if($project->image)
                <div class="mb-4">
                    <img src="{{ asset('storage/'.$project->image) }}" class="w-full h-40 object-cover rounded-lg">
                </div>
            @endif

            <form action="{{ route('dashboard.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Judul Project</label>
                    <input type="text" name="title" value="{{ old('title', $project->title) }}" class="w-full border-gray-300 rounded-lg">
                    @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Deskripsi</label>
                    <textarea name="description" rows="4" class="w-full border-gray-300 rounded-lg">{{ old('description', $project->description) }}</textarea>
                    @error('description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Tech Stack</label>
                    <input type="text" name="tech_stack" value="{{ old('tech_stack', $project->tech_stack) }}" class="w-full border-gray-300 rounded-lg">
                    @error('tech_stack') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Ganti Gambar</label>
                    <input type="file" name="image" accept="image/*" class="w-full border-gray-300 rounded-lg">
                    <p class="text-xs text-gray-400 mt-1">Kosongkan jika tidak ingin ganti gambar</p>
                    @error('image') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Demo URL</label>
                        <input type="url" name="demo_url" value="{{ old('demo_url', $project->demo_url) }}" class="w-full border-gray-300 rounded-lg">
                        @error('demo_url') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">GitHub URL</label>
                        <input type="url" name="github_url" value="{{ old('github_url', $project->github_url) }}" class="w-full border-gray-300 rounded-lg">
                        @error('github_url') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Urutan Tampil</label>
                    <input type="number" name="order" value="{{ old('order', $project->order) }}" class="w-full border-gray-300 rounded-lg">
                    @error('order') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="flex gap-3">
                    <button type="submit" class="px-5 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700">Update</button>
                    <a href="{{ route('dashboard.projects.index') }}" class="px-5 py-2 border rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700">Batal</a>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>