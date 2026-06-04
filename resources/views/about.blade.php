<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tentang Kami - SISOBATJARKOM</title>
    
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
                <a href="#" class="text-[15px] font-medium text-[#7B7675] hover:text-black transition">Kuis</a>
                <a href="{{ route('about') }}" class="text-[15px] font-medium text-black border-b-2 border-[#B7131A] pb-1">Tentang</a>
                <a href="#" class="text-[15px] font-medium text-[#7B7675] hover:text-black transition">Bantuan</a>
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

            <div class="flex items-center gap-4 mt-12 mb-8">
                <h2 class="text-xl md:text-[22px] font-semibold tracking-wide text-black uppercase">TENTANG KAMI</h2>
                <div class="flex-grow h-px bg-[#B8B8B8]"></div>
            </div>

            <div class="bg-white border border-[#B8B8B8] rounded-[15px] shadow-[4px_4px_10px_rgba(0,0,0,0.05)] p-8 md:p-12 flex flex-col md:flex-row items-center gap-10 mb-16">
                <div class="w-full md:w-1/3 flex justify-center">
                    <div class="relative w-full max-w-[340px] aspect-[4/3] rounded-[12px] overflow-hidden border border-[#B8B8B8] shadow-sm bg-gray-100 flex items-center justify-center">
                        <img src="{{ asset('images/LP2.jpeg') }}" alt="Filosofi Kami" class="w-full h-full object-cover fallback-img">
                    </div>
                </div>
                <div class="w-full md:w-2/3">
                    <div class="inline-flex items-center justify-center px-4 py-1.5 bg-[#FFE099] border border-[#855D00] text-[#7B574F] rounded-[8px] text-[13px] font-medium shadow-sm mb-4">
                        FILOSOFI KAMI
                    </div>
                    <h3 class="text-[28px] md:text-3xl font-medium text-[#7B574F] mb-6 leading-[1.3]">Teman Belajar untuk <span class="text-[#B7131A]">Memahami Jaringan</span></h3>
                    <p class="text-[15px] text-black leading-relaxed">
                        SISOBATJARKOM lahir dari pengalaman bahwa belajar jaringan komputer sering terasa rumit ketika materi hanya disajikan dalam bentuk teori yang padat. Banyak orang memahami istilah seperti IP address, topologi, atau protokol, tetapi masih kesulitan melihat bagaimana konsep tersebut digunakan dalam situasi nyata.<br><br>
                        Karena itu, SISOBATJARKOM hadir sebagai ruang belajar yang lebih dekat, terarah, dan mudah diikuti. Platform ini tidak hanya menyajikan materi, tetapi juga membantu pengguna memahami alur belajar jaringan secara bertahap melalui penjelasan dan latihan yang relevan.<br><br>
                        Pendekatan “sobat” digunakan karena proses belajar akan terasa lebih ringan ketika pengguna merasa didampingi, bukan hanya diberi instruksi. SISOBATJARKOM hadir sebagai teman belajar yang membantu menjelaskan, mengarahkan, dan menemani pengguna dalam memahami jaringan komputer.
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-20">
                <!-- Visi -->
                <div class="bg-white border border-[#B8B8B8] rounded-[10px] p-8 shadow-[0_10px_0_0_#D69600]">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-[50px] h-[50px] bg-[#FFE099] rounded-[14px] flex items-center justify-center border-4 border-white shadow-sm">
                            <svg class="w-7 h-7 text-[#D69600]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                        </div>
                        <h3 class="text-[22px] font-medium text-black">Visi</h3>
                    </div>
                    <p class="text-[13px] text-black leading-[18px]">Membuat pembelajaran jaringan lebih mudah dipahami dan diakses.</p>
                </div>

                <div class="bg-white border border-[#B8B8B8] rounded-[10px] p-8 shadow-[0_10px_0_0_#A10C13]">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-[50px] h-[50px] bg-[#FFCCCF] rounded-[14px] flex items-center justify-center border-4 border-white shadow-sm">
                            <svg class="w-7 h-7 text-[#B7131A]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h3 class="text-[22px] font-medium text-black">Misi</h3>
                    </div>
                    <p class="text-[13px] text-black leading-[18px]">Menyediakan materi dan latihan yang terstruktur untuk mendukung proses belajar.</p>
                </div>

                <div class="bg-white border border-[#B8B8B8] rounded-[10px] p-8 shadow-[0_10px_0_0_#4E342E]">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-[50px] h-[50px] bg-[#D9C1BC] rounded-[14px] flex items-center justify-center border-4 border-white shadow-sm">
                            <svg class="w-7 h-7 text-[#4E342E]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                        </div>
                        <h3 class="text-[22px] font-medium text-black">Pendekatan</h3>
                    </div>
                    <p class="text-[13px] text-black leading-[18px]">Menjadi teman belajar yang membantu pengguna belajar dengan nyaman dan terarah.</p>
                </div>
            </div>

            <div class="flex items-center gap-4 mt-16 mb-8">
                <h2 class="text-xl md:text-[20px] font-semibold tracking-wide text-black uppercase">INFORMASI PENGEMBANG</h2>
                <div class="flex-grow h-px bg-[#B8B8B8]"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-[950px] mx-auto mb-20">
                <div class="bg-white border border-[#B8B8B8] rounded-[15px] shadow-[4px_4px_10px_rgba(0,0,0,0.05)] p-6 flex flex-col items-center text-center">
                    <div class="w-full aspect-[4/3] rounded-[12px] border border-[#B8B8B8] overflow-hidden mb-5 bg-gray-200">
                        <img src="{{ asset('images/daris.png') }}" alt="Aghnian Maela" class="w-full h-full object-cover fallback-img">
                    </div>
                    <h4 class="text-[15px] text-black font-medium mb-1">Aghnian Maela Darissa'adah</h4>
                    <p class="text-[13px] text-gray-500">Backend Developer</p>
                </div>

                <div class="bg-white border border-[#B8B8B8] rounded-[15px] shadow-[4px_4px_10px_rgba(0,0,0,0.05)] p-6 flex flex-col items-center text-center">
                    <div class="w-full aspect-[4/3] rounded-[12px] border border-[#B8B8B8] overflow-hidden mb-5 bg-gray-200">
                        <img src="{{ asset('images/iwang.png') }}" alt="Iwang Evelyna" class="w-full h-full object-cover fallback-img">
                    </div>
                    <h4 class="text-[15px] text-black font-medium mb-1">Iwang Evelyna Fa'azzaylanti</h4>
                    <p class="text-[13px] text-gray-500">Frontend Developer & UI/UX</p>
                </div>

                <div class="bg-white border border-[#B8B8B8] rounded-[15px] shadow-[4px_4px_10px_rgba(0,0,0,0.05)] p-6 flex flex-col items-center text-center">
                    <div class="w-full aspect-[4/3] rounded-[12px] border border-[#B8B8B8] overflow-hidden mb-5 bg-gray-200">
                        <img src="{{ asset('images/amalia.png') }}" alt="Amalia Rizqi" class="w-full h-full object-cover fallback-img">
                    </div>
                    <h4 class="text-[15px] text-black font-medium mb-1">Amalia Rizqi Kurniawati</h4>
                    <p class="text-[13px] text-gray-500">Frontend Developer & UI/UX</p>
                </div>
            </div>

            <div class="flex items-center gap-4 mt-16 mb-8">
                <h2 class="text-xl md:text-[20px] font-semibold tracking-wide text-black uppercase">Apa Kata Mereka ?</h2>
                <div class="flex-grow h-px bg-[#B8B8B8]"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:px-8 mb-12">
                <div class="bg-white border border-[#B8B8B8] p-8 rounded-[15px] shadow-[4px_4px_10px_rgba(0,0,0,0.05)] border-l-[3px] border-l-[#B7131A] min-h-[160px] flex flex-col justify-center">
                    <h4 class="text-[16px] text-[#8A070D] font-medium mb-3">~ Gaon</h4>
                    <p class="text-[14px] text-black leading-[20px]">Asli review jujur, saya sekali belajar disini langsung paham. Bahasanya mudah banget buat dipahami 🤩</p>
                </div>

                <div class="bg-white border border-[#B8B8B8] p-8 rounded-[15px] shadow-[4px_4px_10px_rgba(0,0,0,0.05)] border-l-[3px] border-l-[#B7131A] min-h-[160px] flex flex-col justify-center">
                    <h4 class="text-[16px] text-[#8A070D] font-medium mb-3">~ MinjeongKimm</h4>
                    <p class="text-[14px] text-black leading-[20px]">Makasih developer udah buat web belajar dasar-dasar jarkom sekeren inii, BINTANG ⭐⭐⭐⭐⭐</p>
                </div>

                <div class="bg-white border border-[#B8B8B8] p-8 rounded-[15px] shadow-[4px_4px_10px_rgba(0,0,0,0.05)] border-l-[3px] border-l-[#B7131A] min-h-[160px] flex flex-col justify-center">
                    <h4 class="text-[16px] text-[#8A070D] font-medium mb-3">~ siapaajadah</h4>
                    <p class="text-[14px] text-black leading-[20px]">Bang makasih banget, udah nyiptain ini web. Saya sampe lupa waktu gegara belajar disini</p>
                </div>

                <div class="bg-white border border-[#B8B8B8] p-8 rounded-[15px] shadow-[4px_4px_10px_rgba(0,0,0,0.05)] border-l-[3px] border-l-[#B7131A] min-h-[160px] flex flex-col justify-center">
                    <h4 class="text-[16px] text-[#8A070D] font-medium mb-3">~ yaaku</h4>
                    <p class="text-[14px] text-black leading-[20px]">Cobain dah quiz-nya seru parah, pertanyaannya nantangin banget</p>
                </div>
            </div>

            <div class="flex justify-center gap-4 mb-20">
                <button class="w-[41px] h-[50px] bg-[#D9D9D9] border border-[#625D5C] rounded-[10px] flex items-center justify-center">
                     <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </button>
                <button class="w-[41px] h-[50px] bg-[#D9D9D9] border border-[#625D5C] rounded-[10px] flex items-center justify-center">
                     <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </button>
            </div>

            <div class="bg-white border border-[#B8B8B8] rounded-[15px] shadow-[4px_4px_10px_rgba(0,0,0,0.05)] p-8 md:p-10 max-w-4xl mx-auto mb-10 mt-16">
                 <div class="inline-flex items-center justify-center px-4 py-1.5 bg-[#FFE099] border border-[#855D00] text-[#7B574F] rounded-[8px] text-[13px] font-medium shadow-sm mb-4">
                    Bagikan Pengalaman mu
                </div>
                <p class="text-[15px] text-black mb-6 leading-relaxed">Ceritakan pengalamanmu setelah menggunakan SISOBATJARKOM. Masukanmu membantu kami membuat platform ini menjadi lebih baik.</p>
                <form action="#" method="POST" class="flex flex-col gap-4">
                    <textarea class="w-full bg-white border border-[#B8B8B8] rounded-[10px] p-4 text-black text-[15px] placeholder-gray-500 resize-none h-[113px] focus:outline-none focus:ring-1 focus:ring-[#B7131A]" placeholder="Tulis review kamu di sini..."></textarea>
                    <div class="flex justify-end mt-2">
                        <button type="button" class="px-8 py-2.5 bg-[#B7131A] border border-[#7F1010] rounded-full text-white text-[15px] font-medium flex items-center justify-center shadow-sm hover:bg-[#8A070D] transition">Kirim</button>
                    </div>
                </form>
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
