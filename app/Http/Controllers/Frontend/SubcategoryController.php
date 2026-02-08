<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function show($categorySlug, $subcategorySlug)
    {
        $category = Category::where('slug', $categorySlug)
            ->where('status', 'published')
            ->firstOrFail();

        $subcategory = Subcategory::where('slug', $subcategorySlug)
            ->where('category_id', $category->id)
            ->where('status', 'published')
            ->with(['articles' => function($query) {
                $query->where('status', 'published')->latest();
            }])
            ->firstOrFail();

        return view('frontend.subcategory.show', compact('category', 'subcategory'));
    }
}
