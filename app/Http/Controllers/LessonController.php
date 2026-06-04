<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Progress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;

class LessonController extends Controller
{
    /**
     * Menampilkan katalog materi untuk siswa.
     */
    public function index(): View
    {
        $userId = Auth::id();

        // Mengambil semua materi yang dipublish
        // dan eager-load relasi progress khusus untuk user yang sedang login
        $lessons = Lesson::where('status', 'published')
            ->with(['progress' => function ($query) use ($userId) {
                $query->where('user_id', $userId);
            }])
            ->orderBy('order_number')
            ->get();

        return view('lesson', compact('lessons'));
    }

    /**
     * Menampilkan detail materi beserta blok interaktifnya.
     */
    public function show($slug): View
    {
        // Ambil lesson berdasarkan slug, dan load blok-bloknya
        $lesson = Lesson::where('slug', $slug)
            ->where('status', 'published')
            ->with('blocks') // relasi blocks otomatis order by order_number
            ->firstOrFail();

        // Cek apakah siswa sudah menyelesaikan materi ini
        $isCompleted = Progress::where('user_id', Auth::id())
            ->where('lesson_id', $lesson->id)
            ->exists();

        // Tim frontend dapat menggunakan variabel $lesson dan $isCompleted di view ini
        return view('lesson-detail', compact('lesson', 'isCompleted'));
    }

    /**
     * Endpoint API (POST) untuk menandai materi telah selesai dibaca/dikerjakan.
     */
    public function complete(Request $request, $id): JsonResponse
    {
        $lesson = Lesson::where('status', 'published')->findOrFail($id);
        
        // Catat progress menggunakan firstOrCreate agar tidak ada duplikasi data
        $progress = Progress::firstOrCreate([
            'user_id'   => Auth::id(),
            'lesson_id' => $lesson->id,
        ], [
            'completed_at' => now(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Progress berhasil dicatat.',
            'data'    => $progress
        ]);
    }
}
