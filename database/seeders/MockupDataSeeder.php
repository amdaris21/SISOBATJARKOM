<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Lesson;
use App\Models\Quiz;
use Illuminate\Support\Str;

class MockupDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Disable foreign key checks to safely truncate
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        DB::table('lessons')->truncate();
        DB::table('quizzes')->truncate();
        DB::table('quiz_attempts')->truncate();
        
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $lessons = [
            [
                'title' => 'Materi Pembelajaran Dasar Jaringan Komputer',
                'description' => 'Apa itu jaringan, fungsi manfaat dan sejarah singkat perkembangannya.',
                'level' => 'Easy',
            ],
            [
                'title' => 'Materi 7 Osi Layer',
                'description' => 'Memahami lapisan OSI dari Physical hingga Application berserta fungsinya.',
                'level' => 'Medium',
            ],
            [
                'title' => 'HTTP, HTTPS, FTP & DNS',
                'description' => 'Bagaimana browser menerjemahkan URL jadi permintaan ke server.',
                'level' => 'Medium',
            ],
            [
                'title' => 'Materi Topologi Jaringan',
                'description' => 'Jenis-jenis topologi jaringan, kelebihan dan kekurangan tiap topologi.',
                'level' => 'Easy',
            ],
            [
                'title' => 'Perangkat Jaringan Komputer',
                'description' => 'pengertian, fungsi, jenis perangkat jaringan komputer, serta media transmisi dalam komunikasi data pada jaringan.',
                'level' => 'Hard',
            ],
            [
                'title' => 'Keamanan Jaringan Dasar',
                'description' => 'Firewall, enkripsi, VPN, dan serangan jaringan umum.',
                'level' => 'Hard',
            ],
            [
                'title' => 'Jenis-jenis Jaringan Komputer',
                'description' => 'Jenis jaringan komputer berdasarkan jangkauan, transmisi, dan berdasarkan fungsi.',
                'level' => 'Hard',
            ],
            [
                'title' => 'Arsitektur Komputer',
                'description' => 'Dasar kerja dan perkembangan arsitektur komputer.',
                'level' => 'Easy',
            ],
            [
                'title' => 'TCP/IP & Alamat IP',
                'description' => 'Cara kerja TCP/IP, subnetting dasar, dan IPv4 vs IPv6.',
                'level' => 'Medium',
            ],
        ];

        foreach ($lessons as $index => $lessonData) {
            Lesson::create([
                'module_id' => 1, // Assume module 1 exists
                'title' => $lessonData['title'],
                'slug' => Str::slug($lessonData['title']),
                'description' => $lessonData['description'],
                'level' => $lessonData['level'],
                'status' => 'published',
                'category' => 'Semua', // or map it properly
                'order_number' => $index + 1,
            ]);
        }

        $quizzes = [
            [
                'title' => 'Quiz Dasar jaringan',
                'level' => 'Easy',
                'question_count' => 10,
            ],
            [
                'title' => 'Quiz Osi Layer',
                'level' => 'Medium',
                'question_count' => 8,
            ],
            [
                'title' => 'Quiz HTTP, HTTPS & DNS',
                'level' => 'Medium',
                'question_count' => 10,
            ],
            [
                'title' => 'Quiz Tebak Topologi',
                'level' => 'Easy',
                'question_count' => 10,
            ],
            [
                'title' => 'Quiz Arsitektur Komputer',
                'level' => 'Easy',
                'question_count' => 8,
            ],
            [
                'title' => 'Quiz TCP dan IP',
                'level' => 'Medium',
                'question_count' => 8,
            ],
            [
                'title' => 'Quiz Keamanan jaringan',
                'level' => 'Hard',
                'question_count' => 14,
            ],
            [
                'title' => 'Quiz Jenis-jenis Jaringan Komputer',
                'level' => 'Hard',
                'question_count' => 14,
            ],
            [
                'title' => 'Quiz Perangkat Jaringan Komputer',
                'level' => 'Hard',
                'question_count' => 15,
            ],
        ];

        foreach ($quizzes as $index => $quizData) {
            $quiz = Quiz::create([
                'module_id' => 1,
                'title' => $quizData['title'],
                'description' => 'Uji pemahamanmu tentang ' . $quizData['title'] . '.',
                'level' => $quizData['level'],
                'question_count' => $quizData['question_count'],
                'status' => 'published',
                'zep_link' => 'https://zep.us/',
            ]);

            // Create attempts for first 6 quizzes for User ID 1 and 2
            $scores = [70, 90, 60, 80, 90, 90];
            if ($index < 6) {
                foreach ([1, 2] as $uid) {
                    \App\Models\QuizAttempt::create([
                        'user_id' => $uid,
                        'quiz_id' => $quiz->id,
                        'status' => 'completed',
                        'score' => $scores[$index],
                        'completed_at' => now(),
                    ]);
                }
            }
        }
    }
}
