<?php

$slug = 'maqola-1-afsona-va-miflar';

echo "--- Searching for Slug: '$slug' ---\n";

$article = \App\Models\Article::where('slug', $slug)->first();

if (!$article) {
    echo "Result: Article NOT FOUND in database.\n";
    // List similar slugs
    $similar = \App\Models\Article::where('slug', 'like', '%afsona%')->get();
    if ($similar->count() > 0) {
        echo "Found similar articles:\n";
        foreach ($similar as $s) {
            echo " - ID: {$s->id} | Slug: '{$s->slug}' | Status: '{$s->status}'\n";
        }
    }
} else {
    echo "Result: Article FOUND.\n";
    echo "ID: " . $article->id . "\n";
    echo "Status: " . $article->status . "\n";
    echo "Category ID: " . $article->category_id . "\n";
    
    if ($article->status !== 'published') {
        echo "WARNING: Article is NOT published. (User sees 'Published' in admin?)\n";
    }
}
