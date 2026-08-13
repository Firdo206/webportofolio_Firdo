<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Kelola Experience</h2>
    </x-slot>

    <div class="max-w-3xl mx-auto" x-data="{
        showModal: false,
        mode: 'create',
        form: { id: null, title: '', place: '', description: '', type: 'magang', start_date: '', end_date: '' },
        openCreate() {
            this.mode = 'create';
            this.form = { id: null, title: '', place: '', description: '', type: 'magang', start_date: '', end_date: '' };
            this.showModal = true;
        },
        openEdit(exp) {
            this.mode = 'edit';
            this.form = { ...exp };
            this.showModal = true;
        }
    }">

        @if(session('success'))
            <div class="mb-6 p-4 bg-green-50 dark:bg-green-900/20 text-green-700 dark:text-green-400 rounded-xl text-sm border border-green-100 dark:border-green-900/40">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-6 flex justify-end">
            <button @click="openCreate()" class="inline-flex items-center gap-2 px-4 py-2.5 bg-purple-600 hover:bg-purple-700 text-white rounded-xl text-sm font-medium shadow-sm transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Experience
            </button>
        </div>

        {{-- TIMELINE --}}
        @forelse($experiences as $exp)
            @php
                $typeStyle = match($exp->type) {
                    'magang' => ['bg' => 'bg-blue-50 dark:bg-blue-900/30', 'text' => 'text-blue-600 dark:text-blue-300', 'dot' => 'bg-blue-500'],
                    'lomba' => ['bg' => 'bg-amber-50 dark:bg-amber-900/30', 'text' => 'text-amber-600 dark:text-amber-300', 'dot' => 'bg-amber-500'],
                    'organisasi' => ['bg' => 'bg-purple-50 dark:bg-purple-900/30', 'text' => 'text-purple-600 dark:text-purple-300', 'dot' => 'bg-purple-500'],
                    default => ['bg' => 'bg-gray-50 dark:bg-gray-700', 'text' => 'text-gray-600 dark:text-gray-300', 'dot' => 'bg-gray-400'],
                };
            @endphp
            <div class="relative pl-8 pb-6 last:pb-0 {{ !$loop->last ? 'border-l-2 border-gray-100 dark:border-gray-700' : '' }} ml-2">
                <span class="absolute -left-[9px] top-1 w-4 h-4 rounded-full {{ $typeStyle['dot'] }} ring-4 ring-white dark:ring-gray-900"></span>

                <div class="bg-white dark:bg-gray-800 rounded-2xl p-5 shadow-sm border border-gray-100 dark:border-gray-700">
                    <div class="flex justify-between items-start gap-4">
                        <div class="min-w-0">
                            <div class="flex items-center gap-2 mb-1 flex-wrap">
                                <h3 class="font-semibold text-gray-800 dark:text-gray-100">{{ $exp->title }}</h3>
                                <span class="text-xs px-2.5 py-0.5 rounded-full {{ $typeStyle['bg'] }} {{ $typeStyle['text'] }} capitalize font-medium">
                                    {{ $exp->type }}
                                </span>
                            </div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $exp->place }}</p>
                            <p class="text-xs text-gray-400 dark:text-gray-500 mt-1">
                                {{ $exp->start_date?->format('M Y') }} —
                                {{ $exp->end_date ? $exp->end_date->format('M Y') : 'Sekarang' }}
                            </p>
                            @if($exp->description)
                                <p class="text-sm text-gray-500 dark:text-gray-400 mt-2 leading-relaxed">{{ $exp->description }}</p>
                            @endif
                        </div>

                        <div class="flex gap-1 shrink-0">
                            <button
                                @click="openEdit({{ Illuminate\Support\Js::from($exp->only(['id','title','place','description','type'])) }}); form.start_date = '{{ $exp->start_date?->format('Y-m-d') }}'; form.end_date = '{{ $exp->end_date?->format('Y-m-d') }}'"
                                class="p-2 rounded-lg text-gray-400 hover:text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-900/20 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </button>
                            <form action="{{ route('dashboard.experiences.destroy', $exp) }}" method="POST" onsubmit="return confirm('Yakin hapus experience ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 rounded-lg text-gray-400 hover:text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="bg-white dark:bg-gray-800 rounded-2xl p-10 text-center border border-gray-100 dark:border-gray-700">
                <p class="text-gray-400 text-sm">Belum ada experience ditambahkan.</p>
            </div>
        @endforelse

        {{-- MODAL --}}
        <div x-show="showModal"
             x-cloak
             class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 p-4"
             style="display: none;">
            <div @click.outside="showModal = false"
                 class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl w-full max-w-lg p-6 max-h-[90vh] overflow-y-auto">

                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-5"
                    x-text="mode === 'create' ? 'Tambah Experience' : 'Edit Experience'"></h3>

                <form :action="mode === 'create' ? '{{ route('dashboard.experiences.store') }}' : `/dashboard/experiences/${form.id}`"
                      method="POST" class="space-y-4">
                    @csrf
                    <template x-if="mode === 'edit'">
                        <input type="hidden" name="_method" value="PUT">
                    </template>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Judul</label>
                        <input type="text" name="title" x-model="form.title"
                               class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 text-sm focus:ring-purple-500 focus:border-purple-500"
                               placeholder="Contoh: Magang Backend Developer">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Tempat</label>
                        <input type="text" name="place" x-model="form.place"
                               class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 text-sm focus:ring-purple-500 focus:border-purple-500"
                               placeholder="Contoh: PT Contoh Indonesia">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Tipe</label>
                        <select name="type" x-model="form.type"
                                class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 text-sm focus:ring-purple-500 focus:border-purple-500">
                            <option value="magang">Magang</option>
                            <option value="organisasi">Organisasi</option>
                            <option value="lomba">Lomba</option>
                        </select>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Tanggal Mulai</label>
                            <input type="date" name="start_date" x-model="form.start_date"
                                   class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 text-sm focus:ring-purple-500 focus:border-purple-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Tanggal Selesai</label>
                            <input type="date" name="end_date" x-model="form.end_date"
                                   class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 text-sm focus:ring-purple-500 focus:border-purple-500">
                            <p class="text-xs text-gray-400 mt-1">Kosongkan jika masih berlangsung</p>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Deskripsi</label>
                        <textarea name="description" rows="3" x-model="form.description"
                                  class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 text-sm focus:ring-purple-500 focus:border-purple-500"></textarea>
                    </div>

                    <div class="flex justify-end gap-3 pt-2">
                        <button type="button" @click="showModal = false" class="px-4 py-2 rounded-lg border border-gray-200 dark:border-gray-600 text-sm text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                            Batal
                        </button>
                        <button type="submit" class="px-4 py-2 rounded-lg bg-purple-600 hover:bg-purple-700 text-white text-sm font-medium transition">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</x-admin-layout>