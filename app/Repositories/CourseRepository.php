<?php

namespace App\Repositories;

use App\Models\Course;
use App\Models\Category;
use Illuminate\Support\Collection;

class CourseRepository implements CourseRepositoryInterface{
    public function searchByKeyword(string $keyword): collection{
        return Course::where('name', 'like', "%{$keyword}%")->orWhere('about', 'like', "%{$keyword}%")->get();
    }

    public function getAllWithCategory(): Collection{
        return Category::with('agencies.courses')->get();
    }

    public function findById(int $id): ?Course{
        return Course::find($id);
    }
}