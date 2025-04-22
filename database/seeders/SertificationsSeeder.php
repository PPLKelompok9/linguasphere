<?php

namespace Database\Seeders;

use App\Models\Sertification;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SertificationsSeeder extends Seeder
{
    public function run(): void
    {
        $sertifications = [
            [
                'name' => 'TOEFL iBT Test',
                'cover' => 'https://upload.wikimedia.org/wikipedia/commons/6/69/TOEFL_logo.svg',
                'description' => 'The TOEFL iBT test measures your ability to use and understand English at the university level and evaluates how well you combine your listening, reading, speaking, and writing skills to perform academic tasks.',
                'slug' => Str::slug('TOEFL iBT Test'),
                'price' => 205.00,
                'level' => 'All Levels',
                'id_agency' => 1, // ETS
                'id_category' => 1 // English
            ],
            [
                'name' => 'IELTS Academic',
                'cover' => 'https://upload.wikimedia.org/wikipedia/commons/3/32/IELTS_logo.svg',
                'description' => 'IELTS Academic measures English language proficiency needed for an academic, higher education environment. The tasks and texts are accessible to all test-takers, irrespective of their subject focus.',
                'slug' => Str::slug('IELTS Academic'),
                'price' => 215.00,
                'level' => 'All Levels',
                'id_agency' => 5, // Cambridge Assessment English
                'id_category' => 1 // English
            ],
            [
                'name' => 'TOPIK II',
                'cover' => 'https://upload.wikimedia.org/wikipedia/commons/0/0f/TOPIK_logo.svg',
                'description' => 'The Test of Proficiency in Korean (TOPIK) II is designed to assess the Korean language proficiency of non-native speakers who plan to study at higher education institutions in Korea or seek employment in workplaces where Korean language skills are required.',
                'slug' => Str::slug('TOPIK II'),
                'price' => 45.00,
                'level' => 'Intermediate to Advanced',
                'id_agency' => 2, // NIIED
                'id_category' => 2 // Korean
            ],
            [
                'name' => 'JLPT N2',
                'cover' => 'https://upload.wikimedia.org/wikipedia/commons/7/7a/JLPT_logo.svg',
                'description' => 'The Japanese Language Proficiency Test N2 certifies that you have the ability to understand Japanese used in everyday situations, and in a variety of circumstances to a certain degree.',
                'slug' => Str::slug('JLPT N2'),
                'price' => 60.00,
                'level' => 'Upper Intermediate',
                'id_agency' => 3, // Japan Foundation
                'id_category' => 3 // Japanese
            ],
            [
                'name' => 'JLPT N1',
                'cover' => 'https://upload.wikimedia.org/wikipedia/commons/7/7a/JLPT_logo.svg',
                'description' => 'The Japanese Language Proficiency Test N1 is the highest level of the standardized test for Japanese language proficiency. It certifies the ability to understand Japanese in a variety of circumstances.',
                'slug' => Str::slug('JLPT N1'),
                'price' => 60.00,
                'level' => 'Advanced',
                'id_agency' => 3, // Japan Foundation
                'id_category' => 3 // Japanese
            ],
            [
                'name' => 'HSK 6',
                'cover' => 'https://upload.wikimedia.org/wikipedia/commons/8/87/HSK_logo.svg',
                'description' => 'HSK 6 is the highest level of the Chinese Proficiency Test. It tests the candidates ability to understand Chinese in various complicated contexts and express themselves fluently in Chinese.',
                'slug' => Str::slug('HSK 6'),
                'price' => 55.00,
                'level' => 'Advanced',
                'id_agency' => 4, // Hanban
                'id_category' => 4 // Chinese
            ],
            [
                'name' => 'HSK 5',
                'cover' => 'https://upload.wikimedia.org/wikipedia/commons/8/87/HSK_logo.svg',
                'description' => 'HSK 5 is designed for learners who can read Chinese newspapers and magazines, enjoy Chinese films and plays, and give full-length speeches in Chinese.',
                'slug' => Str::slug('HSK 5'),
                'price' => 55.00,
                'level' => 'Upper Intermediate',
                'id_agency' => 4, // Hanban
                'id_category' => 4 // Chinese
            ],
            
            [
                'name' => 'DELF B2',
                'cover' => 'https://upload.wikimedia.org/wikipedia/commons/5/5a/Logo_FEi.svg',
                'description' => 'The DELF B2 is an independent-level diploma that certifies a more advanced knowledge of French. At this level, candidates can understand the essential content of concrete or abstract subjects and engage in technical discussions in their field of specialization.',
                'slug' => Str::slug('DELF B2'),
                'price' => 120.00,
                'level' => 'Upper Intermediate',
                'id_agency' => 4, // France Education International
                'id_category' => 4 // French
            ]
        ];

        foreach ($sertifications as $sertification) {
            Sertification::create($sertification);
        }
    }
}