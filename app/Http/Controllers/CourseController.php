<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Services\CourseService;

class CourseController extends Controller
{
    protected $courseService;

    public function __construct(CourseService $courseService){
        $this->courseService = $courseService;
    }

    public function index(){
        $coursesByCategory = $this->courseService->getCoursesGroupByCategory();
        return view('courses.index', compact('coursesByCategory'));
    }

    public function searchCourses(Request $request){
        $request->validate([
            'search'=>'required|string',
        ]);
        $keyword = $request->search;
        $courses = $this->courseService->searchCourses($keyword);
        return view('courses.search', compact('courses', 'keyword'));
    }
}
