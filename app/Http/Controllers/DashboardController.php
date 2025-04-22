<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Get total revenue
        $totalRevenue = Course::sum('total_revenue');
        
        // Get total students
        $totalStudents = User::where('role', 'student')->count();
        
        // Get new visitors (last 24 hours)
        $newVisitors = DB::table('visitors')
            ->where('created_at', '>=', now()->subDay())
            ->count();

        // Get course statistics
        $courses = Course::select([
            'name',
            'impressions',
            'price',
            'total_sales',
            'total_revenue',
            'icon'
        ])
            ->orderBy('total_revenue', 'desc')
            ->paginate(10);

        // Get popular courses
        $popularCourses = Course::select(['name', 'icon'])
            ->withCount('students')
            ->orderBy('students_count', 'desc')
            ->limit(3)
            ->get()
            ->map(function($course) {
                $course->total_students = $course->students_count;
                return $course;
            });

        // Get top student locations
        $topLocations = User::select('country', DB::raw('count(*) as total'))
            ->where('role', 'student')
            ->whereNotNull('country')
            ->groupBy('country')
            ->orderBy('total', 'desc')
            ->limit(3)
            ->get();

        return view('dashboard.index', compact(
            'totalRevenue',
            'totalStudents',
            'newVisitors',
            'courses',
            'popularCourses',
            'topLocations'
        ));
    }
} 