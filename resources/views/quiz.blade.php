<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Arena Kuis - SISOBATJARKOM</title>
    
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @endif
    <style>
        body { font-family: 'Lexend', sans-serif; background-color: #FFFFFF; }
        .fallback-img {
            text-indent: -10000px;
        }
    </style>
</head>
<body class="antialiased text-[#4E342E] min-h-screen flex flex-col">

    <!-- Header Navigation -->
    <header class="w-full bg-white border-b border-[#B8B8B8] sticky top-0 z-50 h-[88px] flex items-center">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-[60px] h-[60px] rounded-full overflow-hidden">
                    <img src="{{ asset('images/Logo2.jpeg') }}" alt="Logo SISOBATJARKOM" class="w-full h-full object-cover">
                </div>
                <h1 class="text-2xl font-semibold tracking-tight text-[#4E342E]">
                    SISOBAT<span class="text-[#B7131A]">JARKOM</span>
                </h1>
            </div>
            
            <nav class="hidden md:flex items-center gap-8">
                <a href="{{ route('dashboard') }}" class="text-[15px] font-medium text-[#7B7675] hover:text-black transition">Dashboard</a>
                <a href="/lesson" class="text-[15px] font-medium text-[#7B7675] hover:text-black transition">Materi</a>
                <a href="{{ route('quiz') }}" class="text-[15px] font-medium text-black border-b-2 border-[#B7131A] pb-1">Kuis</a>
                <a href="{{ route('about') }}" class="text-[15px] font-medium text-[#7B7675] hover:text-black transition">Tentang</a>
                <a href="{{ route('bantuan') }}" class="text-[15px] font-medium text-[#7B7675] hover:text-black transition">Bantuan</a>
            </nav>

            <div class="flex items-center gap-4">
                <button class="text-gray-600 hover:text-black transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </button>
                
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="flex items-center justify-center w-10 h-10 border-2 border-black rounded-full text-black hover:bg-gray-100 transition focus:outline-none overflow-hidden">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    </button>
                    <div x-show="open" @click.outside="open = false" style="display: none;" class="absolute right-0 mt-2 w-48 bg-white border border-[#B8B8B8] shadow-lg rounded-[10px] py-1 z-50">
                        <div class="px-4 py-2 border-b border-gray-100">
                            <span class="block text-sm font-medium text-black truncate">{{ Auth::user()->name ?? 'User' }}</span>
                            <span class="block text-xs text-gray-500 truncate">{{ Auth::user()->email ?? 'email@example.com' }}</span>
                        </div>
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Profile Settings</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-[#B7131A] hover:bg-red-50">
                                Log Out
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow w-full pb-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-10">

            <!-- Banner Section -->
            <div class="bg-white border border-[#B8B8B8] rounded-[15px] shadow-[4px_4px_10px_rgba(0,0,0,0.05)] p-8 md:p-12 flex flex-col md:flex-row items-center justify-between gap-10 mb-10">
                <div class="w-full md:w-2/3">
                    <h2 class="text-[32px] md:text-[40px] font-semibold text-black leading-tight mb-4">
                        Arena Quiz untuk <span class="text-[#B7131A]">Menguji Pemahaman</span>
                    </h2>
                    <p class="text-sm md:text-base text-[#7B7675]">
                        Uji Pemahamanmu, Kerjakan Quiz dengan Tepat!!
                    </p>
                </div>
                <div class="w-full md:w-1/3 flex justify-center md:justify-end">
                    <div class="w-[200px] h-[200px] md:w-[240px] md:h-[240px] flex items-center justify-center">
                        <img src="{{ asset('images/quiz_banner.png') }}" alt="Quiz Banner" class="max-w-full max-h-full object-contain">
                    </div>
                </div>
            </div>

            <!-- Search and Stats Section -->
            <div class="flex flex-col md:flex-row items-center justify-between gap-6 mb-10">
                <!-- Search bar -->
                <div class="relative w-full md:w-[460px]">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </span>
                    <input type="text" placeholder="Cari materi (Contoh: Dasar jaringan, topologi)" class="w-full pl-12 pr-4 py-3 bg-white border border-[#B8B8B8] rounded-[10px] text-sm text-black placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-[#B7131A] shadow-[inset_0_1px_2px_rgba(0,0,0,0.05)]">
                </div>

                <!-- Stats widgets -->
                <div class="flex gap-4 w-full md:w-auto justify-end">
                    <!-- Rata-rata Skor -->
                    <div class="bg-white border border-[#B8B8B8] rounded-[10px] px-4 py-2 flex items-center gap-3 shadow-[4px_4px_10px_rgba(0,0,0,0.02)] min-w-[170px]">
                        <div class="w-[30px] h-[30px] bg-[#FFA200] rounded-[6px] flex items-center justify-center text-white">
                            <span class="block w-[14px] h-[14px] bg-white rounded-full"></span>
                        </div>
                        <div>
                            <div class="text-[9px] text-[#7B7675] font-semibold uppercase tracking-wide leading-none">Rata-rata Skor</div>
                            <div class="text-[14px] font-bold text-black mt-1">82.5</div>
                        </div>
                    </div>

                    <!-- Quiz Selesai -->
                    <div class="bg-white border border-[#B8B8B8] rounded-[10px] px-4 py-2 flex items-center gap-3 shadow-[4px_4px_10px_rgba(0,0,0,0.02)] min-w-[170px]">
                        <div class="w-[30px] h-[30px] bg-[#A2CD7A] rounded-[6px] flex items-center justify-center text-white">
                            <!-- Simple flower/star gear-like icon -->
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                        </div>
                        <div>
                            <div class="text-[9px] text-[#7B7675] font-semibold uppercase tracking-wide leading-none">Quiz Selesai</div>
                            <div class="text-[14px] font-bold text-black mt-1">6/9</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quiz Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- Card 1: Quiz Dasar jaringan -->
                <div class="bg-white border border-[#B8B8B8] rounded-[15px] shadow-[4px_4px_10px_rgba(0,0,0,0.05)] p-6 flex flex-col justify-between min-h-[220px]">
                    <div>
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-12 h-12 rounded-[12px] bg-[#B7131A] flex items-center justify-center text-white flex-shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <h3 class="text-[18px] font-semibold text-black leading-tight">Quiz Dasar jaringan</h3>
                        </div>
                        <div class="flex items-center gap-2.5 mb-6">
                            <span class="px-3 py-1 bg-[#D4EDDA] text-[#155724] rounded-full text-[11px] font-medium">Easy</span>
                            <span class="text-[#7B7675] text-[12px] flex items-center gap-1.5 font-medium">
                                <span class="w-[6px] h-[6px] bg-[#7B7675] rounded-full"></span>
                                10 Soal
                            </span>
                        </div>
                    </div>
                    <div class="flex flex-col gap-2">
                        <div class="w-full bg-[#FFA3A6] text-[#7F1010] text-[13px] font-semibold py-2 px-4 rounded-full text-center shadow-sm">
                            ✓ Selesai - Skor 70
                        </div>
                        <a href="#" class="text-[#B7131A] text-[12px] font-semibold hover:underline flex items-center justify-center gap-1">
                            Ulangi Quiz <span class="text-sm font-bold">&rsaquo;</span>
                        </a>
                    </div>
                </div>

                <!-- Card 2: Quiz Osi Layer -->
                <div class="bg-white border border-[#B8B8B8] rounded-[15px] shadow-[4px_4px_10px_rgba(0,0,0,0.05)] p-6 flex flex-col justify-between min-h-[220px]">
                    <div>
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-12 h-12 rounded-[12px] bg-[#B7131A] flex items-center justify-center text-white flex-shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <h3 class="text-[18px] font-semibold text-black leading-tight">Quiz Osi Layer</h3>
                        </div>
                        <div class="flex items-center gap-2.5 mb-6">
                            <span class="px-3 py-1 bg-[#FFF3CD] text-[#856404] rounded-full text-[11px] font-medium">Medium</span>
                            <span class="text-[#7B7675] text-[12px] flex items-center gap-1.5 font-medium">
                                <span class="w-[6px] h-[6px] bg-[#7B7675] rounded-full"></span>
                                10 Soal
                            </span>
                        </div>
                    </div>
                    <div class="flex flex-col gap-2">
                        <div class="w-full bg-[#FFA3A6] text-[#7F1010] text-[13px] font-semibold py-2 px-4 rounded-full text-center shadow-sm">
                            ✓ Selesai - Skor 90
                        </div>
                        <a href="#" class="text-[#B7131A] text-[12px] font-semibold hover:underline flex items-center justify-center gap-1">
                            Ulangi Quiz <span class="text-sm font-bold">&rsaquo;</span>
                        </a>
                    </div>
                </div>

                <!-- Card 3: Quiz HTTP, HTTPS & DNS -->
                <div class="bg-white border border-[#B8B8B8] rounded-[15px] shadow-[4px_4px_10px_rgba(0,0,0,0.05)] p-6 flex flex-col justify-between min-h-[220px]">
                    <div>
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-12 h-12 rounded-[12px] bg-[#B7131A] flex items-center justify-center text-white flex-shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <h3 class="text-[18px] font-semibold text-black leading-tight">Quiz HTTP, HTTPS & DNS</h3>
                        </div>
                        <div class="flex items-center gap-2.5 mb-6">
                            <span class="px-3 py-1 bg-[#FFF3CD] text-[#856404] rounded-full text-[11px] font-medium">Medium</span>
                            <span class="text-[#7B7675] text-[12px] flex items-center gap-1.5 font-medium">
                                <span class="w-[6px] h-[6px] bg-[#7B7675] rounded-full"></span>
                                10 Soal
                            </span>
                        </div>
                    </div>
                    <div class="flex flex-col gap-2">
                        <div class="w-full bg-[#FFA3A6] text-[#7F1010] text-[13px] font-semibold py-2 px-4 rounded-full text-center shadow-sm">
                            ✓ Selesai - Skor 60
                        </div>
                        <a href="#" class="text-[#B7131A] text-[12px] font-semibold hover:underline flex items-center justify-center gap-1">
                            Ulangi Quiz <span class="text-sm font-bold">&rsaquo;</span>
                        </a>
                    </div>
                </div>

                <!-- Card 4: Quiz Tebak Topologi -->
                <div class="bg-white border border-[#B8B8B8] rounded-[15px] shadow-[4px_4px_10px_rgba(0,0,0,0.05)] p-6 flex flex-col justify-between min-h-[220px]">
                    <div>
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-12 h-12 rounded-[12px] bg-[#B7131A] flex items-center justify-center text-white flex-shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <h3 class="text-[18px] font-semibold text-black leading-tight">Quiz Tebak Topologi</h3>
                        </div>
                        <div class="flex items-center gap-2.5 mb-6">
                            <span class="px-3 py-1 bg-[#D4EDDA] text-[#155724] rounded-full text-[11px] font-medium">Easy</span>
                            <span class="text-[#7B7675] text-[12px] flex items-center gap-1.5 font-medium">
                                <span class="w-[6px] h-[6px] bg-[#7B7675] rounded-full"></span>
                                10 Soal
                            </span>
                        </div>
                    </div>
                    <div class="flex flex-col gap-2">
                        <div class="w-full bg-[#FFA3A6] text-[#7F1010] text-[13px] font-semibold py-2 px-4 rounded-full text-center shadow-sm">
                            ✓ Selesai - Skor 80
                        </div>
                        <a href="#" class="text-[#B7131A] text-[12px] font-semibold hover:underline flex items-center justify-center gap-1">
                            Ulangi Quiz <span class="text-sm font-bold">&rsaquo;</span>
                        </a>
                    </div>
                </div>

                <!-- Card 5: Quiz Arsitektur Komputer -->
                <div class="bg-white border border-[#B8B8B8] rounded-[15px] shadow-[4px_4px_10px_rgba(0,0,0,0.05)] p-6 flex flex-col justify-between min-h-[220px]">
                    <div>
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-12 h-12 rounded-[12px] bg-[#B7131A] flex items-center justify-center text-white flex-shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <h3 class="text-[18px] font-semibold text-black leading-tight">Quiz Arsitektur Komputer</h3>
                        </div>
                        <div class="flex items-center gap-2.5 mb-6">
                            <span class="px-3 py-1 bg-[#D4EDDA] text-[#155724] rounded-full text-[11px] font-medium">Easy</span>
                            <span class="text-[#7B7675] text-[12px] flex items-center gap-1.5 font-medium">
                                <span class="w-[6px] h-[6px] bg-[#7B7675] rounded-full"></span>
                                10 Soal
                            </span>
                        </div>
                    </div>
                    <div class="flex flex-col gap-2">
                        <div class="w-full bg-[#FFA3A6] text-[#7F1010] text-[13px] font-semibold py-2 px-4 rounded-full text-center shadow-sm">
                            ✓ Selesai - Skor 90
                        </div>
                        <a href="#" class="text-[#B7131A] text-[12px] font-semibold hover:underline flex items-center justify-center gap-1">
                            Ulangi Quiz <span class="text-sm font-bold">&rsaquo;</span>
                        </a>
                    </div>
                </div>

                <!-- Card 6: Quiz TCP dan IP -->
                <div class="bg-white border border-[#B8B8B8] rounded-[15px] shadow-[4px_4px_10px_rgba(0,0,0,0.05)] p-6 flex flex-col justify-between min-h-[220px]">
                    <div>
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-12 h-12 rounded-[12px] bg-[#B7131A] flex items-center justify-center text-white flex-shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <h3 class="text-[18px] font-semibold text-black leading-tight">Quiz TCP dan IP</h3>
                        </div>
                        <div class="flex items-center gap-2.5 mb-6">
                            <span class="px-3 py-1 bg-[#FFF3CD] text-[#856404] rounded-full text-[11px] font-medium">Medium</span>
                            <span class="text-[#7B7675] text-[12px] flex items-center gap-1.5 font-medium">
                                <span class="w-[6px] h-[6px] bg-[#7B7675] rounded-full"></span>
                                10 Soal
                            </span>
                        </div>
                    </div>
                    <div class="flex flex-col gap-2">
                        <div class="w-full bg-[#FFA3A6] text-[#7F1010] text-[13px] font-semibold py-2 px-4 rounded-full text-center shadow-sm">
                            ✓ Selesai - Skor 90
                        </div>
                        <a href="#" class="text-[#B7131A] text-[12px] font-semibold hover:underline flex items-center justify-center gap-1">
                            Ulangi Quiz <span class="text-sm font-bold">&rsaquo;</span>
                        </a>
                    </div>
                </div>

                <!-- Card 7: Quiz Keamanan jaringan -->
                <div class="bg-white border border-[#B8B8B8] rounded-[15px] shadow-[4px_4px_10px_rgba(0,0,0,0.05)] p-6 flex flex-col justify-between min-h-[220px]">
                    <div>
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-12 h-12 rounded-[12px] bg-[#8A070D] flex items-center justify-center text-white flex-shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            </div>
                            <h3 class="text-[18px] font-semibold text-black leading-tight">Quiz Keamanan jaringan</h3>
                        </div>
                        <div class="flex items-center gap-2.5 mb-6">
                            <span class="px-3 py-1 bg-[#F8D7DA] text-[#721C24] rounded-full text-[11px] font-medium">Hard</span>
                            <span class="text-[#7B7675] text-[12px] flex items-center gap-1.5 font-medium">
                                <span class="w-[6px] h-[6px] bg-[#7B7675] rounded-full"></span>
                                10 Soal
                            </span>
                        </div>
                    </div>
                    <div>
                        <button type="button" class="w-full bg-[#B7131A] text-white text-[13px] font-semibold py-2 px-4 rounded-[8px] text-center flex items-center justify-center gap-2 shadow-sm cursor-not-allowed opacity-90">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            Terkunci
                        </button>
                    </div>
                </div>

                <!-- Card 8: Quiz Jenis-jenis Jaringan Komputer -->
                <div class="bg-white border border-[#B8B8B8] rounded-[15px] shadow-[4px_4px_10px_rgba(0,0,0,0.05)] p-6 flex flex-col justify-between min-h-[220px]">
                    <div>
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-12 h-12 rounded-[12px] bg-[#8A070D] flex items-center justify-center text-white flex-shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            </div>
                            <h3 class="text-[18px] font-semibold text-black leading-tight">Quiz Jenis-jenis Jaringan Komputer</h3>
                        </div>
                        <div class="flex items-center gap-2.5 mb-6">
                            <span class="px-3 py-1 bg-[#F8D7DA] text-[#721C24] rounded-full text-[11px] font-medium">Hard</span>
                            <span class="text-[#7B7675] text-[12px] flex items-center gap-1.5 font-medium">
                                <span class="w-[6px] h-[6px] bg-[#7B7675] rounded-full"></span>
                                10 Soal
                            </span>
                        </div>
                    </div>
                    <div>
                        <button type="button" class="w-full bg-[#B7131A] text-white text-[13px] font-semibold py-2 px-4 rounded-[8px] text-center flex items-center justify-center gap-2 shadow-sm cursor-not-allowed opacity-90">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            Terkunci
                        </button>
                    </div>
                </div>

                <!-- Card 9: Quiz Perangkat Jaringan Komputer -->
                <div class="bg-white border border-[#B8B8B8] rounded-[15px] shadow-[4px_4px_10px_rgba(0,0,0,0.05)] p-6 flex flex-col justify-between min-h-[220px]">
                    <div>
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-12 h-12 rounded-[12px] bg-[#8A070D] flex items-center justify-center text-white flex-shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            </div>
                            <h3 class="text-[18px] font-semibold text-black leading-tight">Quiz Perangkat Jaringan Komputer</h3>
                        </div>
                        <div class="flex items-center gap-2.5 mb-6">
                            <span class="px-3 py-1 bg-[#F8D7DA] text-[#721C24] rounded-full text-[11px] font-medium">Hard</span>
                            <span class="text-[#7B7675] text-[12px] flex items-center gap-1.5 font-medium">
                                <span class="w-[6px] h-[6px] bg-[#7B7675] rounded-full"></span>
                                10 Soal
                            </span>
                        </div>
                    </div>
                    <div>
                        <button type="button" class="w-full bg-[#B7131A] text-white text-[13px] font-semibold py-2 px-4 rounded-[8px] text-center flex items-center justify-center gap-2 shadow-sm cursor-not-allowed opacity-90">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            Terkunci
                        </button>
                    </div>
                </div>

            </div>

        </div>
    </main>

    <!-- Footer -->
    <footer class="w-full bg-[rgba(92,64,0,0.09)] border-t border-[#B8B8B8] pt-16 pb-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">
                <div>
                    <h1 class="text-[40px] md:text-[48px] font-medium tracking-tight text-[#4E342E] mb-2 leading-none">
                        SISOBAT<br/><span class="text-[#B7131A]">JARKOM</span>
                    </h1>
                    <p class="text-[#B7131A] text-[16px] md:text-[18px] mt-6">"Klik, Belajar, Paham Jaringan"</p>
                </div>

                <div class="flex flex-col">
                    <h3 class="text-[#4E342E] text-[16px] font-medium mb-3">Diskusi Lebih Lanjut?</h3>
                    <a href="#" class="inline-flex items-center gap-3 bg-white border border-[#B8B8B8] rounded-full pl-1 pr-6 py-1 mb-6 hover:bg-gray-50 transition self-start shadow-sm">
                        <div class="w-[41px] h-[41px] border border-[#B8B8B8] bg-white rounded-full flex items-center justify-center text-[#5865F2] overflow-hidden">
                             <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M20.317 4.3698a19.7913 19.7913 0 00-4.8851-1.5152.0741.0741 0 00-.0785.0371c-.211.3753-.4447.8648-.6083 1.2495-1.8447-.2762-3.68-.2762-5.4868 0-.1636-.3933-.4058-.8742-.6177-1.2495a.077.077 0 00-.0785-.037 19.7363 19.7363 0 00-4.8852 1.515.0699.0699 0 00-.0321.0277C.5334 9.0458-.319 13.5799.0992 18.0578a.0824.0824 0 00.0312.0561c2.0528 1.5076 4.0413 2.4228 5.9929 3.0294a.0777.0777 0 00.0842-.0276c.4616-.6304.8731-1.2952 1.226-1.9942a.076.076 0 00-.0416-.1057c-.6528-.2476-1.2743-.5495-1.8722-.8923a.077.077 0 01-.0076-.1277c.1258-.0943.2517-.1923.3718-.2914a.0743.0743 0 01.0776-.0105c3.9278 1.7933 8.18 1.7933 12.0614 0a.0739.0739 0 01.0785.0095c.1202.099.246.1981.3728.2924a.077.077 0 01-.0066.1276 12.2986 12.2986 0 01-1.873.8914.0766.0766 0 00-.0407.1067c.3604.698.7719 1.3628 1.225 1.9932a.076.076 0 00.0842.0286c1.961-.6067 3.9495-1.5219 6.0023-3.0294a.077.077 0 00.0313-.0552c.5004-5.177-.8382-9.6739-3.5485-13.6604a.061.061 0 00-.0312-.0286zM8.02 15.3312c-1.1825 0-2.1569-1.0857-2.1569-2.419 0-1.3332.9555-2.4189 2.157-2.4189 1.2108 0 2.1757 1.0952 2.1568 2.419 0 1.3332-.9555 2.4189-2.1569 2.4189zm7.9748 0c-1.1825 0-2.1569-1.0857-2.1569-2.419 0-1.3332.9554-2.4189 2.1569-2.4189 1.2108 0 2.1757 1.0952 2.1568 2.419 0 1.3332-.946 2.4189-2.1568 2.4189Z"/></svg>
                        </div>
                        <span class="text-[14px] text-[#5865F2] font-medium leading-[18px]">Gabung Discord</span>
                    </a>
                    
                    <h3 class="text-[#4E342E] text-[16px] font-medium mb-3 mt-1">Kontak kami</h3>
                    <a href="#" class="inline-flex items-center gap-3 bg-white border border-[#B8B8B8] rounded-full pl-1 pr-6 py-1 hover:bg-gray-50 transition self-start shadow-sm">
                        <div class="w-[41px] h-[41px] border border-[#B8B8B8] bg-white rounded-full flex items-center justify-center text-[#B7131A] overflow-hidden">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <span class="text-[14px] text-[#B7131A] font-medium leading-[18px]">sisobatjrkm@gmail.com</span>
                    </a>
                </div>
                
                <div>
                    <h3 class="text-[#4E342E] text-[16px] font-medium mb-3">Tentang Kami</h3>
                    <p class="text-[#7B7675] text-[14px] leading-[18px] mb-5 max-w-[200px]">
                        Dibangun untuk mempermudah akses belajar jaringan yang sering kali dianggap rumit.
                    </p>
                    <a href="{{ route('about') }}" class="text-[#B7131A] text-[15px] hover:underline font-medium inline-flex items-center gap-1">
                        Selengkapnya <span class="text-xl leading-none">&rarr;</span>
                    </a>
                </div>

                <div>
                    <h3 class="text-[#4E342E] text-[16px] font-medium mb-3">Sosial Media</h3>
                    <div class="flex gap-4">
                        <a href="#" class="w-10 h-10 bg-white border border-[#B8B8B8] rounded-[10px] flex items-center justify-center text-gray-800 hover:bg-gray-50 hover:text-pink-600 transition shadow-sm">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white border border-[#B8B8B8] rounded-[10px] flex items-center justify-center text-gray-800 hover:bg-gray-50 hover:text-black transition shadow-sm">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-[#BABABA] pt-6 flex justify-center">
                <p class="text-[#7B7675] text-[15px] leading-[20px]">© 2026 SISOBATJARKOM. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
