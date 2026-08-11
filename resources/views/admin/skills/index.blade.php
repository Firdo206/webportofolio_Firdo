<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Kelola Skills</h2>
    </x-slot>

    <div class="max-w-4xl mx-auto" x-data="{
        showModal: false,
        mode: 'create',
        form: { id: null, name: '', category: '', order: 0 },
        openCreate() {
            this.mode = 'create';
            this.form = { id: null, name: '', category: '', order: 0 };
            this.showModal = true;
        },
        openEdit(skill) {
            this.mode = 'edit';
            this.form = { id: skill.id, name: skill.name, category: skill.category, order: skill.order };
            this.showModal = true;
        }
    }">

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-4 flex justify-end">
            <button @click="openCreate()" class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 text-sm">
                + Tambah Skill
            </button>
        </div>

        <div class="bg-white dark:bg-gray-800 shadow rounded-lg overflow-hidden">
            <table class="w-full text-sm text-left">
                <thead class="bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300">
                    <tr>
                        <th class="px-4 py-3">Nama</th>
                        <th class="px-4 py-3">Kategori</th>
                        <th class="px-4 py-3">Urutan</th>
                        <th class="px-4 py-3 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($skills as $skill)
                        <tr class="border-t border-gray-100 dark:border-gray-700">
                            <td class="px-4 py-3 text-gray-800 dark:text-gray-200">{{ $skill->name }}</td>
                            <td class="px-4 py-3 text-gray-600 dark:text-gray-400">{{ $skill->category ?? '-' }}</td>
                            <td class="px-4 py-3 text-gray-600 dark:text-gray-400">{{ $skill->order }}</td>
                            <td class="px-4 py-3 text-right space-x-2">
                                <button
                                    @click="openEdit({{ Illuminate\Support\Js::from($skill->only(['id','name','category','order'])) }})"
                                    class="text-blue-600 hover:underline">
                                    Edit
                                </button>
                                <form action="{{ route('dashboard.skills.destroy', $skill) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus skill ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-4 py-6 text-center text-gray-400">Belum ada skill.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- MODAL --}}
        <div x-show="showModal"
             x-cloak
             class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 p-4"
             style="display: none;">
            <div @click.outside="showModal = false"
                 class="bg-white dark:bg-gray-800 rounded-xl shadow-xl w-full max-w-md p-6">

                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4"
                    x-text="mode === 'create' ? 'Tambah Skill' : 'Edit Skill'"></h3>

                <form :action="mode === 'create' ? '{{ route('dashboard.skills.store') }}' : `/dashboard/skills/${form.id}`"
                      method="POST">
                    @csrf
                    <template x-if="mode === 'edit'">
                        <input type="hidden" name="_method" value="PUT">
                    </template>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nama Skill</label>
                        <input type="text" name="name" x-model="form.name" class="w-full border-gray-300 rounded-lg" placeholder="Contoh: Laravel">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Kategori</label>
                        <input type="text" name="category" x-model="form.category" class="w-full border-gray-300 rounded-lg" placeholder="Contoh: Backend">
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Urutan</label>
                        <input type="number" name="order" x-model="form.order" class="w-full border-gray-300 rounded-lg">
                    </div>

                    <div class="flex justify-end gap-3">
                        <button type="button" @click="showModal = false" class="px-4 py-2 border rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                            Batal
                        </button>
                        <button type="submit" class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</x-admin-layout>