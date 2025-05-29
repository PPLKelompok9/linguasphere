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
         $categories = $this->courseRepository->getAllWithCategory();
            return $categories->map(function ($category) {
        return [
            'id' => $category->id,
            'name' => $category->name,
            'images' => $category->images,
            'agencies' => $category->agencies->map(function ($agency) {
                return [
                    'id' => $agency->id,
                    'name' => $agency->name,
                    'slug' => $agency->slug,
                    'courses' => $agency->courses->map(function ($course) {
                        return [
                            'id' => $course->id,
                            'name' => $course->name,
                            'slug' => $course->slug,
                            'cover' => $course->cover,
                            'price' => $course->price,
                            // tambahkan properti lain yang dibutuhkan
                        ];
                    }),
                ];
            }),
        ];
    });
       
    }

    public function getCoursesByCategory(int $id){
        $category = $this->courseRepository->findCourseByCategory($id);
        $courses = collect();

        foreach($category->agencies as $agency){
            $courses = $courses->merge($agency->courses);
        }

        return $courses->sortByDesc('created_at')->values();
    }

    public function getCourseData(Course $course){
        return $course;
    }

    public function getLearningCourse(Course $course, $contentSectionId, $sectionContentId){
       $data= $course->load(['agency','courseSections.sectionContents']);
       $currentSection = $course->courseSections->find($contentSectionId);
       $currentContent = $currentSection ? $currentSection->sectionContents->find($sectionContentId):null;
       

       $nextContent = null;

        if ($currentSection) {
            $nextContent = $currentSection->sectionContents
                ->where('id', '>', $currentContent->id)
                ->sortBy('id')
                ->first();
        }

        if (!$nextContent && $currentSection) {
            $nextSection = $course->courseSections
                ->where('id', '>', $currentSection->id)
                ->sortBy('id')
                ->first();

            if ($nextSection) {
                $nextContent = $nextSection->sectionContents->sortBy('id')->first();
            }
        }

        return[
            'course' => $course,
            'currentSection' => $currentSection,
            'currentContent' => $currentContent,
            'nextContent' => $nextContent,
            'isFinished' => !$nextContent,
        ];

    }
    
}