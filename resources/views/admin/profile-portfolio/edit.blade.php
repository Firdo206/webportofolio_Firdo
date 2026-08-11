<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Profil</h2>
    </x-slot>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow rounded-lg p-6">
        <form action="{{ route('dashboard.profile-portfolio.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <x-input-label for="name" value="Nama" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                    value="{{ old('name', $profile->name) }}" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-input-label for="tagline" value="Tagline" />
                <x-text-input id="tagline" name="tagline" type="text" class="mt-1 block w-full"
                    value="{{ old('tagline', $profile->tagline) }}" />
                <x-input-error :messages="$errors->get('tagline')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-input-label for="description" value="Deskripsi" />
                <textarea id="description" name="description" rows="5"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('description', $profile->description) }}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-input-label for="photo" value="Foto Profil" />
                @if($profile->photo)
                    <img src="{{ Storage::url($profile->photo) }}" class="w-24 h-24 object-cover rounded-lg mt-2 mb-2">
                @endif
                <input id="photo" name="photo" type="file" class="mt-1 block w-full text-sm" accept="image/*">
                <x-input-error :messages="$errors->get('photo')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-input-label for="cv_path" value="CV (PDF)" />
                @if($profile->cv_path)
                    <p class="text-sm mb-2">
                        <a href="{{ Storage::url($profile->cv_path) }}" target="_blank" class="text-blue-600 hover:underline">Lihat CV saat ini</a>
                    </p>
                @endif
                <input id="cv_path" name="cv_path" type="file" class="mt-1 block w-full text-sm" accept="application/pdf">
                <x-input-error :messages="$errors->get('cv_path')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-input-label for="github_url" value="GitHub URL" />
                <x-text-input id="github_url" name="github_url" type="text" class="mt-1 block w-full"
                    value="{{ old('github_url', $profile->github_url) }}" />
                <x-input-error :messages="$errors->get('github_url')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-input-label for="instagram_url" value="Instagram URL" />
                <x-text-input id="instagram_url" name="instagram_url" type="text" class="mt-1 block w-full"
                    value="{{ old('instagram_url', $profile->instagram_url) }}" />
                <x-input-error :messages="$errors->get('instagram_url')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-input-label for="whatsapp_number" value="Nomor WhatsApp" />
                <x-text-input id="whatsapp_number" name="whatsapp_number" type="text" class="mt-1 block w-full"
                    value="{{ old('whatsapp_number', $profile->whatsapp_number) }}" />
                <x-input-error :messages="$errors->get('whatsapp_number')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-input-label for="email" value="Email" />
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                    value="{{ old('email', $profile->email) }}" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex justify-end">
                <x-primary-button>Simpan</x-primary-button>
            </div>
        </form>
    </div>
</x-admin-layout>