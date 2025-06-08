<?php

namespace App\Repositories;

use App\Models\Course;
use App\Models\Category;
use Illuminate\Support\Collection;

class CourseRepository implements CourseRepositoryInterface
{
  public function searchByKeyword(string $keyword): collection
  {
    return Course::with('category')
      ->where(function ($query) use ($keyword) {
        $query->where('name', 'like', "%{$keyword}%")
          ->orWhere('description', 'like', "%{$keyword}%");
      })
      ->get();
  }

  public function getAllWithCategory(): Collection
  {
    return Category::with('agencies.courses')->get();
  }

  public function findById(int $id): ?Course
  {
    return Course::find($id);
  }
}