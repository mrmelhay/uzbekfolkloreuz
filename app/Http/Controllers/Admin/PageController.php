<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::with('category')->latest()->paginate(10);
        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        $categories = Category::where('status', 'published')->get();
        return view('admin.pages.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'nullable|exists:categories,id',
            'title_uz' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'content_uz' => 'required|string',
            'content_en' => 'required|string',
            'status' => 'required|in:draft,published',
        ]);

        $validated['slug'] = Str::slug($validated['title_uz']);

        Page::create($validated);

        return redirect()->route('pages.index')->with('success', 'Page created successfully.');
    }

    public function show(Page $page)
    {
        return view('admin.pages.show', compact('page'));
    }

    public function edit(Page $page)
    {
        $categories = Category::where('status', 'published')->get();
        return view('admin.pages.edit', compact('page', 'categories'));
    }

    public function update(Request $request, Page $page)
    {
        $validated = $request->validate([
            'category_id' => 'nullable|exists:categories,id',
            'title_uz' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'content_uz' => 'required|string',
            'content_en' => 'required|string',
            'status' => 'required|in:draft,published',
        ]);

        if ($page->title_uz !== $validated['title_uz']) {
            $validated['slug'] = Str::slug($validated['title_uz']);
        }

        $page->update($validated);

        return redirect()->route('pages.index')->with('success', 'Page updated successfully.');
    }

    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->route('pages.index')->with('success', 'Page deleted successfully.');
    }
}
