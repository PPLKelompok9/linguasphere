<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PathDetail extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'path_details';
    protected $fillable = ['id_path', 'id_course'];
    public function path(){
        return $this->hasMany(Path::class, 'id_path');
    }
    public function courses(){
        return $this->hasMany(Course::class,'id_course');
    }
}
