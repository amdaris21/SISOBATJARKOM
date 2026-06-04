<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kelola Quiz - Admin SISOBATJARKOM</title>
    
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@700&display=swap" rel="stylesheet" />
    
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @endif
    <style>
        body { font-family: 'Lexend', sans-serif; background-color: #FFFFFF; }
        .font-public { font-family: 'Public Sans', sans-serif; }
        .font-josefin { font-family: 'Josefin Sans', sans-serif; }
    </style>
</head>
<body class="antialiased text-[#4E342E] min-h-screen flex flex-col">

    <header class="w-full bg-white border-b border-[#B8B8B8] sticky top-0 z-50 h-[88px] flex items-center">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-[60px] h-[60px] rounded-full overflow-hidden">
                    <img src="{{ asset('images/Logo2.jpeg') }}"
                     alt="Logo SISOBATJARKOM"
                     class="w-full h-full object-cover fallback-img">
                </div>
                <h1 class="text-2xl font-semibold tracking-tight text-[#4E342E]">
                    SISOBAT<span class="text-[#B7131A]">JARKOM</span>
                </h1>
            </div>
            
            <nav class="hidden md:flex items-center gap-8">
                <a href="{{ route('admin.dashboard') }}" class="text-[15px] font-medium text-gray-700 hover:text-black transition">Dashboard</a>
                <a href="{{ route('admin.kelolamateri') }}" class="text-[15px] font-medium text-gray-700 hover:text-black transition">Kelola Materi</a>
                <a href="{{ route('admin.kelolaquiz') }}" class="text-[15px] font-medium text-black border-b-2 border-[#B7131A] pb-1">Kelola Kuis</a>
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
                            <span class="block text-sm font-medium text-black truncate">Admin</span>
                        </div>
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

    <main x-data="{ isModalOpen: false }" class="flex-grow w-full pb-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-12">
            
            <div class="w-full bg-white border border-[#B8B8B8] rounded-[15px] flex flex-col md:flex-row items-center justify-between shadow-sm hover:shadow-[0_8px_30px_rgb(0,0,0,0.12)] transition-shadow duration-300 min-h-[250px] md:min-h-[300px] p-6 md:p-10 mb-8">
                <div class="max-w-xl z-10">
                    <h2 class="text-[36px] md:text-[48px] lg:text-[56px] leading-[1.1] text-[#4E342E] mb-2 font-normal tracking-tight">
                        Manajemen<br/>
                        <span class="text-[#B7131A]">Quiz</span>
                    </h2>
                </div>
                <div class="mt-6 md:mt-0 flex-shrink-0 w-[200px] h-[200px] md:w-[260px] md:h-[260px] mr-0 md:mr-4 lg:mr-8">
                    <img src="{{ asset('images/quiz_banner.png') }}" alt="Ilustrasi Quiz" class="w-full h-full object-contain mix-blend-multiply hover:scale-105 transition-transform duration-300">
                </div>
            </div>

            <div class="mb-8">
                <h2 class="text-[24px] md:text-[28px] font-normal text-[#4E342E] mb-2 leading-tight tracking-tight">
                    Manajemen <span class="text-[#B7131A]">Quiz</span>
                </h2>
                <p class="text-[#CAC7C6] text-[15px] md:text-[16px]">Tambahkan soal dan kelola kuis pembelajaran dalam sistem admin Anda</p>
            </div>

            <div class="mb-8">
                <button @click="isModalOpen = true" class="bg-[#B7131A] hover:bg-[#91000A] text-white rounded-[12px] px-6 py-2.5 flex items-center gap-3 transition-all duration-300 shadow-sm hover:shadow-md transform hover:-translate-y-1 group inline-flex">
                    <div class="w-6 h-6 rounded-full border-[2px] border-white flex items-center justify-center group-hover:rotate-90 transition-transform duration-300">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path></svg>
                    </div>
                    <span class="text-[16px] md:text-[18px]">Tambah Quiz</span>
                </button>
            </div>

            <div class="w-full bg-white border border-[#CAC7C6] rounded-[15px] overflow-hidden shadow-sm">
                <div class="bg-[#B7131A] px-6 py-4 flex items-center justify-between text-white border-b border-[#CAC7C6]">
                    <div class="w-5/12 text-[15px] md:text-[16px] font-medium">Nama Quiz</div>
                    <div class="w-2/12 text-[15px] md:text-[16px] font-medium text-center">Jumlah Soal</div>
                    <div class="w-2/12 text-[15px] md:text-[16px] font-medium text-center">Level</div>
                    <div class="w-3/12 text-[15px] md:text-[16px] font-medium text-center">Aksi</div>
                </div>

                <div class="flex flex-col">
                    <div class="px-6 py-4 flex items-center justify-between border-b border-[#AFABAA] hover:bg-red-50 transition-colors group cursor-default">
                        <div class="w-5/12 text-[14px] md:text-[15px] text-black">Quiz Pembelajaran Jaringan Komputer</div>
                        <div class="w-2/12 flex justify-center">
                            <span class="bg-[#C9373F] border border-white text-white font-josefin font-bold text-[12px] px-4 py-1 rounded-[12px]">10 Soal</span>
                        </div>
                        <div class="w-2/12 flex justify-center">
                            <span class="bg-[#CAFCDF] border border-white text-[#30D46F] font-josefin font-bold text-[12px] px-4 py-1 rounded-[12px]">Easy</span>
                        </div>
                        <div class="w-3/12 flex justify-center items-center gap-4">
                            <button class="flex flex-col items-center group/btn hover:-translate-y-0.5 transition-transform">
                                <svg class="w-5 h-5 text-[#1E1E1E] group-hover/btn:text-blue-600 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                <span class="text-[12px] text-black group-hover/btn:text-blue-600 mt-0.5">Edit</span>
                            </button>
                            <button class="flex flex-col items-center group/btn hover:-translate-y-0.5 transition-transform">
                                <svg class="w-5 h-5 text-[#1E1E1E] group-hover/btn:text-red-600 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                <span class="text-[12px] text-black group-hover/btn:text-red-600 mt-0.5">Hapus</span>
                            </button>
                        </div>
                    </div>
                    
                    <div class="px-6 py-4 flex items-center justify-between border-b border-[#AFABAA] hover:bg-red-50 transition-colors group cursor-default">
                        <div class="w-5/12 text-[14px] md:text-[15px] text-black">Quiz 7 Osi Layer</div>
                        <div class="w-2/12 flex justify-center">
                            <span class="bg-[#C9373F] border border-white text-white font-josefin font-bold text-[12px] px-4 py-1 rounded-[12px]">10 Soal</span>
                        </div>
                        <div class="w-2/12 flex justify-center">
                            <span class="bg-[#FCE7CA] border border-white text-[#D27634] font-josefin font-bold text-[12px] px-4 py-1 rounded-[12px]">Medium</span>
                        </div>
                        <div class="w-3/12 flex justify-center items-center gap-4">
                            <button class="flex flex-col items-center group/btn hover:-translate-y-0.5 transition-transform">
                                <svg class="w-5 h-5 text-[#1E1E1E] group-hover/btn:text-blue-600 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                <span class="text-[12px] text-black group-hover/btn:text-blue-600 mt-0.5">Edit</span>
                            </button>
                            <button class="flex flex-col items-center group/btn hover:-translate-y-0.5 transition-transform">
                                <svg class="w-5 h-5 text-[#1E1E1E] group-hover/btn:text-red-600 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                <span class="text-[12px] text-black group-hover/btn:text-red-600 mt-0.5">Hapus</span>
                            </button>
                        </div>
                    </div>
                    
                    <div class="px-6 py-4 flex items-center justify-between border-b border-[#AFABAA] hover:bg-red-50 transition-colors group cursor-default">
                        <div class="w-5/12 text-[14px] md:text-[15px] text-black">Quiz HTTP, HTTPS FTP & DNS</div>
                        <div class="w-2/12 flex justify-center">
                            <span class="bg-[#C9373F] border border-white text-white font-josefin font-bold text-[12px] px-4 py-1 rounded-[12px]">10 Soal</span>
                        </div>
                        <div class="w-2/12 flex justify-center">
                            <span class="bg-[#FCE7CA] border border-white text-[#D27634] font-josefin font-bold text-[12px] px-4 py-1 rounded-[12px]">Medium</span>
                        </div>
                        <div class="w-3/12 flex justify-center items-center gap-4">
                            <button class="flex flex-col items-center group/btn hover:-translate-y-0.5 transition-transform">
                                <svg class="w-5 h-5 text-[#1E1E1E] group-hover/btn:text-blue-600 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                <span class="text-[12px] text-black group-hover/btn:text-blue-600 mt-0.5">Edit</span>
                            </button>
                            <button class="flex flex-col items-center group/btn hover:-translate-y-0.5 transition-transform">
                                <svg class="w-5 h-5 text-[#1E1E1E] group-hover/btn:text-red-600 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                <span class="text-[12px] text-black group-hover/btn:text-red-600 mt-0.5">Hapus</span>
                            </button>
                        </div>
                    </div>
                    
                    <div class="px-6 py-4 flex items-center justify-between border-b border-[#AFABAA] hover:bg-red-50 transition-colors group cursor-default">
                        <div class="w-5/12 text-[14px] md:text-[15px] text-black">Quiz Topologi Jaringan</div>
                        <div class="w-2/12 flex justify-center">
                            <span class="bg-[#C9373F] border border-white text-white font-josefin font-bold text-[12px] px-4 py-1 rounded-[12px]">10 Soal</span>
                        </div>
                        <div class="w-2/12 flex justify-center">
                            <span class="bg-[#CAFCDF] border border-white text-[#30D46F] font-josefin font-bold text-[12px] px-4 py-1 rounded-[12px]">Easy</span>
                        </div>
                        <div class="w-3/12 flex justify-center items-center gap-4">
                            <button class="flex flex-col items-center group/btn hover:-translate-y-0.5 transition-transform">
                                <svg class="w-5 h-5 text-[#1E1E1E] group-hover/btn:text-blue-600 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                <span class="text-[12px] text-black group-hover/btn:text-blue-600 mt-0.5">Edit</span>
                            </button>
                            <button class="flex flex-col items-center group/btn hover:-translate-y-0.5 transition-transform">
                                <svg class="w-5 h-5 text-[#1E1E1E] group-hover/btn:text-red-600 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                <span class="text-[12px] text-black group-hover/btn:text-red-600 mt-0.5">Hapus</span>
                            </button>
                        </div>
                    </div>
                    
                    <div class="px-6 py-4 flex items-center justify-between border-b border-[#AFABAA] hover:bg-red-50 transition-colors group cursor-default">
                        <div class="w-5/12 text-[14px] md:text-[15px] text-black">Quiz Perangkat Jaringan Komputer</div>
                        <div class="w-2/12 flex justify-center">
                            <span class="bg-[#C9373F] border border-white text-white font-josefin font-bold text-[12px] px-4 py-1 rounded-[12px]">10 Soal</span>
                        </div>
                        <div class="w-2/12 flex justify-center">
                            <span class="bg-[#FCCACA] border border-white text-[#D23434] font-josefin font-bold text-[12px] px-4 py-1 rounded-[12px]">Hard</span>
                        </div>
                        <div class="w-3/12 flex justify-center items-center gap-4">
                            <button class="flex flex-col items-center group/btn hover:-translate-y-0.5 transition-transform">
                                <svg class="w-5 h-5 text-[#1E1E1E] group-hover/btn:text-blue-600 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                <span class="text-[12px] text-black group-hover/btn:text-blue-600 mt-0.5">Edit</span>
                            </button>
                            <button class="flex flex-col items-center group/btn hover:-translate-y-0.5 transition-transform">
                                <svg class="w-5 h-5 text-[#1E1E1E] group-hover/btn:text-red-600 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                <span class="text-[12px] text-black group-hover/btn:text-red-600 mt-0.5">Hapus</span>
                            </button>
                        </div>
                    </div>
                    
                    <div class="px-6 py-4 flex items-center justify-between border-b border-[#AFABAA] hover:bg-red-50 transition-colors group cursor-default">
                        <div class="w-5/12 text-[14px] md:text-[15px] text-black">Quiz Keamanan Jaringan Dasar</div>
                        <div class="w-2/12 flex justify-center">
                            <span class="bg-[#C9373F] border border-white text-white font-josefin font-bold text-[12px] px-4 py-1 rounded-[12px]">10 Soal</span>
                        </div>
                        <div class="w-2/12 flex justify-center">
                            <span class="bg-[#FCCACA] border border-white text-[#D23434] font-josefin font-bold text-[12px] px-4 py-1 rounded-[12px]">Hard</span>
                        </div>
                        <div class="w-3/12 flex justify-center items-center gap-4">
                            <button class="flex flex-col items-center group/btn hover:-translate-y-0.5 transition-transform">
                                <svg class="w-5 h-5 text-[#1E1E1E] group-hover/btn:text-blue-600 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                <span class="text-[12px] text-black group-hover/btn:text-blue-600 mt-0.5">Edit</span>
                            </button>
                            <button class="flex flex-col items-center group/btn hover:-translate-y-0.5 transition-transform">
                                <svg class="w-5 h-5 text-[#1E1E1E] group-hover/btn:text-red-600 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                <span class="text-[12px] text-black group-hover/btn:text-red-600 mt-0.5">Hapus</span>
                            </button>
                        </div>
                    </div>
                    
                    <div class="px-6 py-4 flex items-center justify-between border-b border-[#AFABAA] hover:bg-red-50 transition-colors group cursor-default">
                        <div class="w-5/12 text-[14px] md:text-[15px] text-black">Quiz Jenis-jenis Jaringan Komputer</div>
                        <div class="w-2/12 flex justify-center">
                            <span class="bg-[#C9373F] border border-white text-white font-josefin font-bold text-[12px] px-4 py-1 rounded-[12px]">10 Soal</span>
                        </div>
                        <div class="w-2/12 flex justify-center">
                            <span class="bg-[#FCCACA] border border-white text-[#D23434] font-josefin font-bold text-[12px] px-4 py-1 rounded-[12px]">Hard</span>
                        </div>
                        <div class="w-3/12 flex justify-center items-center gap-4">
                            <button class="flex flex-col items-center group/btn hover:-translate-y-0.5 transition-transform">
                                <svg class="w-5 h-5 text-[#1E1E1E] group-hover/btn:text-blue-600 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                <span class="text-[12px] text-black group-hover/btn:text-blue-600 mt-0.5">Edit</span>
                            </button>
                            <button class="flex flex-col items-center group/btn hover:-translate-y-0.5 transition-transform">
                                <svg class="w-5 h-5 text-[#1E1E1E] group-hover/btn:text-red-600 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                <span class="text-[12px] text-black group-hover/btn:text-red-600 mt-0.5">Hapus</span>
                            </button>
                        </div>
                    </div>

                    <div class="px-6 py-4 flex items-center justify-between border-b border-[#AFABAA] hover:bg-red-50 transition-colors group cursor-default">
                        <div class="w-5/12 text-[14px] md:text-[15px] text-black">Quiz Arsitektur Komputer</div>
                        <div class="w-2/12 flex justify-center">
                            <span class="bg-[#C9373F] border border-white text-white font-josefin font-bold text-[12px] px-4 py-1 rounded-[12px]">10 Soal</span>
                        </div>
                        <div class="w-2/12 flex justify-center">
                            <span class="bg-[#CAFCDF] border border-white text-[#30D46F] font-josefin font-bold text-[12px] px-4 py-1 rounded-[12px]">Easy</span>
                        </div>
                        <div class="w-3/12 flex justify-center items-center gap-4">
                            <button class="flex flex-col items-center group/btn hover:-translate-y-0.5 transition-transform">
                                <svg class="w-5 h-5 text-[#1E1E1E] group-hover/btn:text-blue-600 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                <span class="text-[12px] text-black group-hover/btn:text-blue-600 mt-0.5">Edit</span>
                            </button>
                            <button class="flex flex-col items-center group/btn hover:-translate-y-0.5 transition-transform">
                                <svg class="w-5 h-5 text-[#1E1E1E] group-hover/btn:text-red-600 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                <span class="text-[12px] text-black group-hover/btn:text-red-600 mt-0.5">Hapus</span>
                            </button>
                        </div>
                    </div>
                    
                    <div class="px-6 py-4 flex items-center justify-between hover:bg-red-50 transition-colors group cursor-default">
                        <div class="w-5/12 text-[14px] md:text-[15px] text-black">Quiz TCP/IP & Alamat IP</div>
                        <div class="w-2/12 flex justify-center">
                            <span class="bg-[#C9373F] border border-white text-white font-josefin font-bold text-[12px] px-4 py-1 rounded-[12px]">10 Soal</span>
                        </div>
                        <div class="w-2/12 flex justify-center">
                            <span class="bg-[#FCE7CA] border border-white text-[#D27634] font-josefin font-bold text-[12px] px-4 py-1 rounded-[12px]">Medium</span>
                        </div>
                        <div class="w-3/12 flex justify-center items-center gap-4">
                            <button class="flex flex-col items-center group/btn hover:-translate-y-0.5 transition-transform">
                                <svg class="w-5 h-5 text-[#1E1E1E] group-hover/btn:text-blue-600 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                <span class="text-[12px] text-black group-hover/btn:text-blue-600 mt-0.5">Edit</span>
                            </button>
                            <button class="flex flex-col items-center group/btn hover:-translate-y-0.5 transition-transform">
                                <svg class="w-5 h-5 text-[#1E1E1E] group-hover/btn:text-red-600 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                <span class="text-[12px] text-black group-hover/btn:text-red-600 mt-0.5">Hapus</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div x-show="isModalOpen" style="display: none;" class="fixed inset-0 z-[100] flex items-center justify-center bg-black bg-opacity-40 px-4 py-4">
                <div @click.outside="isModalOpen = false" class="bg-white rounded-[10px] w-full max-w-xl p-5 md:p-6 relative max-h-[90vh] overflow-y-auto" style="border: 1px solid #A5A5A5; box-shadow: 0px 4px 4px #B7131A;">
                    
                    <h2 class="text-[18px] md:text-[22px] text-[#4E342E] mb-4 font-normal tracking-tight">Tambah <span class="text-[#B7131A]">Link Quiz</span></h2>

                    <form action="#" method="POST">
                        <div class="mb-3">
                            <label class="block text-[13px] md:text-[14px] text-[#4E342E] mb-1 font-normal">Nama <span class="text-[#B7131A]">Quiz</span></label>
                            <input type="text" class="w-full bg-white border border-[#B8B8B8] rounded-[8px] h-[38px] md:h-[42px] px-4 text-[13px] md:text-[14px] focus:outline-none focus:border-[#B7131A] shadow-[0px_2px_4px_#E2E2E2]">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-3">
                            <div>
                                <label class="block text-[13px] md:text-[14px] text-[#4E342E] mb-1 font-normal">Jumlah Soal</label>
                                <input type="text" class="w-full bg-white border border-[#A5A5A5] rounded-[8px] h-[38px] md:h-[42px] px-4 text-[13px] md:text-[14px] focus:outline-none focus:border-[#B7131A] shadow-[0px_2px_4px_#E2E2E2]">
                            </div>
                            <div>
                                <label class="block text-[13px] md:text-[14px] text-[#4E342E] mb-1 font-normal">Level</label>
                                <input type="text" class="w-full bg-white border border-[#A5A5A5] rounded-[8px] h-[38px] md:h-[42px] px-4 text-[13px] md:text-[14px] focus:outline-none focus:border-[#B7131A] shadow-[0px_2px_4px_#E2E2E2]">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="block text-[13px] md:text-[14px] text-[#4E342E] mb-1 font-normal">Deskripsi <span class="text-[#B7131A]">Quiz</span></label>
                            <textarea class="w-full bg-white border border-[#A5A5A5] rounded-[8px] h-[80px] md:h-[100px] p-3 text-[13px] md:text-[14px] resize-none focus:outline-none focus:border-[#B7131A] shadow-[0px_2px_4px_#E2E2E2]"></textarea>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-6 mb-2">
                            <div class="flex flex-col gap-4">
                                <div>
                                    <label class="block text-[13px] md:text-[14px] text-[#4E342E] mb-1 font-normal">Link <span class="text-[#B7131A]">Quiz</span></label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="w-4 h-4 text-[#1E1E1E]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                                        </div>
                                        <input type="url" placeholder="Masukkan Link Quiz" class="w-full bg-white border border-[#B8B8B8] rounded-[8px] h-[38px] md:h-[42px] pl-10 pr-4 text-[13px] md:text-[14px] focus:outline-none focus:border-[#B7131A] shadow-[0px_2px_4px_#E2E2E2] placeholder-[#A5A5A5]">
                                    </div>
                                </div>
                                <button type="submit" class="bg-[#B7131A] text-white border border-[#A5A5A5] rounded-[8px] w-full h-[40px] md:h-[46px] text-[15px] md:text-[16px] font-normal tracking-wide hover:bg-[#91000A] transition-colors shadow-[0px_2px_4px_#E2E2E2]">SIMPAN</button>
                            </div>

                            <div class="flex flex-col gap-4">
                                <div>
                                    <label class="block text-[13px] md:text-[14px] text-[#4E342E] mb-1 font-normal">QR <span class="text-[#B7131A]">Quiz</span></label>
                                    <button type="button" class="bg-white border border-[#B8B8B8] rounded-[8px] h-[38px] md:h-[42px] px-4 flex items-center justify-center gap-2 hover:bg-gray-50 transition-colors shadow-[0px_2px_4px_#E2E2E2] w-full">
                                        <svg class="w-4 h-4 text-[#1E1E1E]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                        <span class="text-[13px] md:text-[14px] text-[#4E342E]">Unggah File Baru</span>
                                    </button>
                                </div>
                                <button type="button" @click="isModalOpen = false" class="bg-white text-[#4E342E] border border-[#A5A5A5] rounded-[8px] w-full h-[40px] md:h-[46px] text-[15px] md:text-[16px] font-normal tracking-wide hover:bg-gray-50 transition-colors shadow-[0px_2px_4px_#E2E2E2]">BATAL</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </main>

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
