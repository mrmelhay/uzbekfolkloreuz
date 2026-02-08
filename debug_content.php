<?php

echo "--- Categories ---\n";
$categories = \App\Models\Category::all();
foreach ($categories as $c) {
    echo "ID: {$c->id} | Slug: '{$c->slug}' | Status: '{$c->status}' | Parent: {$c->parent_id}\n";
}

echo "\n--- Articles ---\n";
$articles = \App\Models\Article::all();
foreach ($articles as $a) {
    echo "ID: {$a->id} | Slug: '{$a->slug}' | Status: '{$a->status}' | Category: {$a->category_id}\n";
}

echo "\n--- Routes ---\n";
$routes = \Illuminate\Support\Facades\Route::getRoutes();
foreach ($routes as $route) {
    if (str_contains($route->uri(), 'category') || str_contains($route->uri(), 'article')) {
        echo $route->methods()[0] . " " . $route->uri() . "\n";
    }
}
