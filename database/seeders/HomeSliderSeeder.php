<?php

namespace Database\Seeders;

use App\Models\HomeSlider;
use Illuminate\Database\Seeder;

class HomeSliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HomeSlider::updateOrCreate(
            ['order' => 1],
            [
                'title_uz' => "O'zbek Xalq Og'zaki Ijodi",
                'title_en' => 'Uzbek Folklore',
                'subtitle_uz' => 'Milliy merosimizni asrab avaylaylik',
                'subtitle_en' => 'Preserving our national heritage',
                'description_uz' => "O'zbek xalqining boy madaniy merosi, dostonlar, ertaklar va maqollar.",
                'description_en' => 'Rich cultural heritage of Uzbek people, epics, fairy tales and proverbs.',
                'image' => '/photos/backgound_1.png', // Using existing background for now since we don't have slider images yet
                'button_text_uz' => "Ko'proq o'qish",
                'button_text_en' => 'Read More',
                'button_url' => '/uz/folklor-janrlari',
                'is_active' => true,
            ]
        );

         HomeSlider::updateOrCreate(
            ['order' => 2],
            [
                'title_uz' => 'Baxshichilik San\'ati',
                'title_en' => 'Art of Bakhshi',
                'subtitle_uz' => 'Jonli tarix sadosi',
                'subtitle_en' => 'Voice of living history',
                'description_uz' => 'Buyuk baxshilarimiz va ularning o\'lmas asarlari.',
                'description_en' => 'Our great bakhshis and their immortal works.',
                'image' => '/photos/backgound_1.png',
                'button_text_uz' => 'Batafsil',
                'button_text_en' => 'Details',
                'button_url' => '/uz/folklor-janrlari/ozbek-baxshichilik-sanati',
                'is_active' => true,
            ]
        );
    }
}
