<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($slug)
    {
        // dd($slug);
        $category = Category::where('slug', $slug)
            ->where('status', 'published')
            ->with(['children' => function($query) {
                $query->where('status', 'published');
            }, 'articles' => function($query) {
                $query->where('status', 'published')->latest();
            }, 'parent'])
            ->firstOrFail();

        return view('frontend.category.show', compact('category'));
    }
}
