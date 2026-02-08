<?php
$category = \App\Models\Category::first();
if (!$category) {
    echo "No category found.\n";
    exit;
}

echo "Using Category ID: " . $category->id . "\n";

try {
    $article = \App\Models\Article::create([
        'category_id' => $category->id,
        'title_uz' => 'Debug Article',
        'title_en' => 'Debug Article EN',
        'content_uz' => 'Content',
        'content_en' => 'Content EN',
        'slug' => 'debug-article-' . time(),
        'status' => 'draft',
    ]);

    echo "Article Created. ID: " . $article->id . "\n";
    echo "Saved Category ID: " . $article->category_id . "\n";
    
    if ($article->category_id == $category->id) {
        echo "SUCCESS: category_id was saved correctly.\n";
    } else {
        echo "FAILURE: category_id was NOT saved correctly.\n";
    }
} catch (\Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
}
