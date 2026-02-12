<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class PhotoController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Photos/Index', [
            'photos' => Photo::orderBy('order')->latest()->get(),
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Photos/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'image' => 'required|image|max:2048', // 2MB max
            'order' => 'integer|min:0',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('photos', 'public');
            $validated['path'] = '/storage/'.$path;
        }

        Photo::create([
            'title' => $validated['title'],
            'path' => $validated['path'],
            'order' => $validated['order'] ?? 0,
        ]);

        return redirect()->route('admin.photos.index')->with('success', 'Photo ajoutée avec succès.');
    }

    public function edit(Photo $photo)
    {
        return Inertia::render('Admin/Photos/Edit', [
            'photo' => $photo,
        ]);
    }

    public function update(Request $request, Photo $photo)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
            'order' => 'integer|min:0',
        ]);

        $data = [
            'title' => $validated['title'],
            'order' => $validated['order'] ?? 0,
        ];

        if ($request->hasFile('image')) {
            // Delete old image if it exists and is stored in storage (starts with /storage/)
            if ($photo->path && str_starts_with($photo->path, '/storage/')) {
                $oldPath = str_replace('/storage/', '', $photo->path);
                Storage::disk('public')->delete($oldPath);
            }

            $path = $request->file('image')->store('photos', 'public');
            $data['path'] = '/storage/'.$path;
        }

        $photo->update($data);

        return redirect()->route('admin.photos.index')->with('success', 'Photo mise à jour avec succès.');
    }

    public function destroy(Photo $photo)
    {
        if ($photo->path && str_starts_with($photo->path, '/storage/')) {
            $oldPath = str_replace('/storage/', '', $photo->path);
            Storage::disk('public')->delete($oldPath);
        }

        $photo->delete();

        return redirect()->route('admin.photos.index')->with('success', 'Photo supprimée avec succès.');
    }
}
