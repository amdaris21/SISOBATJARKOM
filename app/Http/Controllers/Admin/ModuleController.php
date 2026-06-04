<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Module;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ModuleController extends Controller
{
    /**
     * Tampilkan daftar semua modul di halaman admin.
     */
    public function index(): View
    {
        $modules = Module::orderBy('order_number')->get();

        return view('admin.modules.index', compact('modules'));
    }

    /**
     * Tampilkan form pembuatan modul baru.
     */
    public function create(): View
    {
        return view('admin.modules.form');
    }

    /**
     * Simpan modul baru ke database.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'description'  => 'nullable|string',
            'order_number' => 'required|integer|min:0',
            'status'       => 'required|in:draft,published',
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        // Pastikan slug unik — tambahkan angka jika sudah ada
        $originalSlug = $validated['slug'];
        $count = 1;
        while (Module::where('slug', $validated['slug'])->exists()) {
            $validated['slug'] = $originalSlug . '-' . $count++;
        }

        Module::create($validated);

        return redirect()->route('admin.modules.index')
            ->with('success', 'Modul berhasil ditambahkan!');
    }

    /**
     * Tampilkan form edit modul yang sudah ada.
     */
    public function edit(Module $module): View
    {
        return view('admin.modules.form', compact('module'));
    }

    /**
     * Perbarui data modul di database.
     */
    public function update(Request $request, Module $module): RedirectResponse
    {
        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'description'  => 'nullable|string',
            'order_number' => 'required|integer|min:0',
            'status'       => 'required|in:draft,published',
        ]);

        // Regenerasi slug hanya jika judul berubah
        if ($module->title !== $validated['title']) {
            $newSlug = Str::slug($validated['title']);
            $originalSlug = $newSlug;
            $count = 1;
            while (Module::where('slug', $newSlug)->where('id', '!=', $module->id)->exists()) {
                $newSlug = $originalSlug . '-' . $count++;
            }
            $validated['slug'] = $newSlug;
        }

        $module->update($validated);

        return redirect()->route('admin.modules.index')
            ->with('success', 'Modul berhasil diperbarui!');
    }

    /**
     * Hapus modul dari database.
     * Lesson dan LessonBlock yang terkait ikut terhapus (cascade).
     */
    public function destroy(Module $module): RedirectResponse
    {
        $module->delete();

        return redirect()->route('admin.modules.index')
            ->with('success', 'Modul berhasil dihapus!');
    }
}
