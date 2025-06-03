<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Category;
use App\Services\CourseService;

class FrontController extends Controller
{
    protected $courseService;

    public function __construct(CourseService $courseService){
        $this->courseService = $courseService;
    }

    public function Path(){
        return view('front.path');
    }

    public function Courses(){
        $coursesByCategory = $this->courseService->getCoursesGroupByCategory();
        return view('front.course', compact('coursesByCategory'));
    }

    public function CoursesDetails(int $id){
        $category = Category::with('agencies.courses')->findOrFail($id);

        $courses = $category->agencies->map(function ($agency) {
            return [
                'id' => $agency->id,
                'name' => $agency->name,
                'courses' => $agency->courses->map(function ($course) {
                    return [
                        'id' => $course->id,
                        'name' => $course->name,
                        'cover' => $course->cover,
                        'slug' => $course->slug,
                        'description' => $course->description,
                        'price' => $course->price,
                    ];
                }),
            ];
        });
        return view('front.course_details', [
        'category' => $category->name,
        'courses' => $courses,
    ]);
    }
}
