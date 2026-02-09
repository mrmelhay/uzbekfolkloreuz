<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeSectionController extends Controller
{
    public function index()
    {
        $sections = HomeSection::orderBy('order')->get();
        return view('admin.home_sections.index', compact('sections'));
    }

    public function create()
    {
        return view('admin.home_sections.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title_uz' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'content_uz' => 'nullable|string',
            'content_en' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'order' => 'integer|min:0',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('home_sections', 'public');
            $validated['image'] = '/storage/' . $path;
        }
        
        $validated['is_active'] = $request->has('is_active');

        HomeSection::create($validated);

        return redirect()->route('home_sections.index')->with('success', 'Home section created successfully.');
    }

    public function edit(HomeSection $homeSection)
    {
        return view('admin.home_sections.edit', compact('homeSection'));
    }

    public function update(Request $request, HomeSection $homeSection)
    {
        $validated = $request->validate([
            'title_uz' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'content_uz' => 'nullable|string',
            'content_en' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'order' => 'integer|min:0',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($homeSection->image) {
                $oldPath = str_replace('/storage/', '', $homeSection->image);
                Storage::disk('public')->delete($oldPath);
            }
            $path = $request->file('image')->store('home_sections', 'public');
            $validated['image'] = '/storage/' . $path;
        }

        $validated['is_active'] = $request->has('is_active');

        $homeSection->update($validated);

        return redirect()->route('home_sections.index')->with('success', 'Home section updated successfully.');
    }

    public function destroy(HomeSection $homeSection)
    {
        if ($homeSection->image) {
            $oldPath = str_replace('/storage/', '', $homeSection->image);
            Storage::disk('public')->delete($oldPath);
        }

        $homeSection->delete();
        return redirect()->route('home_sections.index')->with('success', 'Home section deleted successfully.');
    }
}
