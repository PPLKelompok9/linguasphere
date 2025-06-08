<?php
namespace App\Repositories;

use App\Models\Course;
use Illuminate\Support\Collection;

interface CourseRepositoryInterface
{
  public function searchByKeyword(string $keyword): Collection;
  public function getAllWithCategory(): Collection;
}