<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Page::updateOrCreate(
            ['slug' => 'loyiha'],
            [
                'title_uz' => 'Loyiha haqida',
                'title_en' => 'About Project',
                'content_uz' => '<h1>Loyiha haqida</h1><p>Bu yerda loyiha haqida ma\'lumot bo\'ladi.</p>',
                'content_en' => '<h1>About Project</h1><p>Information about the project will be here.</p>',
                'status' => 'published',
                'category_id' => null, // Standalone page
            ]
        );
    }
}
