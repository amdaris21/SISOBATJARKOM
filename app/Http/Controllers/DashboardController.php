<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Progress;
use App\Models\Quiz;
use App\Models\QuizAttempt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Tampilkan halaman dashboard untuk user (siswa).
     * Jika yang login adalah admin, arahkan ke dashboard admin.
     */
    public function index()
    {
        if (Auth::user()->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }
        $userId = Auth::id();

        // 1. Kalkulasi Materi Selesai
        $totalLessons = Lesson::where('status', 'published')->count();
        $completedLessons = Progress::where('user_id', $userId)->count();

        // 2. Kalkulasi Quiz Selesai
        $totalQuizzes = Quiz::where('status', 'published')->count();
        $completedQuizzes = QuizAttempt::where('user_id', $userId)
            ->where('status', 'completed')
            ->count();

        // Persentase untuk progress bar (jika diperlukan frontend)
        $lessonProgressPercent = $totalLessons > 0 ? round(($completedLessons / $totalLessons) * 100) : 0;
        $quizProgressPercent = $totalQuizzes > 0 ? round(($completedQuizzes / $totalQuizzes) * 100) : 0;

        return view('dashboard', compact(
            'totalLessons',
            'completedLessons',
            'totalQuizzes',
            'completedQuizzes',
            'lessonProgressPercent',
            'quizProgressPercent'
        ));
    }
}
