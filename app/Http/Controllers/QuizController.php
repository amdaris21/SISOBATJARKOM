<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\QuizAttempt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;

class QuizController extends Controller
{
    /**
     * Menampilkan katalog quiz untuk siswa.
     */
    public function index(Request $request): View
    {
        $userId = Auth::id();

        $query = Quiz::where('status', 'published')
            ->with(['attempts' => function ($q) use ($userId) {
                $q->where('user_id', $userId);
            }]);

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%');
            });
        }

        $quizzes = $query->get();

        // Hitung berapa materi yang sudah diselesaikan user (untuk membuka gembok kuis)
        $completedLessonsCount = \App\Models\Progress::where('user_id', $userId)->count();

        // Hitung berapa kuis yang sudah diselesaikan user (untuk statistik UI)
        $completedQuizCount = \App\Models\QuizAttempt::where('user_id', $userId)
                                ->where('status', 'completed')
                                ->count();

        return view('quiz', compact('quizzes', 'completedLessonsCount', 'completedQuizCount'));
    }

    /**
     * Menampilkan detail dan instruksi kuis.
     */
    public function show($id): View
    {
        $quiz = Quiz::where('status', 'published')->findOrFail($id);

        // Cari tahu apakah sudah ada riwayat pengerjaan
        $attempt = QuizAttempt::where('user_id', Auth::id())
            ->where('quiz_id', $quiz->id)
            ->first();

        return view('quiz-detail', compact('quiz', 'attempt'));
    }

    /**
     * Endpoint API (POST) untuk menandai bahwa siswa mulai mengerjakan kuis (menuju ZEP).
     * Jika ZEP tidak bisa kirim feedback, frontend bisa menambahkan tombol "Selesai" untuk mengubah ke completed.
     */
    public function start(Request $request, $id): JsonResponse
    {
        $quiz = Quiz::where('status', 'published')->findOrFail($id);
        
        $attempt = QuizAttempt::firstOrCreate([
            'user_id' => Auth::id(),
            'quiz_id' => $quiz->id,
        ], [
            'status' => 'not_started', // sesuai dengan enum database
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Sesi quiz (ZEP) dimulai.',
            'data'    => $attempt
        ]);
    }

    /**
     * Endpoint jika siswa menekan tombol "Selesai Mengerjakan ZEP" di UI
     */
    public function complete(Request $request, $id): JsonResponse
    {
        $attempt = QuizAttempt::where('user_id', Auth::id())
            ->where('quiz_id', $id)
            ->firstOrFail();
            
        $attempt->update([
            'status' => 'completed',
            'completed_at' => now(),
        ]);
        
        return response()->json([
            'success' => true,
            'message' => 'Quiz ditandai selesai.'
        ]);
    }
}
