<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah Experience</h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">
                <form action="{{ route('dashboard.experiences.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Judul</label>
                        <input type="text" name="title" value="{{ old('title') }}" class="w-full border-gray-300 rounded-lg" placeholder="Contoh: Magang Backend Developer">
                        @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tempat</label>
                        <input type="text" name="place" value="{{ old('place') }}" class="w-full border-gray-300 rounded-lg" placeholder="Contoh: PT Contoh Indonesia">
                        @error('place') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tipe</label>
                        <select name="type" class="w-full border-gray-300 rounded-lg">
                            <option value="magang" {{ old('type') == 'magang' ? 'selected' : '' }}>Magang</option>
                            <option value="organisasi" {{ old('type') == 'organisasi' ? 'selected' : '' }}>Organisasi</option>
                            <option value="lomba" {{ old('type') == 'lomba' ? 'selected' : '' }}>Lomba</option>
                        </select>
                        @error('type') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Mulai</label>
                            <input type="date" name="start_date" value="{{ old('start_date') }}" class="w-full border-gray-300 rounded-lg">
                            @error('start_date') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Selesai</label>
                            <input type="date" name="end_date" value="{{ old('end_date') }}" class="w-full border-gray-300 rounded-lg">
                            <p class="text-xs text-gray-400 mt-1">Kosongkan jika masih berlangsung</p>
                            @error('end_date') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                        <textarea name="description" rows="4" class="w-full border-gray-300 rounded-lg">{{ old('description') }}</textarea>
                        @error('description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex gap-3">
                        <button type="submit" class="px-5 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700">Simpan</button>
                        <a href="{{ route('dashboard.experiences.index') }}" class="px-5 py-2 border rounded-lg hover:bg-gray-50">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>