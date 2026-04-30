<?php

namespace Database\Seeders;

use App\Models\Lesson;
use App\Models\LessonBlock;
use App\Models\Module;
use App\Models\Quiz;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

/**
 * LearningContentSeeder
 *
 * Mengisi tabel modules, lessons, lesson_blocks, dan quizzes
 * dengan data awal yang realistis untuk SisobatJarkom (SMK Kelas 10).
 *
 * Struktur data:
 *   - 3 Modul utama (Dasar Jaringan, Pengkabelan, IP Address)
 *   - Masing-masing modul berisi 2–3 Lesson
 *   - Masing-masing lesson berisi 3–5 LessonBlock (text, video, image, mini_quiz)
 *   - Masing-masing modul berisi 1 Quiz (link ke ZEP)
 */
class LearningContentSeeder extends Seeder
{
    public function run(): void
    {
        // ─────────────────────────────────────────────────────
        //  MODUL 1: Pengenalan Jaringan Komputer
        // ─────────────────────────────────────────────────────
        $modul1 = Module::create([
            'title'        => 'Pengenalan Jaringan Komputer',
            'slug'         => 'pengenalan-jaringan-komputer',
            'description'  => 'Memahami konsep dasar jaringan komputer, manfaat, serta jenis-jenis jaringan yang umum digunakan di dunia nyata.',
            'order_number' => 1,
            'status'       => 'published',
        ]);

        // Lesson 1.1
        $lesson1_1 = Lesson::create([
            'module_id'    => $modul1->id,
            'title'        => 'Apa itu Jaringan Komputer?',
            'slug'         => 'apa-itu-jaringan-komputer',
            'description'  => 'Pengenalan dasar tentang jaringan komputer dan mengapa jaringan itu penting.',
            'order_number' => 1,
            'status'       => 'published',
        ]);

        LessonBlock::insert([
            [
                'lesson_id'    => $lesson1_1->id,
                'type'         => 'text',
                'title'        => 'Definisi Jaringan Komputer',
                'content'      => "Jaringan komputer adalah sekumpulan komputer dan perangkat yang saling terhubung satu sama lain melalui media transmisi (kabel atau nirkabel) untuk berbagi data dan sumber daya.\n\nBayangkan seperti jalan raya — komputer adalah kendaraannya, dan data adalah penumpangnya yang berpindah dari satu tempat ke tempat lain.",
                'media_url'    => null,
                'embed_url'    => null,
                'command'      => null,
                'options'      => null,
                'correct_answer' => null,
                'order_number' => 1,
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'lesson_id'    => $lesson1_1->id,
                'type'         => 'video',
                'title'        => 'Video: Jaringan Komputer untuk Pemula',
                'content'      => 'Tonton video singkat berikut untuk memahami konsep jaringan komputer secara visual.',
                'media_url'    => null,
                'embed_url'    => 'https://www.youtube.com/embed/3QhU9jd03a0',
                'command'      => null,
                'options'      => null,
                'correct_answer' => null,
                'order_number' => 2,
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'lesson_id'    => $lesson1_1->id,
                'type'         => 'mini_quiz',
                'title'        => 'Cek Pemahaman: Definisi Jaringan',
                'content'      => 'Apa yang dimaksud dengan jaringan komputer?',
                'media_url'    => null,
                'embed_url'    => null,
                'command'      => null,
                'options'      => json_encode([
                    'a' => 'Satu komputer yang bekerja sendiri',
                    'b' => 'Sekumpulan komputer yang saling terhubung untuk berbagi data',
                    'c' => 'Program aplikasi untuk mengelola file',
                    'd' => 'Perangkat keras untuk mencetak dokumen',
                ]),
                'correct_answer' => 'b',
                'order_number' => 3,
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
        ]);

        // Lesson 1.2
        $lesson1_2 = Lesson::create([
            'module_id'    => $modul1->id,
            'title'        => 'Jenis-Jenis Jaringan (LAN, MAN, WAN)',
            'slug'         => 'jenis-jenis-jaringan-lan-man-wan',
            'description'  => 'Perbedaan antara jaringan LAN, MAN, dan WAN berdasarkan cakupan geografisnya.',
            'order_number' => 2,
            'status'       => 'published',
        ]);

        LessonBlock::insert([
            [
                'lesson_id'    => $lesson1_2->id,
                'type'         => 'text',
                'title'        => 'LAN (Local Area Network)',
                'content'      => "**LAN** adalah jaringan yang mencakup area kecil seperti satu ruangan, satu gedung, atau satu kampus.\n\n**Contoh nyata:** Jaringan di lab komputer sekolah kamu — semua komputer di lab tersambung ke satu jaringan LAN.\n\n**Karakteristik:**\n- Cakupan: hingga beberapa kilometer\n- Kecepatan: tinggi (100 Mbps – 10 Gbps)\n- Biaya: relatif murah",
                'media_url'    => null,
                'embed_url'    => null,
                'command'      => null,
                'options'      => null,
                'correct_answer' => null,
                'order_number' => 1,
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'lesson_id'    => $lesson1_2->id,
                'type'         => 'text',
                'title'        => 'MAN (Metropolitan Area Network)',
                'content'      => "**MAN** mencakup area yang lebih luas dari LAN, biasanya satu kota atau satu kawasan metropolitan.\n\n**Contoh nyata:** Jaringan antar kantor pemerintah dalam satu kota, atau jaringan antar kampus universitas dalam satu kota.\n\n**Karakteristik:**\n- Cakupan: 5–50 km\n- Kecepatan: menengah hingga tinggi\n- Biaya: menengah",
                'media_url'    => null,
                'embed_url'    => null,
                'command'      => null,
                'options'      => null,
                'correct_answer' => null,
                'order_number' => 2,
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'lesson_id'    => $lesson1_2->id,
                'type'         => 'text',
                'title'        => 'WAN (Wide Area Network)',
                'content'      => "**WAN** adalah jaringan yang mencakup area yang sangat luas, bahkan antar negara atau benua.\n\n**Contoh nyata:** Internet adalah contoh WAN terbesar di dunia. Juga jaringan ATM bank yang menghubungkan cabang-cabang di seluruh Indonesia.\n\n**Karakteristik:**\n- Cakupan: tidak terbatas\n- Kecepatan: bervariasi\n- Biaya: mahal",
                'media_url'    => null,
                'embed_url'    => null,
                'command'      => null,
                'options'      => null,
                'correct_answer' => null,
                'order_number' => 3,
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'lesson_id'    => $lesson1_2->id,
                'type'         => 'mini_quiz',
                'title'        => 'Cek Pemahaman: Jenis Jaringan',
                'content'      => 'Jaringan yang mencakup area satu kota disebut?',
                'media_url'    => null,
                'embed_url'    => null,
                'command'      => null,
                'options'      => json_encode([
                    'a' => 'LAN (Local Area Network)',
                    'b' => 'MAN (Metropolitan Area Network)',
                    'c' => 'WAN (Wide Area Network)',
                    'd' => 'PAN (Personal Area Network)',
                ]),
                'correct_answer' => 'b',
                'order_number' => 4,
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
        ]);

        // Quiz Modul 1
        Quiz::create([
            'module_id'   => $modul1->id,
            'title'       => 'Kuis Modul 1: Pengenalan Jaringan Komputer',
            'description' => 'Uji pemahamanmu tentang konsep dasar jaringan komputer, manfaatnya, dan jenis-jenisnya.',
            'zep_link'    => 'https://zep.us/play/your-quiz-link-modul-1',
            'instruction' => 'Kerjakan kuis ini setelah menyelesaikan semua materi di Modul 1. Kamu bisa mengerjakan kuis ini sebanyak 3 kali.',
            'status'      => 'published',
        ]);

        // ─────────────────────────────────────────────────────
        //  MODUL 2: Pengkabelan dan Topologi Jaringan
        // ─────────────────────────────────────────────────────
        $modul2 = Module::create([
            'title'        => 'Pengkabelan dan Topologi Jaringan',
            'slug'         => 'pengkabelan-dan-topologi-jaringan',
            'description'  => 'Mempelajari jenis-jenis kabel jaringan, cara memasang konektor RJ-45, dan berbagai topologi jaringan yang umum digunakan.',
            'order_number' => 2,
            'status'       => 'published',
        ]);

        // Lesson 2.1
        $lesson2_1 = Lesson::create([
            'module_id'    => $modul2->id,
            'title'        => 'Jenis-Jenis Kabel Jaringan',
            'slug'         => 'jenis-jenis-kabel-jaringan',
            'description'  => 'Mengenal kabel UTP, STP, dan fiber optic serta kegunaannya masing-masing.',
            'order_number' => 1,
            'status'       => 'published',
        ]);

        LessonBlock::insert([
            [
                'lesson_id'    => $lesson2_1->id,
                'type'         => 'text',
                'title'        => 'Kabel UTP (Unshielded Twisted Pair)',
                'content'      => "**Kabel UTP** adalah jenis kabel jaringan yang paling banyak digunakan di jaringan LAN. Terdiri dari 8 kawat tembaga yang dipilin berpasangan (4 pasang).\n\n**Kategori (CAT) yang umum:**\n- **CAT 5e**: Kecepatan hingga 1 Gbps, jarak maks 100 meter\n- **CAT 6**: Kecepatan hingga 10 Gbps, minim interferensi\n- **CAT 6a**: Kecepatan 10 Gbps dengan jarak lebih jauh\n\n**Kelebihan:** Murah, fleksibel, mudah dipasang\n**Kekurangan:** Rentan terhadap interferensi elektromagnetik",
                'media_url'    => null,
                'embed_url'    => null,
                'command'      => null,
                'options'      => null,
                'correct_answer' => null,
                'order_number' => 1,
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'lesson_id'    => $lesson2_1->id,
                'type'         => 'text',
                'title'        => 'Kabel Fiber Optic',
                'content'      => "**Fiber Optic** menggunakan cahaya (bukan listrik) untuk mengirimkan data melalui serat kaca atau plastik yang sangat tipis.\n\n**Keunggulan:**\n- Kecepatan sangat tinggi (hingga terabit per detik)\n- Jarak transmisi sangat jauh (bisa hingga kilometer)\n- Tidak terpengaruh interferensi elektromagnetik\n- Lebih aman (sulit disadap)\n\n**Kekurangan:** Harga mahal, pemasangan lebih rumit",
                'media_url'    => null,
                'embed_url'    => null,
                'command'      => null,
                'options'      => null,
                'correct_answer' => null,
                'order_number' => 2,
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'lesson_id'    => $lesson2_1->id,
                'type'         => 'step',
                'title'        => 'Cara Membuat Kabel Straight-Through (RJ-45)',
                'content'      => "Ikuti langkah-langkah berikut untuk membuat kabel UTP straight-through:\n\n**Langkah 1:** Kupas lapisan luar kabel UTP sepanjang ±3 cm menggunakan tang crimping.\n\n**Langkah 2:** Pisahkan dan luruskan 8 kawat. Susun sesuai standar TIA/EIA-568B:\n→ Putih-Oranye, Oranye, Putih-Hijau, Biru, Putih-Biru, Hijau, Putih-Coklat, Coklat\n\n**Langkah 3:** Potong rata ujung kawat sepanjang ±1,5 cm dari ujung kupasan.\n\n**Langkah 4:** Masukkan kawat ke dalam konektor RJ-45. Pastikan urutan tidak berubah.\n\n**Langkah 5:** Crimping konektor dengan tang crimping hingga berbunyi \"klik\".\n\n**Langkah 6:** Ulangi untuk ujung kabel yang lain dengan susunan yang SAMA (straight-through).\n\n**Langkah 7:** Tes konektivitas menggunakan LAN tester.",
                'media_url'    => null,
                'embed_url'    => null,
                'command'      => null,
                'options'      => null,
                'correct_answer' => null,
                'order_number' => 3,
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'lesson_id'    => $lesson2_1->id,
                'type'         => 'mini_quiz',
                'title'        => 'Cek Pemahaman: Kabel Jaringan',
                'content'      => 'Kabel jaringan yang menggunakan cahaya sebagai media transmisi data adalah?',
                'media_url'    => null,
                'embed_url'    => null,
                'command'      => null,
                'options'      => json_encode([
                    'a' => 'Kabel UTP',
                    'b' => 'Kabel STP',
                    'c' => 'Kabel Coaxial',
                    'd' => 'Kabel Fiber Optic',
                ]),
                'correct_answer' => 'd',
                'order_number' => 4,
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
        ]);

        // Lesson 2.2
        $lesson2_2 = Lesson::create([
            'module_id'    => $modul2->id,
            'title'        => 'Topologi Jaringan',
            'slug'         => 'topologi-jaringan',
            'description'  => 'Memahami perbedaan topologi Bus, Star, Ring, dan Mesh serta kelebihan dan kekurangannya.',
            'order_number' => 2,
            'status'       => 'published',
        ]);

        LessonBlock::insert([
            [
                'lesson_id'    => $lesson2_2->id,
                'type'         => 'text',
                'title'        => 'Topologi Star (Bintang)',
                'content'      => "**Topologi Star** adalah topologi paling populer di jaringan modern. Semua perangkat terhubung ke satu titik pusat (switch/hub).\n\n**Kelebihan:**\n- Mudah dalam manajemen dan troubleshooting\n- Jika satu kabel putus, hanya perangkat itu yang terpengaruh\n- Mudah menambah atau menghapus perangkat\n\n**Kekurangan:**\n- Jika switch/hub rusak, seluruh jaringan mati\n- Membutuhkan lebih banyak kabel\n\n**Digunakan di:** Lab sekolah, kantor, rumah tangga",
                'media_url'    => null,
                'embed_url'    => null,
                'command'      => null,
                'options'      => null,
                'correct_answer' => null,
                'order_number' => 1,
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'lesson_id'    => $lesson2_2->id,
                'type'         => 'text',
                'title'        => 'Topologi Bus',
                'content'      => "**Topologi Bus** menggunakan satu kabel utama (backbone) yang menghubungkan semua perangkat secara berurutan.\n\n**Kelebihan:**\n- Sederhana dan murah dalam instalasi\n- Tidak membutuhkan banyak kabel\n\n**Kekurangan:**\n- Jika kabel utama putus, seluruh jaringan mati\n- Performa menurun jika banyak perangkat terhubung\n- Sulit dalam troubleshooting\n\n**Digunakan di:** Jaringan kecil atau sementara, sudah jarang digunakan saat ini",
                'media_url'    => null,
                'embed_url'    => null,
                'command'      => null,
                'options'      => null,
                'correct_answer' => null,
                'order_number' => 2,
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'lesson_id'    => $lesson2_2->id,
                'type'         => 'mini_quiz',
                'title'        => 'Cek Pemahaman: Topologi Jaringan',
                'content'      => 'Topologi jaringan yang paling banyak digunakan di sekolah dan kantor saat ini adalah?',
                'media_url'    => null,
                'embed_url'    => null,
                'command'      => null,
                'options'      => json_encode([
                    'a' => 'Topologi Bus',
                    'b' => 'Topologi Ring',
                    'c' => 'Topologi Star',
                    'd' => 'Topologi Mesh',
                ]),
                'correct_answer' => 'c',
                'order_number' => 3,
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
        ]);

        // Quiz Modul 2
        Quiz::create([
            'module_id'   => $modul2->id,
            'title'       => 'Kuis Modul 2: Pengkabelan dan Topologi',
            'description' => 'Uji pemahamanmu tentang jenis-jenis kabel jaringan dan berbagai topologi yang dipelajari di Modul 2.',
            'zep_link'    => 'https://zep.us/play/your-quiz-link-modul-2',
            'instruction' => 'Kerjakan kuis ini setelah menyelesaikan semua materi di Modul 2. Pastikan kamu sudah memahami perbedaan antar topologi.',
            'status'      => 'published',
        ]);

        // ─────────────────────────────────────────────────────
        //  MODUL 3: Pengalamatan IP (IP Address)
        // ─────────────────────────────────────────────────────
        $modul3 = Module::create([
            'title'        => 'Pengalamatan IP (IP Address)',
            'slug'         => 'pengalamatan-ip-address',
            'description'  => 'Memahami konsep IP Address, subnet mask, kelas IP, dan cara menghitung subnetting dasar untuk jaringan komputer.',
            'order_number' => 3,
            'status'       => 'published',
        ]);

        // Lesson 3.1
        $lesson3_1 = Lesson::create([
            'module_id'    => $modul3->id,
            'title'        => 'Apa itu IP Address?',
            'slug'         => 'apa-itu-ip-address',
            'description'  => 'Memahami konsep IP Address sebagai identitas unik setiap perangkat dalam jaringan.',
            'order_number' => 1,
            'status'       => 'published',
        ]);

        LessonBlock::insert([
            [
                'lesson_id'    => $lesson3_1->id,
                'type'         => 'text',
                'title'        => 'Pengertian IP Address',
                'content'      => "**IP Address (Internet Protocol Address)** adalah label numerik unik yang diberikan kepada setiap perangkat yang terhubung ke jaringan komputer.\n\nIbarat seperti **alamat rumah** — setiap rumah punya alamat berbeda agar surat (data) bisa terkirim ke tujuan yang benar.\n\n**Versi IP Address:**\n- **IPv4**: Format 32-bit, contoh → `192.168.1.1`\n- **IPv6**: Format 128-bit, contoh → `2001:0db8:85a3::8a2e:0370:7334`\n\nSaat ini, IPv4 masih paling banyak digunakan di jaringan lokal (LAN).",
                'media_url'    => null,
                'embed_url'    => null,
                'command'      => null,
                'options'      => null,
                'correct_answer' => null,
                'order_number' => 1,
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'lesson_id'    => $lesson3_1->id,
                'type'         => 'text',
                'title'        => 'Kelas-Kelas IP Address (IPv4)',
                'content'      => "IPv4 dibagi menjadi beberapa kelas berdasarkan rentang nilai oktet pertamanya:\n\n| Kelas | Rentang | Default Subnet | Penggunaan |\n|-------|---------|----------------|------------|\n| **A** | 1–126 | 255.0.0.0 | Jaringan sangat besar |\n| **B** | 128–191 | 255.255.0.0 | Jaringan menengah |\n| **C** | 192–223 | 255.255.255.0 | Jaringan kecil (paling umum) |\n| **D** | 224–239 | — | Multicast |\n| **E** | 240–255 | — | Eksperimental |\n\n**Catatan:** IP 127.x.x.x adalah **Loopback** (untuk mengecek jaringan di komputer sendiri).",
                'media_url'    => null,
                'embed_url'    => null,
                'command'      => null,
                'options'      => null,
                'correct_answer' => null,
                'order_number' => 2,
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'lesson_id'    => $lesson3_1->id,
                'type'         => 'code',
                'title'        => 'Cara Melihat IP Address di Windows',
                'content'      => "Untuk melihat IP Address komputermu di Windows, buka Command Prompt dan ketik perintah berikut:",
                'media_url'    => null,
                'embed_url'    => null,
                'command'      => 'ipconfig',
                'options'      => null,
                'correct_answer' => null,
                'order_number' => 3,
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'lesson_id'    => $lesson3_1->id,
                'type'         => 'mini_quiz',
                'title'        => 'Cek Pemahaman: IP Address',
                'content'      => 'IP Address 192.168.1.1 termasuk ke dalam kelas berapa?',
                'media_url'    => null,
                'embed_url'    => null,
                'command'      => null,
                'options'      => json_encode([
                    'a' => 'Kelas A',
                    'b' => 'Kelas B',
                    'c' => 'Kelas C',
                    'd' => 'Kelas D',
                ]),
                'correct_answer' => 'c',
                'order_number' => 4,
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
        ]);

        // Quiz Modul 3
        Quiz::create([
            'module_id'   => $modul3->id,
            'title'       => 'Kuis Modul 3: Pengalamatan IP Address',
            'description' => 'Uji kemampuanmu dalam memahami konsep IP Address, kelas-kelas IP, dan subnet mask dasar.',
            'zep_link'    => 'https://zep.us/play/your-quiz-link-modul-3',
            'instruction' => 'Kerjakan kuis ini setelah menyelesaikan seluruh materi Modul 3. Kuis ini mencakup soal tentang kelas IP dan identifikasi subnet.',
            'status'      => 'published',
        ]);
    }
}
