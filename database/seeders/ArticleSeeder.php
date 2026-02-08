<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get some child categories
        $childCategories = Category::whereNotNull('parent_id')->get();
        if ($childCategories->isEmpty()) {
            // Fallback to parent categories if no children exist
            $childCategories = Category::all();
        }

        foreach ($childCategories as $category) {
            // Create 1-2 articles per category
            for ($i = 1; $i <= 2; $i++) {
                $title = "Maqola " . $i . " - " . $category->title_uz;
                Article::create([
                    'category_id' => $category->id,
                    'title_uz' => $title,
                    'title_en' => "Article " . $i . " - " . $category->title_en,
                    'slug' => Str::slug($title),
                    'content_uz' => "<p>Bu <strong>" . $category->title_uz . "</strong> bo'limidagi namuna maqola matni. Lorem ipsum dolor sit amet.</p>",
                    'content_en' => "<p>This is a sample article text in the <strong>" . $category->title_en . "</strong> category. Lorem ipsum dolor sit amet.</p>",
                    'status' => 'published',
                ]);
            }
        }
    }
}
