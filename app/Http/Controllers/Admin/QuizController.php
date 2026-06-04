<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Models\Quiz;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class QuizController extends Controller
{
    /**
     * Tampilkan daftar quiz di halaman admin.
     */
    public function index(): View
    {
        $quizzes = Quiz::with('module')->get();
        return view('admin.quizzes.index', compact('quizzes'));
    }

    /**
     * Tampilkan form pembuatan quiz baru.
     */
    public function create(): View
    {
        $modules = Module::orderBy('order_number')->get();
        return view('admin.quizzes.form', compact('modules'));
    }

    /**
     * Simpan data quiz baru ke database.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'module_id'      => 'required|exists:modules,id',
            'title'          => 'required|string|max:255',
            'description'    => 'nullable|string',
            'zep_link'       => 'required|url|max:255',
            'instruction'    => 'nullable|string',
            'status'         => 'required|in:draft,published',
            'question_count' => 'required|integer|min:0',
            'level'          => 'nullable|string|max:255',
        ]);

        // Cek jika modul sudah punya quiz (aturan: 1 modul = 1 quiz)
        if (Quiz::where('module_id', $validated['module_id'])->exists()) {
            return back()->withInput()->withErrors(['module_id' => 'Modul ini sudah memiliki Quiz.']);
        }

        Quiz::create($validated);

        return redirect()->route('admin.quizzes.index')
            ->with('success', 'Quiz berhasil ditambahkan!');
    }

    /**
     * Tampilkan form edit quiz yang sudah ada.
     */
    public function edit(Quiz $quiz): View
    {
        $modules = Module::orderBy('order_number')->get();
        return view('admin.quizzes.form', compact('quiz', 'modules'));
    }

    /**
     * Perbarui data quiz di database.
     */
    public function update(Request $request, Quiz $quiz): RedirectResponse
    {
        $validated = $request->validate([
            'module_id'      => 'required|exists:modules,id',
            'title'          => 'required|string|max:255',
            'description'    => 'nullable|string',
            'zep_link'       => 'required|url|max:255',
            'instruction'    => 'nullable|string',
            'status'         => 'required|in:draft,published',
            'question_count' => 'required|integer|min:0',
            'level'          => 'nullable|string|max:255',
        ]);

        // Cek jika modul diubah ke modul yang sudah punya quiz lain
        if ($quiz->module_id != $validated['module_id']) {
            if (Quiz::where('module_id', $validated['module_id'])->exists()) {
                return back()->withInput()->withErrors(['module_id' => 'Modul tujuan sudah memiliki Quiz lain.']);
            }
        }

        $quiz->update($validated);

        return redirect()->route('admin.quizzes.index')
            ->with('success', 'Quiz berhasil diperbarui!');
    }

    /**
     * Hapus quiz dari database.
     */
    public function destroy(Quiz $quiz): RedirectResponse
    {
        $quiz->delete();

        return redirect()->route('admin.quizzes.index')
            ->with('success', 'Quiz berhasil dihapus!');
    }
}
