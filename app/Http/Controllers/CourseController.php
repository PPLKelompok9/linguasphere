<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class CourseController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $courses = [
            'english' => [
                'title' => 'English Course',
                'icon' => 'book-open',
                'background' => 'bg-gradient-to-br from-red-400 to-red-200',
                'description' => 'Master English language skills for global communication',
                'levels' => ['Beginner', 'Intermediate', 'Advanced']
            ],
            'german' => [
                'title' => 'Germani Course',
                'icon' => 'book-open',
                'background' => 'bg-gradient-to-br from-teal-400 to-teal-200',
                'description' => 'Learn German language from beginner to advanced level',
                'levels' => ['Beginner', 'Intermediate', 'Advanced']
            ]
        ];

        return view('dashboard', compact('courses'));
    }

    public function english()
    {
        $course = [
            'title' => 'English Course',
            'description' => 'Master English language skills for global communication',
            'levels' => [
                'beginner' => [
                    'title' => 'Beginner Level',
                    'modules' => ['Basic Grammar', 'Essential Vocabulary', 'Simple Conversations']
                ],
                'intermediate' => [
                    'title' => 'Intermediate Level',
                    'modules' => ['Advanced Grammar', 'Business English', 'Daily Conversations']
                ],
                'advanced' => [
                    'title' => 'Advanced Level',
                    'modules' => ['Academic Writing', 'Public Speaking', 'Cultural Context']
                ]
            ]
        ];

        return view('courses.english', compact('course'));
    }

    public function german()
    {
        $course = [
            'title' => 'Germani Course',
            'description' => 'Learn German language from beginner to advanced level',
            'levels' => [
                'beginner' => [
                    'title' => 'Beginner Level',
                    'modules' => ['German Basics', 'Pronunciation', 'Simple Phrases']
                ],
                'intermediate' => [
                    'title' => 'Intermediate Level',
                    'modules' => ['Grammar Structure', 'Vocabulary Building', 'Conversational German']
                ],
                'advanced' => [
                    'title' => 'Advanced Level',
                    'modules' => ['Business German', 'Literature', 'Cultural Studies']
                ]
            ]
        ];

        return view('courses.german', compact('course'));
    }
}