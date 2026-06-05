<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ isset($quiz) ? 'Edit Quiz' : 'Tambah Quiz' }} - Admin SISOBATJARKOM</title>
    
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @endif
    <style>
        body { font-family: 'Lexend', sans-serif; background-color: #F8F9FA; }
    </style>
</head>
<body class="antialiased text-[#4E342E] min-h-screen flex flex-col">

    <header class="w-full bg-white border-b border-[#B8B8B8] sticky top-0 z-50 h-[88px] flex items-center">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full flex items-center justify-between">
            <div class="flex items-center gap-3">
                <h1 class="text-2xl font-semibold tracking-tight text-[#4E342E]">
                    SISOBAT<span class="text-[#B7131A]">JARKOM</span>
                </h1>
            </div>
            
            <nav class="hidden md:flex items-center gap-8">
                <a href="{{ route('admin.dashboard') }}" class="text-[15px] font-medium text-gray-700 hover:text-black transition">Dashboard</a>
                <a href="{{ route('admin.lessons.index') }}" class="text-[15px] font-medium text-gray-700 hover:text-black transition">Kelola Materi</a>
                <a href="{{ route('admin.quizzes.index') }}" class="text-[15px] font-medium text-black border-b-2 border-[#B7131A] pb-1">Kelola Kuis</a>
            </nav>
        </div>
    </header>

    <main class="flex-grow w-full pb-20 pt-12">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-[15px] p-8 shadow-sm border border-[#B8B8B8]">
                <div class="mb-8 flex items-center gap-4">
                    <a href="{{ route('admin.quizzes.index') }}" class="w-10 h-10 rounded-full border border-[#B8B8B8] flex items-center justify-center hover:bg-gray-50 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    </a>
                    <h2 class="text-[28px] font-bold text-[#4E342E] leading-tight">
                        {{ isset($quiz) ? 'Edit' : 'Tambah' }} <span class="text-[#B7131A]">Quiz</span>
                    </h2>
                </div>

                @if ($errors->any())
                    <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-[8px] text-red-600 text-sm">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ isset($quiz) ? route('admin.quizzes.update', $quiz->id) : route('admin.quizzes.store') }}" method="POST">
                    @csrf
                    @if(isset($quiz))
                        @method('PUT')
                    @endif

                    <div class="mb-4">
                        <label class="block text-[14px] text-[#4E342E] mb-2 font-medium">Nama Quiz</label>
                        <input type="text" name="title" value="{{ old('title', $quiz->title ?? '') }}" class="w-full bg-white border border-[#B8B8B8] rounded-[8px] h-[46px] px-4 text-[14px] focus:outline-none focus:border-[#B7131A]" required>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-[14px] text-[#4E342E] mb-2 font-medium">Modul</label>
                            <select name="module_id" class="w-full bg-white border border-[#B8B8B8] rounded-[8px] h-[46px] px-4 text-[14px] focus:outline-none focus:border-[#B7131A]" required>
                                @foreach($modules as $module)
                                    <option value="{{ $module->id }}" {{ old('module_id', $quiz->module_id ?? '') == $module->id ? 'selected' : '' }}>
                                        {{ $module->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-[14px] text-[#4E342E] mb-2 font-medium">Status</label>
                            <select name="status" class="w-full bg-white border border-[#B8B8B8] rounded-[8px] h-[46px] px-4 text-[14px] focus:outline-none focus:border-[#B7131A]" required>
                                <option value="published" {{ old('status', $quiz->status ?? '') == 'published' ? 'selected' : '' }}>Published</option>
                                <option value="draft" {{ old('status', $quiz->status ?? '') == 'draft' ? 'selected' : '' }}>Draft</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-[14px] text-[#4E342E] mb-2 font-medium">Jumlah Soal</label>
                            <input type="number" name="question_count" value="{{ old('question_count', $quiz->question_count ?? 10) }}" class="w-full bg-white border border-[#B8B8B8] rounded-[8px] h-[46px] px-4 text-[14px] focus:outline-none focus:border-[#B7131A]" required>
                        </div>
                        <div>
                            <label class="block text-[14px] text-[#4E342E] mb-2 font-medium">Level</label>
                            <select name="level" class="w-full bg-white border border-[#B8B8B8] rounded-[8px] h-[46px] px-4 text-[14px] focus:outline-none focus:border-[#B7131A]" required>
                                <option value="Easy" {{ old('level', $quiz->level ?? '') == 'Easy' ? 'selected' : '' }}>Easy</option>
                                <option value="Medium" {{ old('level', $quiz->level ?? '') == 'Medium' ? 'selected' : '' }}>Medium</option>
                                <option value="Hard" {{ old('level', $quiz->level ?? '') == 'Hard' ? 'selected' : '' }}>Hard</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-[14px] text-[#4E342E] mb-2 font-medium">Deskripsi Quiz</label>
                        <textarea name="description" class="w-full bg-white border border-[#B8B8B8] rounded-[8px] h-[100px] p-4 text-[14px] resize-none focus:outline-none focus:border-[#B7131A]" required>{{ old('description', $quiz->description ?? '') }}</textarea>
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-[14px] text-[#4E342E] mb-2 font-medium">Instruksi Quiz</label>
                        <textarea name="instruction" class="w-full bg-white border border-[#B8B8B8] rounded-[8px] h-[100px] p-4 text-[14px] resize-none focus:outline-none focus:border-[#B7131A]">{{ old('instruction', $quiz->instruction ?? '') }}</textarea>
                    </div>

                    <div class="mb-8">
                        <label class="block text-[14px] text-[#4E342E] mb-2 font-medium">Link Quiz Zep</label>
                        <input type="url" name="zep_link" value="{{ old('zep_link', $quiz->zep_link ?? '') }}" placeholder="Masukkan Link Quiz" class="w-full bg-white border border-[#B8B8B8] rounded-[8px] h-[46px] px-4 text-[14px] focus:outline-none focus:border-[#B7131A]" required>
                    </div>

                    <div class="flex justify-end gap-4">
                        <a href="{{ route('admin.quizzes.index') }}" class="px-8 py-3 bg-white border border-[#B8B8B8] text-black font-medium rounded-[8px] hover:bg-gray-50 transition-colors">Batal</a>
                        <button type="submit" class="px-8 py-3 bg-[#B7131A] text-white font-medium rounded-[8px] hover:bg-[#91000A] transition-colors">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
