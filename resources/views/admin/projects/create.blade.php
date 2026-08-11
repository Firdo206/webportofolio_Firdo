<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Tambah Project</h2>
    </x-slot>

    <div class="max-w-2xl mx-auto">
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
            <form action="{{ route('dashboard.projects.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Judul Project</label>
                    <input type="text" name="title" value="{{ old('title') }}" class="w-full border-gray-300 rounded-lg" placeholder="Contoh: Website Portofolio Pribadi">
                    @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Deskripsi</label>
                    <textarea name="description" rows="4" class="w-full border-gray-300 rounded-lg">{{ old('description') }}</textarea>
                    @error('description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Tech Stack</label>
                    <input type="text" name="tech_stack" value="{{ old('tech_stack') }}" class="w-full border-gray-300 rounded-lg" placeholder="Contoh: Laravel, MySQL, Tailwind CSS">
                    @error('tech_stack') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Gambar Project</label>
                    <input type="file" name="image" accept="image/*" class="w-full border-gray-300 rounded-lg">
                    <p class="text-xs text-gray-400 mt-1">Maks 2MB, format JPG/PNG</p>
                    @error('image') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Demo URL</label>
                        <input type="url" name="demo_url" value="{{ old('demo_url') }}" class="w-full border-gray-300 rounded-lg" placeholder="https://...">
                        @error('demo_url') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">GitHub URL</label>
                        <input type="url" name="github_url" value="{{ old('github_url') }}" class="w-full border-gray-300 rounded-lg" placeholder="https://github.com/...">
                        @error('github_url') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Urutan Tampil</label>
                    <input type="number" name="order" value="{{ old('order', 0) }}" class="w-full border-gray-300 rounded-lg">
                    @error('order') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="flex gap-3">
                    <button type="submit" class="px-5 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700">Simpan</button>
                    <a href="{{ route('dashboard.projects.index') }}" class="px-5 py-2 border rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700">Batal</a>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>