<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\HomeSlider;
use App\Models\HomeSection;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = HomeSlider::where('is_active', true)->orderBy('order')->get();
        $homeSections = HomeSection::active()->orderBy('order')->get();
        $latestArticles = Article::with('category')
            ->where('status', 'published')
            ->latest()
            ->take(6)
            ->get();

        return view('frontend.home', compact('sliders', 'latestArticles', 'homeSections'));
    }
}
