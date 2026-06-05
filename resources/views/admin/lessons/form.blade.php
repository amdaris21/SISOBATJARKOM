<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Materi - Admin SISOBATJARKOM</title>
    
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
    @endif
    <style>
        body { font-family: 'Lexend', sans-serif; background-color: #F8F9FA; }
    </style>
</head>
<body class="antialiased text-[#4E342E] min-h-screen p-8">

    <div class="max-w-3xl mx-auto bg-white rounded-[15px] border border-[#B8B8B8] shadow-sm p-8">
        <h2 class="text-[24px] font-bold text-[#4E342E] mb-6">
            Edit <span class="text-[#B7131A]">Materi Pembelajaran</span>
        </h2>

        <form action="{{ route('admin.lessons.update', $lesson->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label class="block text-[14px] text-[#4E342E] mb-1 font-medium">Judul Materi</label>
                <input type="text" name="title" value="{{ old('title', $lesson->title) }}" class="w-full bg-white border border-[#B8B8B8] rounded-[8px] h-[42px] px-4 focus:outline-none focus:border-[#B7131A]" required>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-[14px] text-[#4E342E] mb-1 font-medium">Modul</label>
                    <select name="module_id" class="w-full bg-white border border-[#A5A5A5] rounded-[8px] h-[42px] px-4 focus:outline-none focus:border-[#B7131A]" required>
                        @foreach($modules as $module)
                            <option value="{{ $module->id }}" {{ $lesson->module_id == $module->id ? 'selected' : '' }}>{{ $module->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-[14px] text-[#4E342E] mb-1 font-medium">Status</label>
                    <select name="status" class="w-full bg-white border border-[#A5A5A5] rounded-[8px] h-[42px] px-4 focus:outline-none focus:border-[#B7131A]" required>
                        <option value="published" {{ $lesson->status == 'published' ? 'selected' : '' }}>Published</option>
                        <option value="draft" {{ $lesson->status == 'draft' ? 'selected' : '' }}>Draft</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-[14px] text-[#4E342E] mb-1 font-medium">Kategori</label>
                    <input type="text" name="category" value="{{ old('category', $lesson->category) }}" class="w-full bg-white border border-[#A5A5A5] rounded-[8px] h-[42px] px-4 focus:outline-none focus:border-[#B7131A]" required>
                </div>
                <div>
                    <label class="block text-[14px] text-[#4E342E] mb-1 font-medium">Level</label>
                    <select name="level" class="w-full bg-white border border-[#A5A5A5] rounded-[8px] h-[42px] px-4 focus:outline-none focus:border-[#B7131A]" required>
                        <option value="Easy" {{ $lesson->level == 'Easy' ? 'selected' : '' }}>Easy</option>
                        <option value="Medium" {{ $lesson->level == 'Medium' ? 'selected' : '' }}>Medium</option>
                        <option value="Hard" {{ $lesson->level == 'Hard' ? 'selected' : '' }}>Hard</option>
                    </select>
                </div>
            </div>

            <input type="hidden" name="order_number" value="{{ old('order_number', $lesson->order_number ?? 1) }}">

            <div class="mb-4">
                <label class="block text-[14px] text-[#4E342E] mb-1 font-medium">Deskripsi</label>
                <textarea name="description" class="w-full bg-white border border-[#A5A5A5] rounded-[8px] h-[100px] p-3 resize-none focus:outline-none focus:border-[#B7131A]">{{ old('description', $lesson->description) }}</textarea>
            </div>

            <div class="mb-6 p-4 bg-gray-50 border border-[#B8B8B8] rounded-[8px]">
                <label class="block text-[14px] text-[#4E342E] mb-2 font-medium">Unggah File PDF Materi</label>
                
                @if($lesson->file_path)
                    <div class="mb-3">
                        <span class="text-sm text-gray-600 flex items-center gap-2">
                            📄 File saat ini: <a href="{{ asset('storage/' . $lesson->file_path) }}" target="_blank" class="text-blue-600 hover:underline">Lihat PDF</a>
                        </span>
                    </div>
                @endif
                
                <input type="file" name="file" accept=".pdf" class="w-full bg-white border border-[#B8B8B8] rounded-[8px] h-[42px] px-4 pt-[7px] text-[14px] focus:outline-none focus:border-[#B7131A]">
                <p class="text-xs text-gray-500 mt-2">* Kosongkan jika tidak ingin mengubah file PDF saat ini.</p>
            </div>

            <div class="flex items-center gap-4">
                <button type="submit" class="bg-[#B7131A] text-white rounded-[8px] px-8 py-2.5 text-[15px] font-medium hover:bg-[#91000A] transition-colors">Simpan Perubahan</button>
                <a href="{{ route('admin.lessons.index') }}" class="bg-white text-[#4E342E] border border-[#A5A5A5] rounded-[8px] px-8 py-2.5 text-[15px] font-medium hover:bg-gray-50 transition-colors">Batal</a>
            </div>
        </form>
    </div>

</body>
</html>
