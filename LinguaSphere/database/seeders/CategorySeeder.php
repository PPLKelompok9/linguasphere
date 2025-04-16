<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'English',
                'description' => 'English language certifications',
                'slug' => Str::slug('English')
            ],
            [
                'name' => 'Korean',
                'description' => 'Korean language certifications',
                'slug' => Str::slug('Korean')
            ],
            [
                'name' => 'Japanese',
                'description' => 'Japanese language certifications',
                'slug' => Str::slug('Japanese')
            ],
            [
                'name' => 'French',
                'description' => 'French language certifications',
                'slug' => Str::slug('French')
            ],
            [
                'name' => 'German',
                'description' => 'German language certifications',
                'slug' => Str::slug('German')
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}