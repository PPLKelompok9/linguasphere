<?php

namespace Database\Seeders;

use App\Models\Agency;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AgencySeeder extends Seeder
{
    public function run(): void
    {
        $agencies = [
            [
                'name' => 'ETS - Educational Testing Service',
                'cover' => 'https://upload.wikimedia.org/wikipedia/commons/1/15/ETS_Logo.svg',
                'description' => 'ETS is a nonprofit organization that develops, administers and scores more than 50 million tests annually in more than 180 countries, at more than 9,000 locations worldwide.',
                'slug' => Str::slug('ETS - Educational Testing Service'),
                'address' => '660 Rosedale Road Princeton, NJ 08541, United States',
                'contact' => '+1-877-863-3546'
            ],
            [
                'name' => 'NIIED - National Institute for International Education',
                'cover' => 'https://upload.wikimedia.org/wikipedia/commons/0/0f/TOPIK_logo.svg',
                'description' => 'NIIED is a South Korean government organization that promotes international education exchange and manages the TOPIK (Test of Proficiency in Korean) examination.',
                'slug' => Str::slug('NIIED - National Institute for International Education'),
                'address' => '81 Suseong-ro 162-gil, Suseong-gu, Daegu, South Korea',
                'contact' => '+82-2-3668-1300'
            ],
            [
                'name' => 'Japan Foundation',
                'cover' => 'https://upload.wikimedia.org/wikipedia/commons/7/7a/JLPT_logo.svg',
                'description' => 'The Japan Foundation is Japans principal organization for promoting international cultural exchange, including the administration of the JLPT (Japanese Language Proficiency Test).',
                'slug' => Str::slug('Japan Foundation'),
                'address' => '4-4-1 Yotsuya, Shinjuku-ku, Tokyo 160-0004, Japan',
                'contact' => '+81-3-5367-1021'
            ],
            [
                'name' => 'France Education International',
                'cover' => 'https://upload.wikimedia.org/wikipedia/commons/5/5a/Logo_FEi.svg',
                'description' => 'France Education International (formerly CIEP) is a French public institution that promotes French language and culture worldwide, including DELF and DALF certifications.',
                'slug' => Str::slug('France Education International'),
                'address' => '1 Avenue Léon Journault, 92318 Sèvres, France',
                'contact' => '+33-1-45-07-60-00'
            ],
            [
                'name' => 'Cambridge Assessment English',
                'cover' => 'https://upload.wikimedia.org/wikipedia/commons/5/5a/Cambridge_Assessment_English_Logo.svg',
                'description' => 'Cambridge Assessment English provides the worlds leading range of qualifications and tests for learners and teachers of English, including IELTS.',
                'slug' => Str::slug('Cambridge Assessment English'),
                'address' => 'The Triangle Building, Shaftesbury Road, Cambridge, CB2 8EA, United Kingdom',
                'contact' => '+44-1223-553997'
            ]
        ];

        foreach ($agencies as $agency) {
            Agency::create($agency);
        }
    }
}