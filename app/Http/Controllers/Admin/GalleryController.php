<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        return view('admin.galleries.index', [
            'galleries' => Gallery::latest()->get()
        ]);
    }

    public function create()
    {
        return view('admin.galleries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048',
            'title' => 'nullable|string|max:255',
        ]);

        $imagePath = $request->file('image')->store('galleries', 'public');

        Gallery::create([
            'image' => $imagePath,
            'title' => $request->title,
            'is_active' => true,
        ]);

        return redirect()
            ->route('admin.galleries.index')
            ->with('success', 'Foto berhasil ditambahkan');
    }

    public function destroy(Gallery $gallery)
    {
        if ($gallery->image) {
            Storage::disk('public')->delete($gallery->image);
        }

        $gallery->delete();

        return back()->with('success', 'Foto berhasil dihapus');
    }
}
