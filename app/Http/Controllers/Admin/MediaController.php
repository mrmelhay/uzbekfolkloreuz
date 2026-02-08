<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function index()
    {
        $media = Media::latest()->paginate(20);
        return view('admin.media.index', compact('media'));
    }

    public function create()
    {
        return view('admin.media.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|image|max:2048', // Max 2MB
            'alt_text_uz' => 'nullable|string|max:255',
            'alt_text_en' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('uploads', $filename, 'public');

            Media::create([
                'filename' => $filename,
                'path' => '/storage/' . $path,
                'mime_type' => $file->getClientMimeType(),
                'size' => $file->getSize(),
                'alt_text_uz' => $request->alt_text_uz,
                'alt_text_en' => $request->alt_text_en,
            ]);

            return redirect()->route('media.index')->with('success', 'File uploaded successfully.');
        }

        return back()->with('error', 'No file uploaded.');
    }

    public function destroy(Media $media)
    {
        // Delete file from storage
        $path = str_replace('/storage/', '', $media->path);
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }

        $media->delete();
        return redirect()->route('media.index')->with('success', 'File deleted successfully.');
    }
}
