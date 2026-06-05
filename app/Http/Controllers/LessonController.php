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
    public function index(Request $request): View
    {
        $userId = Auth::id();

        $query = Lesson::where('status', 'published')
            ->with(['progress' => function ($q) use ($userId) {
                $q->where('user_id', $userId);
            }]);

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%');
            });
        }

        if ($request->filled('category') && strtolower($request->category) !== 'semua') {
            $query->where('category', $request->category);
        }

        $lessons = $query->orderBy('order_number')->get();

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

        // Ambil urutan seluruh lesson published untuk pagination
        $allLessons = Lesson::where('status', 'published')
            ->orderBy('order_number')
            ->orderBy('id')
            ->get();

        $currentIndex = $allLessons->search(function ($item) use ($lesson) {
            return $item->id === $lesson->id;
        });

        $previousLesson = $currentIndex > 0 ? $allLessons[$currentIndex - 1] : null;
        $nextLesson = $currentIndex < $allLessons->count() - 1 ? $allLessons[$currentIndex + 1] : null;
        $totalLessons = $allLessons->count();
        $currentLessonNumber = $currentIndex + 1;

        // Hitung persentase progress belajar
        $completedCount = Progress::where('user_id', Auth::id())->count();
        $progressPercentage = $totalLessons > 0 ? round(($completedCount / $totalLessons) * 100) : 0;

        // Tim frontend dapat menggunakan variabel $lesson dan $isCompleted di view ini
        return view('lesson-detail', compact('lesson', 'isCompleted', 'previousLesson', 'nextLesson', 'totalLessons', 'currentLessonNumber', 'progressPercentage'));
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
