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

    if ($user) {
      $isPurchased = Transaction::where('id_user', $user->id)
        ->where('id_products', $course->id)
        ->where('status_payment', 'paid') // atau 1 jika boolean
        ->exists();
    }

    $firstSection = $course->courseSections->first();
    $firstContent = $firstSection ? $firstSection->sectionContents->first() : null;

    $courseSectionId = $firstSection?->id ?? '';
    $sectionContentId = $firstContent?->id ?? '';

    $aboutContents = [
      'intermediate-business-english' => [
        'learn' => [
          'Cara Menulis Email Resmi yang Efektif',
          'Teknik Membuka & Menutup Presentasi',
          'Tips Menggunakan Visual Aids & Slide',
          'Ungkapan Umum dalam Meeting & Telepon',
          'Dasar-dasar Bahasa Negosiasi',
          'Teknik Mendengarkan & Simulasi Negosiasi'
        ],
        'instructor' => [
          [
            'photo' => '/assets/images/photos/desysensei.jpg',
            'name' => 'Desy Sensei',
            'description' => 'Desy Sensei adalah seorang pengajar Bahasa Jepang berpengalaman sejak tahun 2008 dengan latar belakang akademik di bidang Pendidikan Bahasa Jepang dari Universitas Negeri Jakarta dan Universitas Negeri Indonesia. Ia memiliki sertifikasi JLPT N3 serta pelatihan Marugoto untuk tingkat pemula, dan dikenal dengan metode pengajaran yang mudah dipahami. Saat ini, Desy Sensei aktif mengajar di Shinjukucenter dan terus berkomitmen menyebarkan semangat belajar Bahasa Jepang kepada banyak orang.'
          ],
          [
            'photo' => '/assets/images/photos/tikasensei.jpg',
            'name' => 'Tika Sensei',
            'description' => 'Tika Sensei adalah pengajar Bahasa Jepang berpengalaman sejak tahun 2008 dengan pendekatan yang terstruktur dan menyenangkan. Lulusan Pendidikan Bahasa Jepang Universitas Negeri Jakarta ini memiliki sertifikasi JLPT N3 serta pengalaman mengajar di berbagai institusi pendidikan dan perusahaan. Saat ini, Tika Sensei aktif mengajar di Shinjukucenter dan dikenal sebagai pengajar yang sabar dan fokus membantu siswa mencapai target belajarnya.'
          ],
          [
            'photo' => '/assets/images/photos/mariosensei.jpg',
            'name' => 'Mario Sensei',
            'description' => 'Mario Sensei adalah pengajar Bahasa Jepang yang antusias dan berkomitmen membangun kedekatan dengan siswa untuk mendukung proses belajar yang efektif. Lulusan Sastra Jepang Universitas Nasional dan alumni Nihongo Center di Kyoto ini memiliki sertifikasi JLPT N3 serta pengalaman mengajar di berbagai lembaga kursus. Saat ini, Mario Sensei aktif mengajar di Shinjukucenter dan dikenal dengan pendekatan pengajaran yang hangat dan penuh semangat.'
          ],
          [
            'photo' => '/assets/images/photos/shierinsensei.jpg',
            'name' => 'Shierin Sensei',
            'description' => 'Shierin Sensei adalah pengajar Bahasa Jepang yang berdedikasi untuk menciptakan suasana kelas yang seimbang antara serius dan santai. Lulusan Sastra Jepang Universitas Pakuan dan alumni Ichikawa Japanese Language Institute di Chiba, Jepang, ini memiliki sertifikasi JLPT N3. Sejak 2019, Shierin Sensei aktif mengajar di Shinjukucenter dan dikenal karena semangatnya dalam berbagi ilmu serta kemampuannya membangun hubungan positif dengan siswa.'
          ]
        ]
      ],
      'advanced-english-for-academic-purposes' => [
        'learn' => [
          'Struktur Esai & Penulisan Thesis Statement',
          'Menulis Bagian Pendahuluan yang Efektif',
          'Penggunaan Kosakata dalam Konteks Akademik',
          'Cara Menyitir & Menghindari Plagiarisme',
          'Membuat Outline Penelitian',
          'Tips Berbicara di Depan Umum'
        ],
        'instructor' => [
          [
            'photo' => '/assets/images/photos/desysensei.jpg',
            'name' => 'Desy Sensei',
            'description' => 'Desy Sensei adalah seorang pengajar Bahasa Jepang berpengalaman sejak tahun 2008 dengan latar belakang akademik di bidang Pendidikan Bahasa Jepang dari Universitas Negeri Jakarta dan Universitas Negeri Indonesia. Ia memiliki sertifikasi JLPT N3 serta pelatihan Marugoto untuk tingkat pemula, dan dikenal dengan metode pengajaran yang mudah dipahami. Saat ini, Desy Sensei aktif mengajar di Shinjukucenter dan terus berkomitmen menyebarkan semangat belajar Bahasa Jepang kepada banyak orang.'
          ],
          [
            'photo' => '/assets/images/photos/tikasensei.jpg',
            'name' => 'Tika Sensei',
            'description' => 'Tika Sensei adalah pengajar Bahasa Jepang berpengalaman sejak tahun 2008 dengan pendekatan yang terstruktur dan menyenangkan. Lulusan Pendidikan Bahasa Jepang Universitas Negeri Jakarta ini memiliki sertifikasi JLPT N3 serta pengalaman mengajar di berbagai institusi pendidikan dan perusahaan. Saat ini, Tika Sensei aktif mengajar di Shinjukucenter dan dikenal sebagai pengajar yang sabar dan fokus membantu siswa mencapai target belajarnya.'
          ],
          [
            'photo' => '/assets/images/photos/mariosensei.jpg',
            'name' => 'Mario Sensei',
            'description' => 'Mario Sensei adalah pengajar Bahasa Jepang yang antusias dan berkomitmen membangun kedekatan dengan siswa untuk mendukung proses belajar yang efektif. Lulusan Sastra Jepang Universitas Nasional dan alumni Nihongo Center di Kyoto ini memiliki sertifikasi JLPT N3 serta pengalaman mengajar di berbagai lembaga kursus. Saat ini, Mario Sensei aktif mengajar di Shinjukucenter dan dikenal dengan pendekatan pengajaran yang hangat dan penuh semangat.'
          ],
          [
            'photo' => '/assets/images/photos/shierinsensei.jpg',
            'name' => 'Shierin Sensei',
            'description' => 'Shierin Sensei adalah pengajar Bahasa Jepang yang berdedikasi untuk menciptakan suasana kelas yang seimbang antara serius dan santai. Lulusan Sastra Jepang Universitas Pakuan dan alumni Ichikawa Japanese Language Institute di Chiba, Jepang, ini memiliki sertifikasi JLPT N3. Sejak 2019, Shierin Sensei aktif mengajar di Shinjukucenter dan dikenal karena semangatnya dalam berbagi ilmu serta kemampuannya membangun hubungan positif dengan siswa.'
          ]
        ]
      ],
    ];

    $learn = $aboutContents[$course->slug]['learn'] ?? [];
    $instructor = $aboutContents[$course->slug]['instructor'] ?? [];

    return view('user.courses.detail', compact(
      'course',
      'learn',
      'instructor',
      'isPurchased',
      'courseSectionId',
      'sectionContentId'
    ));
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
