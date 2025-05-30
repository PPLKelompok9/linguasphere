<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'categories';
    protected $fillable = ['name', 'images'];
    public function agencies()
    {
        return $this->hasMany(Agency::class, 'category_id');
    }
    public function courses(){
        return $this->hasMany(Course::class, 'id_category');
    }
    public function sertifications(){
        return $this->hasMany(Sertifications::class, 'id_category');
    }

}
