<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Edit Profil</h2>
    </x-slot>

    <div class="max-w-3xl mx-auto space-y-6">

        @if(session('success'))
            <div class="p-4 bg-green-50 dark:bg-green-900/20 text-green-700 dark:text-green-400 rounded-xl text-sm border border-green-100 dark:border-green-900/40">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('dashboard.profile-portfolio.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            {{-- FOTO PROFIL --}}
            <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-sm border border-gray-100 dark:border-gray-700">
                <h3 class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-4">Foto Profil</h3>

                <div class="flex items-center gap-5">
                    <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-purple-500/20 to-pink-500/20 border border-gray-200 dark:border-gray-700 flex items-center justify-center overflow-hidden shrink-0">
                        @if($profile->photo)
                            <img src="{{ Storage::url($profile->photo) }}" class="w-full h-full object-cover" alt="Foto profil">
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-300 dark:text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        @endif
                    </div>
                    <div class="flex-1">
                        <label for="photo" class="cursor-pointer inline-block px-4 py-2 rounded-lg bg-gray-50 dark:bg-gray-700 border border-gray-200 dark:border-gray-600 text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600 transition">
                            Ganti Foto
                        </label>
                        <input id="photo" name="photo" type="file" class="hidden" accept="image/*"
                               onchange="document.getElementById('photo-filename').textContent = this.files[0]?.name ?? ''">
                        <p id="photo-filename" class="text-xs text-gray-400 mt-2"></p>
                        <x-input-error :messages="$errors->get('photo')" class="mt-1" />
                    </div>
                </div>
            </div>

            {{-- INFO DASAR --}}
            <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-sm border border-gray-100 dark:border-gray-700 space-y-4">
                <h3 class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Info Dasar</h3>

                <div>
                    <x-input-label for="name" value="Nama" />
                    <x-text-input id="name" name="name" type="text" class="mt-1.5 block w-full rounded-lg"
                        value="{{ old('name', $profile->name) }}" />
                    <x-input-error :messages="$errors->get('name')" class="mt-1.5" />
                </div>

                <div>
                    <x-input-label for="tagline" value="Tagline" />
                    <x-text-input id="tagline" name="tagline" type="text" class="mt-1.5 block w-full rounded-lg"
                        placeholder="Contoh: Digital Creative Developer"
                        value="{{ old('tagline', $profile->tagline) }}" />
                    <x-input-error :messages="$errors->get('tagline')" class="mt-1.5" />
                </div>

                <div>
                    <x-input-label for="description" value="Deskripsi (About Me)" />
                    <textarea id="description" name="description" rows="5"
                        class="mt-1.5 block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 shadow-sm focus:ring-purple-500 focus:border-purple-500 text-sm">{{ old('description', $profile->description) }}</textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-1.5" />
                </div>

                <div>
                    <x-input-label for="cv_path" value="CV (PDF)" />
                    @if($profile->cv_path)
                        <p class="text-sm mb-1.5 mt-1.5">
                            <a href="{{ Storage::url($profile->cv_path) }}" target="_blank" class="text-purple-600 dark:text-purple-400 hover:underline inline-flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                Lihat CV saat ini
                            </a>
                        </p>
                    @endif
                    <input id="cv_path" name="cv_path" type="file"
                           class="mt-1.5 block w-full text-sm text-gray-500 dark:text-gray-400
                                  file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0
                                  file:text-sm file:font-medium file:bg-gray-50 dark:file:bg-gray-700
                                  file:text-gray-700 dark:file:text-gray-200 hover:file:bg-gray-100 dark:hover:file:bg-gray-600"
                           accept="application/pdf">
                    <x-input-error :messages="$errors->get('cv_path')" class="mt-1.5" />
                </div>
            </div>

            {{-- SOSIAL & KONTAK --}}
            <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-sm border border-gray-100 dark:border-gray-700 space-y-4">
                <h3 class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Sosial & Kontak</h3>

                <div>
                    <x-input-label for="github_url" value="GitHub URL" />
                    <div class="relative mt-1.5">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                <path d="M12 0C5.37 0 0 5.5 0 12.26c0 5.4 3.44 9.98 8.2 11.6.6.11.82-.27.82-.6v-2.1c-3.34.74-4.04-1.65-4.04-1.65-.55-1.42-1.34-1.8-1.34-1.8-1.1-.77.08-.75.08-.75 1.22.09 1.86 1.28 1.86 1.28 1.08 1.9 2.83 1.35 3.52 1.03.11-.8.42-1.35.76-1.66-2.67-.31-5.47-1.36-5.47-6.05 0-1.34.46-2.43 1.22-3.29-.12-.31-.53-1.56.12-3.25 0 0 1-.33 3.3 1.25a11.2 11.2 0 0 1 6 0c2.3-1.58 3.3-1.25 3.3-1.25.65 1.69.24 2.94.12 3.25.76.86 1.22 1.95 1.22 3.29 0 4.7-2.8 5.74-5.48 6.04.43.38.81 1.13.81 2.28v3.38c0 .33.22.72.83.6C20.56 22.24 24 17.66 24 12.26 24 5.5 18.63 0 12 0z"/>
                            </svg>
                        </span>
                        <input id="github_url" name="github_url" type="text"
                               class="block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 shadow-sm focus:ring-purple-500 focus:border-purple-500 text-sm pl-10"
                               placeholder="https://github.com/username"
                               value="{{ old('github_url', $profile->github_url) }}">
                    </div>
                    <x-input-error :messages="$errors->get('github_url')" class="mt-1.5" />
                </div>

                <div>
                    <x-input-label for="instagram_url" value="Instagram URL" />
                    <div class="relative mt-1.5">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                <path d="M12 2.16c3.2 0 3.58.01 4.85.07 1.17.05 1.8.25 2.23.41.56.22.96.48 1.38.9.42.42.68.82.9 1.38.16.42.36 1.06.41 2.23.06 1.27.07 1.65.07 4.85s-.01 3.58-.07 4.85c-.05 1.17-.25 1.8-.41 2.23-.22.56-.48.96-.9 1.38-.42.42-.82.68-1.38.9-.42.16-1.06.36-2.23.41-1.27.06-1.65.07-4.85.07s-3.58-.01-4.85-.07c-1.17-.05-1.8-.25-2.23-.41-.56-.22-.96-.48-1.38-.9-.42-.42-.68-.82-.9-1.38-.16-.42-.36-1.06-.41-2.23-.06-1.27-.07-1.65-.07-4.85s.01-3.58.07-4.85c.05-1.17.25-1.8.41-2.23.22-.56.48-.96.9-1.38.42-.42.82-.68 1.38-.9.42-.16 1.06-.36 2.23-.41 1.27-.06 1.65-.07 4.85-.07M12 0C8.74 0 8.33.01 7.05.07 5.78.13 4.9.33 4.14.63c-.79.31-1.46.72-2.13 1.38C1.35 2.68.94 3.35.63 4.14.33 4.9.13 5.78.07 7.05.01 8.33 0 8.74 0 12s.01 3.67.07 4.95c.06 1.27.26 2.15.56 2.91.31.79.72 1.46 1.38 2.13.66.66 1.33 1.07 2.13 1.38.76.3 1.64.5 2.91.56C8.33 23.99 8.74 24 12 24s3.67-.01 4.95-.07c1.27-.06 2.15-.26 2.91-.56.79-.31 1.46-.72 2.13-1.38.66-.66 1.07-1.33 1.38-2.13.3-.76.5-1.64.56-2.91.06-1.27.07-1.68.07-4.95s-.01-3.67-.07-4.95c-.06-1.27-.26-2.15-.56-2.91-.31-.79-.72-1.46-1.38-2.13C20.32 1.35 19.65.94 18.86.63c-.76-.3-1.64-.5-2.91-.56C15.67.01 15.26 0 12 0zm0 5.84A6.16 6.16 0 1 0 12 18.16 6.16 6.16 0 0 0 12 5.84zm0 10.16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.4-10.4a1.44 1.44 0 1 1-2.88 0 1.44 1.44 0 0 1 2.88 0z"/>
                            </svg>
                        </span>
                        <input id="instagram_url" name="instagram_url" type="text"
                               class="block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 shadow-sm focus:ring-purple-500 focus:border-purple-500 text-sm pl-10"
                               placeholder="https://instagram.com/username"
                               value="{{ old('instagram_url', $profile->instagram_url) }}">
                    </div>
                    <x-input-error :messages="$errors->get('instagram_url')" class="mt-1.5" />
                </div>

                <div>
                    <x-input-label for="whatsapp_number" value="Nomor WhatsApp" />
                    <div class="relative mt-1.5">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                <path d="M17.5 14.4c-.3-.15-1.7-.85-2-.95-.27-.1-.46-.15-.66.15-.2.3-.76.95-.93 1.14-.17.2-.34.22-.64.07-.3-.15-1.26-.46-2.4-1.47-.9-.8-1.5-1.78-1.68-2.08-.17-.3-.02-.46.13-.61.14-.14.3-.34.45-.51.15-.17.2-.3.3-.5.1-.2.05-.37-.02-.52-.08-.15-.66-1.6-.9-2.19-.24-.58-.48-.5-.66-.5h-.56c-.2 0-.52.07-.79.37s-1.04 1.02-1.04 2.47 1.07 2.86 1.22 3.06c.15.2 2.1 3.2 5.08 4.49.71.31 1.26.49 1.7.63.71.22 1.36.19 1.87.12.57-.09 1.7-.7 1.94-1.37.24-.68.24-1.26.17-1.38-.07-.12-.27-.2-.57-.35z"/>
                                <path d="M12 0C5.37 0 0 5.37 0 12c0 2.12.55 4.11 1.51 5.84L0 24l6.34-1.48A11.94 11.94 0 0 0 12 24c6.63 0 12-5.37 12-12S18.63 0 12 0zm0 21.82c-1.87 0-3.61-.53-5.09-1.44l-.36-.22-3.76.88.9-3.66-.24-.38A9.8 9.8 0 0 1 2.18 12C2.18 6.58 6.58 2.18 12 2.18S21.82 6.58 21.82 12 17.42 21.82 12 21.82z"/>
                            </svg>
                        </span>
                        <input id="whatsapp_number" name="whatsapp_number" type="text"
                               class="block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 shadow-sm focus:ring-purple-500 focus:border-purple-500 text-sm pl-10"
                               placeholder="628xxxxxxxxxx"
                               value="{{ old('whatsapp_number', $profile->whatsapp_number) }}">
                    </div>
                    <x-input-error :messages="$errors->get('whatsapp_number')" class="mt-1.5" />
                </div>

                <div>
                    <x-input-label for="email" value="Email" />
                    <div class="relative mt-1.5">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </span>
                        <input id="email" name="email" type="email"
                               class="block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 shadow-sm focus:ring-purple-500 focus:border-purple-500 text-sm pl-10"
                               placeholder="nama@email.com"
                               value="{{ old('email', $profile->email) }}">
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-1.5" />
                </div>
            </div>

            {{-- SUBMIT --}}
            <div class="flex justify-end gap-3 pb-8">
                <button type="submit" class="px-6 py-2.5 rounded-lg bg-purple-600 hover:bg-purple-700 text-white text-sm font-medium shadow-sm transition">
                    Simpan Perubahan
                </button>
            </div>

        </form>
    </div>
</x-admin-layout>