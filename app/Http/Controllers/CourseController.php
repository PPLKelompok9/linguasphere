<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Category;
use App\Services\CourseService;

class CourseController extends Controller
{
    protected $courseService;

    public function __construct(CourseService $courseService){
        $this->courseService = $courseService;
    }

    public function index(){
        $coursesByCategory = $this->courseService->getCoursesGroupByCategory();
        // $categories = Category::with('agencies.courses')->get();
        // dd($coursesByCategory);

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

    public function showDetailCoursesByCategory(int $id){
       
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

    return view('courses.details', [
        'category' => $category->name,
        'courses' => $courses,
    ]);
    }

    public function learningCourse(Course $course, $contentSectionId, $sectionContentId){
        
        $data = $this->courseService->getLearningCourse($course,  $contentSectionId, $sectionContentId);
        //dd($data);
        return view('courses.learning', $data);
    }

    public function learningFinished(Course $course){
        return view('courses.learning_finished', compact('course'));
    }
}
