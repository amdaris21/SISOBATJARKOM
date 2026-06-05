<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dasar Jaringan Komputer - SISOBATJARKOM</title>
    
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

        /* Tiga baris di bawah ini adalah TAMBAHAN untuk Efek Flip Card 3D */
        .perspective-1000 { perspective: 1000px; }
        .transform-style-3d { transform-style: preserve-3d; transition: transform 0.6s cubic-bezier(0.4, 0.2, 0.2, 1); }
        .backface-hidden { backface-visibility: hidden; }
        .rotate-y-180 { transform: rotateY(180deg); }
        .is-flipped { transform: rotateY(180deg); }
    </style>
</head>
<body class="antialiased text-[#4E342E] min-h-screen flex flex-col">

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
                <a href="/lesson" class="text-[15px] font-medium text-black border-b-2 border-[#B7131A] pb-1">Materi</a>
                <a href="{{ route('quiz') }}" class="text-[15px] font-medium text-[#7B7675] hover:text-black transition">Kuis</a>
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

    <main class="flex-grow w-full pb-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-10">

            <div class="mb-6">
                <a href="/lesson" class="text-[14px] text-[#7B7675] hover:text-black font-medium flex items-center gap-1">
                    &lsaquo; Kembali ke Materi
                </a>
            </div>

            <div class="bg-white border-2 border-[#B7131A] rounded-[20px] shadow-[4px_4px_10px_rgba(0,0,0,0.05)] p-8 md:p-12 mb-8">
                <h2 class="text-3xl md:text-[40px] font-bold text-black leading-tight mb-6">
                    Materi Dasar <span class="text-[#B7131A]">Jaringan Komputer</span>
                </h2>
                <p class="text-[15px] leading-relaxed text-[#7B7675] max-w-[900px]">
                    Pelajari dasar-dasar jaringan komputer untuk memahami cara kerja konektivitas. Modul ini mencakup perangkat keras, media transmisi, hingga standar komunikasi yang umum digunakan di industri.
                </p>
            </div>

            <div class="bg-white border border-[#B8B8B8] rounded-[15px] shadow-[4px_4px_10px_rgba(0,0,0,0.05)] p-6 flex flex-col md:flex-row items-center gap-6 mb-12">
                <div class="relative w-16 h-16 flex items-center justify-center flex-shrink-0">
                    <svg class="w-full h-full transform -rotate-90" viewBox="0 0 36 36">
                        <path class="text-gray-200" stroke="currentColor" stroke-width="3" fill="none" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                        <path class="text-[#B7131A]" stroke-dasharray="45, 100" stroke="currentColor" stroke-width="3" stroke-linecap="round" fill="none" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                    </svg>
                    <span class="absolute text-[15px] font-bold text-black">45%</span>
                </div>

                <div class="flex-grow w-full">
                    <div class="flex justify-between items-center mb-2">
                        <h4 class="text-[16px] font-semibold text-black leading-tight">Progres Belajar Anda</h4>
                        <span class="text-[#7B7675] text-[13px] font-medium">Materi 1/9</span>
                    </div>
                    <p class="text-[13px] text-[#7B7675] mb-3 leading-snug">Terus tingkatkan! Selesaikan modul ini untuk mengerjakan Quiz</p>
                    <div class="w-full bg-gray-100 h-2 rounded-full overflow-hidden border border-gray-200">
                        <div class="bg-[#B7131A] h-full rounded-full" style="width: 45%;"></div>
                    </div>
                </div>

                <div class="flex-shrink-0 w-full md:w-auto">
                    <button class="w-full md:w-auto px-6 py-2.5 bg-[#B7131A] text-white text-[14px] font-semibold rounded-[8px] hover:bg-[#8A070D] transition shadow-sm">
                        Lanjut Belajar
                    </button>
                </div>
            </div>

            <div class="mb-16">
                <div class="flex justify-between items-end mb-2">
                    <div>
                        <h3 class="text-[22px] font-bold text-black tracking-tight">Komponen Utama Jaringan</h3>
                        <p class="text-sm text-[#7B7675] mt-1 font-medium">Pahami peran spesifik setiap perangkat di jaringan komputer</p>
                    </div>
                    <a href="https://discord.gg/example" target="_blank" class="text-[13px] text-[#7B7675] hover:text-black font-medium flex items-center gap-1.5 transition">
                        <span> </span> Klik untuk melihat detail
                    </a>
                </div>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-6">
                    
                    <div class="relative w-full h-[260px] perspective-1000">
                        <div class="w-full h-full relative transform-style-3d flip-card-inner cursor-pointer">
                            <div class="absolute inset-0 backface-hidden bg-white border border-[#B8B8B8] rounded-[15px] shadow-[4px_4px_10px_rgba(0,0,0,0.05)] p-6 flex flex-col items-center justify-between text-center hover:-translate-y-1 transition-transform duration-200">
                                <div class="w-32 h-24 flex items-center justify-center mb-4">
                                    <img src="{{ asset('images/router.png') }}" alt="Router" class="max-w-full max-h-full object-contain">
                                </div>
                                <div>
                                    <h4 class="text-[16px] font-semibold text-black mb-1">Router</h4>
                                    <a href="mailto:sisobatjrkm@gmail.com" onclick="event.preventDefault();" class="text-[#B7131A] text-[11px] font-semibold hover:underline">Lihat Detail &rsaquo;</a>
                                </div>
                            </div>
                            <div class="absolute inset-0 backface-hidden rotate-y-180 bg-[#7B1817] text-white border border-[#B8B8B8] rounded-[15px] shadow-md p-5 flex flex-col items-center justify-center text-center">
                                <h4 class="text-[16px] font-semibold mb-3">Router</h4>
                                <p class="text-[13px] leading-relaxed">Berfungsi sebagai penghubung antar dua jaringan atau lebih yang berbeda, serta mengatur lalu lintas data (routing).</p>
                            </div>
                        </div>
                    </div>
                  
                    <div class="relative w-full h-[260px] perspective-1000">
                        <div class="w-full h-full relative transform-style-3d flip-card-inner cursor-pointer">
                            <div class="absolute inset-0 backface-hidden bg-white border border-[#B8B8B8] rounded-[15px] shadow-[4px_4px_10px_rgba(0,0,0,0.05)] p-6 flex flex-col items-center justify-between text-center hover:-translate-y-1 transition-transform duration-200">
                                <div class="w-32 h-24 flex items-center justify-center mb-4">
                                    <img src="{{ asset('images/switch.png') }}" alt="Switch" class="max-w-full max-h-full object-contain">
                                </div>
                                <div>
                                    <h4 class="text-[16px] font-semibold text-black mb-1">Switch</h4>
                                    <a href="javascript:void(0)" onclick="alert('Fitur ini sedang dalam tahap pengembangan!')" onclick="event.preventDefault();" class="text-[#B7131A] text-[11px] font-semibold hover:underline">Lihat Detail &rsaquo;</a>
                                </div>
                            </div>
                            <div class="absolute inset-0 backface-hidden rotate-y-180 bg-[#7B1817] text-white border border-[#B8B8B8] rounded-[15px] shadow-md p-5 flex flex-col items-center justify-center text-center">
                                <h4 class="text-[16px] font-semibold mb-3">Switch</h4>
                                <p class="text-[13px] leading-relaxed">Berfungsi menghubungkan perangkat dalam satu jaringan lokal (LAN) dengan meneruskan data berdasarkan MAC Address.</p>
                            </div>
                        </div>
                    </div>

                    <div class="relative w-full h-[260px] perspective-1000">
                        <div class="w-full h-full relative transform-style-3d flip-card-inner cursor-pointer">
                            <div class="absolute inset-0 backface-hidden bg-white border border-[#B8B8B8] rounded-[15px] shadow-[4px_4px_10px_rgba(0,0,0,0.05)] p-6 flex flex-col items-center justify-between text-center hover:-translate-y-1 transition-transform duration-200">
                                <div class="w-32 h-24 flex items-center justify-center mb-4">
                                    <img src="{{ asset('images/server.png') }}" alt="Server" class="max-w-full max-h-full object-contain text-indent-[-9999px]">
                                </div>
                                <div>
                                    <h4 class="text-[16px] font-semibold text-black mb-1">Server</h4>
                                    <a href="javascript:void(0)" onclick="alert('Fitur ini sedang dalam tahap pengembangan!')" onclick="event.preventDefault();" class="text-[#B7131A] text-[11px] font-semibold hover:underline">Lihat Detail &rsaquo;</a>
                                </div>
                            </div>
                            <div class="absolute inset-0 backface-hidden rotate-y-180 bg-[#7B1817] text-white border border-[#B8B8B8] rounded-[15px] shadow-md p-5 flex flex-col items-center justify-center text-center">
                                <h4 class="text-[16px] font-semibold mb-3">Server</h4>
                                <p class="text-[13px] leading-relaxed">Berfungsi sebagai penyedia layanan, sumber daya, atau data yang dibutuhkan oleh perangkat klien dalam jaringan.</p>
                            </div>
                        </div>
                    </div>

                    <div class="relative w-full h-[260px] perspective-1000">
                        <div class="w-full h-full relative transform-style-3d flip-card-inner cursor-pointer">
                            <div class="absolute inset-0 backface-hidden bg-white border border-[#B8B8B8] rounded-[15px] shadow-[4px_4px_10px_rgba(0,0,0,0.05)] p-6 flex flex-col items-center justify-between text-center hover:-translate-y-1 transition-transform duration-200">
                                <div class="w-32 h-24 flex items-center justify-center mb-4">
                                    <img src="{{ asset('images/pc.png') }}" alt="PC" class="max-w-full max-h-full object-contain">
                                </div>
                                <div>
                                    <h4 class="text-[16px] font-semibold text-black mb-1">PC</h4>
                                    <a href="javascript:void(0)" onclick="alert('Fitur ini sedang dalam tahap pengembangan!')" onclick="event.preventDefault();" class="text-[#B7131A] text-[11px] font-semibold hover:underline">Lihat Detail &rsaquo;</a>
                                </div>
                            </div>
                            <div class="absolute inset-0 backface-hidden rotate-y-180 bg-[#7B1817] text-white border border-[#B8B8B8] rounded-[15px] shadow-md p-5 flex flex-col items-center justify-center text-center">
                                <h4 class="text-[16px] font-semibold mb-3">PC</h4>
                                <p class="text-[13px] leading-relaxed">Berfungsi sebagai titik akhir (end-device) bagi pengguna untuk mengakses data atau layanan yang disediakan server.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="bg-white border border-[#B8B8B8] rounded-[15px] shadow-[4px_4px_10px_rgba(0,0,0,0.05)] p-8 md:p-10 mb-16">
                <h3 class="text-[20px] font-bold text-black border-b-2 border-[#B7131A] pb-2 inline-block mb-6">Apa itu Jaringan Komputer?</h3>
                <div class="flex flex-col lg:flex-row items-center gap-10">
                    <div class="w-full lg:w-3/5 text-[15px] leading-relaxed text-black">
                        Jaringan komputer adalah sekumpulan perangkat yang saling terhubung untuk berbagi informasi dan sumber daya secara efisien. Infrastruktur ini dibangun menggunakan perangkat keras seperti kabel dan router serta protokol komunikasi yang memungkinkan perangkat untuk saling berkomunikasi, mulai dari skala kecil di rumah hingga skala besar seperti internet.
                    </div>
                    <div class="w-full lg:w-2/5 bg-gray-50 border border-[#B8B8B8] rounded-lg flex items-center justify-center overflow-hidden shadow-inner p-4">
                        <img src="{{ asset('images/jaringan.jpeg') }}" 
                        alt="Jaringan Komputer" 
                        class="w-full h-auto max-h-[360px] object-contain rounded-md">
                    </div>
                </div>
            </div>

            <div class="mb-16 text-center">
                <h3 class="text-[22px] font-bold text-black mb-1">Fungsi Utama</h3>
                <p class="text-sm text-[#7B7675] font-medium mb-8">Pilar yang penting dalam Jaringan Komputer</p>

                <div class="grid grid-cols-2 md:grid-cols-5 gap-4 lg:px-4">
                    <div class="bg-white border border-[#B8B8B8] rounded-[10px] p-4 flex flex-col items-center text-center shadow-sm">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center bg-red-50 text-[#B7131A] mb-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                        </div>
                        <span class="text-[12px] font-semibold text-black leading-tight">Konektivitas</span>
                    </div>

                    <div class="bg-white border border-[#B8B8B8] rounded-[10px] p-4 flex flex-col items-center text-center shadow-sm">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center bg-red-50 text-[#B7131A] mb-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                        </div>
                        <span class="text-[12px] font-semibold text-black leading-tight">Pengiriman Data</span>
                    </div>

                    <div class="bg-white border border-[#B8B8B8] rounded-[10px] p-4 flex flex-col items-center text-center shadow-sm">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center bg-red-50 text-[#B7131A] mb-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                        </div>
                        <span class="text-[12px] font-semibold text-black leading-tight">Lalu Lintas Jaringan</span>
                    </div>

                    <div class="bg-white border border-[#B8B8B8] rounded-[10px] p-4 flex flex-col items-center text-center shadow-sm">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center bg-red-50 text-[#B7131A] mb-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        </div>
                        <span class="text-[12px] font-semibold text-black leading-tight">Keamanan Data</span>
                    </div>

                    <div class="bg-white border border-[#B8B8B8] rounded-[10px] p-4 flex flex-col items-center text-center shadow-sm">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center bg-red-50 text-[#B7131A] mb-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                        </div>
                        <span class="text-[12px] font-semibold text-black leading-tight">Skalabilitas</span>
                    </div>
                </div>
            </div>

            <div class="mb-16">
                <h3 class="text-[22px] font-bold text-black text-center mb-8">Klasifikasi Jaringan Komputer</h3>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-white border border-[#B8B8B8] rounded-[15px] shadow-[4px_4px_10px_rgba(0,0,0,0.05)] p-6 min-h-[180px]">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-8 h-8 rounded-full bg-[#B7131A] text-white flex items-center justify-center text-xs font-bold">
                                01
                            </div>
                            <h4 class="text-[16px] font-bold text-black">LAN (Local Area Network)</h4>
                        </div>
                        <ul class="list-disc pl-5 text-[13px] text-black leading-relaxed space-y-1">
                            <li>Cakupan area lokal (rumah/gedung).</li>
                            <li>Untuk berbagi data lokal.</li>
                        </ul>
                    </div>

                    <div class="bg-white border border-[#B8B8B8] rounded-[15px] shadow-[4px_4px_10px_rgba(0,0,0,0.05)] p-6 min-h-[180px]">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-8 h-8 rounded-full bg-[#B7131A] text-white flex items-center justify-center text-xs font-bold">
                                02
                            </div>
                            <h4 class="text-[16px] font-bold text-black">MAN (Metropolitan Area Network)</h4>
                        </div>
                        <ul class="list-disc pl-5 text-[13px] text-black leading-relaxed space-y-1">
                            <li>Cakupan area satu kota atau kampus.</li>
                            <li>Menghubungkan beberapa LAN.</li>
                        </ul>
                    </div>

                    <div class="bg-white border border-[#B8B8B8] rounded-[15px] shadow-[4px_4px_10px_rgba(0,0,0,0.05)] p-6 min-h-[180px]">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-8 h-8 rounded-full bg-[#B7131A] text-white flex items-center justify-center text-xs font-bold">
                                03
                            </div>
                            <h4 class="text-[16px] font-bold text-black">WAN (Wide Area Network)</h4>
                        </div>
                        <ul class="list-disc pl-5 text-[13px] text-black leading-relaxed space-y-1">
                            <li>Cakupan luas antar negara/benua.</li>
                            <li>Contoh implementasi: Internet.</li>
                        </ul>
                    </div>
                </div>

                <div class="text-center mt-12">
                    <p class="text-sm text-[#7B7675] font-medium mb-4 italic">Semakin kamu menggali semakin paham tentang pembelajaran TKJ</p>
                    <button class="px-8 py-3 bg-[#B7131A] text-white text-[15px] font-semibold rounded-full hover:bg-[#8A070D] transition shadow-md">
                        Baca Modul Lengkapnya &rarr;
                    </button>
                </div>
            </div>

            <div class="border-t border-[#B8B8B8] pt-8 mt-16 flex flex-col sm:flex-row justify-between items-center gap-4">
                <span class="text-[14px] text-gray-400 cursor-not-allowed font-medium">&larr; Materi Sebelumnya</span>
                <div class="text-center">
                    <span class="text-[12px] text-[#7B7675] uppercase tracking-wide block font-semibold">Langkah Pembelajaran</span>
                    <span class="text-[14px] text-black font-medium">Materi <span class="text-[#B7131A] font-bold">1 dari 9</span></span>
                </div>
                <a href="javascript:void(0)" onclick="alert('Fitur ini sedang dalam tahap pengembangan!')" class="px-6 py-2 border-2 border-[#B7131A] text-[#B7131A] text-[14px] font-semibold rounded-full hover:bg-red-50 transition">
                    Materi Selanjutnya &rarr;
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
                    <a href="javascript:void(0)" onclick="alert('Fitur ini sedang dalam tahap pengembangan!')" class="inline-flex items-center gap-3 bg-white border border-[#B8B8B8] rounded-full pl-1 pr-6 py-1 mb-6 hover:bg-gray-50 transition self-start shadow-sm">
                        <div class="w-[41px] h-[41px] border border-[#B8B8B8] bg-white rounded-full flex items-center justify-center text-[#5865F2] overflow-hidden">
                             <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M20.317 4.3698a19.7913 19.7913 0 00-4.8851-1.5152.0741.0741 0 00-.0785.0371c-.211.3753-.4447.8648-.6083 1.2495-1.8447-.2762-3.68-.2762-5.4868 0-.1636-.3933-.4058-.8742-.6177-1.2495a.077.077 0 00-.0785-.037 19.7363 19.7363 0 00-4.8852 1.515.0699.0699 0 00-.0321.0277C.5334 9.0458-.319 13.5799.0992 18.0578a.0824.0824 0 00.0312.0561c2.0528 1.5076 4.0413 2.4228 5.9929 3.0294a.0777.0777 0 00.0842-.0276c.4616-.6304.8731-1.2952 1.226-1.9942a.076.076 0 00-.0416-.1057c-.6528-.2476-1.2743-.5495-1.8722-.8923a.077.077 0 01-.0076-.1277c.1258-.0943.2517-.1923.3718-.2914a.0743.0743 0 01.0776-.0105c3.9278 1.7933 8.18 1.7933 12.0614 0a.0739.0739 0 01.0785.0095c.1202.099.246.1981.3728.2924a.077.077 0 01-.0066.1276 12.2986 12.2986 0 01-1.873.8914.0766.0766 0 00-.0407.1067c.3604.698.7719 1.3628 1.225 1.9932a.076.076 0 00.0842.0286c1.961-.6067 3.9495-1.5219 6.0023-3.0294a.077.077 0 00.0313-.0552c.5004-5.177-.8382-9.6739-3.5485-13.6604a.061.061 0 00-.0312-.0286zM8.02 15.3312c-1.1825 0-2.1569-1.0857-2.1569-2.419 0-1.3332.9555-2.4189 2.157-2.4189 1.2108 0 2.1757 1.0952 2.1568 2.419 0 1.3332-.9555 2.4189-2.1569 2.4189zm7.9748 0c-1.1825 0-2.1569-1.0857-2.1569-2.419 0-1.3332.9554-2.4189 2.1569-2.4189 1.2108 0 2.1757 1.0952 2.1568 2.419 0 1.3332-.946 2.4189-2.1568 2.4189Z"/></svg>
                        </div>
                        <span class="text-[14px] text-[#5865F2] font-medium leading-[18px]">Gabung Discord</span>
                    </a>
                    
                    <h3 class="text-[#4E342E] text-[16px] font-medium mb-3 mt-1">Kontak kami</h3>
                    <a href="javascript:void(0)" onclick="alert('Fitur ini sedang dalam tahap pengembangan!')" class="inline-flex items-center gap-3 bg-white border border-[#B8B8B8] rounded-full pl-1 pr-6 py-1 hover:bg-gray-50 transition self-start shadow-sm">
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
                        <a href="javascript:void(0)" onclick="alert('Fitur ini sedang dalam tahap pengembangan!')" class="w-10 h-10 bg-white border border-[#B8B8B8] rounded-[10px] flex items-center justify-center text-gray-800 hover:bg-gray-50 hover:text-pink-600 transition shadow-sm">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                        </a>
                        <a href="javascript:void(0)" onclick="alert('Fitur ini sedang dalam tahap pengembangan!')" class="w-10 h-10 bg-white border border-[#B8B8B8] rounded-[10px] flex items-center justify-center text-gray-800 hover:bg-gray-50 hover:text-black transition shadow-sm">
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

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const cards = document.querySelectorAll('.flip-card-inner');
            cards.forEach(function(card) {
                card.addEventListener('click', function() {
                    this.classList.toggle('is-flipped');
                });
            });
        });
    </script>
</body>
</html>