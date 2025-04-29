<?php

namespace App\Services;

use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use App\Repositories\CourseRepositoryInterface;

class CourseService{
    protected $courseRepository;

    public function __construct(CourseRepositoryInterface $courseRepository){
        $this->courseRepository = $courseRepository;
    }

    public function enrollUser(Course $course){
        $user = Auth::user();

        //Cek User Already Enrolled
        if(!$course->course()->where('user_id', $user->id)->exists()){
            $course->course()->create([
                'user_id' => $user->id,
                'is_active' => true,
            ]);
        }

        return $user->name();
    }

    public function searchCourses(string $keyword){
        return $this->courseRepository->searchByKeyword($keyword);
    }

    public function getCoursesGroupByCategory(){
        $courses = $this->courseRepository->getAllWithCategory();
        return $courses->groupBy(function ($course){
            return $course->category->name ?? 'Uncategorize';
        });
    }
}