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

        return view('admin.dashboard', compact('totalUsers', 'totalLessons', 'totalQuizzes'));
    }
}
