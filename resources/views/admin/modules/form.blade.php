<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.modules.index') }}" class="text-gray-400 hover:text-gray-600 transition">
                ← Kembali
            </a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ isset($module) ? 'Edit Modul' : 'Tambah Modul Baru' }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                <form method="POST"
                      action="{{ isset($module) ? route('admin.modules.update', $module) : route('admin.modules.store') }}">
                    @csrf
                    @if (isset($module))
                        @method('PUT')
                    @endif

                    {{-- Judul --}}
                    <div class="mb-5">
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-1">
                            Judul Modul <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                               id="title"
                               name="title"
                               value="{{ old('title', $module->title ?? '') }}"
                               placeholder="Contoh: Pengenalan Jaringan Komputer"
                               class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm @error('title') border-red-400 @enderror">
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Deskripsi --}}
                    <div class="mb-5">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">
                            Deskripsi
                        </label>
                        <textarea id="description"
                                  name="description"
                                  rows="4"
                                  placeholder="Deskripsi singkat tentang isi modul ini..."
                                  class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm @error('description') border-red-400 @enderror">{{ old('description', $module->description ?? '') }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-6">
                        {{-- Urutan --}}
                        <div>
                            <label for="order_number" class="block text-sm font-medium text-gray-700 mb-1">
                                Urutan Modul <span class="text-red-500">*</span>
                            </label>
                            <input type="number"
                                   id="order_number"
                                   name="order_number"
                                   value="{{ old('order_number', $module->order_number ?? 0) }}"
                                   min="0"
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm @error('order_number') border-red-400 @enderror">
                            @error('order_number')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Status --}}
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-1">
                                Status <span class="text-red-500">*</span>
                            </label>
                            <select id="status"
                                    name="status"
                                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm @error('status') border-red-400 @enderror">
                                <option value="draft" {{ old('status', $module->status ?? 'draft') === 'draft' ? 'selected' : '' }}>
                                    Draft (Tidak Terlihat Siswa)
                                </option>
                                <option value="published" {{ old('status', $module->status ?? '') === 'published' ? 'selected' : '' }}>
                                    Published (Aktif)
                                </option>
                            </select>
                            @error('status')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Tombol --}}
                    <div class="flex items-center justify-end gap-3">
                        <a href="{{ route('admin.modules.index') }}"
                           class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition">
                            Batal
                        </a>
                        <button type="submit"
                                class="px-5 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg hover:bg-indigo-700 transition">
                            {{ isset($module) ? 'Simpan Perubahan' : 'Tambah Modul' }}
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
