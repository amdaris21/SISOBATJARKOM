<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Module;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class LessonController extends Controller
{
    /**
     * Tampilkan daftar semua materi (lesson) di halaman admin.
     */
    public function index(): View
    {
        $lessons = Lesson::with('module')
            ->orderBy('module_id')
            ->orderBy('order_number')
            ->get();

        return view('admin.kelolamateri', compact('lessons'));
    }

    /**
     * Tampilkan form pembuatan materi baru.
     */
    public function create(): View
    {
        $modules = Module::orderBy('order_number')->get();
        return view('admin.lessons.form', compact('modules'));
    }

    /**
     * Simpan materi baru ke database.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'module_id'    => 'required|exists:modules,id',
            'title'        => 'required|string|max:255',
            'description'  => 'nullable|string',
            'order_number' => 'required|integer|min:0',
            'status'       => 'required|in:draft,published',
            'category'     => 'nullable|string|max:255',
            'level'        => 'nullable|string|max:255',
            'file'         => 'nullable|file|mimes:pdf,doc,docx,jpeg,png,mp4|max:10240', // Maks 10MB
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        // Handle file upload
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('lessons', 'public');
            $validated['file_path'] = $path;
        }

        // Pastikan slug unik
        $originalSlug = $validated['slug'];
        $count = 1;
        while (Lesson::where('slug', $validated['slug'])->exists()) {
            $validated['slug'] = $originalSlug . '-' . $count++;
        }

        Lesson::create($validated);

        return redirect()->route('admin.lessons.index')
            ->with('success', 'Materi berhasil ditambahkan!');
    }

    /**
     * Tampilkan form edit materi yang sudah ada.
     */
    public function edit(Lesson $lesson): View
    {
        $modules = Module::orderBy('order_number')->get();
        return view('admin.lessons.form', compact('lesson', 'modules'));
    }

    /**
     * Perbarui data materi di database.
     */
    public function update(Request $request, Lesson $lesson): RedirectResponse
    {
        $validated = $request->validate([
            'module_id'    => 'required|exists:modules,id',
            'title'        => 'required|string|max:255',
            'description'  => 'nullable|string',
            'order_number' => 'required|integer|min:0',
            'status'       => 'required|in:draft,published',
            'category'     => 'nullable|string|max:255',
            'level'        => 'nullable|string|max:255',
            'file'         => 'nullable|file|mimes:pdf,doc,docx,jpeg,png,mp4|max:10240',
        ]);

        // Regenerasi slug hanya jika judul berubah
        if ($lesson->title !== $validated['title']) {
            $newSlug = Str::slug($validated['title']);
            $originalSlug = $newSlug;
            $count = 1;
            while (Lesson::where('slug', $newSlug)->where('id', '!=', $lesson->id)->exists()) {
                $newSlug = $originalSlug . '-' . $count++;
            }
            $validated['slug'] = $newSlug;
        }

        // Handle file upload (replace old one if exists)
        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if ($lesson->file_path && Storage::disk('public')->exists($lesson->file_path)) {
                Storage::disk('public')->delete($lesson->file_path);
            }
            
            $path = $request->file('file')->store('lessons', 'public');
            $validated['file_path'] = $path;
        }

        $lesson->update($validated);

        return redirect()->route('admin.lessons.index')
            ->with('success', 'Materi berhasil diperbarui!');
    }

    /**
     * Hapus materi dari database.
     */
    public function destroy(Lesson $lesson): RedirectResponse
    {
        // Hapus file fisik jika ada
        if ($lesson->file_path && Storage::disk('public')->exists($lesson->file_path)) {
            Storage::disk('public')->delete($lesson->file_path);
        }

        $lesson->delete();

        return redirect()->route('admin.lessons.index')
            ->with('success', 'Materi berhasil dihapus!');
    }
}
