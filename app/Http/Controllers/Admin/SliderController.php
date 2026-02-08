<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = HomeSlider::orderBy('order')->get();
        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title_uz' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'subtitle_uz' => 'nullable|string|max:255',
            'subtitle_en' => 'nullable|string|max:255',
            'description_uz' => 'nullable|string',
            'description_en' => 'nullable|string',
            'image' => 'required|image|max:2048',
            'image_mobile' => 'nullable|image|max:2048',
            'button_text_uz' => 'nullable|string|max:255',
            'button_text_en' => 'nullable|string|max:255',
            'button_url' => 'nullable|string|max:255',
            'order' => 'integer|min:0',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('sliders', 'public');
            $validated['image'] = '/storage/' . $path;
        }

        if ($request->hasFile('image_mobile')) {
            $path = $request->file('image_mobile')->store('sliders', 'public');
            $validated['image_mobile'] = '/storage/' . $path;
        }
        
        $validated['is_active'] = $request->has('is_active');

        HomeSlider::create($validated);

        return redirect()->route('sliders.index')->with('success', 'Slider created successfully.');
    }

    public function edit(HomeSlider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(Request $request, HomeSlider $slider)
    {
        $validated = $request->validate([
            'title_uz' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'subtitle_uz' => 'nullable|string|max:255',
            'subtitle_en' => 'nullable|string|max:255',
            'description_uz' => 'nullable|string',
            'description_en' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'image_mobile' => 'nullable|image|max:2048',
            'button_text_uz' => 'nullable|string|max:255',
            'button_text_en' => 'nullable|string|max:255',
            'button_url' => 'nullable|string|max:255',
            'order' => 'integer|min:0',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($slider->image) {
                $oldPath = str_replace('/storage/', '', $slider->image);
                Storage::disk('public')->delete($oldPath);
            }
            $path = $request->file('image')->store('sliders', 'public');
            $validated['image'] = '/storage/' . $path;
        }

        if ($request->hasFile('image_mobile')) {
            // Delete old image
            if ($slider->image_mobile) {
                $oldPath = str_replace('/storage/', '', $slider->image_mobile);
                Storage::disk('public')->delete($oldPath);
            }
            $path = $request->file('image_mobile')->store('sliders', 'public');
            $validated['image_mobile'] = '/storage/' . $path;
        }

        $validated['is_active'] = $request->has('is_active');

        $slider->update($validated);

        return redirect()->route('sliders.index')->with('success', 'Slider updated successfully.');
    }

    public function destroy(HomeSlider $slider)
    {
        if ($slider->image) {
            $oldPath = str_replace('/storage/', '', $slider->image);
            Storage::disk('public')->delete($oldPath);
        }
        if ($slider->image_mobile) {
            $oldPath = str_replace('/storage/', '', $slider->image_mobile);
            Storage::disk('public')->delete($oldPath);
        }

        $slider->delete();
        return redirect()->route('sliders.index')->with('success', 'Slider deleted successfully.');
    }
}
