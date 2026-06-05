<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SISOBATJARKOM</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
      
        <script src="https://cdn.tailwindcss.com"></script>
    @endif
    <style>
        body {
            font-family: 'Lexend', sans-serif;
            background-color: #FFFFFF;
        }
    </style>
</head>
<body class="antialiased text-[#4E342E]">
    
    <header class="w-full bg-white border-b border-[#B8B8B8] sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-[90px] flex items-center justify-between">
            <div class="flex items-center gap-3">
                
                <div class="w-[60px] h-[60px] rounded-full overflow-hidden">
                    <img src="{{ asset('images/Logo2.jpeg') }}"
                     alt="Logo SISOBATJARKOM"
                     class="w-full h-full object-cover">
                </div>
                <h1 class="text-3xl font-semibold tracking-tight text-[#4E342E]">
                    SISOBAT<span class="text-[#B7131A]">JARKOM</span>
                </h1>
            </div>
            <div class="flex items-center gap-4">
                <a href="{{ route('login') }}" class="px-6 py-2 rounded-[10px] bg-[#B7131A] border border-[#7F1010] text-white font-medium hover:bg-[#8A070D] transition">Sign In</a>
                <a href="{{ route('register') }}" class="px-6 py-2 rounded-[10px] bg-[#B7131A] border border-[#7F1010] text-white font-medium hover:bg-[#8A070D] transition">Sign Up</a>
            </div>
        </div>
    </header>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 mt-8">
        <div class="bg-white border border-[#B8B8B8] rounded-[10px] shadow-[4px_4px_4px_rgba(0,0,0,0.25)] p-8 md:p-14 flex flex-col-reverse md:flex-row items-center gap-12">
            <div class="flex-1 space-y-6">
                <div class="inline-block bg-[#FFE099] border border-[#855D00] text-[#7B574F] px-4 py-1.5 rounded-[10px] text-sm md:text-base font-medium">
                    Teman Belajar Jaringanmu
                </div>
                <h2 class="text-3xl md:text-[28px] lg:text-4xl font-medium leading-tight text-[#4E342E]">
                    MULAI PAHAMI JARINGAN <br/>
                    <span class="text-[#B7131A]">DARI DASARNYA</span>
                </h2>
                <p class="text-base md:text-lg text-black leading-relaxed max-w-[480px]">
                    SISOBATJARKOM Membantu kamu memahami dasar jaringan komputer. Melalui materi terstruktur dan quiz interaktif yang menantang dalam satu wadah.
                </p>
                <div class="pt-2">
                    <a href="{{ route('login') }}" class="inline-flex items-center px-8 py-3 rounded-full bg-[#B7131A] border-2 border-[#5C0005] text-white font-medium text-base hover:bg-[#8A070D] transition">
                        Mulai Belajar Sekarang
                    </a>
                </div>
            </div>
            <div class="flex-1 w-full flex justify-center md:justify-end">
              
                <div class="w-full max-w-sm aspect-square rounded-[10px] flex items-center justify-center overflow-hidden">
                    <img src="{{ asset('images/LP1.jpeg') }}" alt="Ilustrasi Dasar Jaringan" class="w-full h-full object-contain" />
                </div>
            </div>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="flex items-center gap-6 mb-12">
            <h2 class="text-[28px] md:text-3xl font-medium whitespace-nowrap text-black uppercase">JELAJAHI FITUR UTAMA</h2>
            <div class="flex-grow h-px bg-[#AFABAA]"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <a href="{{ route('login') }}" class="group block relative bg-white border border-[#B8B8B8] rounded-[10px] p-8 shadow-[0_10px_0_0_#D69600] hover:-translate-y-1 transition-transform min-h-[250px]">
                <div class="w-[60px] h-[60px] bg-[#FFE099] rounded-[20px] flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white stroke-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                </div>
                <h3 class="text-[28px] font-medium mb-3 text-black">Materi</h3>
                <p class="text-black text-base leading-[20px] max-w-[250px]">Pelajari konsep jaringan secara bertahap dengan penjelasan yang mudah diikuti.</p>
                <div class="absolute bottom-8 right-8 flex justify-end">
                    <div class="p-2 border-[2.5px] border-[#1b1b18] group-hover:border-[#D69600] rounded-lg transition-colors">
                        <svg class="w-5 h-5 text-[#1b1b18] group-hover:text-[#D69600] transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                    </div>
                </div>
            </a>

            <a href="{{ route('login') }}" class="group block relative bg-white border border-[#B8B8B8] rounded-[10px] p-8 shadow-[0_10px_0_0_#A10C13] hover:-translate-y-1 transition-transform min-h-[250px]">
                <div class="w-[60px] h-[60px] bg-[#FFCCCF] rounded-[20px] flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white stroke-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                </div>
                <h3 class="text-[28px] font-medium mb-3 text-black">Quiz</h3>
                <p class="text-black text-base leading-[20px] max-w-[250px]">Latih pemahamanmu melalui soal interaktif untuk mengingat kembali yang sudah dipelajari.</p>
                <div class="absolute bottom-8 right-8 flex justify-end">
                    <div class="p-2 border-[2.5px] border-[#1b1b18] group-hover:border-[#A10C13] rounded-lg transition-colors">
                        <svg class="w-5 h-5 text-[#1b1b18] group-hover:text-[#A10C13] transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                    </div>
                </div>
            </a>

            <a href="{{ route('login') }}" class="group block relative bg-white border border-[#B8B8B8] rounded-[10px] p-8 shadow-[0_10px_0_0_#4E342E] hover:-translate-y-1 transition-transform min-h-[250px]">
                <div class="w-[60px] h-[60px] bg-[#D9C1BC] rounded-[20px] flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white stroke-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h3 class="text-[28px] font-medium mb-3 text-black">Bantuan & FAQ</h3>
                <p class="text-black text-base leading-[20px] max-w-[260px]">Temukan jawaban dan panduan untuk pertanyaan umum seputar materi, penggunaan platform, serta kendala saat belajar.</p>
                <div class="absolute bottom-8 right-8 flex justify-end">
                    <div class="p-2 border-[2.5px] border-[#1b1b18] group-hover:border-[#4E342E] rounded-lg transition-colors">
                        <svg class="w-5 h-5 text-[#1b1b18] group-hover:text-[#4E342E] transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                    </div>
                </div>
            </a>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="bg-white border border-[#B8B8B8] rounded-[10px] shadow-[4px_4px_4px_rgba(0,0,0,0.25)] p-8 md:p-14 flex flex-col md:flex-row items-center gap-12">
            <div class="flex-1 w-full flex justify-center order-2 md:order-1">
                
                <div class="w-full max-w-sm rounded-[10px] border border-[#D9C1BC] overflow-hidden">
                   <img src="{{ asset('images/LP2.jpeg') }}" alt="Ilustrasi Filosofi" class="w-full h-full object-contain" />
                </div>
                
            </div>
            <div class="flex-[1.5] space-y-6 order-1 md:order-2">
                <div class="inline-block bg-[#FFE099] border border-[#855D00] text-[#7B574F] px-4 py-1.5 rounded-[10px] text-sm md:text-base font-medium">
                    FILOSOFI KAMI
                </div>
                <h2 class="text-3xl md:text-[36px] font-medium leading-tight text-[#7B574F]">
                    Teman Belajar untuk <span class="text-[#B7131A] font-medium">Memahami Jaringan</span>
                </h2>
                <div class="text-black text-base leading-[20px] space-y-4">
                    <p>
                        SISOBATJARKOM lahir dari pengalaman bahwa belajar jaringan komputer sering terasa rumit ketika materi hanya disajikan dalam bentuk teori yang padat. Banyak orang memahami istilah seperti IP address, topologi, atau protokol, tetapi masih kesulitan melihat bagaimana konsep tersebut digunakan dalam situasi nyata.
                    </p>
                    <p>
                        Karena itu, SISOBATJARKOM hadir sebagai ruang belajar yang lebih dekat, terarah, dan mudah diikuti. Platform ini tidak hanya menyajikan materi, tetapi juga membantu pengguna memahami alur belajar jaringan secara bertahap melalui penjelasan dan latihan yang relevan.
                    </p>
                    <p>
                        Pendekatan “sobat” digunakan karena proses belajar akan terasa lebih ringan ketika pengguna merasa didampingi, bukan hanya diberi instruksi. SISOBATJARKOM hadir sebagai teman belajar yang membantu menjelaskan, mengarahkan, dan menemani pengguna dalam memahami jaringan komputer.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="max-w-full w-full bg-gradient-to-b from-[#463D3A] via-[#60534F] to-[#AC968F] py-24 relative overflow-hidden border-y border-[#B8B8B8] mt-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 flex flex-col items-center text-center">
            <h2 class="text-[28px] md:text-3xl font-medium text-white mb-10 leading-snug">
                Ayo gabung bersama SISOBATJARKOM <br class="hidden md:block"> dan mulai belajar jaringan dengan lebih mudah.
            </h2>
            <a href="{{ route('register') }}" class="inline-flex items-center gap-3 px-8 py-3 rounded-full bg-[#B7131A] text-white font-medium text-lg border border-white hover:bg-[#8A070D] transition group">
                Gabung Sekarang
                <div class="p-0.5 border-2 border-white rounded transform group-hover:translate-x-1 transition-transform">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"></path></svg>
                </div>
            </a>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="flex items-center gap-6 mb-12">
            <h2 class="text-[28px] md:text-3xl font-medium whitespace-nowrap text-black">Apa Kata Mereka ?</h2>
            <div class="flex-grow h-px bg-[#AFABAA]"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:px-12">
            
            <div class="bg-white border border-[#B8B8B8] p-8 md:p-10 rounded-[20px] shadow-[4px_4px_4px_rgba(0,0,0,0.25)] flex flex-col justify-between min-h-[190px]">
                <h4 class="text-[#8A070D] font-medium text-xl mb-4">~ Gaon</h4>
                <p class="text-base text-black leading-[20px]">"Asli review jujur, saya sekali belajar disini langsung paham. Bahasanya mudah banget buat dipahami 🤩"</p>
            </div>
            
            <div class="bg-white border border-[#B8B8B8] p-8 md:p-10 rounded-[20px] shadow-[4px_4px_4px_rgba(0,0,0,0.25)] flex flex-col justify-between min-h-[190px]">
                <h4 class="text-[#8A070D] font-medium text-xl mb-4">~ MinjeongKimm</h4>
                <p class="text-base text-black leading-[20px]">"Makasih developer udah buat web belajar dasar-dasar jarkom sekeren inii, BINTANG ⭐⭐⭐⭐⭐"</p>
            </div>
        </div>
    </section>

    <footer class="w-full bg-[rgba(92,64,0,0.09)] border-t border-[#B8B8B8] pt-16 pb-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">
                
                <div>
                    <h1 class="text-5xl font-medium tracking-tight text-[#4E342E] mb-2 leading-tight">
                        SISOBAT<br/><span class="text-[#B7131A]">JARKOM</span>
                    </h1>
                    <p class="text-[#B7131A] text-lg mt-6">"Klik, Belajar, Paham Jaringan"</p>
                </div>
                
                <div class="flex flex-col">
                    <h3 class="text-[#4E342E] text-base font-medium mb-3">Diskusi Lebih Lanjut?</h3>
                    <a href="https://discord.gg/example" target="_blank" class="inline-flex items-center gap-3 bg-white border border-[#B8B8B8] rounded-full pl-1 pr-6 py-1 mb-8 hover:bg-gray-50 transition self-start">
                        <div class="w-[41px] h-[41px] border border-[#B8B8B8] bg-white rounded-full flex items-center justify-center text-[#5865F2] overflow-hidden">
                             <!-- Discord icon placeholder -->
                             <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M20.317 4.3698a19.7913 19.7913 0 00-4.8851-1.5152.0741.0741 0 00-.0785.0371c-.211.3753-.4447.8648-.6083 1.2495-1.8447-.2762-3.68-.2762-5.4868 0-.1636-.3933-.4058-.8742-.6177-1.2495a.077.077 0 00-.0785-.037 19.7363 19.7363 0 00-4.8852 1.515.0699.0699 0 00-.0321.0277C.5334 9.0458-.319 13.5799.0992 18.0578a.0824.0824 0 00.0312.0561c2.0528 1.5076 4.0413 2.4228 5.9929 3.0294a.0777.0777 0 00.0842-.0276c.4616-.6304.8731-1.2952 1.226-1.9942a.076.076 0 00-.0416-.1057c-.6528-.2476-1.2743-.5495-1.8722-.8923a.077.077 0 01-.0076-.1277c.1258-.0943.2517-.1923.3718-.2914a.0743.0743 0 01.0776-.0105c3.9278 1.7933 8.18 1.7933 12.0614 0a.0739.0739 0 01.0785.0095c.1202.099.246.1981.3728.2924a.077.077 0 01-.0066.1276 12.2986 12.2986 0 01-1.873.8914.0766.0766 0 00-.0407.1067c.3604.698.7719 1.3628 1.225 1.9932a.076.076 0 00.0842.0286c1.961-.6067 3.9495-1.5219 6.0023-3.0294a.077.077 0 00.0313-.0552c.5004-5.177-.8382-9.6739-3.5485-13.6604a.061.061 0 00-.0312-.0286zM8.02 15.3312c-1.1825 0-2.1569-1.0857-2.1569-2.419 0-1.3332.9555-2.4189 2.157-2.4189 1.2108 0 2.1757 1.0952 2.1568 2.419 0 1.3332-.9555 2.4189-2.1569 2.4189zm7.9748 0c-1.1825 0-2.1569-1.0857-2.1569-2.419 0-1.3332.9554-2.4189 2.1569-2.4189 1.2108 0 2.1757 1.0952 2.1568 2.419 0 1.3332-.946 2.4189-2.1568 2.4189Z"/></svg>
                        </div>
                        <span class="text-[14px] text-[#5865F2] font-medium leading-[18px]">Gabung Discord</span>
                    </a>
                    
                    <h3 class="text-[#4E342E] text-base font-medium mb-3 mt-1">Kontak kami</h3>
                    <a href="mailto:sisobatjrkm@gmail.com" class="inline-flex items-center gap-3 bg-white border border-[#B8B8B8] rounded-full pl-1 pr-6 py-1 hover:bg-gray-50 transition self-start">
                        <div class="w-[41px] h-[41px] border border-[#B8B8B8] bg-white rounded-full flex items-center justify-center text-[#B7131A] overflow-hidden">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <span class="text-[14px] text-[#B7131A] font-medium leading-[18px]">sisobatjrkm@gmail.com</span>
                    </a>
                </div>
                
                <div>
                    <h3 class="text-[#4E342E] text-base font-medium mb-3">Tentang Kami</h3>
                    <p class="text-[#7B7675] text-[14px] leading-[18px] mb-5">
                        Dibangun untuk mempermudah akses belajar jaringan yang sering kali dianggap rumit.
                    </p>
                    <a href="{{ route('about') }}" class="text-[#B7131A] text-base hover:underline font-medium inline-flex items-center gap-1">
                        Selengkapnya <span class="text-xl leading-none">&rarr;</span>
                    </a>
                </div>
                
                <div>
                    <h3 class="text-[#4E342E] text-base font-medium mb-3">Sosial Media</h3>
                    <div class="flex gap-4">
                        <a href="javascript:void(0)" onclick="alert('Fitur ini sedang dalam tahap pengembangan!')" class="w-10 h-10 bg-white border border-[#B8B8B8] rounded-[10px] flex items-center justify-center text-gray-800 hover:bg-gray-50 hover:text-pink-600 transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                        </a>
                        <a href="javascript:void(0)" onclick="alert('Fitur ini sedang dalam tahap pengembangan!')" class="w-10 h-10 bg-white border border-[#B8B8B8] rounded-[10px] flex items-center justify-center text-gray-800 hover:bg-gray-50 hover:text-black transition">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-[#BABABA] pt-6 flex justify-center">
                <p class="text-[#7B7675] text-base">© 2026 SISOBATJARKOM. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
