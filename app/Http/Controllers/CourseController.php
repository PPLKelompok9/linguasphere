<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Category;
use App\Services\CourseService;

class CourseController extends Controller
{
  protected $courseService;

  public function __construct(CourseService $courseService)
  {
    $this->courseService = $courseService;
  }

  // User
  public function userIndex()
  {
    $boughtCourseIds = Transaction::where('id_user', auth()->id())
      ->where('type_products', 'Courses')
      ->where('status_payment', operator: "paid")
      ->pluck('id_products')
      ->toArray();

    $courses = Course::with('category')
      ->whereNotIn('id', $boughtCourseIds)
      ->get();
    $categories = Category::all();
    return view('user.courses.index', compact('courses', 'categories'));
  }

  public function show($slug)
  {
    $user = auth()->user();
    $isPurchased = false;

    $course = Course::with(['courseSections.sectionContents', 'category', 'agency'])->where('slug', $slug)->firstOrFail();

    $sections = $course->courseSections;
    $maxItems = 6;
    $sectionCount = $sections->count();
    $result = [];

    if ($user) {
      $isPurchased = Transaction::where('id_user', $user->id)
        ->where('id_products', $course->id)
        ->where('status_payment', 'paid')
        ->exists();
    }

    if ($sectionCount > 0) {
      $base = intdiv($maxItems, $sectionCount);
      $remainder = $maxItems % $sectionCount;

      foreach ($sections as $i => $section) {
        $take = $base + ($i < $remainder ? 1 : 0);
        $contents = $section->sectionContents->take($take);
        foreach ($contents as $content) {
          $result[] = $content->name;
          if (count($result) >= $maxItems)
            break 2;
        }
      }
    }

    $firstSection = $course->courseSections->first();
    $firstContent = $firstSection ? $firstSection->sectionContents->first() : null;

    $courseSectionId = $firstSection?->id ?? '';
    $sectionContentId = $firstContent?->id ?? '';

    return view('user.courses.detail', [
      'course' => $course,
      'learn' => $result,
      'isPurchased' => $isPurchased,
      'courseSectionId' => $courseSectionId,
      'sectionContentId' => $sectionContentId,
    ]);
  }

  public function searchCourses(Request $request)
  {
    $keyword = trim($request->get('search', ''));

    if ($keyword === '') {
      return redirect()->route('courses.user');
    }

    $courses = $this->courseService->searchCourses($keyword);
    return view('user.courses.search', compact('courses', 'keyword'));
  }

  public function learningCourse(Course $course, $contentSectionId, $sectionContentId)
  {

    $data = $this->courseService->getLearningCourse($course, $contentSectionId, $sectionContentId);
    return view('user.courses.learning', $data);
  }

  public function learningFinished(Course $course)
  {
    return view('user.courses.learning_finished', compact('course'));
  }

  // Guest

  public function guestIndex()
  {
    $coursesByCategory = $this->courseService->getCoursesGroupByCategory();
    return view('guest.Course.index', compact('coursesByCategory'));

  }

  public function showDetailCoursesByCategory(int $id)
  {

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

    return view('guest.Course.detail', [
      'category' => $category->name,
      'courses' => $courses,
    ]);
  }
}
