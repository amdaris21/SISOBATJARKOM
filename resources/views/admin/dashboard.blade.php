<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard - SISOBATJARKOM</title>
    
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@700&display=swap" rel="stylesheet" />
    
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @endif
    <style>
        body { font-family: 'Lexend', sans-serif; background-color: #FFFFFF; }
        .font-public { font-family: 'Public Sans', sans-serif; }
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
                <a href="#" class="text-[15px] font-medium text-black border-b-2 border-[#B7131A] pb-1">Dashboard</a>
                <a href="#" class="text-[15px] font-medium text-gray-700 hover:text-black transition">Kelola Materi</a>
                <a href="#" class="text-[15px] font-medium text-gray-700 hover:text-black transition">Kelola Kuis</a>
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

    <main class="flex-grow w-full pb-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-12">
            
            <div class="flex items-center gap-4 mt-12 mb-8">
                <h2 class="text-xl md:text-[22px] font-semibold tracking-wide text-black uppercase">STATISTIK</h2>
                <div class="flex-grow h-px bg-[#B8B8B8]"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                <div class="bg-white border border-[#E0D7D5] rounded-[15px] p-5 shadow-[0_6px_0_0_#D69600] hover:-translate-y-1 hover:shadow-[0_10px_0_0_#D69600] transition-all duration-300 group cursor-pointer">
                    <div class="flex items-center gap-3 mb-5">
                        <div class="w-[42px] h-[42px] bg-[#FFE099] rounded-[10px] flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-5 h-5 text-[#D69600]" fill="currentColor" viewBox="0 0 20 20"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path></svg>
                        </div>
                        <h3 class="text-[16px] md:text-[17px] font-bold text-black leading-tight group-hover:text-[#D69600] transition-colors">Total Pengguna</h3>
                    </div>
                    <div class="flex items-center justify-between px-10">
                        <div class="text-[32px] font-bold text-[#361F1A] leading-none tracking-tight">2,842</div>
                        <div class="px-2.5 py-1 bg-[#F0FDF4] rounded-full group-hover:bg-[#dcfce7] transition-colors">
                            <span class="text-[12px] font-bold text-[#16A34A]">+12</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white border border-[#E0D7D5] rounded-[15px] p-5 shadow-[0_6px_0_0_#A10C13] hover:-translate-y-1 hover:shadow-[0_10px_0_0_#A10C13] transition-all duration-300 group cursor-pointer">
                    <div class="flex items-center gap-3 mb-5">
                        <div class="w-[42px] h-[42px] bg-[#FFCCCF] rounded-[10px] flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-5 h-5 text-[#B7131A]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        </div>
                        <h3 class="text-[16px] md:text-[17px] font-bold text-black leading-tight group-hover:text-[#A10C13] transition-colors">Total Materi</h3>
                    </div>
                    <div class="flex items-center justify-between px-10">
                        <div class="text-[32px] font-bold text-[#361F1A] leading-none tracking-tight">9</div>
                        <div class="px-2.5 py-1 bg-[#FFCCCF] rounded-full group-hover:bg-[#ffb3b8] transition-colors">
                            <span class="text-[12px] font-bold text-[#91000A]">Materi</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white border border-[#E0D7D5] rounded-[15px] p-5 shadow-[0_6px_0_0_#4E342E] hover:-translate-y-1 hover:shadow-[0_10px_0_0_#4E342E] transition-all duration-300 group cursor-pointer">
                    <div class="flex items-center gap-3 mb-5">
                        <div class="w-[42px] h-[42px] bg-[#D9C1BC] rounded-[10px] flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-5 h-5 text-[#4E342E]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        </div>
                        <h3 class="text-[16px] md:text-[17px] font-bold text-black leading-tight group-hover:text-[#4E342E] transition-colors">Total Quiz</h3>
                    </div>
                    <div class="flex items-center justify-between px-10">
                        <div class="text-[32px] font-bold text-[#361F1A] leading-none tracking-tight">9</div>
                        <div class="px-2.5 py-1 bg-[#F4ECEA] rounded-full group-hover:bg-[#e8dada] transition-colors">
                            <span class="text-[12px] font-bold text-[#504442]">Quiz</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-20">
                <div class="bg-white border border-[#E0D7D5] rounded-[15px] p-6 shadow-[4px_4px_10px_rgba(0,0,0,0.05)] hover:-translate-y-1 hover:shadow-[4px_4px_15px_rgba(0,0,0,0.1)] transition-all duration-300">
                    <div class="flex justify-between items-start mb-10">
                        <div>
                            <h3 class="font-public text-[20px] font-bold text-[#361F1A]">Keaktifan Pengguna</h3>
                            <p class="text-[14px] text-[#504442] mt-1">Pengguna aktif harian selama 30 hari terakhir</p>
                        </div>
                        <div class="px-3 py-1.5 bg-[#FFF8F6] border border-[#D4C3BF] rounded-[8px] flex items-center gap-2">
                            <span class="text-[14px] text-[#1E1B1A]">30 Hari Terakhir</span>
                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                    </div>
                    <div class="h-[250px] w-full flex items-end justify-between px-2 pt-6">
                        <div class="w-[10%] h-[40%] bg-[rgba(255,218,214,0.3)] border border-[#B7131A] rounded-t-[8px] hover:bg-[#B7131A] transition-colors duration-300 cursor-pointer"></div>
                        <div class="w-[10%] h-[55%] bg-[rgba(255,218,214,0.3)] border border-[#B7131A] rounded-t-[8px] hover:bg-[#B7131A] transition-colors duration-300 cursor-pointer"></div>
                        <div class="w-[10%] h-[45%] bg-[rgba(255,218,214,0.3)] border border-[#B7131A] rounded-t-[8px] hover:bg-[#B7131A] transition-colors duration-300 cursor-pointer"></div>
                        <div class="w-[10%] h-[70%] bg-[#B7131A] rounded-t-[8px] relative group cursor-pointer border border-[#B7131A] hover:bg-[#91000A] transition-colors duration-300">
                             <div class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-[#361F1A] text-white text-[10px] px-2 py-1 rounded-[4px] opacity-100 group-hover:-translate-y-1 transition-transform">
                                2.8k
                             </div>
                        </div>
                        <div class="w-[10%] h-[60%] bg-[rgba(255,218,214,0.3)] border border-[#B7131A] rounded-t-[8px] hover:bg-[#B7131A] transition-colors duration-300 cursor-pointer"></div>
                        <div class="w-[10%] h-[50%] bg-[rgba(255,218,214,0.3)] border border-[#B7131A] rounded-t-[8px] hover:bg-[#B7131A] transition-colors duration-300 cursor-pointer"></div>
                        <div class="w-[10%] h-[65%] bg-[rgba(255,218,214,0.3)] border border-[#B7131A] rounded-t-[8px] hover:bg-[#B7131A] transition-colors duration-300 cursor-pointer"></div>
                        <div class="w-[10%] h-[80%] bg-[rgba(255,218,214,0.3)] border border-[#B7131A] rounded-t-[8px] hover:bg-[#B7131A] transition-colors duration-300 cursor-pointer"></div>
                        <div class="w-[10%] h-[70%] bg-[rgba(255,218,214,0.3)] border border-[#B7131A] rounded-t-[8px] hover:bg-[#B7131A] transition-colors duration-300 cursor-pointer"></div>
                    </div>
                    <div class="flex justify-between mt-4 px-6 text-[10px] font-bold text-[#504442]">
                        <span>MINGGU 1</span>
                        <span>MINGGU 2</span>
                        <span>MINGGU 3</span>
                        <span>MINGGU 4</span>
                    </div>
                </div>

                <div class="bg-white border border-[#E0D7D5] rounded-[15px] p-6 shadow-[4px_4px_10px_rgba(0,0,0,0.05)] hover:-translate-y-1 hover:shadow-[4px_4px_15px_rgba(0,0,0,0.1)] transition-all duration-300 flex flex-col justify-between">
                    <div class="mb-8">
                        <h3 class="font-public text-[20px] font-bold text-[#361F1A]">Popularitas Materi</h3>
                        <p class="text-[14px] text-[#504442] mt-1">Materi dengan performa tertinggi</p>
                    </div>
                    
                    <div class="flex flex-col gap-6">
                        <div>
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-[14px] font-semibold text-[#361F1A]">TCP/IP & Alamat IP</span>
                                <span class="text-[14px] font-semibold text-[#B7131A]">92%</span>
                            </div>
                            <div class="w-full h-[12px] bg-[#F4ECEA] rounded-full overflow-hidden relative">
                                <div class="absolute left-0 top-0 bottom-0 bg-[#B7131A] rounded-full" style="width: 92%"></div>
                            </div>
                        </div>
                        
                        <div>
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-[14px] font-semibold text-[#361F1A]">7 OSI Layer</span>
                                <span class="text-[14px] font-semibold text-[#FFBA38]">78%</span>
                            </div>
                            <div class="w-full h-[12px] bg-[#F4ECEA] rounded-full overflow-hidden relative">
                                <div class="absolute left-0 top-0 bottom-0 bg-[#FFBA38] rounded-full" style="width: 78%"></div>
                            </div>
                        </div>

                        <div>
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-[14px] font-semibold text-[#361F1A]">Keamanan Jaringan Dasar</span>
                                <span class="text-[14px] font-semibold text-[#B7131A]">65%</span>
                            </div>
                            <div class="w-full h-[12px] bg-[#F4ECEA] rounded-full overflow-hidden relative">
                                <div class="absolute left-0 top-0 bottom-0 bg-[#B7131A] rounded-full" style="width: 65%"></div>
                            </div>
                        </div>

                        <div>
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-[14px] font-semibold text-[#361F1A]">Topologi Jaringan</span>
                                <span class="text-[14px] font-semibold text-[#FFBA38]">45%</span>
                            </div>
                            <div class="w-full h-[12px] bg-[#F4ECEA] rounded-full overflow-hidden relative">
                                <div class="absolute left-0 top-0 bottom-0 bg-[#FFBA38] rounded-full" style="width: 45%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-4 mt-12 mb-8">
                <h2 class="text-xl md:text-[22px] font-semibold tracking-wide text-black uppercase">Kelola Materi & Quiz</h2>
                <div class="flex-grow h-px bg-[#B8B8B8]"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-20">
                <a href="#" class="bg-white border border-[#E0D7D5] rounded-[15px] p-5 shadow-[4px_4px_10px_rgba(0,0,0,0.05)] flex items-center justify-between group hover:-translate-y-1 hover:shadow-[4px_4px_15px_rgba(0,0,0,0.1)] transition-all duration-300">
                    <div class="flex items-center gap-5">
                        <div class="w-[60px] h-[60px] flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <img src="{{ asset('images/materi.jpeg') }}" alt="Kelola Materi" class="max-w-full max-h-full object-contain fallback-img">
                        </div>
                        <h3 class="text-[18px] md:text-[20px] font-medium text-black group-hover:text-[#B7131A] transition-colors">Kelola Materi</h3>
                    </div>
                    <div class="mr-2">
                        <svg class="w-8 h-8 text-[#504442] group-hover:translate-x-2 group-hover:text-[#B7131A] transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"></path></svg>
                    </div>
                </a>

                <a href="#" class="bg-white border border-[#E0D7D5] rounded-[15px] p-5 shadow-[4px_4px_10px_rgba(0,0,0,0.05)] flex items-center justify-between group hover:-translate-y-1 hover:shadow-[4px_4px_15px_rgba(0,0,0,0.1)] transition-all duration-300">
                    <div class="flex items-center gap-5">
                        <div class="w-[60px] h-[60px] flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <img src="{{ asset('images/quiz_banner.png') }}" alt="Kelola Quiz" class="max-w-full max-h-full object-contain fallback-img">
                        </div>
                        <h3 class="text-[18px] md:text-[20px] font-medium text-black group-hover:text-[#B7131A] transition-colors">Kelola Quiz</h3>
                    </div>
                    <div class="mr-2">
                        <svg class="w-8 h-8 text-[#504442] group-hover:translate-x-2 group-hover:text-[#B7131A] transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"></path></svg>
                    </div>
                </a>
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