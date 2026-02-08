<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'title_uz' => "O'zbek folklori",
                'title_en' => "Uzbek Folklore",
                'slug' => 'ozbek-folklori',
                'status' => 'published',
            ],
            [
                'title_uz' => 'Folklorshunos olimlar',
                'title_en' => 'Folklore Scholars',
                'slug' => 'folklorshunos-olimlar',
                'status' => 'published',
            ],
            [
                'title_uz' => 'Folklor ansambllari',
                'title_en' => 'Folklore Ensembles',
                'slug' => 'folklor-ansambllari',
                'status' => 'published',
            ],
            [
                'title_uz' => 'Folklor janrlari',
                'title_en' => 'Folklore Genres',
                'slug' => 'folklor-janrlari',
                'status' => 'published',
                'children' => [
                    ['title_uz' => 'Afsona va miflar', 'title_en' => 'Legends and Myths'],
                    ['title_uz' => "O'zbek baxshichilik san'ati", 'title_en' => 'Uzbek Bakhshi Art'],
                    ['title_uz' => 'Dostonlar', 'title_en' => 'Epics'],
                    ['title_uz' => 'Ertaklar', 'title_en' => 'Fairy Tales'],
                    ['title_uz' => 'Rivoyatlar', 'title_en' => 'Narratives'],
                    ['title_uz' => 'Qahramonlik dostonlari', 'title_en' => 'Heroic Epics'],
                    ['title_uz' => 'Topishmoqlar', 'title_en' => 'Riddles'],
                    ['title_uz' => 'Marosim folklori', 'title_en' => 'Ceremonial Folklore'],
                    ['title_uz' => 'Maqollar', 'title_en' => 'Proverbs'],
                    ['title_uz' => 'Askiya', 'title_en' => 'Askiya'],
                    ['title_uz' => 'Latifa va loflar', 'title_en' => 'Anecdotes'],
                    ['title_uz' => "Xalq qo'shiqlari", 'title_en' => 'Folk Songs'],
                    ['title_uz' => 'Termalar', 'title_en' => 'Termas'],
                ]
            ],
        ];

        foreach ($categories as $categoryData) {
            $children = $categoryData['children'] ?? [];
            unset($categoryData['children']);

            $category = Category::updateOrCreate(['slug' => $categoryData['slug']], $categoryData);

            foreach ($children as $childData) {
                $childData['slug'] = \Illuminate\Support\Str::slug($childData['title_uz']);
                $childData['status'] = 'published';
                $childData['parent_id'] = $category->id;
                Category::updateOrCreate(['slug' => $childData['slug']], $childData);
            }
        }
    }
}
