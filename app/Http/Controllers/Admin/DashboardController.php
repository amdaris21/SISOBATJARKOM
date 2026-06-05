<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Lesson;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard admin dengan metrik statistik.
     */
    public function index(): View
    {
        // Menghitung total user (siswa), mengecualikan admin
        $totalUsers = User::where('role', 'user')->count();

        // Menghitung total materi yang ada di database
        $totalLessons = Lesson::count();

        // Menghitung total quiz
        $totalQuizzes = Quiz::count();

        // Popularitas Materi (Top 4)
        $popularLessons = Lesson::withCount('progress')
        ->orderByDesc('progress_count')
        ->take(4)
        ->get();

        // Keaktifan Pengguna (Dinamis berdasarkan parameter range)
        $range = (int) request('range', 9);
        $dailyActivity = [];
        $dailyCounts = [];
        for ($i = $range - 1; $i >= 0; $i--) {
            $date = now()->subDays($i)->toDateString();
            // We use Progress updates as a proxy for activity
            $count = \App\Models\Progress::whereDate('updated_at', $date)->count();
            $dailyCounts[] = $count;
        }
        $maxDaily = max($dailyCounts) ?: 1;
        foreach ($dailyCounts as $count) {
            $dailyActivity[] = max(10, round(($count / $maxDaily) * 100));
        }

        return view('admin.dashboard', compact('totalUsers', 'totalLessons', 'totalQuizzes', 'popularLessons', 'dailyActivity', 'dailyCounts', 'range'));
    }
}
